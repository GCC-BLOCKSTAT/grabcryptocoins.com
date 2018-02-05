<style>
    .tetColor{color:red;}
    .bank-deropdown{ width: 100%; background: white; border: 2px solid #dededea8; border-radius: 0px; color: #bf3654; padding: 14px; }
    .bank-meneu{ width: 100%; text-align: center; border: 2px solid gainsboro; margin-top: -6px; }
    .bankacdetails{ background: #dcdcdc36; padding: 20px; border: 1px solid gainsboro; border-radius: 0px; }
    .vertical-tabs .nav > li:last-child > a:after {display:none;}
    table.table.table-striped td { text-align: center; }
    table.table.table-striped th { text-align: center; }
</style>

<section class="page_breadcrumbs cs gradient background_cover color_overlay section_padding_top_65 section_padding_bottom_65">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 text-center">
                <h2>Dashboard</h2>
            </div>
        </div>
    </div>
</section>

<section class="ls section section_padding_bottom_100">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12">
                        <h3>Manage Your Account</h3>
                    </div>
                </div>
                <div class="row vertical-tabs">
                    <div class="col-sm-4">
                        <!-- Nav tabs -->
                        <ul class="nav" role="tablist">
                            <li class="active"> <a href="#vertical-tab1" role="tab" data-toggle="tab">
                                    <i class="rt-icon2-wallet2"></i> GCC Wallet
                                </a> </li>
                            <li> <a href="#vertical-tab2" role="tab" data-toggle="tab">
                                    <i class="rt-icon2-paperplane"></i>Wallet Address
                                </a> </li>
                            <li> <a href="#vertical-tab3" role="tab" data-toggle="tab">
                                    <i class="rt-icon2-user"></i> My Profile
                                </a> </li>
                            <li id="bankAccount"> <a href="#vertical-tab5" role="tab" data-toggle="tab">
                                    <i class="rt-icon2-user"></i> My Bank Account
                                </a> </li>
                            <li> <a href="#vertical-tab4" role="tab" data-toggle="tab">
                                    <i class="rt-icon2-banknote"></i> My Transactions
                                </a> </li>
                            <li> <a href="<?php echo base_url('login/logout'); ?>">
                                    <i class="rt-icon2-user"></i> Logout
                                </a> </li>
                        </ul>
                    </div>
                    <div class="col-sm-8">
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane fade in active" id="vertical-tab1">
                                <div class="row">

                                    <div class="col-sm-12">
                                        <div class="wallet-balance text-center ">
                                            <h1  class="margin-bottom-zero"><i class="rt-icon2-wallet2 highlight3"></i> &nbsp;<?php echo $userData->wallet; ?>  <small><b class="grey">Rs</b></small> </h1>
                                            <p>Your Wallet Balance</p>
                                        </div>

                                    </div>
                                    <div class="col-sm-12 text-center">

                                        <a href="#" class="theme_button inverse" data-toggle="modal" data-target="#withdraw"><i class="fa fa-minus-circle"></i> Withdraw Money</a>	
                                        <a href="#" class="theme_button" data-toggle="modal" data-target="#myModal">&nbsp;&nbsp;&nbsp; Add Money&nbsp;&nbsp;&nbsp; <i class="fa fa-plus-circle"></i></a> </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="vertical-tab2" style="overflow: hidden;">
                                <div class="col-sm-12">


                                    <h3 class="">Add Wallet Address</h3>
                                    <form class="form-horizontal checkout shop-checkout" role="form" action="<?php echo base_url('dashboard/addWallet'); ?>" method="post" id="formWalletDash">
                                        <?php
                                        $wallets = json_decode($userData->waddress);
                                        $wallets_name = array('LTC' => 'Litecoin', 'BTC' => 'Bitcoin', 'BCH' => 'Bitcoincash', 'ETH' => 'Ethereum', 'XRP' => 'Ripple', 'ADA' => 'Cardano');

                                        foreach ($wallets as $wallet => $value) {
                                            $wallet_name = @$wallets_name[$wallet];
                                            ?>
                                            <div class="form-group validate-required" id="billing_first_name_field">
                                                <label for="<?php echo $wallet; ?>" class="col-sm-3 control-label">
                                                    <span class="grey"><?php echo $wallet_name; ?> </span>
                                                </label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control " name="<?php echo $wallet; ?>" id="coin_<?php echo $wallet; ?>" placeholder="" value="<?php echo $value; ?>" <?php
                                                    if (!empty($value)) {
                                                        echo "readonly= readonly";
                                                    } else {
                                                        
                                                    }
                                                    ?>>
                                                </div>
                                            </div>
<?php } ?>
                                        <div class="col-sm-12 text-right">
                                            <span class="grey" id="errWallet" style="color:red;"></span>
                                            <span class="grey" id="addWallet" style="color:green;"></span>
                                            <input type="hidden" name="userID" id="hiddenUserId" value="<?php echo $userData->id ?>">
                                            <button type="submit" class="theme_button color1">Save</button> </div>
                                    </form>

                                    <p>Incase you do not have Wallet address, Please Refer to the easily available wallet/exchange links below <a href="<?php echo base_url('walletrisk') ?>">Click Here</a></p>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="vertical-tab3" style="overflow: hidden;">
                                <div class="col-sm-12"><p>Personal Profile</p></div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="well well-sm">
                                        <div class="row">
                                            <div class="col-sm-6 col-md-6 col-xs-12">
                                                <img src="<?php echo base_url('uploads/users/') . $userData->image; ?>" alt="" class="img-thumbnail img-responsive" />
                                            </div>
                                            <div class="col-sm-6 col-md-6 col-xs-12">
                                                <h4 class=""><?php echo $userData->fname . ' ' . $userData->mname . ' ' . $userData->lname; ?></h4>
                                                <ul class="list1 no-bullets ">
                                                    <li>
                                                        <div class="media small-teaser">
                                                            <div class="media-left media-middle"> <i class="rt-icon2-phone5 highlight fontsize_16"></i> </div>
                                                            <div class="media-body media-middle">
                                                                <span class="grey">
                                                                    <?php echo $userData->mobile; ?>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="media small-teaser">
                                                            <div class="media-left media-middle">
                                                                <i class="rt-icon2-mail highlight fontsize_16"></i>
                                                            </div>
                                                            <div class="media-body media-middle">
                                                                <span class="grey">
                                                                    <?php echo $userData->email; ?>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="media small-teaser">
                                                            <div class="media-left media-middle"> <i class="rt-icon2-map-pin highlight fontsize_16"></i> </div>
                                                            <div class="media-body media-middle">
                                                                <span class="grey">
                                                                    <?php echo $userData->address; ?>, <?php echo $userData->city; ?>, <?php echo $userData->state; ?>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                                <div class="topmargin_20">
                                                    <a class="theme_button" data-toggle="modal" data-target="#changePass" href="#">CHANGE PASSWORD</a>
                                                </div>


                                                <!-- Split button -->

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <p>  Level - <?php echo $userData->level; ?> <p>
                                        
                                <div class="row">
                                    <div class="col-md-6"><p>Buy Transactions Limit - Rs.<b><?php echo $userData->limitation.'.00'; ?> </b></p></div>
                                    <div class="col-md-6"><p>Left Buy Transactions Limit - Rs.<b><?php echo ($userData->limitation)-(($todayBuy)?$todayBuy:'0.00').'.00'; ?> </b></p></div>
                                </div>
                                    
                                 <div class="row">
                                    <div class="col-md-6"><p>Sell Transactions Limit - Rs. <b><?php echo $userData->seller_limitation.'.00'; ?> </b></p></div>
                                    <div class="col-md-6"><p>Left Sell Transactions Limit - Rs. <b><?php echo ($userData->seller_limitation)-(($todaySell)?$todaySell:'0.00').'.00'; ?> </b></p></div>
                                </div>
                                    <br>
                                    <p>This is verified user profile. You can't make any changes.</p>
                                </div>
                            </div>
                            
                            <div class="tab-pane fade" id="vertical-tab5" style="overflow: hidden;">
                                <div class="row">

                                    <div class="col-sm-12">
                                        <div class="wallet-balance text-center ">
                                            <?php if(!empty($bankData)){ ?>
                                            <h3 class="text-center">Bank Account Details</h3>
                                            <table class="table table-striped">
                                                <thead style="background: #bf3654;">
                                                    <th>S.No.</th>
                                                    <th>Bank Name</th>
                                                    <th style="text-align:center;">Name</th>
                                                    <th>Account Number</th>
                                                    <th>IFSC Code</th>
                                                </thead>
                                                <tbody>
                                                    <?php $i=1;
                                                    foreach($bankData as $bank){ ?>
                                                    <tr>
                                                        <td><?php echo $i; ?></td>
                                                        <td><?php echo strtoupper($bank->bank_name); ?></td>
                                                        <td><?php echo $bank->username; ?></td>
                                                        <td><?php echo $bank->account_number; ?></td>
                                                        <td><?php echo $bank->ifsc; ?></td>
                                                    </tr>
                                                    <?php $i++; } ?>
                                                <tbody>
                                            </table>
                                                
                                           <?php }else{ ?>
                                                <p>No Bank Account Added</p>
                                           <?php } ?>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 text-center">
                                        <a href="#" class="theme_button pull-center " data-toggle="modal" data-target="#myBankModal">&nbsp;&nbsp;&nbsp; Add Bank Account&nbsp;&nbsp;&nbsp; <i class="fa fa-plus-circle"></i></a> 
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="vertical-tab4" style="overflow: hidden;">
                                <div class="col-md-12">

                                    <!-- Nav tabs -->
                                    <ul class="nav-unstyled darklinks" role="tablist">
                                        <li class="active"><a href="#tab-unstyled-1" role="tab" data-toggle="tab" class="font_size_18">Add Money</a></li>
                                        <li><a href="#tab-unstyled-2" role="tab" data-toggle="tab" class="font_size_18">Buy</a></li>
                                        <li><a href="#tab-unstyled-3" role="tab" data-toggle="tab" class="font_size_18">Sell</a></li>
                                        <li><a href="#tab-unstyled-4" role="tab" data-toggle="tab" class="font_size_18">Withdraw</a></li>
                                    </ul>
                                    <!-- Tab panes -->
                                    <div class="tab-content tab-unstyled">
                                        <div class="tab-pane fade in active" id="tab-unstyled-1">

                                            <p>View Add Money Transactions</p>            
                                            <table class="table table-striped">
                                                <thead style="background: #bf3654;">
                                                    <tr>
                                                        <th>Date</th>
                                                        <th>Added</th>
                                                        <th>Method</th>
                                                        <th>Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php if(!empty($paymentData)){
                                                    
                                                      foreach($paymentData as $payments): ?>
                                                    <tr>
                                                        <td><?php echo date('d-M-y', $payments->date); ?></td>
                                                        <td>Rs. <?php echo $payments->payment_amt; ?></td>
                                                        <td> <?php echo $payments->payment; ?></td>
                                                        <td > <span class="text-success"><?php echo $payments->status; ?></span></td>
                                                    </tr>
                                                    <?php endforeach; }else{ echo '<tr><td colspan=4 align=center><font color="red">No Data Found</font></td></tr>'; }  ?>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="tab-pane fade" id="tab-unstyled-2">
                                            <p>View Buy Transactions</p>            
                                            <table class="table table-striped">
                                                <thead style="background: #bf3654;">
                                                    <tr>
                                                        <th>Date</th>
                                                        <th>Amount</th>
                                                        <th>Coin Value</th>
                                                        <th>Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php if(!empty($userBuyData)){
                                                           foreach($userBuyData as $buyData): ?>
                                                    <tr>
                                                        <td><?php echo date('d-M-y', $buyData->created_date); ?></td>
                                                        <td>Rs. <?php echo $buyData->amount; ?></td>
                                                        <td  data-original-title="<?php echo $buyData->waddress; ?>" data-container="body" data-toggle="tooltip" data-placement="bottom" title=""><?php echo round($buyData->coin_value, 8).' ( '.$buyData->coin_name.' )'; ?></td>
                                                        <td><span class="text-success">
                                                            <?php if($buyData->status == '0'){
                                                                echo 'Pending';
                                                            }elseif($buyData->status == '1'){
                                                                echo 'Success';
                                                            }else{
                                                                echo 'Canceled';
                                                            } ?>
                                                            </span></td>
                                                    </tr>
                                                    <?php endforeach; }else{ echo '<tr><td colspan=4 align=center><font color="red">No Data Found</font></td></tr>'; } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="tab-pane fade" id="tab-unstyled-3">
                                            <p>View Sell Transactions</p>            
                                            <table class="table table-striped">
                                                <thead style="background: #bf3654;">
                                                    <tr>
                                                        <th>Date</th>
                                                        <th>Amount</th>
                                                        <th>Coin Value</th>
                                                        <th>Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php if(!empty($userSellData)){
                                                           foreach($userSellData as $sellData): ?>
                                                    <tr>
                                                        <td><?php echo date('d-M-y', $sellData->created_date); ?></td>
                                                        <td>Rs. <?php echo $sellData->amount; ?></td>
                                                        <td data-original-title="<?php echo $sellData->waddress; ?>" data-container="body" data-toggle="tooltip" data-placement="bottom" title=""><?php echo round($sellData->coin_value, 8).' ( '.$sellData->coin_name.' )'; ?></td>
                                                        <td><span class="text-success">
                                                            <?php if($sellData->status == '0'){
                                                                echo 'Pending';
                                                            }elseif($sellData->status == '1'){
                                                                echo 'Success';
                                                            }else{
                                                                echo 'Canceled';
                                                            } ?>
                                                            </span></td>
                                                    </tr>
                                                    <?php endforeach; }else{ echo '<tr><td colspan=5 align=center><font color="red">No Data Found</font></td></tr>'; } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="tab-pane fade" id="tab-unstyled-4">
                                            <p>View Withdraw Transactions</p>            
                                            <table class="table table-striped">
                                                <thead style="background: #bf3654;">
                                                    <tr>
                                                        <th>Date</th>
                                                        <th>Amount</th>
                                                        <th>Payment Method</th>
                                                        <th>Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php if(!empty($user_withdraw_data)){
                                                           foreach($user_withdraw_data as $withdrawData): ?>
                                                    <tr>
                                                        <td><?php echo date('d-M-y', $withdrawData->created_date); ?></td>
                                                        <td>Rs. <?php echo $withdrawData->amount; ?></td>
                                                        <td><?php echo $withdrawData->withdrawl_method; ?></td>
                                                        <td><span class="text-success">
                                                            <?php if($withdrawData->status == '0'){
                                                                echo 'Pending';
                                                            }elseif($withdrawData->status == '1'){
                                                                echo 'Success';
                                                            }else{
                                                                echo 'Canceled';
                                                            } ?>
                                                            </span></td>
                                                    </tr>
                                                    <?php endforeach; }else{ echo '<tr><td colspan=5 align=center><font color="red">No Data Found</font></td></tr>'; } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Money To Wallet</h4>
            </div>
            <div class="modal-body">
                <!--<form id="paymentSubmit" method="POST" action="<?php //echo base_url('Dashboard/payment'); ?>">-->
<!--                    <form id="MakeMoneyWallet">-->
<form method="post" action='<?php echo base_url('dashboard/payment'); ?>' id="checkAmnt">
                       <div id="payment" class="shop-checkout-payment">
                        <!--<h3 class="widget-title">Choose a Payment Method</h3>-->
                        <div class="form-group validate-required"> <label for="billing_first_name" class="control-label">
                            <label for="" class="control-label">
                            <p><b>Enter <span class="tctValuePaypal"></span> Amount to be added in wallet</b> <span class="grey">(Enter Amount In INR)</span></p>
                            <span class="grey" id="errAmount" style="color:red;"></span> 
                            </label> 
                            <input type="text" class="form-control txtboxToFilter" name="billing_payment" id="hidePaypalNameAdd" onkeyup="true" style="width: 131%;">
                            <span id="errHidePaypalName" style="color: red;"></span>
                        </div>
                        <ul class="list1 no-bullets payment_methods methods">
                            <li class="payment_method_paypal">
                                <div class="radio"> <label for="payment_method_paypal">
                                        <input id="payment_method_paypal" type="radio" name="payment_method" value="paypal" checked="checked">
                                        <input  type="hidden" name="method" value="wallet">
                                        <span class="grey">PayPal - pay through your credit/debit cards.</span> 
                                    </label> 
<!--                                <div class="form-group validate-required" id="billing_first_name_field_paypal" style="display:block;"> 
                                    <label for="" class="control-label">
                                    <p><b>Enter <span class="tctValuePaypal"></span> Amount to be added in wallet</b> <span class="grey">(Enter Amount In INR)</span></p>
                                    <span class="grey" id="errAmount" style="color:red;"></span> 
                                    </label> 
                                    <input type="text" class="form-control txtboxToFilter" name="billing_payment" id="hidePaypalName" onkeyup="true">
                                    
                                </div>
                                    <span id="errHidePaypalName" style="color: red;"></span>-->
                                </div>
                            </li>
                            <li class="payment_method_western">
                                <div class="radio"> <label for="payment_method_western">
                                        <input id="payment_method_western" type="radio" name="payment_method" value="western" >
                                        <span class="grey">Western Union</span>
                                    </label>
                                    <div class="form-group validate-required" id="billing_first_name_field_western" style="display:none;"> 
                                        <p><b>Company Name: GCC Blockstat</b></p>
                                        <p><b>Account Number: <span style="color:red; font-size: 14px;"> Service will be back soon, currently suspended in your country.</span></b></p> 
<!--                                        <p><label>Enter Account Number</label>
                                        <input type="text" class="form-control txtboxToFilter" name="billing_western_acc_number" id="billWesternMtcnAccNumber">
                                        <span class="grey" id="errWeternMtcnAccNumber" style="color:red;"></span></p>-->
                                        <p><label>Enter MTCN Number</label>
                                        <input type="text" class="form-control" name="billing_western_mtcn_number" id="billWesternMtcnNumber">
                                        <span class="grey" id="errWeternMtcnNumber" style="color:red;"></span></p>
                                    </div>
                                </div>
                                
                            </li>
                            <li class="payment_method_moneygram">
                                <div class="radio"> <label for="payment_method_moneygram">
                                        <input id="payment_method_moneygram" type="radio" name="payment_method" value="moneygram" >
                                        <span class="grey">Money Gram</span>
                                    </label> 
                                    <div class="form-group validate-required" id="billing_first_name_field_moneygram" style="display:none;"> 
                                        <p><b>Company Name: GCC Blockstat</b></p>
                                        <p><b>Account Number: <span style="color:red; font-size: 14px;"> Service will be back soon, currently suspended in your country.</span></b></p>
<!--                                        <p><label>Enter Account Number</label>
                                        <input type="text" class="form-control txtboxToFilter" name="billing_moneygram_acc_number" id="billMoneygramMtcnAccNumber">
                                        <span class="grey" id="errMoneygramMtcnAccNumber" style="color:red;"></span></p>-->
                                        <p><label>Enter MTCN Number</label>
                                        <input type="text" class="form-control" name="billing_moneygram_mtcn_number" id="billMoneygramMtcnNumber">
                                        <span class="grey" id="errMoneygramMtcnNumber" style="color:red;"></span></p>
                                    </div>
                                </div>
                                
                            </li>
                            <li class="payment_method_moneygram">
                                <div class="radio"> <label for="payment_method_bank_transfer">
                                        <input id="payment_method_bank_transfer" type="radio" name="payment_method" value="transfer" >
                                        <span class="grey">Bank Transfer</span>
                                    </label> 
                                    <div class="form-group validate-required" id="payment_method_bank_transfer_show" style="display:none;">
                                        <p id="kotakBank"><label><b><input type="radio" value="Kotak Mahindra Bank" name="citi-bank" checked="checked" style="display: block;"><?php echo $bankAccount[0]->name;?></b></label></p>
                                        <div class="form-group validate-required" id="billing_first_name_field_transfer" style="display:block;">
                                            <div id="kotakBankToggle"><p><label>Beneficiary Name: <?php echo $bankAccount[0]->beneficiary;?></label></p>
                                            <p><label>Account Number: <?php echo $bankAccount[0]->account;?></label>
                                            <p><label>IFSC (RTGS/NEFT/IMPS): <?php echo $bankAccount[0]->ifsc;?></label></p>
                                            <p><label>Account Type:  <?php echo $bankAccount[0]->type;?></label></p></div>
                                        </div>
                                        <p><label><b id="citiBank"><input type="radio" value="Citibank" name="citi-bank" style="display: block;"><?php echo $bankAccount[1]->name;?></b></label></p>
                                        <div class="form-group validate-required" id="billing_first_name_field_transfer_citibank" style="display:none;"> 
                                            <p><label>Beneficiary Name: <?php echo $bankAccount[1]->beneficiary;?></label></p>
                                            <p><label>Account Number: <?php echo $bankAccount[1]->account;?></label>
                                            <p><label>IFSC (RTGS/NEFT/IMPS): <?php echo $bankAccount[1]->ifsc;?></label></p>
                                            <p><label>Account Type: <?php echo $bankAccount[1]->type;?></label></p>
                                        </div>
                                    </div>
                                </div>
                                
                            </li>
                            <li class="payment_method_paytm">
                                <div class="radio"> <label for="payment_method_paytm">
                                        <input id="payment_method_paytm" type="radio" name="payment_method" value="paytm" >
                                        <span class="grey">Paytm</span>
                                    </label>
                                    <div class="form-group validate-required" id="billing_first_name_field_paytm" style="display:none;"> 
                                        <label for="" class="control-label">
                                            <p><b>Comming Soon</b></p>
                                        <span class="grey" id="errAmount" style="color:red;"></span> 
                                        </label> 
                                    </div>
                                </div>
                                
                            </li>
                            <input type="hidden" value="paypal" id="getPaymentMtcnMethod">
                            <input type="hidden" value="<?php echo $_SESSION['user'] ?>" name="user_id">
                        </ul>
                        <div class="place-order text-right"> <input type="submit" class="theme_button color1" name="checkout_place_order" id="place_order_money" value="Add Money"> </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>

<div id="myBankModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">

                <h4 class="modal-title">Add Bank Account Details</h4>
            </div>
            <div class="modal-body">

                <form id="bankDetailForm">
                    <div class="form-group validate-required" id="billing_first_name_field"> <label for="billing_first_name" class="control-label">
                            <p><b>Enter name as it appears in the bank account</b></p>

                        </label><input type="text" class="form-control " name="username" id="bank_username" placeholder="" value="">
                        <span id="bank_username_error" class="tetColor"></span>

                    </div>
                    <div class="form-group validate-required" id="billing_first_name_field"> <label for="billing_first_name" class="control-label">
                            <p><b>Enter Account number</b> <span class="grey"></span></p>

                        </label><input type="number" class="form-control txtboxToFilter" name="account_number" id="account_number" placeholder="" value="">
                        <span id="account_number_error" class="tetColor"></span>
                    </div>
                    <div class="form-group validate-required" id="billing_first_name_field"> <label for="billing_first_name" class="control-label">
                            <p><b>Confirm Account Number</b> <span class="grey"></span></p>

                        </label><input type="number" class="form-control txtboxToFilter" name="confirm_account_number" id="confirm_account_number" placeholder="" value="">
                        <span id="confirm_account_number_error" class="tetColor"></span>
                        
                    </div>
                    <div class="form-group validate-required" id="billing_first_name_field"> <label for="billing_first_name" class="control-label">
                            <p><b>Bank Name</b> <span class="grey"></span></p>

                        </label><input type="text" class="form-control " name="bankname" id="bankname" placeholder="" value="">
                        <span id="bank_name_error" class="tetColor"></span>
                    </div>
                    <div class="form-group validate-required" id="billing_first_name_field"> <label for="billing_first_name" class="control-label">
                            <p><b>IFSC Code</b> <span class="grey"></span></p>

                        </label><input type="text" class="form-control " name="ifsc" id="bank_ifsc" placeholder="" value="">
                        <span id="bank_ifsc_error" class="tetColor"></span>
                    </div>
                    <input type="hidden" value="<?php echo $userData->id; ?>" name="user_id">
                    <hr>
                    <div class="checkbox"> <label for="rememberme" class="control-label">
                            <input name="bank_rememberme" type="checkbox" id="bank_rememberme" value="1"> 
                            I confirm the above mentioned bank details to transact the amount 

                        </label><br> <span id="bank_rememberme_error" class="tetColor"></span></div>
                    <hr>
                    <p id="bankSuccess" class="tetColor" style="text-align:center; font-weight:20px;"></p>
                    <div class="place-order text-right"> <input type="button" class="theme_button color1" name="checkout_place_order" id="bank_place_order" value="Submit"> </div>
                </form>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>

<div id="withdraw" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Withdraw</h4>
            </div>
            <div class="modal-body">
                <!--<form id="paymentSubmit" method="POST" action="<?php //echo base_url('Dashboard/payment'); ?>">-->
                    <form  method="POST" id="withdwlData">
              
                       <div class="shop-checkout-payment">
                            <div class="form-group validate-required"> <label for="billing_first_name" class="control-label">
                                <p><b>Enter the Amount</b></p>
                                </label><input type="text" class="form-control txtboxToFilter" name="bank_ammount" id="withDataAmmount" placeholder="Enter the Amount" value="">
                                <span id="bank_username_error_with_ammount" class="tetColor"></span>
                            </div>
                        <ul class="list1 no-bullets payment_methods methods">
                            <li class="payment_method_paypal">
                                <div class="radio"> <label for="withdral_method_bank">
                                        <input id="withdral_method_bank" type="radio" name="withdrawl_method" value="bank" checked="checked">
                                        <span class="grey">Bank Details</span> 
                                    </label> 
                                    <div id="firstBank" class="withdral_first_name_field_bank">
                                        <div class="dropdown" style="width: 100%">
                                           <button class="dropdown-toggle bank-deropdown" type="button" data-toggle="dropdown" <?php if(!empty($bankName->bank_name)) { echo "" ; }else{ echo 'id="AddBank"'; } ?>><span id="bankAccName"><?php if(!empty($bankName->bank_name)){ echo strtoupper($bankName->bank_name); }else{ echo 'Add Bank Account'; } ?></span>
                                            <span class="caret"></span></button>
                                            <ul class="dropdown-menu bank-meneu" id="myBankId">
                                                <?php if(!empty($bankData)){ 
                                                         foreach($bankData as $bank_datails):
                                                             if($bank_datails->id != $bankName->id){ ?>
                                                    <li><a href="javascript:void(0)" ><?php echo strtoupper($bank_datails->bank_name); ?></a></li>
                                                             <?php } endforeach; } ?>
                                            </ul>
                                          </div>
                                        <div class="form-group">

                                           <?php if(!empty($bankName->bank_name)){ ?>
                                          <div class="bankacdetails">
                                            <h4 style="margin-bottom: 0px"><?php echo strtoupper($bankName->bank_name); ?></h4>
                                            <p style="margin-bottom: 0px"><b>Name: <?php echo $bankName->username; ?></b></p>
                                            <p style="margin-bottom: 0px"><b>Account Number: <?php echo $bankName->account_number; ?></b></p>
                                            <p style="margin-bottom: 0px"><b>IFSC Code: <?php echo $bankName->ifsc; ?></b></p>
                                           </div>
                                            <input type="hidden" value="<?php echo $bankName->bank_name; ?>" name="bank_with_name" id="bankDetailsID">
                                           <?php }else{ ?>
                                                <input type="hidden" value="nobank" id="noBankAdded">
                                           <?php } ?>
                                            <input type="hidden" name="user_withdrawl_ammount_user_id" value="<?php echo $userData->id; ?>" id="getBankUserID">
                                            
<!--                                            <div id="showBankDetails"></div>-->
                                        </div>
                                        
                                    </div>
                                    
                                    <div id="showBankDetails"></div>
                                    
                            </li>
                            <li class="payment_method_western">
                                <div class="radio"> <label for="withdral_method_paypal">
                                        <input id="withdral_method_paypal" type="radio" name="withdrawl_method" value="paypal" >
                                        <span class="grey">Paypal</span>
                                    </label>
                                    <div class="form-group validate-required" id="withdral_first_name_field_paypal" style="display:none;"> 
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label><b>Email id for paypal / PayPal.Me link</b></label>
                                                <input type="text" class="form-control" id="paypaAccMail" name="paypal_mail">
                                                <span id="error_paypal_mail" class="tetColor"></span>
                                            </div>
                                        </div> 
                                    </div>
                                </div>
                            </li>
                            <li class="payment_method_moneygram">
                                <div class="radio"> <label for="withdral_method_western">
                                    <input id="withdral_method_western" type="radio" name="withdrawl_method" value="western" >
                                        <span class="grey">Western Union</span>
                                    </label> 
                                    <div class="form-group validate-required" id="withdral_first_name_field_western" style="display:none;"> 
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label><b>First Name</b></label>
                                                <input type="text" class="form-control" value="<?php echo $userData->fname; ?>" readonly="readonly">
                                            </div>
                                            <div class="col-md-4">
                                                <label><b>Last Name</b></label>
                                                <input type="text" class="form-control" value="<?php echo $userData->lname; ?>" readonly="readonly">
                                            </div>
                                            <div class="col-md-4">
                                                <label><b>Mobile Number</b></label>
                                                <input type="text" class="form-control" value="<?php echo $userData->mobile; ?>" readonly="readonly">
                                            </div>
                                        </div>
                                        <p><b>Maximum transfer: $999 CAD</b></p>
                                         <p><b>Transfer Fee : 25 CAD approx** </b></p>
                                    </div>
                                </div>
                            </li>
                            <li class="payment_method_paytm">
                                <div class="radio"> <label for="withdral_method_moneygram">
                                        <input id="withdral_method_moneygram" type="radio" name="withdrawl_method" value="moneygram" >
                                        <span class="grey">Money Gram</span>
                                    </label>
                                    <div class="form-group validate-required" id="withdral_first_name_field_moneygram" style="display:none;"> 
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label><b>First Name</b></label>
                                                <input type="text" class="form-control" value="<?php echo $userData->fname; ?>" readonly="readonly">
                                            </div>
                                            <div class="col-md-4">
                                                <label><b>Last Name</b></label>
                                                <input type="text" class="form-control" value="<?php echo $userData->lname; ?>" readonly="readonly">
                                            </div>
                                            <div class="col-md-4">
                                                <label><b>Mobile Number</b></label>
                                                <input type="text" class="form-control" value="<?php echo $userData->mobile; ?>" readonly="readonly">
                                            </div>
                                        </div>
                                         <p><b>Maximum transfer: $999 CAD</b></p>
                                         <p><b>Transfer Fee : 25 CAD approx** </b></p>
                                    </div>
                                   
                                </div>
                            </li>
                            <input type="hidden" value="ee" id="getWithdrawlBankAmmount">
                        </ul>
                           <span id="withdrwResponse" class="tetColor"></span>
                        <div class="place-order text-right"> <input type="button" class="theme_button color1" name="checkout_place_order" id="place_order_money_withdrawl_data" value="Confirm Withdraw"> </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<div id="changePass" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Update Password</h4>
            </div>
            <div class="modal-body">
                <form method="post" id="formResetPassword">
                    <div class="form-group validate-required" id="old_password_field">
                        <label for="old_password" class="control-label">
                            <p><b>Enter Old Password</b> <span class="grey" style="color:red;" id="errOldPassword"></span></p>
                        </label>
                        <input type="password" class="form-control " name="old_password" id="old_loginpassword" placeholder="" value="">
                    </div>
                    <div class="form-group validate-required" id="new_password_field">
                        <label for="new_password_field" class="control-label">
                            <p><b>Enter New Password</b> <span class="grey" id="errResetPassword" style="color:red;"></span></p>
                        </label>
                        <input type="password" class="form-control " name="new_password" id="new_loginpassword" placeholder="" value="">
                    </div>
                    <div class="form-group validate-required" id="new_renterpassword_field">
                        <label for="new_password_field" class="control-label">
                            <p><b>Re Enter New Password</b> <span class="grey" id="errResetNewPassword" style="color:red;"></span></p>
                        </label>
                        <input type="password" class="form-control " name="new_loginpassword" id="new_reloginpassword" placeholder="" value="">
                    </div>
                    <div class="place-order text-right">
                        <span class="grey" id="errorPassword" style="color:red;"></span>
                        <span class="grey" id="suceesPassword" style="color:green;"></span>
                        <input type="submit" class="theme_button color1" name="checkout_place_order"  value="Change">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="cancelPopData" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript"> 
    
    $(function () {
        $("[data-toggle='tooltip']").tooltip();
    });
    
   $("#checkAmnt").submit(function (event){
        var amount = $("#hidePaypalNameAdd").val();
        var method_value = $('#getPaymentMtcnMethod').val();
        var paypal_value = $('#hidePaypalName').val();
        var western_mtcn = $('#billWesternMtcnNumber').val();
        var moneygram_mtcn = $('#billMoneygramMtcnNumber').val();
    
        if(amount == ''){
            $("#errHidePaypalName").show();
            $("#errHidePaypalName").text('Please Enter Amount to be added in wallet '); 
            return false;
        }else if(parseInt(amount) < 5000){
            $("#errHidePaypalName").show();
            $("#errHidePaypalName").text('Enter Min Amount 5000'); 
               return false;
        }else{
            $("#errHidePaypalName").hide();
        }
        
        
                    
        if(method_value == 'western'){
            if(western_mtcn == '' || western_mtcn == ' '){
                $('#errWeternMtcnNumber').text('Please Enter the MTCN Number');
                return false;
            }else{
                $('#errWeternMtcnNumber').hide();
            }
        }else if(method_value == 'moneygram'){
            if(moneygram_mtcn == '' || moneygram_mtcn == ' '){
                $('#errMoneygramMtcnNumber').text('Please Enter the MTCN Number');
                return false;
            }else{
                $('#errMoneygramMtcnNumber').hide();
            }
        } 
    });
     $("input[name=payment_method]").change(function(){
        var name = $(this).val();
        if (name == 'paypal') {
            $('#billing_first_name_field_paypal').css('display', 'block');
            $('#payment_method_bank_transfer_show').css('display', 'none');
            $('#billing_first_name_field_western').css('display', 'none');
            $('#billing_first_name_field_moneygram').css('display', 'none');
            $('#billing_first_name_field_paytm').css('display', 'none');
//            $('#billing_first_name_field_paypal').append('<input type="text" class="form-control txtboxToFilter" name="billing_payment" placeholder=""  id="hidePaypalName">');
            $('#hideWesternName').remove();
            $('#hideMoneygramName').remove();
            $('#hidePaytmName').remove();
            $('#place_order_money').show();
            $('#getPaymentMtcnMethod').attr('value', 'paypal');
            //$('.tctValuePaypal').text(name);
        } else if (name == 'western') {
//            $("#errHidePaypalName").hide();
            $('#billing_first_name_field_western').css('display', 'block');
            $('#payment_method_bank_transfer_show').css('display', 'none');
            $('#billing_first_name_field_paypal').css('display', 'none');
            $('#billing_first_name_field_moneygram').css('display', 'none');
            $('#billing_first_name_field_paytm').css('display', 'none');
            //$('#billing_first_name_field_western').append('<input type="number" class="form-control txtboxToFilter" name="billing_payment" placeholder="" required="true" id="hideWesternName">');
//            $('#hidePaypalName').remove();
            $('#hideMoneygramName').remove();
            $('#hidePaytmName').remove();
            $('#place_order_money').show();
            $('#getPaymentMtcnMethod').attr('value', 'western');
            //$('.tctValueWestern').text(name);
        } else if (name == 'moneygram') {
//            $("#errHidePaypalName").hide();
            $('#billing_first_name_field_moneygram').css('display', 'block');
            $('#payment_method_bank_transfer_show').css('display', 'none');
            $('#billing_first_name_field_paypal').css('display', 'none');
            $('#billing_first_name_field_western').css('display', 'none');
            $('#billing_first_name_field_paytm').css('display', 'none');
            //$('#billing_first_name_field_moneygram').append('<input type="number" class="form-control txtboxToFilter" name="billing_payment" placeholder="" required="true" id="hideMoneygramName">');
            $('#hideWesternName').remove();
//            $('#hidePaypalName').remove();
            $('#hidePaytmName').remove();
            $('#place_order_money').show();
            $('#getPaymentMtcnMethod').attr('value', 'moneygram');
            //$('.tctValueMoneygram').text(name);
        } else if (name == 'paytm') {
//            $("#errHidePaypalName").hide();
            $('#billing_first_name_field_paytm').css('display', 'block');
            $('#payment_method_bank_transfer_show').css('display', 'none');
            $('#billing_first_name_field_paypal').css('display', 'none');
            $('#billing_first_name_field_western').css('display', 'none');
            $('#billing_first_name_field_moneygram').css('display', 'none');
            //$('#billing_first_name_field_paytm').append('<input type="number" class="form-control txtboxToFilter" name="billing_payment" placeholder="" required="true" id="hidePaytmName">');
            $('#hideWesternName').remove();
            $('#hideMoneygramName').remove();
//            $('#hidePaypalName').remove();
            $('#place_order_money').hide();
            $('#getPaymentMtcnMethod').attr('value', '');
            //$('.tctValuePaytm').text(name);
        } else if (name == 'transfer') {
//            $("#errHidePaypalName").hide();
            $('#payment_method_bank_transfer_show').css('display', 'block');
            $('#billing_first_name_field_paytm').css('display', 'none');
            $('#billing_first_name_field_paypal').css('display', 'none');
            $('#billing_first_name_field_western').css('display', 'none');
            $('#billing_first_name_field_moneygram').css('display', 'none');
            //$('#billing_first_name_field_paytm').append('<input type="number" class="form-control txtboxToFilter" name="billing_payment" placeholder="" required="true" id="hidePaytmName">');
            $('#hideWesternName').remove();
            $('#hideMoneygramName').remove();
//            $('#hidePaypalName').remove();
            $('#place_order_money').show();
            $('#getPaymentMtcnMethod').attr('value', 'transfer');
            //$('.tctValuePaytm').text(name);
        }else {

        }
    });
    
    var add_bank =$('#noBankAdded').val();
    if(add_bank == 'nobank'){
        $('#place_order_money_withdrawl_data').hide();
    }
    $("input[name=withdrawl_method]").change(function(){
        var bank_name = $(this).val();
        
        
        if (bank_name == 'bank') {
            $('.withdral_first_name_field_bank').css('display', 'block');
            $('#withdral_first_name_field_paypal').css('display', 'none');
            $('#withdral_first_name_field_western').css('display', 'none');
            $('#withdral_first_name_field_moneygram').css('display', 'none');
//            $('#billing_first_name_field_paypal').append('<input type="number" class="form-control txtboxToFilter" name="billing_payment" placeholder="" required="true" id="hidePaypalName">');
            $('#hideWesternName').remove();
            $('#hideMoneygramName').remove();
            $('#hidePaytmName').remove();
            $('#place_order_money').show();
            if(add_bank == 'nobank'){
                $('#place_order_money_withdrawl_data').hide();
            }
            $('#getWithdrawlBankAmmount').attr('value', 'ee');
            //$('.tctValuePaypal').text(name);
        } else if (bank_name == 'paypal') {
            $('#withdral_first_name_field_paypal').css('display', 'block');
            $('#withdral_first_name_field_western').css('display', 'none');           
            $('#withdral_first_name_field_moneygram').css('display', 'none');
            $('.withdral_first_name_field_bank').css('display', 'none');
            $('#billing_first_name_field_paypal').append('<input type="number" class="form-control txtboxToFilter" name="billing_payment" placeholder="" required="true" id="hidePaypalName">');
            //$('#billing_first_name_field_western').append('<input type="number" class="form-control txtboxToFilter" name="billing_payment" placeholder="" required="true" id="hideWesternName">');
            $('#hidePaypalName').remove();
            $('#hideMoneygramName').remove();
            $('#hidePaytmName').remove();
            $('#place_order_money').show();
            $('#getWithdrawlBankAmmount').attr('value', 'paypaltest');
            $('#place_order_money_withdrawl_data').show();
            //$('.tctValueWestern').text(name);
        } else if (bank_name == 'western') {
            $('#withdral_first_name_field_western').css('display', 'block');
            $('#withdral_first_name_field_moneygram').css('display', 'none');
            $('#withdral_first_name_field_paypal').css('display', 'none');
            $('.withdral_first_name_field_bank').css('display', 'none');
            $('#billing_first_name_field_paypal').append('<input type="number" class="form-control txtboxToFilter" name="billing_payment" placeholder="" required="true" id="hidePaypalName">');
            //$('#billing_first_name_field_moneygram').append('<input type="number" class="form-control txtboxToFilter" name="billing_payment" placeholder="" required="true" id="hideMoneygramName">');
            $('#hideWesternName').remove();
            $('#hidePaypalName').remove();
            $('#hidePaytmName').remove();
            $('#place_order_money').show();
            $('#getWithdrawlBankAmmount').attr('value', 'ee');
            $('#place_order_money_withdrawl_data').show();
            //$('.tctValueMoneygram').text(name);
        } else if (bank_name == 'moneygram') {
            $('#withdral_first_name_field_moneygram').css('display', 'block');
            $('#withdral_first_name_field_paypal').css('display', 'none');
            $('#withdral_first_name_field_western').css('display', 'none');
            $('.withdral_first_name_field_bank').css('display', 'none');
            $('#billing_first_name_field_paypal').append('<input type="number" class="form-control txtboxToFilter" name="billing_payment" placeholder="" required="true" id="hidePaypalName">');
            //$('#withdral_first_name_field_moneygram').append('<p><b>First Name</b></p><p><input type="number" class="form-control txtboxToFilter" name="billing_payment" placeholder="" required="true" id="hidePaytmName"></p><p><b>First Name</b></p><input type="number" class="form-control txtboxToFilter" name="billing_payment" placeholder="" required="true" id="hidePaytmName">');
            $('#hideWesternName').remove();
            $('#hideMoneygramName').remove();
            $('#hidePaypalName').remove();
            $('#place_order_money').show();
            $('#getWithdrawlBankAmmount').attr('value', 'ee');
            $('#place_order_money_withdrawl_data').show();
            //$('.tctValuePaytm').text(name);
        }else {

        }
    });
    
//    $(document).bind("contextmenu", function (e) {
//        e.preventDefault();
//    });

    $(document).keydown(function (e) {
        if (e.which === 123) {
            return false;
        }
    });
    
//    $('#place_order_money').click(function(){
//        var method_value = $('#getPaymentMtcnMethod').val();
//        var paypal_value = $('#hidePaypalName').val();
////        var western_account = $('#billWesternMtcnAccNumber').val();
//        var western_mtcn = $('#billWesternMtcnNumber').val();
////        var moneygram_account = $('#billMoneygramMtcnAccNumber').val();
//        var moneygram_mtcn = $('#billMoneygramMtcnNumber').val();
//        var add_money_url = '<?php // echo base_url('Dashboard/payment') ?>';
//                    
//        if(method_value == 'western'){
////            if(western_account == '' || western_account == ' '){
////                $('#errWeternMtcnAccNumber').text('Please Enter the Account Number');
////            }else{
////                $('#errWeternMtcnAccNumber').hide();
////            }
//            
//            if(western_mtcn == '' || western_mtcn == ' '){
//                $('#errWeternMtcnNumber').text('Please Enter the MTCN Number');
//                return false;
//            }else{
//                $('#errWeternMtcnNumber').hide();
//            }
//        }else if(method_value == 'moneygram'){
////            if(moneygram_account == '' || moneygram_account == ' '){
////                $('#errMoneygramMtcnAccNumber').text('Please Enter the Account Number');
////            }else{
////                $('#errMoneygramMtcnAccNumber').hide();
////            }
//            
//            if(moneygram_mtcn == '' || moneygram_mtcn == ' '){
//                $('#errMoneygramMtcnNumber').text('Please Enter the MTCN Number');
//                return false;
//            }else{
//                $('#errMoneygramMtcnNumber').hide();
//            }
//        } 
//        
//    });
    
    $('#place_order_money_withdrawl_data').click(function(){
        var account = $('#withDataAmmount').val();
        var detailsname = $('#getWithdrawlBankAmmount').val();
        var paypalmail = $('#paypaAccMail').val();
        var error = 0;
        var withdrawl_url = '<?php echo base_url('BuySell/withdrawlStatus'); ?>';
       
        if(account == '' || account == ' '){
           $('#bank_username_error_with_ammount').text('Please Enter the Amount');
           return false;
           error = 1;
        }else{
            $('#bank_username_error_with_ammount').hide();
        }
        
        if(detailsname == 'paypaltest'){
            if(paypalmail == '' || paypalmail == ' '){
                $('#error_paypal_mail').text('Please Enter the Paypal Email ID/ Paypal Mail Link');
                return false;
                error = 1;
            }else{
                $('#error_paypal_mail').hide();
            }
        }
          
          var postform = $('#withdwlData').serialize();
          $.ajax({
            type: "POST",
            url: withdrawl_url,
            data: postform,
            success: function (response) {
                if(response == '1'){
                    $('#withdrwResponse').text('The amount should less/equal than the wallet balance');
                }else{
                    $('#withdrwResponse').text('Your Inquiry Under Process');
                    $('#place_order_money_withdrawl_data').hide();
                    setTimeout(function() {
                        window.location.reload(1);
                    }, 3000);
                }
            }
        });
        
    });
    
    
    $('#AddBank').click(function(){
        $('.modal.in').modal('hide');
        $('.nav li.active').removeClass('active');
        $( "#bankAccount" ).addClass("active" );
        $('.tab-content div.active').removeClass('in active');
        $('#vertical-tab5').addClass('in active');
    });
    
    
    $("#myBankId li").click(function() {
        
        var bankvalue = $(this).text();
        var userid = $('#getBankUserID').val();
        var bank_id_url = '<?php echo base_url('Bank/getBankName'); ?>';
        $.ajax({
            type: "POST",
            url: bank_id_url,
            data: {name: bankvalue, user_id: userid},
            success: function (response) {
                $('#bankDetailsID').attr('value', bankvalue);
                $('#firstBank').hide();
                $('#showBankDetails').html(response);
                //$('#bankAccName').text(bankvalue);
            }
        });
        
    });
    
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
    
    $('#bank_place_order').click(function(){
        var name = $('#bank_username').val();
        var account = $('#account_number').val();
        var confirm_account = $('#confirm_account_number').val();
        var ifsc = $('#bank_ifsc').val();
        var bank = $('#bankname').val();
        var error = 0;
        
        if(name == '' || name == ' '){
           $('#bank_username_error').text('Please enter the name registered with bank');
           error = 1;
        }else{
           $('#bank_username_error').hide();
        }
        
        if(account == '' || account == ' '){
           $('#account_number_error').text('Please enter the Account Number'); 
           error = 1;
        }else{
           $('#account_number_error').hide();
        }
        
        if (confirm_account == '' && confirm_account == '') {
            $('#confirm_account_number_error').text('Please renter the Account Number');
            error = 1;
        }else if(account != confirm_account){
            $('#confirm_account_number_error').text('Account Number and Confirm Account Number does not match');
            $('#confirm_account_number_error').show();
            error = 1;
        }else {
            $('#confirm_account_number_error').hide();
        }
   
        if(bank == '' || bank == ' '){
           $('#bank_name_error').text('Please enter the Bank Name'); 
           error = 1;
        }else{
           $('#bank_name_error').hide();
        }
        
        if(ifsc == '' || ifsc == ' '){
           $('#bank_ifsc_error').text('Please enter the IFSC Code'); 
           error = 1;
        }else{
           $('#bank_ifsc_error').hide();
        }
        
        if ($('input[name=bank_rememberme]:checked').length <= 0) {
            $('#bank_rememberme_error').text('Please Check the Terms & Conditions');
            error = 1;
        } else {
            $('#bank_rememberme_error').hide();
        }
        
        var bank_postform = $("#bankDetailForm").serialize();
        var bank_url = '<?php echo base_url('Bank/index'); ?>';
        
        if (error == 0) {
            $.ajax({
                type: "POST",
                url: bank_url,
                data: bank_postform,
                success: function (response) {
                    $('#bankSuccess').text("Bank Account Added Succesfully!");
                    $('#bank_place_order').hide();
                    setTimeout(function() {
                        window.location.reload(1);
                    }, 3000);
                }
            });
        }
        
    });
$(document).ready(function(){
    $("p#kotakBank").click(function(){
        $("#billing_first_name_field_transfer_citibank").hide();
        $("#billing_first_name_field_transfer").toggle();
    });
    $("b#citiBank").click(function(){
        $("#billing_first_name_field_transfer").hide();
        $("#billing_first_name_field_transfer_citibank").toggle();
    });
});
</script>
