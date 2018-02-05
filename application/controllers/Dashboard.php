<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Coin');
        $this->load->helper('common');
        $this->load->library('paypal_lib');
        $this->Coin->userAuth();
    }
   
    public function index() { 
        
        $data = array();
        $userId = $_SESSION['user'];
        $userData = $this->Coin->get_data_where('tbl_users',array('id'=>$userId));
        $userData = $this->Coin->get_data_row($userData);
        $total_amount = $this->Coin->sum_data();
        $paymentData = $this->Coin->get_data_where('tbl_payment',array('userId'=>$userId))->result();
        $bank_data = $this->Coin->get_data_where('tbl_bank_accounts',array('user_id'=>$userId))->result();
        $first_bank_name = $this->Coin->get_data_where('tbl_bank_accounts',array('user_id'=>$userId))->row();
        $todayDate = strtotime(date('m/d/y'));
        $todayBuy = $this->Coin->getSumBuy($userId,$todayDate,'tbl_buy_response');
        $todaySell = $this->Coin->getSumBuy($userId,$todayDate,'tbl_sell_response');
        $user_sell_data = $this->Coin->get_data_where('tbl_sell_response', array('user_id' => $userId))->result();
        $user_buy_data = $this->Coin->get_data_where('tbl_buy_response', array('user_id' => $userId))->result();
        $user_withdraw_data = $this->Coin->get_data_where('tbl_withdraw_response', array('user_id' => $userId))->result();

        $bankAccount = $this->Coin->get_table_data('tbl_bank')->result();
        $dashboardData = array(
            'data' => $data,
            'userData'=>$userData,
            'total_amount'=>$total_amount,
            'paymentData'=>$paymentData,
            'bankData' => $bank_data,
            'bankName' => $first_bank_name,
            'todayBuy'=>$todayBuy,
            'todaySell'=>$todaySell,
            'userSellData' => $user_sell_data,
            'userBuyData' => $user_buy_data,
            'user_withdraw_data' => $user_withdraw_data,
            'bankAccount'=>$bankAccount);
        $content = $this->load->view('dashboard.php', $dashboardData, TRUE);
        $this->load->view('template', array('content' => $content));
    }
    
    public function addWalletAddress() {
        $wallet =array('BTC'=>$_POST['BTC'],'LTC'=>$_POST['LTC'],'BCH'=>$_POST['BCH'],'ETH'=>$_POST['ETH'],'XRP'=>$_POST['XRP'],'ADA'=>$_POST['ADA']);
        $data['waddress'] = json_encode($wallet);
        $updatID = $this->Coin->insert_data_and_update($_POST['userID'], 'tbl_users', $data);
        echo '2';
    }
    
    /// add buy 
    public function addBuy($walletAddress,$buyPrice,$type){
        $data = $this->Coin->get_data_where('tbl_users',array('id'=>$_SESSION['user']))->row();
        $waddress = json_decode($data->waddress);
        if($walletAddress == $walletAddress){
           $value= $waddress->$walletAddress;
        }
        $notifications = $this->Coin->get_data_where('tbl_default', array('status' => '1', 'type' => $type, 'coin' => $walletAddress))->row();
        $this->load->view('addBuy.php',array('userDetail'=>$data,'dataWalletAddress'=>$value,'notifications' => $notifications,'address'=>$walletAddress,'buyPrice'=>$buyPrice));
    }
    
    public function addBuyWallet(){
        date_default_timezone_set('Asia/Kolkata');
        $date = date('Y-m-d h:i:s a');
        $userId = $_SESSION['user'];
        $todayDate = strtotime(date('m/d/y'));
        $todayBuy = $this->Coin->getSumBuy($userId,$todayDate,'tbl_buy_response');
        $userBuy = $this->Coin->get_data_where('tbl_users',array('id' => $userId))->row()->limitation;
        $get_amount = $_POST['billing_amount'];
        $user_amount = $this->Coin->get_data_where('tbl_users',array('id' => $userId))->row()->wallet;
        $totalBuyToday = $todayBuy + $_POST['billing_amount'];

        if($userBuy < $totalBuyToday){
            echo '8';   // for check user amount not max 
        }elseif($user_amount < $get_amount){
            echo '10';
        }else{
            $data['user_id'] = $_POST['buyUserId'];
            $data['waddress'] = $_POST['billing_walletAddress'];
            $data['amount'] = $_POST['billing_amount'];
            $data['coin_name'] = $_POST['coin_name'];
            $data['coin_value'] = $_POST['billing_coin'];
            $data['created_date'] = strtotime(($date));
            $data['limit_date'] = $todayDate;
            $wdaddress = $_POST['coin_name'];

            $user_data = $this->Coin->get_data_where('tbl_users', array('id' => $userId))->row();
            $all_data = json_decode($user_data->waddress);

            $btc = $all_data->BTC;
            $ltc = $all_data->LTC;
            $bch = $all_data->BCH;
            $eth = $all_data->ETH;
            $xrp = $all_data->XRP;
            $ada = $all_data->ADA;

            if(!empty($data['coin_name'])){
                if($wdaddress == 'BTC'){
                    $set_data = json_encode(array('BTC'=>$data['waddress'],'LTC'=>$ltc,'BCH'=>$bch,'ETH'=>$eth,'XRP'=>$xrp,'ADA'=>$ada));
                }elseif($wdaddress == 'LTC'){
                    $set_data = json_encode(array('BTC'=>$btc,'LTC'=>$data['waddress'],'BCH'=>$bch,'ETH'=>$eth,'XRP'=>$xrp,'ADA'=>$ada));
                }elseif($wdaddress == 'BCH'){
                    $set_data = json_encode(array('BTC'=>$btc,'LTC'=>$ltc,'BCH'=>$data['waddress'],'ETH'=>$eth,'XRP'=>$xrp,'ADA'=>$ada));
                }elseif($wdaddress == 'ETH'){
                    $set_data = json_encode(array('BTC'=>$btc,'LTC'=>$ltc,'BCH'=>$bch,'ETH'=>$data['waddress'],'XRP'=>$xrp,'ADA'=>$ada));
                }elseif($wdaddress == 'XRP'){
                    $set_data = json_encode(array('BTC'=>$btc,'LTC'=>$ltc,'BCH'=>$bch,'ETH'=>$eth,'XRP'=>$data['waddress'],'ADA'=>$ada));
                }elseif($wdaddress == 'ADA'){
                    $set_data = json_encode(array('BTC'=>$btc,'LTC'=>$ltc,'BCH'=>$bch,'ETH'=>$eth,'XRP'=>$xrp,'ADA'=>$data['waddress']));
                }else{
                    $set_data = '';
                }
            }else{

            }

            $user_update_wallet = $this->Coin->update_data_where('tbl_users', array('waddress' => $set_data), 'id', $data['user_id']);
            $userdata = $this->Coin->get_data_where('tbl_users', array('id' => $data['user_id']))->row();
            $this->Coin->insert_data_and_update('','tbl_buy_response',$data);
            echo '2';
        }
    }
    
    public function addSell($walletAddress,$buyPrice,$type){
        $data = $this->Coin->get_data_where('tbl_users',array('id'=>$_SESSION['user']))->row();
        $defaultData = $this->Coin->get_data_where('tbl_default',array('coin' => $walletAddress))->row();
        $waddress = json_decode($data->waddress);
        if($walletAddress == $walletAddress){
           $value= $waddress->$walletAddress;
        }
        $notifications = $this->Coin->get_data_where('tbl_default', array('status' => '1', 'type' => $type, 'coin' => $walletAddress))->row();
        $this->load->view('addSell.php',array('defaultData'=>$defaultData,'userDetail'=>$data,'dataWalletAddress'=>$value,'notifications' => $notifications,'address'=>$walletAddress,'buyPrice'=>$buyPrice));
    }
    
    public function addSellWallet(){
        date_default_timezone_set('Asia/Kolkata');
        $date = date('Y-m-d h:i:s a');
        $userId = $_SESSION['user'];
        $todayDate = strtotime(date('m/d/y'));
        $todaySell = $this->Coin->getSumBuy($userId,$todayDate,'tbl_sell_response');
        $userSell = $this->Coin->get_data_where('tbl_users',array('id'=>$userId))->row()->seller_limitation;
        $get_amount = $_POST['billing_amount'];
        $user_amount = $this->Coin->get_data_where('tbl_users',array('id' => $userId))->row()->wallet;
        $totalSellToday = $todaySell + $_POST['billing_amount'];
        
        if($userSell < $totalSellToday){
            echo '8';   // for check user amount not max 
        }elseif($user_amount < $get_amount){
            echo '10';
        }else{
            $data['user_id'] = $_POST['buyUserId'];
            $data['waddress'] = $_POST['billing_walletAddress'];
            $data['amount'] = $_POST['billing_amount'];
            $data['coin_name'] = $_POST['coin_name'];
            $data['coin_value'] = $_POST['billing_coin'];
            $data['txn_number'] = $_POST['billing_transaction_number'];
            $data['created_date'] = strtotime($date);
            $data['limit_date'] = $todayDate;
            $this->Coin->insert_data('tbl_sell_response',$data);
            echo '2';
        }
    }
    
    public function payment(){

        date_default_timezone_set('Asia/Kolkata');
        if($_POST['payment_method'] == 'moneygram'){
            $save_data['payment_amt'] = $_POST['billing_payment'];
            $save_data['method_values'] = $_POST['billing_moneygram_mtcn_number'];
            $save_data['payment'] = $_POST['payment_method'];
            $save_data['userId'] = $_POST['user_id']; 
            $save_data['date'] = strtotime(date('Y-m-d h:i:s a'));
            $status = $this->Coin->insert_data('tbl_payment', $save_data);
            redirect('dashboard');
        }elseif($_POST['payment_method'] == 'western'){
            $save_data['payment_amt'] = $_POST['billing_payment'];
            $save_data['method_values'] = $_POST['billing_western_mtcn_number'];
            $save_data['payment'] = $_POST['payment_method'];
            $save_data['userId'] = $_POST['user_id']; 
            $save_data['date'] = strtotime(date('Y-m-d h:i:s a'));
            $status = $this->Coin->insert_data('tbl_payment', $save_data);
            redirect('dashboard');
        }elseif($_POST['payment_method'] == 'transfer'){
            $save_data['payment_amt'] = $_POST['billing_payment'];
            $save_data['payment'] = $_POST['payment_method'];
            $save_data['userId'] = $_POST['user_id']; 
            $save_data['date'] = strtotime(date('Y-m-d h:i:s a'));
            $status = $this->Coin->insert_data('tbl_payment', $save_data);
            redirect('dashboard');
        }elseif($_POST['payment_method'] == 'paypal'){
            $amount = $_POST['billing_payment'];
            $payment_method = $_POST['payment_method'];
            $id = $_SESSION['user'];

            $amount = $this->currencyConverter('INR', 'CAD', $_POST['billing_payment']);
            //Set variables for paypal form
            $returnURL = base_url().'paypal/success'; //payment success url
            $cancelURL = base_url().'paypal/cancel'; //payment cancel url
            $notifyURL = base_url().'paypal/ipn'; //ipn url
            //get particular product data
            $product = $this->Coin->get_data_where('tbl_users',array('id'=>$id))->row();
            $userID = 1; //current user id
            $logo = base_url().'assets/images/codexworld-logo.png';

            //$amount = $amount/64.05;
            $this->paypal_lib->add_field('return', $returnURL);
            $this->paypal_lib->add_field('cancel_return', $cancelURL);
            $this->paypal_lib->add_field('notify_url', $notifyURL);
            $this->paypal_lib->add_field('item_name', $product->fname);
            $this->paypal_lib->add_field('custom', $userID);
            $this->paypal_lib->add_field('item_number',  $product->id);
            $this->paypal_lib->add_field('amount',  $amount);  
            $this->paypal_lib->add_field('currency_code', 'CAD');
            $this->paypal_lib->image($logo);

            $this->paypal_lib->paypal_auto_form();
        }else{
        
        
        }
                    
    }
    
    public function updatePassword(){
        $userId = $_SESSION['user'];
        $userData = $this->Coin->get_data_where('tbl_users',array('id'=>$userId));
        $userData = $this->Coin->get_data_row($userData);
        if($userData->password== md5($_POST['old_password'])){
            if($_POST['old_password']!=$_POST['new_password']){
                $updatID = $this->Coin->insert_data_and_update($userId, 'tbl_users', array('password'=> md5($_POST['new_password'])));
                if($updatID){
                    echo '1';
                }
            }else{
                //echo 'New Password and Old password is same';
                echo '4';
            }
        }
        else{
            //echo 'Old Password is incorrect';
            echo '3';
        }
    }
    
    function currencyConverter($from_Currency,$to_Currency,$amount) {	
	$from_Currency = urlencode($from_Currency);
	$to_Currency = urlencode($to_Currency);	
	$get = file_get_contents("https://finance.google.com/finance/converter?a=1&from=$from_Currency&to=$to_Currency");
	$get = explode("<span class=bld>",$get);
	$get = explode("</span>",$get[1]);
	$rate= preg_replace("/[^0-9\.]/", null, $get[0]);
	$converted_amount = $amount*$rate;
	$data = array( 'rate' => $rate, 'converted_amount' =>$converted_amount, 'from_Currency' => strtoupper($from_Currency), 'to_Currency' => strtoupper($to_Currency));
        return $converted_amount;
    }
   
    public function viewWalletRisk(){
        $content = $this->load->view('wallet_risk.php', '', TRUE);
        $this->load->view('template', array('content' => $content));
    }
}
