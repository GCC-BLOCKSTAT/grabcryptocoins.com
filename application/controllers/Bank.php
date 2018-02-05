<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Bank extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('common');
        $this->load->model('Coin');
    }

    public function index() {
               
        $account_data = array(
            'user_id' => $_POST['user_id'],
            'bank_name' => $_POST['bankname'],
            'username' => $_POST['username'],
            'account_number' => $_POST['account_number'],
            'ifsc' => $_POST['ifsc'],
            'remember' => $_POST['bank_rememberme'],
        );

        $insert_id = $this->Coin->insert_data('tbl_bank_accounts', $account_data);
        
    }
    
    public function getBankName(){
        
        $all_bank_data = $this->Coin->get_data_where('tbl_bank_accounts',array('user_id'=> $_POST['user_id'], 'bank_name !=' => $_POST['name']))->result();
        $bank_data = $this->Coin->get_data_where('tbl_bank_accounts', array('user_id' => $_POST['user_id'], 'bank_name' => $_POST['name']))->row();
        $this->load->view('change_bank_name.php', array('bankData' => $bank_data, 'all_bank' => $all_bank_data, 'user_id' => $_POST['user_id']));
    }

}
