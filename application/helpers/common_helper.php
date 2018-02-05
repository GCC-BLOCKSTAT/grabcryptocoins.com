<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

if (!function_exists('getParent')) {

    function getAdminData($id) {
        $CI = & get_instance();
        $CI->db->where('id_admin', $id);
        $expert_data = $CI->db->get('tbl_admin')->row();
        return $expert_data;
    }
    function getUserData($id) {
        $CI = & get_instance();
        $CI->db->where('id', $id);
        $expert_data = $CI->db->get('tbl_users')->row();
        return $expert_data;
    }
    function getWithdrawMethodDetails($id,$userId,$method){
       $CI = & get_instance();
       $CI->db->where('id', $id);
       $withdrwl_data = $CI->db->get('tbl_withdraw_response')->row();
       if($method == 'bank'){
        $CI->db->where('bank_name', $withdrwl_data->value);
        $CI->db->where('user_id', $userId);
        $bank_withdrawl_name = $CI->db->get('tbl_bank_accounts')->row();
        $name = '<br> Bank Name: '.strtoupper($bank_withdrawl_name->bank_name).'<br>Account Number: '.$bank_withdrawl_name->account_number.'<br>IFCC Code: '.$bank_withdrawl_name->ifsc;
       }else{
        $name = '<br> Paypal Mail / Paypal Link: '.$withdrwl_data->value;
       }
       return $name; 
    }
    
    function getDisclaimerContent(){
       $CI = & get_instance();
       $disclaimer = $CI->db->get('tbl_disclaimers')->row(); 
       return $disclaimer->description;
    }
}
    