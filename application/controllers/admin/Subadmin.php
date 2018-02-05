<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Subadmin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        error_reporting(E_ALL);
        $this->load->model('Coin');
        $this->Coin->auth();
        $this->load->helper('common');
    }

    public function index() {
        $users_data = $this->Coin->get_data_where('tbl_admin',array('type'=>'2'));
        $users = $users_data->result();

        $content = $this->load->view('admin/subadmin/index.php', array('data' => $users), TRUE);
        $this->load->view('admin/templete', array('content' => $content));
    }
    
    public function add($id = false){

        $user_data = array(
            'id_admin' => $id,
            'name' => '',
            'password' => '',
            'username' => '',
            'email' => '',
            'phone' => '',
            'city' => '',
            'state' => '',
            'country' => '',
            'role' => '',
            'status'=>''
        );
        $this->form_validation->set_rules('fname', 'Full Name', 'trim|required');
        if($id == ''){
        $this->form_validation->set_rules('username', 'Username', 'trim|required|is_unique[tbl_admin.username]');
        }else{
            $checkUsername = $this->Coin->get_data_where('tbl_admin', array('id_admin' => $id))->row();
            if($checkUsername->username != $this->input->post('username')){
               $this->form_validation->set_rules('username', 'Username', 'trim|required|is_unique[tbl_admin.username]');
            }
        }
        
        if($id == ''){
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[tbl_admin.email]');
        }else{
            $checkEmail = $this->Coin->get_data_where('tbl_admin', array('id_admin' => $id))->row();
            if($checkEmail->email != $this->input->post('email')){
               $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[tbl_admin.email]');
            }
        }
        if($id == ''){
            $this->form_validation->set_rules('password', 'Password', 'trim|required');
        }
        $this->form_validation->set_rules('mobile', 'Mobile Number ', 'trim|required|regex_match[/^[0-9]{10}$/]');
        if ($this->form_validation->run() == TRUE) {
            if($_POST['password'] != ""){
                $passwords = trim(md5($this->input->post('password')));
            }else{
                $tableData = $this->Coin->get_data_where('tbl_admin', array('id_admin' => $id))->row();
                $passwords = $tableData->password;
            }
            $user_data = array(
                'name' => trim($this->input->post('fname')),
                'password' => $passwords,
                'username' => trim($this->input->post('username')),
                'email' => trim($this->input->post('email')),
                'phone' => trim($this->input->post('mobile')),
                'city' => trim($this->input->post('city')),
                'state' => trim($this->input->post('state')),
                'country' => trim($this->input->post('country')),
                'role' => trim($this->input->post('role')),
                'description' => trim($this->input->post('description')),
                'type' => '2',
                'status' => trim($this->input->post('status'))
            );
            if($id != ""){
             $result = $this->Coin->updateDataWhere('tbl_admin', $user_data,array('id_admin'=>$id));   
            }else{
            $result = $this->Coin->insert_data_and_update($id, 'tbl_admin', $user_data);
            }
            if (isset($_FILES['userfile']['name'])) {
                $filename = $_FILES['userfile']['name'];
                $tmpfile = $_FILES['userfile']['tmp_name'];
                if ($id) {
                    $image_id = $this->profileimage($id, $filename, $tmpfile);
                } else {
                    $image_id = $this->profileimage($result, $filename, $tmpfile);
                }
                if (!$image_id) {
                    redirect('admin/subadmin');
                }
            }
            ($result) ? $this->session->set_flashdata('inserted', TRUE) : $this->session->set_flashdata('error', TRUE);
            redirect('admin/subadmin/');
        }
        if ($id) {
            $user_data['data'] = $this->Coin->get_data_where('tbl_admin', array('id_admin' => $id));
            $content = $this->load->view('admin/subadmin/add', $user_data, TRUE);
            $this->load->view('admin/templete', array('content' => $content));
        } else {
            $content = $this->load->view('admin/subadmin/add', $user_data, TRUE);
            $this->load->view('admin/templete', array('content' => $content));
        }
    }
    
    public function userView($id){
        $subadminData = $this->Coin->get_data_where('tbl_admin', array('id_admin' => $id));
        $this->load->view('admin/subadmin/view', array('data' => $subadminData));
    }
    
    public function deleteSubadmin(){
        $id = $this->input->post('id');
        $table_name = $this->input->post('table');
        if ($id)
            $query = $this->db->delete($table_name, array('id_admin' => $id));
        ($query) ? $response = TRUE : $response = FALSE;
        return $response;
        return false;
    }
    
    public function profileimage($id, $filename = '', $tmpfile = '') {
        if ($filename != "") {
            $ext = pathinfo($filename, PATHINFO_EXTENSION);
            if ($ext == 'gif' || $ext == 'jpg' || $ext == 'png' || $ext == 'jpeg' || $ext == "JPEG" || $ext == "JPG" || $ext == "PNG" || $ext == "GIF") {
                $image = $this->Coin->imageUpload($id, $ext,'admin');
                $data = array('profile_image' => $image);
                $where = array('id_admin' => $id);
                $id = $this->Coin->updateDataWhere('tbl_admin', $data, $where);
                return $id;
            } else {
                $this->session->set_flashdata('error', "Please choose image");
                return false;
            }
        }
    }
}
