<style>  
    #sucess{
        color:green;
    }
</style> 
<section class="page_breadcrumbs cs gradient background_cover color_overlay section_padding_top_65 section_padding_bottom_65">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 text-center">
                <h2>Login</h2>							
            </div>
        </div>
    </div>
</section>			
<section class="ls section_padding_top_100 section_padding_bottom_100" id="reviewPage">
    <div class="container">
        <?php if ($this->session->flashdata('Password_reset_message')) {
                        echo "<span><h4 id='sucess'>Password Updated Successfully.</h4></span>";
                    }
                    ?>
        <div class="row">
            <form class="login-form" role="form" action="<?php echo base_url('login/action');?>" method="post" id="loginForm">
                <div class="col-sm-12">
                    <div class="form-group validate-required" id="billing_first_name_field"> <label for="billing_first_name" class="control-label">
                            <span class="grey">Email</span>
                            <span class="required">*</span>
                        </label> <input type="text" class="form-control " name="billing_email" id="billing_email" placeholder="">  </div>
                         <span id="errEmail" style="color:red;font-size:13px;margin-bottom: 5px !important;"></span>
                    <div class="form-group" id="billing_company_field"> <label for="billing_company" class="control-label">
                            <span class="grey">Password</span>
                            <span class="required">*</span>
                        </label><input type="password" class="form-control " name="billing_password" id="billing_password"> </div>
                        <span id="errPassword" style="color:red;font-size:13px;margin-bottom: 5px !important;"></span>
                </div>
                <div class="col-sm-12">
                    <div class="checkbox">
                        <label><input type="checkbox" value="true" name="terms" class="product-list1" id="terms_con">I hereby accept <a href="<?php echo base_url('terms-conditions.pdf'); ?>" target="_blank">Terms & Conditions</a></label><br/>
                        <span id="errTermsLogin" style="color:red;font-size:13px;margin-bottom: 5px !important;"></span>
                        <div class="g-recaptcha" data-sitekey="6LedxkAUAAAAAGmnzApZfL0lqTKsGd2YUYRx41in"></div>
                    </div>
                </div>
                <div class="col-sm-12 text-center"> 
                    <div class="errormsg" style="color:red;font-size:13px;margin-bottom: 5px !important;"></div>
                    <a href="<?php echo base_url('login/forgetPasswords');?>" style="margin-right: 64px;">Forgot Password</a>
                    <button type="submit" class="theme_button wide_button color1">login</button> </div>
                
            </form>
            <div class="col-sm-12 text-center">
                <p>New? <a href="<?php echo base_url('registration');?>">Create New Account</a></p>
            </div>

        </div>
    </div>
</section>
