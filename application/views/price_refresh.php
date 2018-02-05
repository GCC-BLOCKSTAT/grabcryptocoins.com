<link rel="stylesheet" href="<?php echo base_url('assets/dist/css/colorbox.css'); ?>" /> 
<?php if(!empty($taxs)){
    foreach($taxs as $tax){
        if($tax->coin == 'BTC'){
            
            if($tax->type == 1){
                $buy_btc_tax = $tax->tax/100;
                $buy_btc_comision = $tax->commision/100;
                $buy_btc_charge = $tax->charges;
            }else{
                $sell_btc_tax = $tax->tax/100;
                $sell_btc_comision = $tax->commision/100;
                $sell_btc_charge = $tax->charges;
            }
            
        }elseif($tax->coin == 'LTC'){
            
            if($tax->type == 1){
                $buy_ltc_tax = $tax->tax/100;
                $buy_ltc_comision = $tax->commision/100;
                $buy_ltc_charge = $tax->charges;
            }else{
                $sell_ltc_tax = $tax->tax/100;
                $sell_ltc_comision = $tax->commision/100;
                $sell_ltc_charge = $tax->charges;
            }

        }elseif($tax->coin == 'BCH'){
            
            if($tax->type == 1){
                $buy_bch_tax = $tax->tax/100;
                $buy_bch_comision = $tax->commision/100;
                $buy_bch_charge = $tax->charges;
            }else{
                $sell_bch_tax = $tax->tax/100;
                $sell_bch_comision = $tax->commision/100;
                $sell_bch_charge = $tax->charges;
            }

        }elseif($tax->coin == 'ETH'){
            
            if($tax->type == 1){
                $buy_eth_tax = $tax->tax/100;
                $buy_eth_comision = $tax->commision/100;
                $buy_eth_charge = $tax->charges;
            }else{
                $sell_eth_tax = $tax->tax/100;
                $sell_eth_comision = $tax->commision/100;
                $sell_eth_charge = $tax->charges;
            }

        }elseif($tax->coin == 'XRP'){
            
            if($tax->type == 1){
                $buy_xrp_tax = $tax->tax/100;
                $buy_xrp_comision = $tax->commision/100;
                $buy_xrp_charge = $tax->charges;
            }else{
                $sell_xrp_tax = $tax->tax/100;
                $sell_xrp_comision = $tax->commision/100;
                $sell_xrp_charge = $tax->charges;
            }

        }elseif($tax->coin == 'ADA'){
            
            if($tax->type == 1){
                $buy_ada_tax = $tax->tax/100;
                $buy_ada_comision = $tax->commision/100;
                $buy_ada_charge = $tax->charges;
            }else{
                $sell_ada_tax = $tax->tax/100;
                $sell_ada_comision = $tax->commision/100;
                $sell_ada_charge = $tax->charges;
            }

        }else{
            
        }
    }
   }else{
       
   } //echo $ltc_tax; die; ?>
