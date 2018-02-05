<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Withdraw extends CI_Controller {

    public function __construct() {
        parent::__construct();
        error_reporting(E_ALL);
        $this->load->model('Coin');
        $this->load->helper('common');
    }

    public function index() {
        if(isset($_SESSION['admin']) || isset($_SESSION['operator']) || isset($_SESSION['poweruser'])){
            $users_data = $this->Coin->withdrawUser();
            $withdrawl = $users_data->result();

            $content = $this->load->view('admin/withdraw/index.php', array('data' => $withdrawl), TRUE);
            $this->load->view('admin/templete', array('content' => $content));
        }else{
            session_destroy();
            redirect('admin/login');
        }
    }
    
    public function statusCheck($id,$wid){
        if(isset($_SESSION['admin']) || isset($_SESSION['operator']) || isset($_SESSION['poweruser'])){
            $users_data = $this->Coin->get_data_where('tbl_withdraw_response',array('id'=>$wid,'user_id'=>$id))->row();
            $users = $this->Coin->withdrawSellUserId($users_data->id,$users_data->user_id)->row();
            $this->load->view('admin/withdraw/statusCheck', array('row' => $users, 'user_id' => $id));
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
               $status_data['amount'] = $_POST['amount'];
               $status_data['status'] = $_POST['status'];
               $status_data['txn_id'] = $_POST['txn'];
               $status_data['approved_by'] = $_POST['approved_by'];
               $status_data['update_date'] = strtotime($date);

               $user_row = $this->Coin->get_data_where('tbl_users',array('id'=>$_POST['user_id']));
               $user_data = $this->Coin->get_data_row($user_row);
   
            }else{
               $status_data['status'] = '0';  
            }

            if($_POST['status'] == '2'){
                $total_wallet = $user_data->wallet + $_POST['amount'];
                $user_update = $this->Coin->update_data_where('tbl_users', array('wallet' =>$total_wallet), 'id', $_POST['user_id']);
                $result = $this->Coin->insert_data_and_update($_POST['buyID'],'tbl_withdraw_response', $status_data);
            }else{
                $result = $this->Coin->insert_data_and_update($_POST['buyID'],'tbl_withdraw_response', $status_data);
            }
            echo '2';
            return false;
        }else{
            session_destroy();
            redirect('admin/login');
        }
    }
    
    public function withdrawView($id,$user_id){
        if(isset($_SESSION['admin']) || isset($_SESSION['operator']) || isset($_SESSION['poweruser'])){
            $withdraws = $this->Coin->getWithdrawUserData($id,$user_id);
            $user_data = $this->Coin->get_data_where('tbl_users', array('id' => $user_id))->row();
            $withdraw_data = $this->Coin->get_data_where('tbl_withdraw_response', array('id' => $id))->row();
            $withdraw_approved_by = $this->Coin->get_data_where('tbl_admin', array('id_admin' => $withdraw_data->approved_by))->row();
            $approved_by = $this->Coin->get_data_where('tbl_admin', array('id_admin' => $user_data->approved_by))->row();
            $this->load->view('admin/withdraw/view', array('data' => $withdraws, 'approved_by' => $approved_by, 'withdraw_approved_by' => $withdraw_approved_by));           
        }else{
            session_destroy();
            redirect('admin/login');
        }
    }
    
}
