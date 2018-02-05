<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Registration extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Coin');
        $this->load->helper('common');
    }

    public function index() {
        $data = array();
        $content = $this->load->view('register.php', array('data' => $data), TRUE);
        $this->load->view('template', array('content' => $content));
    }

    public function action() {

        if ($this->input->post()) {
            date_default_timezone_set('Asia/Kolkata');
            $user_data = array(
                'fname' => $_POST['first_name'],
                'mname' => $_POST['middle_name'],
                'lname' => $_POST['last_name'],
                'email' => $_POST['billing_email'],
                'mobile' => $_POST['billing_phone'],
                'address' => $_POST['billing_address'],
                'password' => md5($_POST['billing_password']),
                'city' => $_POST['city'],
                'state' => $_POST['state'],
                'postal' => $_POST['postal'],
                'type' => 'register',
                'waddress'=> json_encode(array('BTC'=>'','LTC'=>'','BCH'=>'','ETH'=>'','XRP'=>'','ADA'=>'')),
                'created'=> strtotime(date('m/d/y h:i:s a'))
            );
            if ($_POST['options'] == '1') {
                $user_data['aadhar'] = $_POST['billing_company'];
            } else if ($_POST['options'] == '2') {
                $user_data['pan'] = $_POST['billing_company'];
            } else if ($_POST['options'] == '3') {
                $user_data['passport'] = $_POST['billing_company'];
            }

            $email_checked = $this->Coin->get_data_where('tbl_users', array('email' => $_POST['billing_email']))->row();
            $mobile_checked = $this->Coin->get_data_where('tbl_users', array('mobile' => $_POST['billing_phone']))->row();
            if ($email_checked) {
                echo "3";
            } else if ($mobile_checked) {
                echo "4";
            } else {
                $insert_id = $this->Coin->insert_data('tbl_users', $user_data);

                if ($insert_id) {
                    if (isset($_FILES['userfile']['name'])) {
                        $filename = $_FILES['userfile']['name'];
                        $tmpfile = $_FILES['userfile']['tmp_name'];
                        $image_id = $this->profileimage($insert_id, $filename, $tmpfile);
                    }
                    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_-=+;:,.?";
                    $new_pass = substr(str_shuffle($chars), 0, 10);
                    $db_pass = substr(md5(sha1(uniqid() . $new_pass . md5($insert_id))), 0, 10);
                    $save = array('user_key' => $db_pass);
                    $up_password = $this->Coin->update_data_where('tbl_users', $save, 'id', $insert_id);
                    
                    $url = "https://api.sendgrid.com/";
                    $user = 'abhishekp';
                    $pass = 'abhishekp@123';

                    $encrypted_id = md5($insert_id);
                    $reset_link = base_url("registration/verfied/$db_pass/$encrypted_id");
                    
                    $to = array($_POST['billing_email'],'orders@grabcryptocoins.com');
                    $from = array("orders@grabcryptocoins.com",$_POST['billing_email']);

                    $htmlUser = $this->load->view('email-user.php',array('reset_link'=>$reset_link),TRUE);
                    $htmlAdmin = $this->load->view('email-admin.php',array('fname'=>$_POST['first_name']),TRUE);
                    $htmlSend = array($htmlUser,$htmlAdmin);
                    
                    for($i=0;$i<count($to);$i++){
                    $params = array(
                        'api_user' => $user,
                        'api_key' => $pass,
                        'to' => $to[$i],
                        'fromname' => 'GrabCryptoCoins',
                        'from' => $from[$i],
                        'subject' => 'GCC Account Verification',
                        'html' => $htmlSend[$i]);
                    $request = $url . 'api/mail.send.json';
                    $session = curl_init($request);
                    curl_setopt($session, CURLOPT_POST, true);
                    curl_setopt($session, CURLOPT_POSTFIELDS, $params);
                    curl_setopt($session, CURLOPT_HEADER, false);
                    curl_setopt($session, CURLOPT_SSL_VERIFYPEER, false);
                    curl_setopt($session, CURLOPT_RETURNTRANSFER, true);
                    $responsed = curl_exec($session);
                    curl_close($session);
                    }
                    $this->load->view('email_verified');
                } else {
                    echo "2";
                }
            }
        }
    }

    public function verfied($code, $id) {
        if ($code != "" && $id != "") {
            $where = array('user_key' => $code);
            $user_data = $this->Coin->get_data_where('tbl_users', $where);
            if ($user_data->num_rows() > 0) {
                $user = $this->Coin->get_data_row($user_data);
                if (md5($user->id) == $id) {
                    $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

                    $save = array(
                        'user_key' => "",
                        'verified' => "1",
                    );
                    $this->Coin->update_data_where('tbl_users', $save, 'id', $user->id);
                    $request=array('user_id'=>$user->id,'type'=>'register');
                    $this->Coin->insert_data('tbl_user_requests',$request);
                    $url = "https://api.sendgrid.com/";
                    $sendgrid_user = 'abhishekp';
                    $sendgrid_pass = 'abhishekp@123';
                    $html = "Please verify new user " . $user->fname;
                    $params = array(
                        'api_user' => $sendgrid_user,
                        'api_key' => $sendgrid_pass,
                        'to' => 'contact@grabcryptocoins.com',
                        'fromname' => 'GrabCryptoCoins',
                        'from' => $user->email,
                        'subject' => 'Gcc Under Review',
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
                    $content = $this->load->view('add-coin-address', array('user' => $user,'url'=>$actual_link), TRUE);
                    $this->load->view('template', array('content' => $content));
                } else {
                    echo 'Verification code wrong';
                }
            } else {
                //echo 'Invalid verification';
                redirect('login');
            }
        } else {
            echo "Please choose proper link to verify";
        }
    }
    
    public function profileReview(){
       $this->load->view('profile_review');
    }
    
    public function emailVerification(){
       $this->load->view('email_verified');
    }

    public function addWalletAddress() {
        $actual_link=$_POST['url'];
        $link_array = explode('/', $actual_link);
        $last_id = end($link_array);
        if ($last_id == md5($_POST['userID'])) {
            if ($this->input->post()) {
                $wallet =array('BTC'=>$_POST['billing_bitcoin'],'LTC'=>$_POST['billing_litecoin'],'BCH'=>$_POST['billing_bitcoincash'],'ETH'=>$_POST['billing_ethereum'],'XRP'=>$_POST['billing_ripple'],'ADA'=>$_POST['billing_cardano']);
                $data['waddress'] = json_encode($wallet);
                $updatID = $this->Coin->insert_data_and_update($_POST['userID'], 'tbl_users', $data);
                if ($updatID) {
                    $this->load->view('profile_review');
                }
            }
        }else{
            echo '2';
        }
    }

    public function profileimage($id, $filename = '', $tmpfile = '') {
        if ($filename != "") {
            $ext = pathinfo($filename, PATHINFO_EXTENSION);
            if ($ext == 'gif' || $ext == 'jpg' || $ext == 'png' || $ext == 'jpeg' || $ext == "JPEG" || $ext == "JPG" || $ext == "PNG" || $ext == "GIF") {
                $image = $this->Coin->imageUpload($id, $ext, 'users');
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

}

?>