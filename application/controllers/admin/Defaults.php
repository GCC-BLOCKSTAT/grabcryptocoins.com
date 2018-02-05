<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Defaults extends CI_Controller {

    public function __construct() {
        parent::__construct();
        error_reporting(E_ALL);
        $this->load->model('Coin');
        $this->load->helper('common');
        $this->load->library('session');
    }

    public function index() {
        if(isset($_SESSION['admin']) || isset($_SESSION['operator']) || isset($_SESSION['poweruser'])){
            $users_data = $this->Coin->get_table_data('tbl_default');
            $users = $users_data->result();
            $content = $this->load->view('admin/default/index.php', array('data' => $users), TRUE);
            $this->load->view('admin/templete', array('content' => $content));
        }else{
            session_destroy();
            redirect('admin/login');
        }
    }

    public function add($id = false){
        if(isset($_SESSION['admin']) || isset($_SESSION['operator']) || isset($_SESSION['poweruser'])){
        $default_data = array(
            'id' => $id,
            'coin' => '',
            'tax' => '',
            'charges'=>'',
            'commision' => '',
            'coin_address' => '',
            'type' => '',
            'notification' => ''
        );
        $this->form_validation->set_rules('coin', 'Coin ', 'trim|required');
        $this->form_validation->set_rules('tax', 'Tax ', 'trim|required');
        $this->form_validation->set_rules('commision', 'Commision ', 'trim|required|numeric');
        $this->form_validation->set_rules('coin_address', 'Coin Address ', 'trim|required');
        if ($this->form_validation->run() == TRUE) {
            $default_data = array(
                'coin' => trim($this->input->post('coin')),
                'tax' => trim($this->input->post('tax')),
                'commision' => trim($this->input->post('commision')),
                'charges' => trim($this->input->post('charges')),
                'coin_address' => trim($this->input->post('coin_address')),
                'notification' => trim($this->input->post('content'))
            );
            $result = $this->Coin->insert_data_and_update($id, 'tbl_default', $default_data);
            if (isset($_FILES['userfile']['name'])) {
                $filename = $_FILES['userfile']['name'];
                $tmpfile = $_FILES['userfile']['tmp_name'];
                if ($id) {
                    $image_id = $this->qrProfileimage($id, $filename, $tmpfile);
                } else {
                    $image_id = $this->qrProfileimage($result, $filename, $tmpfile);
                }
                if (!$image_id) {
                    redirect('admin/defaults');
                }
            }
            ($result) ? $this->session->set_flashdata('inserted', TRUE) : $this->session->set_flashdata('error', TRUE);
            redirect('admin/defaults/');
        }
        if ($id) {
            $default_data['data'] = $this->Coin->get_data_where('tbl_default', array('id' => $id));
            $content = $this->load->view('admin/default/add', $default_data, TRUE);
            $this->load->view('admin/templete', array('content' => $content));
        } else {
            $content = $this->load->view('admin/default/add', $default_data, TRUE);
            $this->load->view('admin/templete', array('content' => $content));
        }
        }else{
            session_destroy();
            redirect('admin/login');
        }
    }
    public function userView($id){
        if(isset($_SESSION['admin']) || isset($_SESSION['operator']) || isset($_SESSION['poweruser'])){
            $users = $this->Coin->get_data_where('tbl_default', array('id' => $id));
            $this->load->view('admin/default/view', array('data' => $users));
        }else{
            session_destroy();
            redirect('admin/login');
        }
    }
    public function deleteuser(){
        $id = $this->input->post('id');
        $table_name = $this->input->post('table');
        if ($id)
            $query = $this->db->delete($table_name, array('id' => $id));
        ($query) ? $response = TRUE : $response = FALSE;
        return $response;
        return false;
    }
    
    public function qrProfileimage($id, $filename = '', $tmpfile = '') {
        if ($filename != "") {
            $ext = pathinfo($filename, PATHINFO_EXTENSION);
            if ($ext == 'gif' || $ext == 'jpg' || $ext == 'png' || $ext == 'jpeg' || $ext == "JPEG" || $ext == "JPG" || $ext == "PNG" || $ext == "GIF") {
                $image = $this->Coin->qrImageUpload($id, $ext,'users');
                $data = array('qr_image' => $image);
                $where = array('id' => $id);
                $id = $this->Coin->updateDataWhere('tbl_default', $data, $where);
                return $id;
            } else {
                $this->session->set_flashdata('error', "Please choose image");
                return false;
            }
        }
    }
    
    public function updateStatus(){
        if($_POST['status'] == '0'){
            $status = '1';
        }else{
            $status = '0';
        }
        if(isset($_SESSION['admin']) || isset($_SESSION['operator'])){
        $update_status = $this->Coin->update_data_where('tbl_default', array('status' => $status), 'id', $_POST['id']);
        }else{
            session_destroy();
            redirect('admin/login');
        }
    }
}
