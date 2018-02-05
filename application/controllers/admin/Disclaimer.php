<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Disclaimer extends CI_Controller {

    public function __construct() {
        parent::__construct();
        error_reporting(E_ALL);
        $this->load->model('Coin');
        $this->load->helper('common');
        $this->Coin->auth();
        $this->load->library('session');
    }

    public function index() {
        $disclaimer = $this->Coin->get_table_data('tbl_disclaimers')->result();
        $content = $this->load->view('admin/disclaimer/index.php', array('data' => $disclaimer), TRUE);
        $this->load->view('admin/templete', array('content' => $content));
    }

    public function add($id){
        $this->form_validation->set_rules('content', 'Disclaimer Description', 'trim|required');
        if ($this->form_validation->run() == TRUE) {
            $user_data = array(
                'description' => trim($this->input->post('content'))
            );
            $result = $this->Coin->insert_data_and_update($id, 'tbl_disclaimers', $user_data);
            ($result) ? $this->session->set_flashdata('inserted', TRUE) : $this->session->set_flashdata('error', TRUE);
            redirect('admin/disclaimer/');
        }
            $user_data['data'] = $this->Coin->get_data_where('tbl_disclaimers', array('id' => $id))->row(0);
            $content = $this->load->view('admin/disclaimer/add', $user_data, TRUE);
            $this->load->view('admin/templete', array('content' => $content));
        
    }
    
}
