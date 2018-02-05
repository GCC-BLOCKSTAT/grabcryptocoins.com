<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class BuySell extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('common');
        $this->load->model('Coin');
    }

    public function index() {
        $urls = array("https://api.coinmarketcap.com/v1/ticker/bitcoin/?convert=INR",
            "https://api.coinmarketcap.com/v1/ticker/litecoin/?convert=INR",
            "https://api.coinmarketcap.com/v1/ticker/bitcoin-cash/?convert=INR",
            "https://api.coinmarketcap.com/v1/ticker/ethereum/?convert=INR",
            "https://api.coinmarketcap.com/v1/ticker/ripple/?convert=INR",
            "https://api.coinmarketcap.com/v1/ticker/cardano/?convert=INR");

        $currencies = array();
        foreach ($urls as $url) {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 4);
            $json = curl_exec($ch);
            if (!$json) {
                echo curl_error($ch);
            }
            curl_close($ch);

            $currency = json_decode($json);
            $currencies = array_merge($currencies, $currency);
        }
        $tax = $this->Coin->get_table_data('tbl_default')->result();
        $notification = $this->Coin->get_data_where('tbl_notifications', array('status' => 1))->row();

        $content = $this->load->view('price.php', array('currencies' => $currencies, 'taxs' => $tax, 'notification' => $notification), TRUE);
        $this->load->view('template', array('content' => $content));
    }
    
    public function getUserStatus(){
        
        $user_data = $this->Coin->get_data_where('tbl_users', array('id' => $_POST['user_id']))->row();
        
        $coin = $_POST['coin'];
        $coinname =  json_decode($user_data->waddress);
        
        if($coin == 'BTC'){
            $val = $coinname->BTC;
            
        }elseif($coin == 'LTC'){
            $val = $coinname->LTC;
            
        }elseif($coin == 'BCH'){
            $val = $coinname->BCH;
            
        }elseif($coin == 'ETH'){
            $val = $coinname->ETH;
            
        }elseif($coin == 'XRP'){
            $val = $coinname->XRP;
            
        }else{
            $val = $coinname->ADA;
        }
        
        if(!empty($val) && $user_data->wallet != '0'){
            $response = 1;
        }else{
            $response = 2;
        }
        
        echo $response; exit;
    }
    
    public function getCurrencyRefresh(){
         $urls = array("https://api.coinmarketcap.com/v1/ticker/bitcoin/?convert=INR",
            "https://api.coinmarketcap.com/v1/ticker/litecoin/?convert=INR",
            "https://api.coinmarketcap.com/v1/ticker/bitcoin-cash/?convert=INR",
            "https://api.coinmarketcap.com/v1/ticker/ethereum/?convert=INR",
            "https://api.coinmarketcap.com/v1/ticker/ripple/?convert=INR",
            "https://api.coinmarketcap.com/v1/ticker/cardano/?convert=INR");

        $currencies = array();
        foreach ($urls as $url) {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 4);
            $json = curl_exec($ch);
            if (!$json) {
                echo curl_error($ch);
            }
            curl_close($ch);

            $currency = json_decode($json);
            $currencies = array_merge($currencies, $currency);
        }
        $tax = $this->Coin->get_table_data('tbl_default')->result();
        $this->load->view('price_refresh.php', array('currencies' => $currencies, 'taxs' => $tax));
    }
    
    public function withdrawlStatus(){
        $amount = $this->Coin->get_data_where('tbl_users', array('id' => $_POST['user_withdrawl_ammount_user_id']))->row();
        $response = 0;
        date_default_timezone_set('Asia/Kolkata');
        $date = date('Y-m-d h:i:s a');
        if($_POST['withdrawl_method'] == 'bank'){
            $with_data = array(
            'amount' => $_POST['bank_ammount'],
            'value' => $_POST['bank_with_name'],
            'user_id' => $_POST['user_withdrawl_ammount_user_id'],
            'created_date' => strtotime($date),
            'withdrawl_method' => 'bank',
            );
        }elseif($_POST['withdrawl_method'] == 'paypal'){
            $with_data = array(
            'amount' => $_POST['bank_ammount'],
            'value' => $_POST['paypal_mail'],
            'user_id' => $_POST['user_withdrawl_ammount_user_id'],
            'created_date' => strtotime($date),
            'withdrawl_method' => 'paypal',
            );
        }elseif($_POST['withdrawl_method'] == 'western'){
            $with_data = array(
            'amount' => $_POST['bank_ammount'],
            'value' => '',
            'user_id' => $_POST['user_withdrawl_ammount_user_id'],
            'created_date' => strtotime($date),
            'withdrawl_method' => 'western',
            );
        }else{
            $with_data = array(
            'amount' => $_POST['bank_ammount'],
            'value' => '',
            'user_id' => $_POST['user_withdrawl_ammount_user_id'],
            'created_date' => strtotime($date),
            'withdrawl_method' => 'moneygram',
            );
        }
        
        if($amount->wallet < $_POST['bank_ammount']){
            echo $response = 1; die;
        }else{   
            $total_wallet = $amount->wallet - $_POST['bank_ammount'];
            $update_wallet = $this->Coin->update_data_where('tbl_users', array('wallet' => $total_wallet), 'id', $_POST['user_withdrawl_ammount_user_id']);
            $withdraw_data = $this->Coin->insert_data('tbl_withdraw_response', $with_data);
            $response = 2;
        }
        echo $response; exit;
    }

}
