<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Coin extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function insert_data_and_update($id = FALSE, $table, $data) {   //insert data with id or not
        if ($id) {
            $this->db->where('id', $id);
            return $this->db->update($table, $data);
        } else {
            $query = $this->db->insert($table, $data);
            return ($query) ? $this->db->insert_id() : FALSE;
        }
    }

    public function insert_data($table, $data) {
        $query = $this->db->insert($table, $data);
        return ($query) ? $this->db->insert_id() : FALSE;
    }

    public function get_data_where($table, $where) {              // get data with condition 
        $this->db->where($where);
        if($table == 'tbl_admin'){
        $this->db->order_by('id_admin', 'DESC');
        }
        return $this->db->get($table);
    }

    public function get_data_row($data) {                        // get first row
        return $data->first_row();
    }

    public function get_data_result($data) {                    // get table result
        return $data->result();
    }

    public function get_table_data($table, $limit = FALSE) {    //  get all data table
        if ($limit) {
            $this->db->limit($limit);
        }
        return $this->db->get($table);
    }

    // update data with field and value for where
    public function update_data_where($table, $data, $fld, $value) {
        $this->db->where($fld, $value);
        $query = $this->db->update($table, $data);
        return $query;
    }
    public function sum_data() {
        $this->db->select_sum('payment_amt');
        $result = $this->db->get('tbl_payment')->row();  
        return $result->payment_amt;
    }

    public function updateDataWhere($table, $data, $where) {    // update data with condition
        $this->db->where($where);
        $query = $this->db->update($table, $data);
        return $query;
    }
    public function getuserData($table){
        $this->db->order_by('id', 'DESC');
        return $this->db->get('tbl_users')->result();
    }
    public function get_current_page_records($limit, $start)   // pagination for store
    {
        $this->db->limit($limit, $start);
        $this->db->order_by('id', 'ASC');
        $query = $this->db->get("tbl_store");
        return $query->result();
//        echo $this->db->last_query();
//        return $data;
    }
    public function requestUser($request) {    // table reques user
        $this->db->select('users.id,users.fname,users.mname,users.lname,users.mobile,users.email,users.type,users.status,users.image,requests.user_id,users.created as uscrested');
        $this->db->join('tbl_user_requests as requests', 'users.id = requests.user_id');
        $this->db->where('requests.type', $request);
        $this->db->where('users.status', '0');
        $this->db->order_by('requests.id', 'DESC');
        return $this->db->get('tbl_users as users');
    }
    public function walletUser() {    // table request wallet
        $this->db->select('users.id,users.fname,users.mname,users.lname,users.mobile,users.email,users.type,users.status,users.image,requests.user_id,requests.status as walletstatus,requests.amount as coin,requests.id as buyid,requests.created_date,requests.update_date,requests.coin_name as buy_coin_name,requests.coin_value as buy_coin_value');
        $this->db->join('tbl_buy_response as requests', 'users.id = requests.user_id');
        $this->db->order_by('buyid', 'DESC');
        return $this->db->get('tbl_users as users');
    }
    public function walletUserId($buyId,$userid) {    // table request wallet per user
        $this->db->select('users.id,users.fname,users.mname,users.lname,users.mobile,users.email,users.type,users.status,users.image,requests.user_id,requests.status as walletstatus,requests.waddress as useraddress,requests.amount as coin,requests.id as buyid,requests.update_date,requests.coin_name as buy_coin_name,requests.coin_value as buy_coin_value');
        $this->db->join('tbl_buy_response as requests', 'users.id = requests.user_id');
        $this->db->where('users.id', $userid);
        $this->db->where('requests.id', $buyId);
        $this->db->where('requests.user_id', $userid);
        return $this->db->get('tbl_users as users');
    }
    public function walletSellUser() {    // table request wallet sell
        $this->db->select('users.id,users.fname,users.mname,users.lname,users.mobile,users.email,users.type,users.status,users.image,requests.user_id,requests.status as walletstatus,requests.amount as coin,requests.id as buyid,requests.txn_number,requests.created_date,requests.update_date,requests.coin_name as buy_coin_name,requests.coin_value as buy_coin_value');
        $this->db->join('tbl_sell_response as requests', 'users.id = requests.user_id');
        $this->db->order_by('buyid', 'DESC');
        return $this->db->get('tbl_users as users');
    }
    public function withdrawUser() {    // table request wallet sell
        $this->db->select('users.id,users.fname,users.mname,users.lname,users.mobile,users.email,users.type,users.status,users.image,requests.user_id,requests.status as withdrawlstatus,requests.amount as amount,requests.id as withdrawlid,requests.withdrawl_method, requests.txn_id as withtxn_id, requests.created_date as with_created_date, requests.update_date as with_update_date');
        $this->db->join('tbl_withdraw_response as requests', 'users.id = requests.user_id');
        $this->db->order_by('withdrawlid', 'DESC');
        return $this->db->get('tbl_users as users');
    }
    public function walletSellUserId($buyId,$userid) {    // table request sell wallet per user
        $this->db->select('users.id,users.fname,users.mname,users.lname,users.mobile,users.email,users.type,users.status,users.image,requests.user_id,requests.status as walletstatus,requests.waddress as useraddress,requests.amount as coin,requests.id as buyid,requests.coin_name as buy_coin_name,requests.coin_value as buy_coin_value');
        $this->db->join('tbl_sell_response as requests', 'users.id = requests.user_id');
        $this->db->where('users.id', $userid);
        $this->db->where('requests.id', $buyId);
        $this->db->where('requests.user_id', $userid);
        return $this->db->get('tbl_users as users');
    }
    public function withdrawSellUserId($buyId,$userid) {    // table request sell wallet per user
        $this->db->select('users.id,users.fname,users.mname,users.lname,users.mobile,users.email,users.type,users.status,users.image,requests.user_id,requests.status as withdrawstatus,requests.amount as amount,requests.id as withdrawlid,requests.withdrawl_method as withmethod');
        $this->db->join('tbl_withdraw_response as requests', 'users.id = requests.user_id');
        $this->db->where('users.id', $userid);
        $this->db->where('requests.id', $buyId);
        $this->db->where('requests.user_id', $userid);
        return $this->db->get('tbl_users as users');
    }
    public function getSumBuy($id,$todayDate,$table){                         //// getSumBuy user
        $this->db->select_sum('amount');
        $this->db->from($table);
        $this->db->where('user_id',$id);
        $this->db->where('limit_date',$todayDate);
        $query = $this->db->get();
        return $query->row()->amount;
    }
    public function getadminPayment($dataPayment){                         //// get Payment for admin user
        $this->db->select('users.id,users.fname,users.mname,users.lname,users.mobile,users.email,requests.payment_amt,requests.txn_id,requests.date,requests.update_date,requests.status,requests.payment,requests.id as paymentID');
        $this->db->join('tbl_payment as requests', 'users.id = requests.userId','RIGHT');
        $this->db->where('requests.payment',$dataPayment);
        return $this->db->get('tbl_users as users');
    }
    public function getPaymentUser(){                         //// get Payment for admin user
        $this->db->select('users.id,users.fname,users.mname,users.lname,users.mobile,users.email,requests.payment_amt,requests.txn_id,requests.date,requests.update_date,requests.status,requests.payment,requests.id as paymentID');
        $this->db->join('tbl_payment as requests', 'users.id = requests.userId','RIGHT');
        return $this->db->get('tbl_users as users');
    }
    public function auth() {                                   // session destroyed
        if (isset($_SESSION['admin'])) {
            return TRUE;
        } else {
            session_destroy();
            redirect('admin/login');
        }
    }
    public function userAuth(){                                 //   user session
        if (isset($_SESSION['user'])) {
            return TRUE;
        } else {
            session_destroy();
            redirect('home');
        }
    }

    public function authsubadmin() {                                   // session destroyed for subadmin
        if (isset($_SESSION['admin']) && $_SESSION['admin'] == '1') {
            return TRUE;
        } else {
            session_destroy();
            redirect('admin/login');
        }
    }

    public function imageUpload($id, $type, $folder = FALSE) {                    // image upload
        if ($folder == 'users') {
            $config['upload_path'] = 'uploads/users';
        } else if ($folder == 'admin') {
            $config['upload_path'] = 'uploads/admin';
        } else if ($folder == 'page') {
            $config['upload_path'] = 'uploads/page';
        } else if ($folder == 'store') {
            $config['upload_path'] = 'uploads/store';
        }
        $config['allowed_types'] = 'gif|jpg|png|jpeg|JPEG|PNG|GIF|JPG';
        $config['remove_spaces'] = TRUE;
        $config['overwrite'] = TRUE;
        $config['file_name'] = $id . date('his');
        $config['encrypt_name'] = '2';
        $this->upload->initialize($config);
        if ($this->upload->do_upload()) {
            $upload_data = $this->upload->data();
            if ($folder == 'admin') {
                $config['source_image'] = 'uploads/admin/' . $upload_data['file_name'];
            } else if ($folder == 'users') {
                $config['source_image'] = 'uploads/users/' . $upload_data['file_name'];
            } else if ($folder == 'users') {
                $config['source_image'] = 'uploads/page/' . $upload_data['file_name'];
            }
            return $upload_data['file_name'];
        } else {
            $error = array('error' => $this->upload->display_errors());
            print_r($error);
            die;
        }
    }
    
    public function qrImageUpload($id, $type, $folder = FALSE) { 
        $config['upload_path'] = 'uploads/default_qr_image';
        $config['allowed_types'] = 'gif|jpg|png|jpeg|JPEG|PNG|GIF|JPG';
        $config['remove_spaces'] = TRUE;
        $config['overwrite'] = TRUE;
        $config['file_name'] = $id . date('his');
        $config['encrypt_name'] = '2';
        $this->upload->initialize($config);
        if ($this->upload->do_upload()) {
            $upload_data = $this->upload->data();
            $config['source_image'] = 'uploads/default_qr_image/' . $upload_data['file_name'];
            return $upload_data['file_name'];
        } else {
            $error = array('error' => $this->upload->display_errors());
            print_r($error);
            die;
        }
    }
    
    public function getSllerUserData($id,$user_id) {
        $this->db->select('users.id,users.fname,users.mname,users.lname,users.mobile,users.limitation,users.address,users.city,users.state,users.reference,users.email,users.type,users.status,users.image,requests.user_id,requests.status as sellerstatus,requests.amount as seller_amount,requests.id as sellerid,requests.coin_name as seller_coin_name,requests.coin_value as seller_coin_value,requests.waddress as seller_wallet_address,requests.txn_number as seller_txn_number,requests.created_date as seller_created_date,requests.update_date as seller_update_date');
        $this->db->join('tbl_sell_response as requests', 'users.id = requests.user_id');
        $this->db->where('users.id', $user_id);
        $this->db->where('requests.id', $id);
        $this->db->where('requests.user_id', $user_id);
        return $this->db->get('tbl_users as users')->row();
    }
    
    public function getBuyerUserData($id,$user_id) {
        $this->db->select('users.id,users.fname,users.mname,users.lname,users.mobile,users.limitation,users.address,users.city,users.state,users.reference,users.email,users.type,users.status,users.image,requests.user_id,requests.status as buyerstatus,requests.amount as buyer_amount,requests.id as buyerid,requests.coin_name as buyer_coin_name,requests.coin_value as buyer_coin_value,requests.waddress as buyer_wallet_address,requests.txn_number as buyer_txn_number,requests.created_date as buyer_created_date,requests.update_date as buyer_update_date');
        $this->db->join('tbl_buy_response as requests', 'users.id = requests.user_id');
        $this->db->where('users.id', $user_id);
        $this->db->where('requests.id', $id);
        $this->db->where('requests.user_id', $user_id);
        return $this->db->get('tbl_users as users')->row();
    }
    
    public function getWithdrawUserData($id,$user_id) {
        $this->db->select('users.id,users.fname,users.mname,users.lname,users.mobile,users.limitation,users.address,users.city,users.state,users.reference,users.email,users.type,users.status,users.image,requests.user_id,requests.status as withdrawtatus,requests.amount as withdraw_amount,requests.id as withdrawid,requests.value as withdraw_value,requests.withdrawl_method as withdraw_mehod,requests.txn_id as withdraw_txn_id,requests.created_date as withdraw_created_date,requests.update_date as withdraw_update_date');
        $this->db->join('tbl_withdraw_response as requests', 'users.id = requests.user_id');
        $this->db->where('users.id', $user_id);
        $this->db->where('requests.id', $id);
        $this->db->where('requests.user_id', $user_id);
        return $this->db->get('tbl_users as users')->row();
    }

}
