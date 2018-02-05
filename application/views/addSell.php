<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/animations.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/fonts.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/main.css" class="color-switcher-link">
<link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/shop.css">
<style>
    .fornColorBox{
        background: white;
        padding: 30px;
    }
    .cboxWrapper
    {
        min-height: 300px !important;
    }
</style>


<body style="background-color: #fff;">
    <h4 class="text-center margin-bottom-zero">Sell <?php echo $address; ?></h4>
    <hr>
    <?php if (empty($notifications)) { ?>
        <form id="billingBuy" class="fornColorBox">
            
            <div id="hidePopupMenuData">
            <div class="form-group validate-required"> 
                <label for="" class="control-label">
                    <p><b>Enter <span class="tctValuePaypal"></span> Amount In INR</b> <span class="grey">(Sell Limit RS. <?php echo $userDetail->seller_limitation; ?>/day)</span></p>
                </label> 
                <input type="text" class="form-control txtboxToFilter" name="billing_amount" id="amountBuy">
                <input type="hidden" name="buyUserId" value="<?php echo $_SESSION['user'] ?>">
                <input type="hidden" id="buyLimitUser" value="<?php echo $userDetail->limitation; ?>">
                <input type="hidden" id="findCoin" value="<?php echo $buyPrice; ?>">
                <input type="hidden" name="coin_name" id="findCoinAddre" value="<?php echo $address; ?>">

                <span class="grey" id="errAmountBuy" style="color:red;"></span>
            </div>
            <div class="form-group validate-required"> 
                <label for="" class="control-label">
                    <p><b><?php echo $address; ?> Coin Value</b></p>
                </label> 
                <input type="text" class="form-control" name="billing_coin" id="changeCoin" value="">
                <span class="grey" id="errorCoinValues" style="color:red;"></span>
            </div>
            <div class="form-group validate-required"> 
                <label for="" class="control-label">
                    <?php if(!empty($defaultData->coin_address)){
                        $coin_val = $defaultData->coin_address;
                    }else{
                        $coin_val = '';
                    } ?>
                    <p><b>Our Address</b> : <b><?php echo $coin_val; ?></b></p>
                </label> 
                <input type="hidden" value="<?php echo $coin_val; ?>" name="billing_walletAddress">
            </div>
                <p class="text-center"><b>OR</b></p>
            <div class="text-center validate-required"> 
                <label for="" class="control-label">
                    <p><b>QR Code Image: </b></p>
                <p><img src="<?php if(!empty($defaultData->qr_image)){
                        echo base_url('uploads/default_qr_image/').$defaultData->qr_image;
                     }else{
                         echo base_url('assets/img/qr.jpg');
                     } ?>"  width="100px"></p>
                <br>
            </div>
                
            <div class="form-group validate-required"> 
                <label for="" class="control-label">
                    <p><b>Transaction (Network Transaction ID)</b></p>
                </label> 
                <input type="text" class="form-control" name="billing_transaction_number" id="amountTransaction">
                <span class="grey" id="errtxn" style="color:red;"></span>
            </div>
                <span class="grey" id="errorSellLimit" style="color:red;"></span>
            <span class="grey" id="successCoin" style="color:green;"></span>
            <div class="place-order text-center" style="margin-top:40px;"> 
                <button type="submit"  class="theme_button  inverse" name="checkout_place_order" id="btnInverse">Done</button> </div>
            </div>
            <div id="showPopupMenuData" style="display:none;"> 
                <div class="form-group validate-required" style="text-align: center;"> 
                    <label for="" class="control-label">
                        <h3 style="padding-top: 20%;"><b style="color:red;">Thanks for the Transactions</b><br> Please Check Your Wallet for Updates</h3>
                    </label>
                </div>     
            </div>
        </form>
    <?php } else { ?>
        <div class="form-group validate-required" style="text-align: center;"> 
            <label for="" class="control-label">
                <h3 style="padding-top: 20%;">
                    <b style="color:blue;"><?php echo $notifications->notification; ?></b>
                </h3>
            </label>
        </div>     
    <?php } ?>
