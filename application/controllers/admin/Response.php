<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Response extends CI_Controller {

    public function __construct() {
        parent::__construct();
        error_reporting(E_ALL);
        $this->load->model('Coin');
        $this->load->helper('common');
        $this->load->library('session');
    }

    public function index() {
        if(isset($_SESSION['admin']) || isset($_SESSION['operator']) || isset($_SESSION['poweruser'])){ 
        $users_data = $this->Coin->requestUser("register");
        $users = $users_data->result();

        $content = $this->load->view('admin/response/index.php', array('data' => $users), TRUE);
        $this->load->view('admin/templete', array('content' => $content));
        }else{
            session_destroy();
            redirect('admin/login');
        }
    }
    
    public function activeView($id){
        if(isset($_SESSION['admin']) || isset($_SESSION['operator']) || isset($_SESSION['poweruser'])){ 
            $users = $this->Coin->get_data_where('tbl_users', array('id' => $id))->row();
            $this->load->view('admin/response/active', array('row' => $users));
        }else{
            session_destroy();
            redirect('admin/login');
        }
    }
    
    public function Update(){
        if(isset($_SESSION['admin']) || isset($_SESSION['operator']) || isset($_SESSION['poweruser'])){ 
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
                       $from = "donotreply@gcc.co.in";
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
                           'subject' => 'GCC Email Confirmation',
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
             $this->db->delete('tbl_user_requests', array('user_id' => $_POST['userID']));
           $result = $this->Coin->insert_data_and_update($_POST['userID'],'tbl_users', $status_data);
           echo '2';
           return false;
        }else{
            session_destroy();
            redirect('admin/login');
        }
         
    }
}
