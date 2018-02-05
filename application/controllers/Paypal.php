<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    class Paypal extends CI_Controller 
    {
         function  __construct(){
            parent::__construct();
            $this->load->library('paypal_lib');
            $this->load->model('Coin');
         }
         
        function success(){
            //get the transaction data
            $paypalInfo = $this->input->post();
            $data['userId'] = $paypalInfo['item_number']; // user id
            $data['txn_id'] = $paypalInfo["txn_id"];
            $data['payment_amt'] = $this->currencyConverter('CAD', 'INR', $paypalInfo["payment_fee"]);
            $data['currency_code'] = $paypalInfo["mc_currency"];
            $data['tx'] = $paypalInfo["txn_id"];
            $data['payment'] = 'paypal';
            $data['status'] = $paypalInfo["payment_status"];
            date_default_timezone_set('Asia/Kolkata');
            $data['date'] =  strtotime(date("Y/m/d h:i:s a"));
            $this->Coin->insert_data_and_update('','tbl_payment',$data);
            /// find wallet
            $userData = $this->Coin->get_data_where('tbl_users',array('id'=>$data['userId']))->row();
            $walletAddres = $userData->wallet;
            $walletAddres = $walletAddres+$data['payment_amt'];
            $this->Coin->insert_data_and_update($data['userId'],'tbl_users',array('wallet' => $walletAddres));
            //pass the transaction data to view
//            $this->load->view('paypal/success', $data);
            redirect('dashboard');
        }
         
        function cancel(){
           $this->load->view('paypal/cancel');
        }
         
        function ipn(){
            //paypal return transaction details array
            $paypalInfo = $this->input->post();
            $data['userId'] = $paypalInfo['item_number']; // user id
            $data['txn_id'] = $paypalInfo["txn_id"];
            $data['payment_amt'] = $this->currencyConverter('CAD', 'INR', $paypalInfo["payment_fee"]);
            $data['currency_code'] = $paypalInfo["mc_currency"];
            $data['status'] = $paypalInfo["payment_status"];
            $paypalURL = $this->paypal_lib->paypal_url;        
            $result    = $this->paypal_lib->curlPost($paypalURL,$paypalInfo);
            date_default_timezone_set('Asia/Kolkata');
            $data['date'] =  strtotime(date("Y/m/d h:i:s a"));
            $data['payment'] = 'paypal';
            $this->Coin->insert_data_and_update('','tbl_payment',$data);
            /// find wallet
            $userData = $this->Coin->get_data_where('tbl_users',array('id'=>$data['userId']))->row();
            $walletAddres = $userData->wallet;
            $walletAddres = $walletAddres+$data['payment_amt'];
            $this->Coin->insert_data_and_update($data['userId'],'tbl_users',array('wallet' => $walletAddres));

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
            echo $converted_amount;
        }
    }
?>