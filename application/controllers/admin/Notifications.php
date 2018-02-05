<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Notifications extends CI_Controller {

    public function __construct() {
        parent::__construct();
        error_reporting(E_ALL);
        $this->load->model('Coin');
        $this->load->library('session');
        $this->load->helper('common');
    }

    public function index() {
        if(isset($_SESSION['admin']) || isset($_SESSION['operator'])){
            $notification_data = $this->Coin->get_table_data('tbl_notifications')->result();
            $content = $this->load->view('admin/notifications/index.php', array('data' => $notification_data), TRUE);
            $this->load->view('admin/templete', array('content' => $content));
        }else{
            session_destroy();
            redirect('admin/login');
        }
    }

    public function add($id = false) {
        if(isset($_SESSION['admin']) || isset($_SESSION['operator'])){
            $user_data = array(
                'id' => $id,
                'content' => '',
            );
            if($id){
                $this->form_validation->set_rules('content', 'Notification Description', 'trim|required');
            }else{
                $this->form_validation->set_rules('content', 'Notification Description', 'trim|required');
            }
            if ($this->form_validation->run() == TRUE) {
                $user_data['content'] = trim($this->input->post('content'));

                $result = $this->Coin->insert_data_and_update($id, 'tbl_notifications', $user_data);

                ($result) ? $this->session->set_flashdata('inserted', TRUE) : $this->session->set_flashdata('error', TRUE);
                redirect('admin/notifications');
            }
            if ($id) {
                $data = $this->Coin->get_data_where('tbl_notifications', array('id' => $id));
                $content = $this->load->view('admin/notifications/add', array('data' => $data, 'id' => $id), TRUE);
                $this->load->view('admin/templete', array('content' => $content));
            } else {
                $content = $this->load->view('admin/notifications/add', $user_data, TRUE);
                $this->load->view('admin/templete', array('content' => $content));
            }
        }else{
            session_destroy();
            redirect('admin/login');
        }
    }
    
    public function updateStatus(){
        if(isset($_SESSION['admin']) || isset($_SESSION['operator'])){
        $update_status = $this->Coin->update_data_where('tbl_notifications', array('status' => 1), 'id', $_POST['id']);
        $all_notification_update = $this->Coin->update_data_where('tbl_notifications', array('status' => 0), 'id !=', $_POST['id']);
        }else{
            session_destroy();
            redirect('admin/login');
        }
    }
    
    
}
