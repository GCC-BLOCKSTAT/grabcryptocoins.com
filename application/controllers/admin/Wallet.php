<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Wallet extends CI_Controller {

    public function __construct() {
        parent::__construct();
        error_reporting(E_ALL);
        $this->load->model('Coin');
        $this->load->helper('common');
        $this->load->library('session');
    }

    public function index() {
        if(isset($_SESSION['admin']) || isset($_SESSION['operator']) || isset($_SESSION['poweruser'])){
        $users_data = $this->Coin->walletUser();
        $users = $users_data->result();

        $content = $this->load->view('admin/wallet/index.php', array('data' => $users), TRUE);
        $this->load->view('admin/templete', array('content' => $content));
        }else{
            session_destroy();
            redirect('admin/login');
        }
    }
    
    public function edit($id) {
        if(isset($_SESSION['admin']) || isset($_SESSION['operator']) || isset($_SESSION['poweruser'])){
            $this->form_validation->set_rules('waddress', 'Wallet Address', 'trim|required');
            $this->form_validation->set_rules('amount', 'Amount', 'trim|required');
            $this->form_validation->set_rules('txn', 'Transaction Id', 'trim|required');

            if ($this->form_validation->run() == TRUE) {
                $update_data['waddress'] = $_POST['waddress'];
                $update_data['coin'] = $_POST['amount'];
                $update_data['txn_number'] = $_POST['txn'];
                $update_data['update_date'] = strtotime(date('m/d/y'));
                $result = $this->Coin->insert_data_and_update($id, 'tbl_buy_response', $update_data);
                ($result) ? $this->session->set_flashdata('inserted', TRUE) : $this->session->set_flashdata('error', TRUE);
                redirect('admin/wallet/');
            }
            $users_data = $this->Coin->get_data_where('tbl_buy_response',array('id'=>$id))->row();
            $content = $this->load->view('admin/wallet/edit.php', array('data' => $users_data), TRUE);
            $this->load->view('admin/templete', array('content' => $content));
        }else{
            session_destroy();
            redirect('admin/login');
        }
    }
    
    public function statusCheck($id,$buyid){
        if(isset($_SESSION['admin']) || isset($_SESSION['operator']) || isset($_SESSION['poweruser'])){
            $users_data = $this->Coin->get_data_where('tbl_buy_response',array('id'=>$buyid,'user_id'=>$id))->row();
            $users = $this->Coin->walletUserId($users_data->id,$users_data->user_id)->row();
            $this->load->view('admin/wallet/statusCheck', array('row' => $users));
        }else{
            session_destroy();
            redirect('admin/login');
        }
    }
    
    public function statusView(){
        if(isset($_SESSION['admin']) || isset($_SESSION['operator']) || isset($_SESSION['poweruser'])){
            
            if($_POST['statusID'] == 0){            
                date_default_timezone_set('Asia/Kolkata');
                $date = date('Y-m-d h:i:s a');
                $status_data['waddress'] = $_POST['wallet'];
                $status_data['amount'] = $_POST['amount'];
                $status_data['coin_name'] = $_POST['coin_name'];
                $status_data['coin_value'] = $_POST['coin_value'];            
                $status_data['txn_number'] = $_POST['txn'];
                $status_data['status'] = $_POST['status'];
                $status_data['update_date'] = strtotime($date);
                $status_data['approved_by'] = $_POST['approved_by'];
                $userId = $_POST['idUser'];

               $user_row = $this->Coin->get_data_where('tbl_users',array('id'=>$userId));
               $user_data = $this->Coin->get_data_row($user_row);

                        $from = "no-reply@grabcryptocoins.com ";
                        $url = "https://api.sendgrid.com/";
                        $user = 'abhishekp';
                        $pass = 'abhishekp@123';
                        $html = $this->load->view('admin/wallet/buy-status.php',array('data'=>$user_data),TRUE);
                        $params = array(
                            'api_user' => $user,
                            'api_key' => $pass,
                            'to' => $user_data->email,
                            'fromname' => 'GrabCryptoCoins',
                            'from' => $from,
                            'subject' => 'Gcc Buy Approve ',
                            'html' => $html);
                        $request = $url . 'api/mail.send.json';
                        $session = curl_init($request);
                        curl_setopt($session, CURLOPT_POST, true);
                        curl_setopt($session, CURLOPT_POSTFIELDS, $params);
                        curl_setopt($session, CURLOPT_HEADER, false);
                        curl_setopt($session, CURLOPT_SSL_VERIFYPEER, false);
                        curl_setopt($session, CURLOPT_RETURNTRANSFER, true);
                        $responsed = curl_exec($session);
                        curl_close($session);
             }else{
               $status_data['status'] = '0';  
             }

            if($_POST['status'] == 1){
                $wallet_balance = $user_data->wallet - $_POST['amount'];
                $wallet_update = $this->Coin->update_data_where('tbl_users', array('wallet' => $wallet_balance), 'id', $userId);
                $result = $this->Coin->insert_data_and_update($_POST['buyID'],'tbl_buy_response', $status_data);
            }else{
                $result = $this->Coin->insert_data_and_update($_POST['buyID'],'tbl_buy_response', $status_data);
            }

            echo '2';
            return false;
        }else{
            session_destroy();
            redirect('admin/login');
        }
    }
    
    public function buyerView($id,$user_id){
        if(isset($_SESSION['admin']) || isset($_SESSION['operator']) || isset($_SESSION['poweruser'])){
            $buyers = $this->Coin->getBuyerUserData($id,$user_id);
            $user_data = $this->Coin->get_data_where('tbl_users', array('id' => $user_id))->row();
            $buyer_data = $this->Coin->get_data_where('tbl_buy_response', array('id' => $id))->row();
            $buyer_approved_by = $this->Coin->get_data_where('tbl_admin', array('id_admin' => $buyer_data->approved_by))->row();
            $approved_by = $this->Coin->get_data_where('tbl_admin', array('id_admin' => $user_data->approved_by))->row();
            $this->load->view('admin/wallet/view', array('data' => $buyers, 'approved_by' => $approved_by, 'buyer_approved_by' => $buyer_approved_by));           
        }else{
            session_destroy();
            redirect('admin/login');
        }
    }
    
}
