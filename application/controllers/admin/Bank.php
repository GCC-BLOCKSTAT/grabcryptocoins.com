<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Bank extends CI_Controller {

    public function __construct() {
        parent::__construct();
        error_reporting(E_ALL);
        $this->load->model('Coin');
        $this->load->helper('common');
        $this->Coin->auth();
        $this->load->library('session');
    }

    public function index() {
        $bank = $this->Coin->get_table_data('tbl_bank')->result();
        $content = $this->load->view('admin/bank/index.php', array('data' => $bank), TRUE);
        $this->load->view('admin/templete', array('content' => $content));
    }

    public function add($id){
        $this->form_validation->set_rules('name', 'Bank Name', 'trim|required');
        $this->form_validation->set_rules('beneficiary', 'Beneficiary Name', 'trim|required');
        $this->form_validation->set_rules('account', 'Account Number', 'trim|required');
        $this->form_validation->set_rules('ifsc', 'ISFC', 'trim|required');
        $this->form_validation->set_rules('type', 'Account Type', 'trim|required');
        if ($this->form_validation->run() == TRUE) {
            $user_data = array(
                'name' => trim($this->input->post('name')),
                'beneficiary' => trim($this->input->post('beneficiary')),
                'account' => trim($this->input->post('account')),
                'ifsc' => trim($this->input->post('ifsc')),
                'type' => trim($this->input->post('type')),
                'status' => trim($this->input->post('status')),
            );
            date_default_timezone_set('Asia/Kolkata');
            $user_data['created'] = strtotime(date('Y-m-d h:i:s a'));
            $result = $this->Coin->insert_data_and_update($id, 'tbl_bank', $user_data);
            ($result) ? $this->session->set_flashdata('inserted', TRUE) : $this->session->set_flashdata('error', TRUE);
            redirect('admin/bank/');
        }
            $user_data['data'] = $this->Coin->get_data_where('tbl_bank', array('id' => $id))->row(0);
            $content = $this->load->view('admin/bank/add', $user_data, TRUE);
            $this->load->view('admin/templete', array('content' => $content));
        
    }
    public function userView($id){
        $users = $this->Coin->get_data_where('tbl_users', array('id' => $id));
        $user_data = $this->Coin->get_data_where('tbl_users', array('id' => $id))->row();
        $approved_by = $this->Coin->get_data_where('tbl_admin', array('id_admin' => $user_data->approved_by))->row();
        $this->load->view('admin/users/view', array('data' => $users, 'approved_by' => $approved_by));
        
    }
    
}
