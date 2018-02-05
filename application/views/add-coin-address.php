<section class="page_breadcrumbs cs gradient background_cover color_overlay section_padding_top_65 section_padding_bottom_65">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 text-center">
                <h2>Email Verified Succesfully</h2>							
            </div>
        </div>
    </div>
</section>			
<section class="ls section_padding_top_100 section_padding_bottom_100" id="emailVerified">
    <div class="container">
        <div class="row">
            <div class="col-sm-8 col-md-8 col-sm-offset-2 col-md-offset-2">													
                <h3 class="text-center">Add Wallet Address</h3>
                <form class="form-horizontal checkout shop-checkout" role="form" action="<?php echo base_url('dashboard/addWallet'); ?>" method="post" id="formWallet">
                    <input type="hidden" name="url" value="<?php echo $url;?>"/>
                    <?php // print_r (json_decode($userData->waddress)); die;?>
                    <div class="form-group validate-required" id="billing_first_name_field"> <label for="billing_first_name" class="col-sm-3 control-label">
                            <span class="grey">Bitcoin </span>
                            <span class="required">*</span>
                        </label>
                        <div class="col-sm-9"> <input type="text" class="form-control " name="billing_bitcoin" id="billing_bitcoin" placeholder="" value=""> </div>
                    </div>
                    <div class="form-group validate-required" id="billing_last_name_field"> <label for="billing_last_name" class="col-sm-3 control-label">
                            <span class="grey">Litecoin</span>
                            <span class="required">*</span>
                        </label>
                        <div class="col-sm-9"> <input type="text" class="form-control " name="billing_litecoin" id="billing_litecoin" placeholder="" value=""> </div>
                    </div>
                    <div class="form-group" id="billing_company_field"> <label for="billing_company" class="col-sm-3 control-label">
                            <span class="grey">Ethereum</span>
                        </label>
                        <div class="col-sm-9"> <input type="text" class="form-control " name="billing_ethereum" id="billing_ethereum" placeholder="" value=""> </div>
                    </div>
                    <div class="form-group address-field validate-required" id="billing_address_fields"> <label for="billing_address_1" class="col-sm-3 control-label">
                            <span class="grey">Bitcoin Cash </span>
                            <span class="required">*</span>
                        </label>
                        <div class="col-sm-9"> <input type="text" class="form-control " name="billing_bitcoincash" id="billing_bitcoincash" placeholder="" value=""> </div>
                    </div>

                    <div class="form-group address-field validate-required" id="billing_city_field"> <label for="billing_city" class="col-sm-3 control-label">
                            <span class="grey">Ripple</span>
                            <span class="required">*</span>
                        </label>
                        <div class="col-sm-9"> <input type="text" class="form-control " name="billing_ripple" id="billing_ripple" placeholder="" value=""> </div>
                    </div>
                    <div class="form-group address-field validate-state" id="billing_state_field"> <label for="billing_state" class="col-sm-3 control-label">
                            <span class="grey">Cardano</span>
                        </label>
                        <div class="col-sm-9"> <input type="text" class="form-control " value="" placeholder="" name="billing_cardano" id="billing_cardano"> </div>
                    </div>
                    <div class="col-sm-12 text-right">
                        <span class="grey" id="errWallet" style="color:red;"></span>
                        <span class="grey" id="addWallet" style="color:green;"></span>
                        <input type="hidden" name="userID" id="hiddenUserId" value="<?php echo $user->id ?>">
                        <button type="submit" class="theme_button color1" >Save & Proceed</button> </div>
                        <button type="button" class="theme_button inverse" id="skipStep">Skip</button> </div>

                </form>
                <div class="col-sm-9 col-sm-offset-3">
                    <p>Don't have any wallet address? </p>
                    <div class="row">
                        <div class="col-sm-4">
                            <a href=""> Get wallet Address</a>
                        </div>
                        <div class="col-sm-4">
                            <a href=""> how it works?</a>
                        </div>
                        <div class="col-sm-4">
                            <a href=""> Watch Video</a>
                        </div>
                    </div>

                </div>
                <p>Incase you do not have Wallet address, Please Refer to the easily available wallet/exchange links below <a href="<?php echo base_url('walletrisk') ?>">Click Here</a></p>
            </div>
        </div>
    </div>
</section>
