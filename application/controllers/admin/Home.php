<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Coin');
        $this->load->helper('common');
        $this->load->library('session');
    }

    public function index() {
        $urls = array(
            "https://api.coinmarketcap.com/v1/ticker/bitcoin/?convert=INR",
            "https://api.coinmarketcap.com/v1/ticker/litecoin/?convert=INR",
            "https://api.coinmarketcap.com/v1/ticker/bitcoin-cash/?convert=INR",
            "https://api.coinmarketcap.com/v1/ticker/ethereum/?convert=INR",
            "https://api.coinmarketcap.com/v1/ticker/ripple/?convert=INR",
            "https://api.coinmarketcap.com/v1/ticker/cardano/?convert=INR"
            );

        $currencies = array();
        foreach ($urls as $url) {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 4);
            $json = curl_exec($ch);
            if (!$json) {
                echo curl_error($ch);
            }
            curl_close($ch);

            $currency = json_decode($json);
            $currencies = array_merge($currencies, $currency);
        }
        $total_data = $this->Coin->get_table_data('tbl_users');
        $tax = $this->Coin->get_table_data('tbl_default')->result();
        $data = array(
            'data'=>$currencies,
            'total_data'=>$total_data,
            'taxs' => $tax
        );
        
        if(isset($_SESSION['admin']) || isset($_SESSION['poweruser']) || isset($_SESSION['operator'])) {          
            $content = $this->load->view('admin/home', $data, TRUE);
            $this->load->view('admin/templete', array('content' => $content));
        } else {
            session_destroy();
            redirect('admin/login');
        }
    }
    
    public function adminprofile($id) {
       if (isset($_SESSION['admin']) || isset($_SESSION['poweruser']) || isset($_SESSION['operator'])) {
        $where = array(
            'id_admin' => $id
        );
        $data = $this->Coin->get_data_where('tbl_admin', $where);
        $admindata = $this->Coin->get_data_row($data);
        if ($data) {
            $this->form_validation->set_rules('fname', 'Full Name', 'trim|required');
            $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
            $this->form_validation->set_rules('last_name', 'Name', 'trim');
            $this->form_validation->set_rules('phone', 'Mobile Number ', 'trim|required|regex_match[/^[0-9]{10}$/]'); //{10} for 10 digits number
            $this->form_validation->set_rules('city', 'City', 'trim');
            $this->form_validation->set_rules('state', 'State', 'trim');
            $this->form_validation->set_rules('country', 'Country', 'trim');
            if ($this->form_validation->run() == TRUE) {
                $file = $_FILES['userfile']['name'];
                if ($file != "") {

                    $ext = pathinfo($_FILES['userfile']['name'], PATHINFO_EXTENSION);
                    if ($ext == 'gif' || $ext == 'jpg' || $ext == 'png' || $ext == 'jpeg') {
                        $image = $this->Coin->imageUpload($id, $ext,'admin');
                    }
                } else {
                    $image = $admindata->profile_image;
                }
                $user_data = array(
                    'name' => trim($this->input->post('fname')),
                    'email' => trim($this->input->post('email')),
                    'phone' => trim($this->input->post('phone')),
                    'city' => trim($this->input->post('city')),
                    'state' => trim($this->input->post('state')),
                    'country' => trim($this->input->post('country')),
                    'profile_image' => $image
                );
                $result = $this->Coin->updateDataWhere('tbl_admin', $user_data, $where);

                ($result) ? $this->session->set_flashdata('inserted', TRUE) : $this->session->set_flashdata('error', TRUE);
                redirect('admin/Home/adminprofile/'.$id);
            }
            $content = $this->load->view('admin/admin_profile', array('data' => $data), TRUE);
            $this->load->view('admin/templete', array('content' => $content));
        }
        } else {
            session_destroy();
            redirect('admin/login');
        }
    }
    
    public function changepassword($id) {
        if(isset($_SESSION['admin']) || isset($_SESSION['poweruser']) || isset($_SESSION['operator'])) {
        $this->form_validation->set_rules('current_password', 'Current Password', 'trim|required|min_length[8]');
        $this->form_validation->set_rules('new_password', 'New Password', 'trim|required|min_length[8]');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|required|min_length[8]');
        if ($this->form_validation->run() == TRUE) {
            $where = array(
                'password' => trim(md5($this->input->post('current_password'))),
                'id_admin' => $id
            );
            $data = $this->Coin->get_data_where('tbl_admin', $where);
            $admindata = $this->Coin->get_data_row($data);
            if ($admindata) {

                $new_password = $this->input->post('new_password');
                $confirm_password = $this->input->post('confirm_password');

                if ($new_password == $confirm_password) {
                    $result = $this->Coin->updateDataWhere('tbl_admin', array('password' => trim(md5($confirm_password))), array('id_admin' => $id, 'password' => trim(md5($this->input->post('current_password')))));
                    ($result) ? $this->session->set_flashdata('inserted', TRUE) : $this->session->set_flashdata('error', TRUE);
                    redirect('admin/home/changepassword/' . $id);
                } else {
                    $this->session->set_flashdata('passwordmatch', TRUE);
                    redirect('admin/home/changepassword/' . $id);
                }
            } else {
                $this->session->set_flashdata('passworderror', TRUE);
                redirect('admin/home/changepassword/' . $id);
            }
        }
        $content = $this->load->view('admin/change_adminpassword', array('id'=>$id), TRUE);
        $this->load->view('admin/templete', array('content' => $content));
        } else {
            session_destroy();
            redirect('admin/login');
        }
    }
    
    public function forgetPassword() {
	$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        if ($this->form_validation->run() == TRUE) {
            $email = $this->input->post('email');
            $where = array(
                'email' => trim($this->input->post('email'))
            );
            $admin_data = $this->Coin->get_data_where('tbl_admin', $where);
            if ($admin_data->num_rows() > 0) {
                $admin = $this->Coin->get_data_row($admin_data);
                $email = $admin->email;
                $userid = $admin->id_admin;
                $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_-=+;:,.?";
                $new_pass = substr(str_shuffle($chars), 0, 10);
                $db_pass = substr(md5(sha1(uniqid() . $new_pass)), 0, 10) . md5($userid);
                $save = array('admin_key' => $db_pass, 'token_time' => strtotime(date('Y-m-d h:i:s')));
                $up_password = $this->Coin->update_data_where('tbl_admin', $save, 'id_admin', $userid);
                if ($up_password) {
                    $reset_link = base_url('admin/Home/resetPassword') . "?ucode=" . $db_pass;
                    $subject = 'Coin Password Reset';
                    $message = "Dear " . $admin->name . ",<br/><br/>Please click on below link to reset your password <br/><br/>" . $reset_link . " <br/><br/>Note:- Dont share this mail to unreliable source";
                    $emaildata = $this->Coin->get_data_where('tbl_email_manager', array('slug' => 'ForgotPassword', 'type' => 'admin'));
                    
                    if ($emaildata->num_rows() > 0) {
                        $emailcontent = $this->Coin->get_data_row($emaildata);
			$subject = $emailcontent->subject;
                        $cleanString = $emailcontent->content;
                        $find = array('$name', '$link');
			$replace = array($admin->username, $reset_link);
                        $message = str_replace($find, $replace, $cleanString);
                        $from = "no-reply@grabcryptocoins.com";
                        $url = "https://api.sendgrid.com/";
                        $user = 'abhishekp';
                        $pass = 'abhishekp@123';
                        $params = array(
                            'api_user' => $user,
                            'api_key' => $pass,
                            'to' => $email,
                            'fromname' => 'Coin',
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
                            $this->session->set_flashdata('success', 'Password_reset_email');
                        }
                        
                    } else {
                      $this->session->set_flashdata('error', 'email_content_not_found');
                    }
                }
            } else {
                $this->session->set_flashdata('error', 'admin_not_exists');
            }
        } else {
            $this->session->set_flashdata('valid_error', trim(preg_replace('/\s+/', ' ', validation_errors())));
        }
        $this->load->view('admin/forgotpassword');
    }

    public function resetPassword() {
       $code = $_REQUEST['ucode'];
        if ($code != "") {
            $where = array('admin_key' => $code);
            $admin_data = $this->Coin->get_data_where('tbl_admin', $where);
            if ($admin_data->num_rows() > 0) {
                $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');
                $this->form_validation->set_rules('confirmpassword', 'Confirm Password', 'trim|required|matches[password]');
                if ($this->form_validation->run() == TRUE) {
                  $confirmpassword = trim($this->input->post('password'));
                   $admin = $this->Coin->get_data_row($admin_data);
                   
                    $save = array(
                        'password' => md5($confirmpassword),
                        'admin_key' => "",
                        'token_time' => '0000-00-00 00:00:00'
                    );

                    $this->Coin->update_data_where('tbl_admin', $save, 'id_admin', $admin->id_admin);
                    $this->session->set_flashdata('Password_reset_message', TRUE);
                    redirect('admin/login');
                } else {
                    $this->session->set_flashdata('error', trim(preg_replace('/\s+/', ' ', validation_errors())));
                    $this->load->view('admin/resetPassword', array('ucode' => $code));
                }
            } else {
                $this->session->set_flashdata('error', $this->lang->line('Invalid_Token_Unauthorized_user'));
                redirect('admin/home/forgetPassword');
            }
        } else {
            $this->session->set_flashdata('error', $this->lang->line('Invalid_Token_Unauthorized_user'));
           redirect('admin/home/forgetPassword');
        }
    }
}
