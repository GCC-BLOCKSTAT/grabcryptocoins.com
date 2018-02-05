<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Coin');
    }

    public function index() {
        if(isset($_SESSION['admin'])){
            redirect('admin/home');
        }else{
        $this->form_validation->set_rules('username', 'User Name', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');
        if ($this->form_validation->run() == TRUE) {
            $loginData = array(
                'username' => trim($this->input->post('username')),
                'password' => trim(md5($this->input->post('password')))
            );
            $adminData = $this->Coin->get_data_where('tbl_admin', $loginData);
            if ($adminData->num_rows() > 0) {
                $admin_data = $this->Coin->get_data_row($adminData);
                
                if($admin_data->role == 0){
                    $_SESSION['admin'] = $admin_data->id_admin;
                    unset($_SESSION['poweruser']);
                    unset($_SESSION['operator']);
                }elseif($admin_data->role == 1){
                    $_SESSION['poweruser'] = $admin_data->id_admin;
                    unset($_SESSION['admin']);
                    unset($_SESSION['operator']);
                }else{
                    $_SESSION['operator'] = $admin_data->id_admin;
                    unset($_SESSION['admin']);
                    unset($_SESSION['poweruser']);
                }
                
                if (isset($_SESSION['error']))
                    unset($_SESSION['error']);
                ($admin_data) ? redirect('admin/home'): $this->session->set_flashdata('error', TRUE);
                
            }else {
                $_SESSION['error'] = 'User Name and Password wrong';
            }
        }
        $this->load->view('admin/login');
        }
    }
    public function logout() {
        session_destroy();
        unset($_SESSION['admin']);
        unset($_SESSION['poweruser']);
        unset($_SESSION['operator']);
        redirect(base_url());
    }
}
