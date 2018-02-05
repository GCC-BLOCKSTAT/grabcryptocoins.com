<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Coin');
        $this->load->helper('common');
    }
    
    public function gcc(){
            $data = array();
            $content = $this->load->view('gcc/index', array('data' => $data), TRUE);
            $this->load->view('template', array('content' => $content));
    }
    
    public function get(){
        if ($this->input->post()) {
            $email = $_POST['billing_email'];
            $password = trim(md5($_POST['billing_password']));
            $login_checked = $this->Coin->get_data_where('tbl_users', array('email' => $email, 'password' => $password));
            if ($login_checked->num_rows() > 0) {
                $user = $this->Coin->get_data_row($login_checked);
                if ($user->verified == '0') {
                    echo "6";
                    return false;
                } else if ($user->id != '') {
                    if ($user->status == '1') {
                        $_SESSION['user'] = $user->id;
                        $this->Coin->insert_data_and_update($user->id,'tbl_users',array('google_auth_code'=>$_POST['scerter']));
                
                       if ($_SESSION['user']) {
                            $this->load->view('gcc/device_confirmations',array('email'=>$user->email,'secret'=>$user->google_auth_code));
                        } else {
                            $errorMsgLogin = "Please check login details.";
                        }

                    } else {
                        echo "4";
                        return false;
                    }
                }
            } else {
                echo "3";
                return false;
            }
        }
    }
    
    public function index() {
        if(isset($_SESSION['user'])){
            redirect(base_url('dashboard'));
        }else{
            $data = array();
            $content = $this->load->view('login.php', array('data' => $data), TRUE);
            $this->load->view('template', array('content' => $content));
        }
    }

    public function action() {

        if ($this->input->post()) {
            $email = $_POST['billing_email'];
            $password = trim(md5($_POST['billing_password']));
            $login_checked = $this->Coin->get_data_where('tbl_users', array('email' => $email, 'password' => $password));
            if ($login_checked->num_rows() > 0) {
                $user = $this->Coin->get_data_row($login_checked);
                if ($user->verified == '0') {
                    echo "6";
                    return false;
                } else if ($user->id != '') {
                    if ($user->status == '1') {
                        $_SESSION['user'] = $user->id;
                        echo "2";
                        return false;
                    } else {
                        echo "4";
                        return false;
                    }
                }
            } else {
                echo "3";
                return false;
            }
        }
    }

    public function forgetPasswords() {
        $this->load->view('forgotpassword');
    }

    public function forgetPassword() {
        $email = $this->input->post('email');
        $where = array(
            'email' => trim($this->input->post('email'))
        );
        $user_data = $this->Coin->get_data_where('tbl_users', $where);
        if ($user_data->num_rows() > 0) {
            $user = $this->Coin->get_data_row($user_data);
            $email = $user->email;
            $userid = $user->id;
            $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_-=+;:,.?";
            $new_pass = substr(str_shuffle($chars), 0, 10);
            $db_pass = substr(md5(sha1(uniqid() . $new_pass)), 0, 10) . md5($userid);
            $save = array('user_key' => $db_pass, 'token_time' => strtotime(date('Y-m-d h:i:s')));
            $up_password = $this->Coin->update_data_where('tbl_users', $save, 'id', $userid);
            if ($up_password) {
                $reset_link = base_url('login/resetPassword') . "?ucode=" . $db_pass;
                $subject = 'Coin Password Reset';
                $message = "Dear " . $user->fname . ",<br/><br/>Please click on below link to reset your password <br/><br/>" . $reset_link . " <br/><br/>Note:- Dont share this mail to unreliable source";
                $emaildata = $this->Coin->get_data_where('tbl_email_manager', array('slug' => 'ForgotPassword', 'type' => 'user'));

                if ($emaildata->num_rows() > 0) {
                    $emailcontent = $this->Coin->get_data_row($emaildata);
                    $subject = $emailcontent->subject;
                    $cleanString = $emailcontent->content;

                    $find = array('$name', '$link');
                    $replace = array($user->fname, $reset_link);
                    $message = str_replace($find, $replace, $cleanString);
                    $from = "no-reply@grabcryptocoins.com";
                    $url = "https://api.sendgrid.com/";
                    $user = 'abhishekp';
                    $pass = 'abhishekp@123';
                    $params = array(
                        'api_user' => $user,
                        'api_key' => $pass,
                        'to' => $email,
                        'fromname' => 'GrabCryptoCoins',
                        'from' => $from,
                        'subject' => $subject,
                        'html' => $message);

                    $request = $url . 'api/mail.send.json';
                    $session = curl_init($request);
                    curl_setopt($session, CURLOPT_POST, true);
                    curl_setopt($session, CURLOPT_POSTFIELDS, $params);
                    curl_setopt($session, CURLOPT_HEADER, false);
                    curl_setopt($session, CURLOPT_SSL_VERIFYPEER, false);
                    curl_setopt($session, CURLOPT_RETURNTRANSFER, true);
                    $response = curl_exec($session);

                    curl_close($session);

                    if ($response) {
                        echo "4";
                        return false;
                    }
                } else {
                    $this->session->set_flashdata('error', 'email_content_not_found');
                }
            }
        } else {
            echo "3";
            return false;

        }
        $this->load->view('forgotpassword');
    }

    public function resetPassword() {
        $code = $_REQUEST['ucode'];
        if ($code != "") {
            $where = array('user_key' => $code);
            $user_data = $this->Coin->get_data_where('tbl_users', $where);
            if ($user_data->num_rows() > 0) {
                $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');
                $this->form_validation->set_rules('confirmpassword', 'Confirm Password', 'trim|required|matches[password]');
                if ($this->form_validation->run() == TRUE) {
                    $confirmpassword = trim($this->input->post('password'));
                    $user = $this->Coin->get_data_row($user_data);

                    $save = array(
                        'password' => md5($confirmpassword),
                        'user_key' => "",
                        'token_time' => '0000-00-00 00:00:00'
                    );

                    $this->Coin->update_data_where('tbl_users', $save, 'id', $user->id);
                    $this->session->set_flashdata('Password_reset_message', TRUE);
                    redirect('login');
                } else {
                    $this->session->set_flashdata('error', trim(preg_replace('/\s+/', ' ', validation_errors())));
                    $this->load->view('resetPassword', array('ucode' => $code));
                }
            } else {
                $this->session->set_flashdata('error', $this->lang->line('Invalid_Token_Unauthorized_user'));
                redirect('login/forgetPasswords');
            }
        } else {
            $this->session->set_flashdata('error', $this->lang->line('Invalid_Token_Unauthorized_user'));
            redirect('login/forgetPasswords');
        }
    }

    public function logout() {
        unset($_SESSION['user']);
        redirect(base_url('home'));
    }

    public function newsletter() {
        $newsletter_checked = $this->Coin->get_data_where('tbl_newsletters', array('email' => $_POST['email']));
        if ($newsletter_checked->num_rows() > 0) {
            echo 'You have already subscribed';
        } else {
            $id = $this->Coin->insert_data('tbl_newsletters', array('email' => $_POST['email']));
            if ($id) {
                $email = $_POST['email'];
                $message = "Dear Admin, <br/><br/>A new user subscribed newsletter with $email.<br/><br/>Team GCC";

                $url = "https://api.sendgrid.com/";
                $user = 'abhishekp';
                $pass = 'abhishekp@123';
                $params = array(
                    'api_user' => $user,
                    'api_key' => $pass,
                    'to' => "contact@grabcryptocoins.com",
                    'fromname' => 'GrabCryptoCoins',
                    'from' => $email,
                    'subject' => "Newsletter Request",
                    'html' => $message);

                $request = $url . 'api/mail.send.json';
                $session = curl_init($request);
                curl_setopt($session, CURLOPT_POST, true);
                curl_setopt($session, CURLOPT_POSTFIELDS, $params);
                curl_setopt($session, CURLOPT_HEADER, false);
                curl_setopt($session, CURLOPT_SSL_VERIFYPEER, false);
                curl_setopt($session, CURLOPT_RETURNTRANSFER, true);
                $response = curl_exec($session);
                curl_close($session);

                echo 'You have subscribed successfully.';
            }
        }
    }

}

?>