</div>
</div></section>
</body>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script src="<?php echo base_url('assets/dist/js/jquery.colorbox.js'); ?>"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('form#billingBuy').submit(function (event) {
            event.preventDefault();
            $('.errormsg').html('');
            var error = 0;
            var amount = $("#amountBuy").val();
            var buyLimit = $("#buyLimitUser").val();
            var findCoinAddre = $('#findCoinAddre').val();
            var txn = $('#amountTransaction').val();
            var coin_value = $('#changeCoin').val();
            
            if (amount == '' || amount == '') {
                $('#errAmountBuy').text('Please Enter the Amount of Purchase'+' '+findCoinAddre+' Coin');
                error = 1;
            }
//            else if (buyLimit < amount) {
//                $('#errAmountBuy').show();
//                $('#errAmountBuy').text('Max.Sell Limit per Day');
//                $('#changeCoin').hide();
//                error = 1;
//            }
            else {
                $('#errAmountBuy').hide();
            }
            
            if (coin_value == '' || coin_value == '') {
                $('#errorCoinValues').text('Please Enter the '+findCoinAddre+' Coin Value');
                error = 1;
            } else {
                $('#errorCoinValues').hide();
            }
            
            if(txn == '' || txn == ''){
                $('#errtxn').text('Please Enter the Network Transaction ID');
                error = 1;
            }else{
                 $('#errtxn').hide();
            }

            var formData = new FormData(this);
            var burl = '<?php echo base_url('Dashboard/addSellWallet'); ?>';
            if (error == 0) {
                $.ajax({
                    type: "POST",
                    url: burl,
                    processData: false,
                    contentType: false,
                    data: formData,
                    success: function (response) {
                        if (response == '2') {
                           $('#hidePopupMenuData').hide();
                           $('#showPopupMenuData').css('display', 'block');
                        }else if(response == '8'){
                           $('#errorSellLimit').text('Max.Buy Limit per Day');
                        }else if(response == '10'){
                            $('#errorSellLimit').text('The amount should less/equal than the wallet balance');
                        }else{
                            
                        }
                    }
                });
                event.preventDefault();
            }
        });

    });
    
    $("#amountBuy").keyup (function (e) {
        var amount = $("#amountBuy").val();
        var amountBuy = $(this).val();
        var findCoin = $('#findCoin').val();
        var findCoinAddre = $('#findCoinAddre').val();
        var total = amountBuy / findCoin;
        //$('#btnInverse').css('display', 'none');
        if(amount != '' || amount != ' '){
           $('#changeCoin').attr('value', total); 
           $('#errAmountBuy').hide();
           $('#changeCoin').show();
           //$('#btnInverse').show();
        }
    });
    
    $("#changeCoin").keyup(function (e) {
        var coin = $("#changeCoin").val();
        var coinBuy = $(this).val();
        var findCoin = $('#findCoin').val();
        var findCoinAddre = $('#findCoinAddre').val();
        var total = coinBuy * findCoin;
        if (coin != '' || coin != ' ') {
            $('#amountBuy').attr('value', total);
            $('#errorCoinValues').hide();
            $('#amountBuy').show();
        }
    });
    
//    $("#amountBuy").change(function () {
//        var amountBuy = $(this).val();
//        var findCoin = $('#findCoin').val();
//        var findCoinAddre = $('#findCoinAddre').val();
//        var total = amountBuy / findCoin;
//        $('#changeCoin').text(total + ' ' + findCoinAddre);
//    });
    $(".txtboxToFilter").keydown(function (e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
                // Allow: Ctrl+A, Command+A
                        (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) ||
                        // Allow: home, end, left, right, down, up
                                (e.keyCode >= 35 && e.keyCode <= 40)) {
                    // let it happen, don't do anything
                    return;
                }
                // Ensure that it is a number and stop the keypress
                if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
                    e.preventDefault();
                }
            });
</script>