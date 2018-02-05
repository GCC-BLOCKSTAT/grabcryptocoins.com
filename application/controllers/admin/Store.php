<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Store extends CI_Controller {

    public function __construct() {
        parent::__construct();
        error_reporting(E_ALL);
        $this->load->model('Coin');
        $this->load->helper('common');
        $this->Coin->auth();
    }

    public function index() {
        $users_data = $this->Coin->get_table_data('tbl_store');
        $users = $users_data->result();

        $content = $this->load->view('admin/store/index.php', array('data' => $users), TRUE);
        $this->load->view('admin/templete', array('content' => $content));
    }

    public function add($id = false){
        $user_data = array(
            'id' => $id,
            'title' => '',
            'slug' => '',
            'content' => '',
            'status' => ''
        );
            $this->form_validation->set_rules('title', 'Store Name', 'trim|required');
            $this->form_validation->set_rules('content', 'Store Description', 'trim|required');  
        
        if ($this->form_validation->run() == TRUE) {
            $user_data['title'] = trim($this->input->post('title'));
            if($this->input->post('slug') != ''){
                $user_data['slug'] = str_replace(' ', '-', strtolower ($this->input->post('slug')));
            }else{
                $user_data['slug'] = str_replace(' ', '-', strtolower ($this->input->post('title')));
            }
            $user_data['content'] = trim($this->input->post('content'));
            if($id){
                $user_data['date'] = trim($this->input->post('date'));
            }else{
                $user_data['date'] = trim($this->input->post('date'));
            }
            $user_data['status'] = trim($this->input->post('status'));
            $result = $this->Coin->insert_data_and_update($id, 'tbl_store', $user_data);
            if (isset($_FILES['userfile']['name'])) {
                    $filename = $_FILES['userfile']['name'];
                    $tmpfile = $_FILES['userfile']['tmp_name'];
                    if($id){
                      $image_id = $this->profileimage($id, $filename, $tmpfile);  
                    }else{
                      $image_id = $this->profileimage($result, $filename, $tmpfile);
                    }
                    if (!$image_id) {
                        redirect('admin/store');
                    }
                }
            ($result) ? $this->session->set_flashdata('inserted', TRUE) : $this->session->set_flashdata('error', TRUE);
            redirect('admin/store');
        }
        if ($id) {
            $data = $this->Coin->get_data_where('tbl_store', array('id' => $id));
            $content = $this->load->view('admin/store/add', array('data' => $data, 'id' => $id), TRUE);
            $this->load->view('admin/templete', array('content' => $content));
        } else {
            $content = $this->load->view('admin/store/add', $user_data, TRUE);
            $this->load->view('admin/templete', array('content' => $content));
        }
    }
    
    
    public function profileimage($id, $filename = '', $tmpfile = '') {
        if ($filename != "") {
            $ext = pathinfo($filename, PATHINFO_EXTENSION);
            if ($ext == 'gif' || $ext == 'jpg' || $ext == 'png' || $ext == 'jpeg' || $ext == "JPEG" || $ext == "JPG" || $ext == "PNG" || $ext == "GIF") {
                $image = $this->Coin->imageUpload($id, $ext,'store');
                $data = array('image' => $image);
                $where = array('id' => $id);
                $id = $this->Coin->updateDataWhere('tbl_store', $data, $where);
                return $id;
            } else {
                $this->session->set_flashdata('error', "Please choose image");
                return false;
            }
        }
    }
    
    
}
