<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller {

    public function __construct() {
        parent::__construct();
        error_reporting(E_ALL);
        $this->load->model('Coin');
        $this->Coin->authsubadmin();
        $this->load->helper('common');
    }

    public function index() {
        $page_data = $this->Coin->get_table_data('tbl_pages')->result();
        $content = $this->load->view('admin/pages/index.php', array('data' => $page_data), TRUE);
        $this->load->view('admin/templete', array('content' => $content));
    }

    public function add($id = false) {
        $user_data = array(
            'id' => $id,
            'name' => '',
            'slug' => '',
            'description' => '',
            'status' => ''
        );
        if($id){
            $this->form_validation->set_rules('name', 'Page Name', 'trim|required');
            $this->form_validation->set_rules('content', 'Page Description', 'trim|required');
        }else{
            $this->form_validation->set_rules('name', 'Page Name', 'trim|required|is_unique[tbl_pages.name]');
            $this->form_validation->set_rules('content', 'Page Description', 'trim|required');
        }
        if ($this->form_validation->run() == TRUE) {
            $user_data['name'] = trim($this->input->post('name'));
            if($_POST['slug']){
               $user_data['slug'] = str_replace(' ', '-', strtolower ($_POST['slug'])); 
            }else{
               $user_data['slug'] = str_replace(' ', '-', strtolower ($user_data['name']));
            }
            $user_data['description'] = trim($this->input->post('content'));
            $user_data['status'] = trim($this->input->post('status'));
            
            $result = $this->Coin->insert_data_and_update($id, 'tbl_pages', $user_data);
           
            ($result) ? $this->session->set_flashdata('inserted', TRUE) : $this->session->set_flashdata('error', TRUE);
            redirect('admin/pages');
        }
        if ($id) {
            $data = $this->Coin->get_data_where('tbl_pages', array('id' => $id));
            $content = $this->load->view('admin/pages/add', array('data' => $data, 'id' => $id), TRUE);
            $this->load->view('admin/templete', array('content' => $content));
        } else {
            $content = $this->load->view('admin/pages/add', $user_data, TRUE);
            $this->load->view('admin/templete', array('content' => $content));
        }
    }
    
    
}
