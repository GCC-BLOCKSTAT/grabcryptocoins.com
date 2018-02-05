<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Money extends CI_Controller {

    public function __construct() {
        parent::__construct();
        error_reporting(E_ALL);
        $this->load->model('Coin');
        $this->load->helper('common');
        $this->load->library('session');
    }

    public function index() {
        if(isset($_SESSION['admin']) || isset($_SESSION['operator']) || isset($_SESSION['poweruser'])){ 
        $data = $this->Coin->getPaymentUser()->result();
        $content = $this->load->view('admin/money/index.php', array('data' => $data), TRUE);
        $this->load->view('admin/templete', array('content' => $content));
        }else{
            session_destroy();
            redirect('admin/login');
        }
    }
    
    public function edit($paymentId){
        if(isset($_SESSION['admin']) || isset($_SESSION['operator']) || isset($_SESSION['poweruser'])){ 
            $this->form_validation->set_rules('payment_amt', 'Payment Amount', 'trim|required');
            if ($this->form_validation->run() == TRUE) {
                $save['payment_amt'] = $_POST['payment_amt'];
                $save['txn_id'] = $_POST['txn_id'];
                if($_POST['mtcn_number']){
                  $save['method_values'] = $_POST['mtcn_number'];
                }

                $result = $this->Coin->insert_data_and_update($_POST['paymentId'],'tbl_payment',$save);
                ($result) ? $this->session->set_flashdata('inserted', TRUE) : $this->session->set_flashdata('error', TRUE);
                redirect('admin/money/edit/'.$_POST['paymentId']);
            }
            $userDetailPayment = $this->Coin->get_data_where('tbl_payment',array('id'=>$paymentId))->row();
            $content = $this->load->view('admin/money/edit.php', array('userDetailPayment'=>$userDetailPayment), TRUE);
            $this->load->view('admin/templete', array('content' => $content)); 
        }else{
            session_destroy();
            redirect('admin/login');
        }
    }
    
    public function userStatus($id,$paymentId){
        if(isset($_SESSION['admin']) || isset($_SESSION['operator']) || isset($_SESSION['poweruser'])){ 
        $userDetail = $this->Coin->get_data_where('tbl_users',array('id'=>$id))->row();
        $userDetailPayment = $this->Coin->get_data_where('tbl_payment',array('id'=>$paymentId,'userId'=>$id))->row();
        $this->load->view('admin/money/view.php', array('data' => $userDetail,'paymentId'=>$paymentId,'userDetailPayment'=>$userDetailPayment));
        }else{
            session_destroy();
            redirect('admin/login');
        }
    }
    
    public function userView($id,$paymentId){
        if(isset($_SESSION['admin']) || isset($_SESSION['operator']) || isset($_SESSION['poweruser'])){ 
        $userDetail = $this->Coin->get_data_where('tbl_users',array('id'=>$id))->row();
        $approved_by = $this->Coin->get_data_where('tbl_admin',array('id_admin'=>$id))->row();
        $userDetailPayment = $this->Coin->get_data_where('tbl_payment',array('id'=>$paymentId,'userId'=>$id))->row();
                
        $adminID = $userDetailPayment->approved_by;
        $approved = $this->Coin->get_data_where('tbl_admin',array('id_admin'=>$adminID))->row();
        
        $adminIDUserApprove = $userDetail->approved_by;
        $approvedUser = $this->Coin->get_data_where('tbl_admin',array('id_admin'=>$adminIDUserApprove))->row();
        
        $this->load->view('admin/money/viewDetail.php', array('data' => $userDetail,'paymentId'=>$paymentId,'userDetailPayment'=>$userDetailPayment,'approved_by'=>$approved,'approvedUserData'=>$approvedUser));
        }else{
            session_destroy();
            redirect('admin/login');
        }
    }
    
    public function add(){ 
        if(isset($_SESSION['admin']) || isset($_SESSION['operator']) || isset($_SESSION['poweruser'])){ 
            $save_data['userId'] = $_POST['idUser'];
            if($_POST['status']){
             $save_data['status'] = 'Completed';
            }
            $save_data['txn_id'] = $_POST['trans'];
            if(isset($_SESSION['admin']) && $_SESSION['admin'] != ''){
                $save_data['approved_by'] = $_SESSION['admin'];
            }else if(isset($_SESSION['operator']) && $_SESSION['operator'] != ''){
                $save_data['approved_by'] = $_SESSION['operator'];
            }else if(isset($_SESSION['poweruser']) && $_SESSION['poweruser'] != ''){
                $save_data['approved_by'] = $_SESSION['poweruser'];
            }
            date_default_timezone_set('Asia/Kolkata');
            $save_data['update_date'] = strtotime(date('Y-m-d h:i:s a'));
            $this->Coin->insert_data_and_update($_POST['idPayment'],'tbl_payment',$save_data);
            $tableIdUser = $this->Coin->get_data_where('tbl_users',array('id'=>$_POST['idUser']))->row();
            $wallet = $tableIdUser->wallet;
            $wallet = $wallet+$_POST['ammountPayment'];
            $this->Coin->insert_data_and_update($_POST['idUser'],'tbl_users',array('wallet'=>$wallet));
            echo '2';
            return false;
        }else{
            session_destroy();
            redirect('admin/login');
        }
    }
}
