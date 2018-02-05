<style>
    .loader-wrapper {
        background: rgba(0, 0, 0, 0.81);
        width: 100%;
        height: 100%;
        overflow: hidden;
        position: fixed;
        z-index: 999;
        /*    display: none;*/
    }
</style>
<div class="loader-wrapper" style="display: none;"><div class="loader" ></div></div>
<section class="page_breadcrumbs cs gradient background_cover color_overlay section_padding_top_65 section_padding_bottom_65">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 text-center">
                <h2>Create Free Account</h2>						
            </div>
        </div>
    </div>
</section>

<section class="ls section_padding_top_100 section_padding_bottom_100">
    <div class="container">
        <div class="row" id="registerGcc">
            <form class="signup-form" role="form" id="registrationForm" method="post">
                <div class="col-sm-12"><span>Already a Member ! <a href="<?php echo base_url('login'); ?>">Login</a></span></div>
                <div class="col-sm-4">
                    <div class="form-group validate-required" id="billing_first_name_field"> <label for="billing_first_name" class="control-label">
                            <span class="grey">First Name</span>
                            <span class="required">*</span>
                        </label> <input type="text" class="form-control " name="first_name" id="billing_first_name" placeholder=""> </div>
                    <span id="errFname" style="color:red;font-size:13px;margin-bottom: 5px !important;"></span>
                </div>
                <div class="col-sm-4">
                    <div class="form-group" id="billing_middle_field"> <label for="billing_middle" class="control-label">
                            <span class="grey">Middle Name</span>
                        </label> <input type="text" class="form-control " name="middle_name" id="billing_middle_name" placeholder=""></div>
                    <span id="errMname" style="color:red;font-size:13px;margin-bottom: 5px !important;"></span>


                </div>
                <div class="col-sm-4">
                    <div class="form-group" id="billing_last_field"> <label for="billing_last" class="control-label">
                            <span class="grey">Last Name</span>
                        </label> <input type="text" class="form-control " name="last_name" id="billing_last_name" placeholder=""> </div>
                    <span id="errLname" style="color:red;font-size:13px;margin-bottom: 5px !important;"></span>
                </div>

                <!-- ---------------------- -->
                <div class="col-sm-6">
                    <div class="form-group validate-required" id="billing_first_name_field"> <label for="billing_first_name" class="control-label">
                            <span class="grey">Email</span>
                            <span class="required">*</span>
                        </label> <input type="text" class="form-control " name="billing_email" id="billing_email" placeholder=""> </div>
                    <span id="errEmail" style="color:red;font-size:13px;margin-bottom: 5px !important;"></span>
                </div>
                <div class="col-sm-6">
                    <div class="form-group" id="billing_mobile_field"> <label for="billing_mobile" class="control-label">
                            <span class="grey">Mobile Number</span>
                        </label> <input type="text" class="form-control " name="billing_phone" id="billing_phone" placeholder=""> </div>
                    <span id="errNumber" style="color:red;font-size:13px;margin-bottom: 5px !important;"></span>
                </div>


                <!-- ------------------------ -->
                <div class="col-sm-6">
                    <div class="form-group" id="billing_mobile_field"> <label for="billing_password" class="control-label">
                            <span class="grey">Password</span>
                        </label> <input type="password" class="form-control " name="billing_password" id="billing_password" placeholder=""> </div>
                    <span id="errPassword" style="color:red;font-size:13px;margin-bottom: 5px !important;"></span>
                </div>
                <div class="col-sm-6">
                    <div class="form-group" id="billing_rpassword"> <label for="billing_rpassword" class="control-label">
                            <span class="grey">Renter Password</span>
                        </label> <input type="password" class="form-control " name="renter_password" id="billing_renter_password" placeholder=""> </div>
                    <span id="errRpassword" style="color:red;font-size:13px;margin-bottom: 5px !important;"></span>
                </div>


                <!-- --------------------------- -->

                <div class="col-sm-4">
                    <div class="form-group validate-required" id="billing_city_field"> <label for="billing_city_field" class="control-label">
                            <span class="grey">City</span>
                            <span class="required">*</span>
                        </label> <input type="text" class="form-control " name="city" id="billing_city_name" placeholder=""> </div>
                    <span id="errCity" style="color:red;font-size:13px;margin-bottom: 5px !important;"></span>
                </div>
                <div class="col-sm-4">
                    <div class="form-group" id="billing_state"> <label for="billing_state" class="control-label">
                            <span class="grey">State</span>
                        </label> <input type="text" class="form-control " name="state" id="billing_state_name" placeholder=""></div>
                    <span id="errState" style="color:red;font-size:13px;margin-bottom: 5px !important;"></span>


                </div>
                <div class="col-sm-4">
                    <div class="form-group" id="billing_postal"> <label for="billing_postal" class="control-label">
                            <span class="grey">Postal Code</span>
                        </label> <input type="text" class="form-control " name="postal" id="billing_postal_code" placeholder=""> </div>
                    <span id="errPostal" style="color:red;font-size:13px;margin-bottom: 5px !important;"></span>
                </div>

                <!-- --------------------------- -->

                <div class="col-sm-12">
                    <div class="form-group" id="billing_mobile_field"> <label for="billing_address" class="control-label">
                            <span class="grey">Address</span>
                        </label> <input type="text" class="form-control " name="billing_address" id="billing_address" placeholder=""> </div>
                    <span id="errAddress" style="color:red;font-size:13px;margin-bottom: 5px !important;"></span>
                </div>
                <!-- --------------------------- -->
                <div class="col-sm-12">
                    <p>Please upload One Valid identity Document</p>
                    <hr>

                    <div class="col-sm-4">
                        <div class="form-group">
                            <div class="radio"> <label>
                                    <input type="radio" name="options" value="1" id="radioAadhar" checked="checked">Aadhar Card
                                </label> </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <div class="radio"> <label>
                                    <input type="radio" name="options" value="2" id="radioPan">PAN Card
                                </label> </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <div class="radio"> <label>
                                    <input type="radio" name="options" value="3" id="radioPassport">Passport
                                </label> </div>
                        </div>
                    </div>

                </div>
                <div id="adarNumber">
                    <div class="col-sm-6">
                        <div class="form-group" id="billing_aadhar_field"> <label for="billing_aadhar" class="control-label">
                                <span class="grey" id="showCard">Enter Aadhar Number</span>
                            </label> <input type="text" class="form-control " name="billing_company" id="billing_company" placeholder="" value=""> </div>
                        <span id="errAadhar" style="color:red;font-size:13px;margin-bottom: 5px !important;"></span>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group" id="billing_image_field"> <label for="billing_image" class="control-label">
                                <span class="grey" id="uploadAdharMessage">Upload Aadhar Card Photocopy</span>
                            </label> <input type="file" name="userfile" id="filePhoto"> </div>
                        <span id="errPhoto" style="color:red;font-size:13px;margin-bottom: 5px !important;"></span>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="checkbox">
                        <label><input type="checkbox" value="true" name="terms" class="product-list1" id="terms_con">I hereby accept <a href="<?php echo base_url('terms-conditions.pdf'); ?>" target="_blank">Terms & Conditions</a></label><br/>
                        <span id="errTerms" style="color:red;font-size:13px;margin-bottom: 5px !important;"></span>
                        <div class="g-recaptcha" data-sitekey="6LedxkAUAAAAAGmnzApZfL0lqTKsGd2YUYRx41in"></div>
                    </div>
                </div>

                <!-- --------------------------------- -->
                <div class="col-sm-12 errormsg"></div>
                <div class="col-sm-12 text-center"> 
                    <input type="submit" class="theme_button wide_button color1 topmargin_40" value="Create Account">
                    <span>Already a Member ! <a href="<?php echo base_url('login'); ?>">Login</a></span></div>
            </form>
        </div>
    </div>
</section>