<div id="hideCurrencyDetailsLoad">
<div class="table-responsive">
<a href="javascript:void(0)" class="refresh" id="currencyRefresh12"><i class="fa fa-refresh"></i> refresh</a>
<table class="table_template darklinks" id="timetable">
    <thead>
        <tr>
            <th></th>
            <th>Currency</th>
            <th>Code</th>
            <th>Buy Price (INR)</th>
            <th>Sell Price (INR)</th>
            <th colspan="2">Action</th>
        </tr>
    </thead>
    <?php //echo '<pre>'; print_r($_SESSION); die; ?>
    <tbody>
        <?php foreach ($currencies as $currency) { ?>
            <tr>
                <th> <img src="<?php echo base_url('assets/images/bitcoin/' . $currency->symbol . '.png'); ?>" style="height: 30px; width: 30p;"></th><th><?php echo $currency->name; ?> </th>
                <th> <?php echo $currency->symbol; ?> </th>
                
                <?php if($currency->symbol == 'BTC'){
                        
                        //BUY Calculate for BTC
                        $buy_total_tax = round($currency->price_inr*$buy_btc_tax, 2);
                        $buy_total_commision = round($currency->price_inr*$buy_btc_comision, 2);
                        $buy_total_value = $buy_total_tax+$buy_total_commision+$buy_btc_charge;

                        //SELL Calculate for BTC
                        $sell_total_tax = round($currency->price_inr*$sell_btc_tax, 2);
                        $sell_total_commision = round($currency->price_inr*$sell_btc_comision, 2);
                        $sell_total_value = $sell_total_tax+$sell_total_commision+$sell_btc_charge;

                    }elseif($currency->symbol == 'LTC'){

                        //BUY Calculate for LTC
                        $buy_total_tax = round($currency->price_inr*$buy_ltc_tax, 2);
                        $buy_total_commision = round($currency->price_inr*$buy_ltc_comision, 2);
                        $buy_total_value = $buy_total_tax+$buy_total_commision+$buy_ltc_charge;

                        //SELL Calculate for LTC
                        $sell_total_tax = round($currency->price_inr*$sell_ltc_tax, 2);
                        $sell_total_commision = round($currency->price_inr*$sell_ltc_comision, 2);
                        $sell_total_value = $sell_total_tax+$sell_total_commision+$sell_ltc_charge;

                    }elseif($currency->symbol == 'BCH'){

                        //BUY Calculate for BCH
                        $buy_total_tax = round($currency->price_inr*$buy_bch_tax, 2);
                        $buy_total_commision = round($currency->price_inr*$buy_bch_comision, 2);
                        $buy_total_value = $buy_total_tax+$buy_total_commision+$buy_bch_charge;

                        //SELL Calculate for BCH
                        $sell_total_tax = round($currency->price_inr*$sell_bch_tax, 2);
                        $sell_total_commision = round($currency->price_inr*$sell_bch_comision, 2);
                        $sell_total_value = $sell_total_tax+$sell_total_commision+$sell_bch_charge;

                    }elseif($currency->symbol == 'ETH'){

                        //BUY Calculate for ETH
                        $buy_total_tax = round(($currency->price_inr*$buy_eth_tax)/100, 2);
                        $buy_total_commision = round($currency->price_inr*$buy_eth_comision, 2);
                        $buy_total_value = $buy_total_tax+$buy_total_commision+$buy_eth_charge;

                        //SELL Calculate for ETH
                        $sell_total_tax = round(($currency->price_inr*$sell_eth_tax)/100, 2);
                        $sell_total_commision = round($currency->price_inr*$sell_eth_comision, 2);
                        $sell_total_value = $sell_total_tax+$sell_total_commision+$sell_eth_charge;

                    }elseif($currency->symbol == 'XRP'){

                        //BUY Calculate for XRP
                        $buy_total_tax = round($currency->price_inr*$buy_xrp_tax, 2);
                        $buy_total_commision = round($currency->price_inr*$buy_xrp_comision, 2);
                        $buy_total_value = $buy_total_tax+$buy_total_commision+$buy_xrp_charge;

                        //SELL Calculate for XRP
                        $sell_total_tax = round($currency->price_inr*$sell_xrp_tax, 2);
                        $sell_total_commision = round($currency->price_inr*$sell_xrp_comision, 2);
                        $sell_total_value = $sell_total_tax+$sell_total_commision+$sell_xrp_charge;

                    }elseif($currency->symbol == 'ADA'){

                        //BUY Calculate for ADA
                        $buy_total_tax = round($currency->price_inr*$buy_ada_tax, 2);
                        $buy_total_commision = round($currency->price_inr*$buy_ada_comision, 2);
                        $buy_total_value = $buy_total_tax+$buy_total_commision+$buy_ada_charge;

                        //SELL Calculate for ADA
                        $sell_total_tax = round($currency->price_inr*$sell_ada_tax, 2);
                        $sell_total_commision = round($currency->price_inr*$sell_ada_comision, 2);
                        $sell_total_value = $sell_total_tax+$sell_total_commision+$sell_ada_charge;

                    }else{
                        //$comision = '';
                    } ?>
                
                <td> Rs. <?php echo round($currency->price_inr + $buy_total_value,2); ?></td>
                <td> Rs. <?php echo round($currency->price_inr - $sell_total_value,2); ?></td>
                <td><?php if (isset($_SESSION['user']) && !empty($_SESSION['user'])) { ?>
                            <!--<a  class="theme_button small-btn inverse" onclick="buySell('<?php // echo($currency->symbol);  ?>','<?php // echo(round($currency->price_inr+(($currency->price_inr*10)/100),2));  ?>')">Buy</a>-->
                        <?php $buydSell = round($currency->price_inr + $buy_total_value, 2); ?>
                        <a class='theme_button small-btn inverse ajax_colorFrame'   href="<?php echo base_url('dashboard/addBuy/' . $currency->symbol . '/' . $buydSell.'/1'); ?>">Buy</a>
                    <?php } else { ?>
                        <a href="<?php echo base_url('login'); ?>" class="theme_button small-btn inverse">Buy</a>
                    <?php } ?>
                </td>
                <td><?php if (isset($_SESSION['user']) && !empty($_SESSION['user'])) { ?>
                        <?php $selldSell = round($currency->price_inr - $sell_total_value, 2); ?>
                        <a class='theme_button small-btn color2 ajax_colorFrame'   href="<?php echo base_url('dashboard/addSell/' . $currency->symbol . '/' . $selldSell.'/2'); ?>">Sell</a>
                    <?php } else { ?>
                        <a href="<?php echo base_url('login'); ?>" class="theme_button small-btn color2">Sell</a>
                    <?php } ?> 
                </td>
                <?php if (isset($_SESSION['user']) && !empty($_SESSION['user'])) { ?>
            <input type='hidden' value="<?php echo $_SESSION['user']; ?>" id="getUserName">
        <?php } ?>
        </tr>
    <?php } ?>
    </tbody>
