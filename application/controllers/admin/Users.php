<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

    public function __construct() {
        parent::__construct();
        error_reporting(E_ALL);
        $this->load->model('Coin');
        $this->load->helper('common');
        $this->load->library('session');
    }

    public function index() {
        if(isset($_SESSION['admin']) || isset($_SESSION['poweruser']) || isset($_SESSION['operator'])){
            $users = $this->Coin->get_data_where('tbl_users',array('status'=>'1'))->result();
            $content = $this->load->view('admin/users/index.php', array('data' => $users), TRUE);
            $this->load->view('admin/templete', array('content' => $content));
        }else{
            session_destroy();
            redirect('admin/login');
        }
    }

    public function add($id = false){
        if(isset($_SESSION['admin']) || isset($_SESSION['poweruser'])){
            $user_data = array(
                'id' => $id,
                'fname' => '',
                'mname' => '',
                'lname' => '',
                'username'=>'',
                'password' => '',
                'email' => '',
                'mobile' => '',
                'aadhar' => '',
                'pan' => '',
                'limitation' => '',
                'address'=>'',
                'waddress'=>'',
                'status'=>''
            );
            $this->form_validation->set_rules('fname', 'First Name', 'trim|required');
            $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
            $this->form_validation->set_rules('mobile', 'Mobile Number ', 'trim|required|regex_match[/^[0-9]{10}$/]');
            if(isset($_POST['aadahr']) && $_POST['aadahr'] != ''){
            $this->form_validation->set_rules('aadahr', 'Aadahr Number ', 'trim|required|numeric');
            }
            if(isset($_POST['pancard']) && $_POST['pancard'] != ''){
            $this->form_validation->set_rules('pancard', 'Pancard Number ', 'trim|required');
            }
            if(isset($_POST['passcard']) && $_POST['passcard'] != ''){
                $this->form_validation->set_rules('passcard', 'Passport Number ', 'trim|required');
            }

            $this->form_validation->set_rules('address', ' Address', 'trim|required');
            if(isset($_POST['password']) && $_POST['password'] != ''){
                $this->form_validation->set_rules('password', 'Password', 'trim|required');
            }

            if ($this->form_validation->run() == TRUE) {
                if($_POST['password'] != ""){
                    $passwords = trim(md5($this->input->post('password')));
                }else{
                    $tableData = $this->Coin->get_data_where('tbl_users', array('id' => $id))->row();
                    $passwords = $tableData->password;
                }
                $user_data = array(
                    'fname' => trim($this->input->post('fname')),
                    'mname' => trim($this->input->post('mname')),
                    'lname' => trim($this->input->post('lname')),
                    'password' => $passwords,
                    'email' => trim($this->input->post('email')),
                    'mobile' => trim($this->input->post('mobile')),
                    'aadhar' => trim($this->input->post('aadahr')),
                    'pan' => trim($this->input->post('pancard')),
                    'limitation' => trim($this->input->post('limitation')),
                    'seller_limitation' => trim($this->input->post('seller_limitation')),
                    'address' => trim($this->input->post('address')),
                    'status' => trim($this->input->post('status'))
                );
                if(isset($_POST['walletaddress']) && $_POST['walletaddress'] !=''){
                    $user_data['waddress'] =  trim($this->input->post('walletaddress'));
                }else{
                    $user_data['waddress']= json_encode(array('BTC'=>'','LTC'=>'','BCH'=>'','ETH'=>'','XRP'=>'','ADA'=>''));
                }
                $result = $this->Coin->insert_data_and_update($id, 'tbl_users', $user_data);
                if (isset($_FILES['userfile']['name'])) {
                    $filename = $_FILES['userfile']['name'];
                    $tmpfile = $_FILES['userfile']['tmp_name'];
                    if ($id) {
                        $image_id = $this->profileimage($id, $filename, $tmpfile);
                    } else {
                        $image_id = $this->profileimage($result, $filename, $tmpfile);
                    }
                    if (!$image_id) {
                        redirect('admin/users');
                    }
                }
                ($result) ? $this->session->set_flashdata('inserted', TRUE) : $this->session->set_flashdata('error', TRUE);
                redirect('admin/users/');
            }
            if ($id) {
                $user_data['data'] = $this->Coin->get_data_where('tbl_users', array('id' => $id));
                $content = $this->load->view('admin/users/add', $user_data, TRUE);
                $this->load->view('admin/templete', array('content' => $content));
            } else {
                $content = $this->load->view('admin/users/add', $user_data, TRUE);
                $this->load->view('admin/templete', array('content' => $content));
            }
        }else{
            session_destroy();
            redirect('admin/login');
        }
    }
    
    public function userView($id){
        if(isset($_SESSION['admin']) || isset($_SESSION['poweruser']) || isset($_SESSION['operator'])){
        $users = $this->Coin->get_data_where('tbl_users', array('id' => $id));
        $user_data = $this->Coin->get_data_where('tbl_users', array('id' => $id))->row();
        $approved_by = $this->Coin->get_data_where('tbl_admin', array('id_admin' => $user_data->approved_by))->row();
        $this->load->view('admin/users/view', array('data' => $users, 'approved_by' => $approved_by));
        }else{
            session_destroy();
            redirect('admin/login');
        }
    }
    
    public function deleteuser(){
        $id = $this->input->post('id');
        $table_name = $this->input->post('table');
        if ($id)
            $query = $this->db->delete($table_name, array('id' => $id));
        ($query) ? $response = TRUE : $response = FALSE;
        return $response;
        return false;
    }
    
    public function activeView($id){
         if(isset($_SESSION['admin']) || isset($_SESSION['poweruser']) || isset($_SESSION['operator'])){
        $users = $this->Coin->get_data_where('tbl_users', array('id' => $id))->row();
        $this->load->view('admin/users/active', array('row' => $users));
        }else{
            session_destroy();
            redirect('admin/login');
        }
    }
    
    public function amountView($id){
        if(isset($_SESSION['admin']) || isset($_SESSION['poweruser']) || isset($_SESSION['operator'])){
        $users = $this->Coin->get_data_where('tbl_users', array('id' => $id))->row();
        $this->load->view('admin/users/addaccount', array('row' => $users));
        }else{
            session_destroy();
            redirect('admin/login');
        }
    }
    
    public function Update(){
        if(isset($_SESSION['admin']) || isset($_SESSION['poweruser']) || isset($_SESSION['operator'])){
            if($_POST['statusID'] == 0){

                date_default_timezone_set('Asia/Kolkata');
                $date = date('Y-m-d h:i:s a');
                $status_data['level'] = $_POST['levelUser'];
                $status_data['limitation'] = $_POST['buyingLimit'];
                $status_data['seller_limitation'] = $_POST['selingLimit'];
                $status_data['approved'] = strtotime($date);           
                $status_data['approved_by'] = $_POST['approved_by'];
                $status_data['reference'] = $_POST['reference'];
                $status_data['status'] = '1';

               $user_row = $this->Coin->get_data_where('tbl_users',array('id'=>$_POST['userID']));
               $user_data = $this->Coin->get_data_row($user_row);
                        $from = "no-reply@grabcryptocoins.com";
                        $url = "https://api.sendgrid.com/";
                        $user = 'abhishekp';
                        $pass = 'abhishekp@123';
                        $html = $this->load->view('welcome-user',array('data'=>$user_data),TRUE);
                        $params = array(
                            'api_user' => $user,
                            'api_key' => $pass,
                            'to' => $user_data->email,
                            'fromname' => 'GrabCryptoCoins',
                            'from' => $from,
                            'subject' => 'GCC Account Verification',
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
               $dataInsert['user_id'] = $_POST['userID'];
               $dataInsert['type'] = 'register';
               $this->Coin->insert_data('tbl_user_requests', $dataInsert);
             }
         
            $result = $this->Coin->insert_data_and_update($_POST['userID'],'tbl_users', $status_data);

            echo '2';
            return false;
        }else{
            session_destroy();
            redirect('admin/login');
        }
    }
    
    public function addMoney(){
        if(isset($_SESSION['admin']) || isset($_SESSION['poweruser'])){
            $data['payment'] = $_POST['accType']; 
            $data['payment_amt'] = $_POST['popupbuyingamount']; 
            $data['userId'] = $_POST['useramountID'];
            $data['date'] =  strtotime(date("Y/m/d"));
            $data['status'] =  "Completed";
            $getUser = $this->Coin->get_data_where('tbl_users',array('id'=>$_POST['useramountID']))->row();
            $amount = $getUser->wallet;
            $amount = $amount+$_POST['popupbuyingamount'];
            $userData['wallet'] = $amount;
            $this->Coin->insert_data_and_update($_POST['useramountID'],'tbl_users', $userData);
            $result = $this->Coin->insert_data_and_update('','tbl_payment', $data);
            echo '2';
        }else{
            session_destroy();
            redirect('admin/login');
        }
    }
    
    public function profileimage($id, $filename = '', $tmpfile = '') {
        if ($filename != "") {
            $ext = pathinfo($filename, PATHINFO_EXTENSION);
            if ($ext == 'gif' || $ext == 'jpg' || $ext == 'png' || $ext == 'jpeg' || $ext == "JPEG" || $ext == "JPG" || $ext == "PNG" || $ext == "GIF") {
                $image = $this->Coin->imageUpload($id, $ext,'users');
                $data = array('image' => $image);
                $where = array('id' => $id);
                $id = $this->Coin->updateDataWhere('tbl_users', $data, $where);
                return $id;
            } else {
                $this->session->set_flashdata('error', "Please choose image");
                return false;
            }
        }
    }
    
    public function updateUserPassword($id){
        if(isset($_SESSION['admin']) || isset($_SESSION['operator'])){
        $users = $this->Coin->get_data_where('tbl_users', array('id' => $id))->row();
        $this->load->view('admin/users/update_subadmin_user_password', array('row' => $users));
        }else{
            session_destroy();
            redirect('admin/login');
        }
    }
    
    public function updateSubadminUserPwd(){
        $data['password'] = md5($_POST['password']); 
        $data['id'] = $_POST['userID']; 
        $updatePassword = $this->Coin->update_data_where('tbl_users', array('password' => $data['password']), 'id', $_POST['userID']);
        echo '2';
    }
    
}