</table>
</div>
</div>
<div class="text-center"><img src="<?php echo base_url('assets/img/loader.gif'); ?>" style="display: none; margin: 0 auto;" id="imgLoaderRefreshLoad"></div>  
<div id="showCurrencyDetailsLoad"></div>
<!--<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>-->
<script type="text/javascript">
    
    $(document).ready(function(){    
        
        $('#currencyRefresh12').click(function(){
            var curr_url = '<?php echo base_url('BuySell/getCurrencyRefresh'); ?>';
            $('#imgLoaderRefreshLoad').css('display', 'block');
            $('#hideCurrencyDetailsLoad').hide();
           $.ajax({
                type: "POST",
                url: curr_url,
                data: {},
                success: function (response) {
                   $('#imgLoaderRefreshLoad').css('display', 'none');
                   $('#hideCurrencyDetailsLoad').hide();
                   $('#showCurrencyDetailsLoad').html(response);
                }   
            });
        });
        
        $("input[name=payment_method]").change(function () {
        var name = $(this).val();
        if (name == 'paypal') {
            $('#billing_first_name_field_paypal').css('display', 'block');
            $('#billing_first_name_field_western').css('display', 'none');
            $('#billing_first_name_field_moneygram').css('display', 'none');
            $('#billing_first_name_field_paytm').css('display', 'none');
            $('#billing_first_name_field_paypal').append('<input type="number" class="form-control txtboxToFilter" name="billing_payment" placeholder="" required="true" id="hidePaypalName">');
            $('#hideWesternName').remove();
            $('#hideMoneygramName').remove();
            $('#hidePaytmName').remove();
            $('#place_order_money').show();
            //$('.tctValuePaypal').text(name);
        } else if (name == 'western') {
            $('#billing_first_name_field_western').css('display', 'block');
            $('#billing_first_name_field_paypal').css('display', 'none');
            $('#billing_first_name_field_moneygram').css('display', 'none');
            $('#billing_first_name_field_paytm').css('display', 'none');
            $('#billing_first_name_field_western').append('<input type="number" class="form-control txtboxToFilter" name="billing_payment" placeholder="" required="true" id="hideWesternName">');
            $('#hidePaypalName').remove();
            $('#hideMoneygramName').remove();
            $('#hidePaytmName').remove();
            $('#place_order_money').hide();
            //$('.tctValueWestern').text(name);
        } else if (name == 'moneygram') {
            $('#billing_first_name_field_moneygram').css('display', 'block');
            $('#billing_first_name_field_paypal').css('display', 'none');
            $('#billing_first_name_field_western').css('display', 'none');
            $('#billing_first_name_field_paytm').css('display', 'none');
            $('#billing_first_name_field_moneygram').append('<input type="number" class="form-control txtboxToFilter" name="billing_payment" placeholder="" required="true" id="hideMoneygramName">');
            $('#hideWesternName').remove();
            $('#hidePaypalName').remove();
            $('#hidePaytmName').remove();
            $('#place_order_money').hide();
            //$('.tctValueMoneygram').text(name);
        } else if (name == 'paytm') {
            $('#billing_first_name_field_paytm').css('display', 'block');
            $('#billing_first_name_field_paypal').css('display', 'none');
            $('#billing_first_name_field_western').css('display', 'none');
            $('#billing_first_name_field_moneygram').css('display', 'none');
            $('#billing_first_name_field_paytm').append('<input type="number" class="form-control txtboxToFilter" name="billing_payment" placeholder="" required="true" id="hidePaytmName">');
            $('#hideWesternName').remove();
            $('#hideMoneygramName').remove();
            $('#hidePaypalName').remove();
            $('#place_order_money').hide();
            //$('.tctValuePaytm').text(name);
        } else {

        }
    });
        
        $('.sellPrice').click(function(){
           var user_id = $('#getUserName').val();
           var coin = $(this).attr('value');
           var coin_url = '<?php echo base_url('BuySell/getUserStatus'); ?>';
           var redirect_url = '<?php echo base_url('dashboard'); ?>';
           //alert(coin_url);
           $.ajax({
                type: "POST",
                url: coin_url,
                data: {user_id: user_id, coin: coin},
                success: function (response) {
                       if(response == '2'){
                           alert('Please Update the Currency Wallet in Profile');
                           window.location.replace(redirect_url);
                       }else{
                           $('#myModal').modal('show');
                       }   
                }
            });
        });
               
    });
</script>


<script type = "text/javascript" src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>assets/dist/js/bootstrap.js" type="text/javascript"></script>

<script src="<?php echo base_url('assets/dist/js/jquery.colorbox.js'); ?>"></script>
<script type="text/javascript">
   $(document).ready(function () {
    //$.noConflict();
        $(".ajax_colorFrame").colorbox({iframe: true, width: "50%", height: "86%"});
    });
</script>