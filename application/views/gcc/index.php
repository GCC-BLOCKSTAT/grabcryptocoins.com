<?php
//if (!empty($_SESSION['uid'])) {
//    header("Location: device_confirmations.php");
//}

include('class/userClass.php');
$userClass = new userClass();

require_once './lib/GoogleAuthenticator.php';
$ga = new GoogleAuthenticator();
$secret = $ga->createSecret();

$errorMsgReg = '';
$errorMsgLogin = '';

?>
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
            <form class="login-form" role="form" action="<?php echo base_url('login/get');?>" method="post" id="loginFormAuth">
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
                <input type="hidden" name="scerter" value="<?php echo $secret;?>"/>
                <div class="col-sm-12">
                    <div class="checkbox">
                        <label><input type="checkbox" value="true" name="terms" class="product-list1" id="terms_con">I hereby accept <a href="<?php echo base_url('terms-conditions.pdf'); ?>" target="_blank">Terms & Conditions</a></label><br/>
                        <span id="errTermsLogin" style="color:red;font-size:13px;margin-bottom: 5px !important;"></span>
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
<script type="text/javascript">
    $('form#loginFormAuth').submit(function (event) {
            event.preventDefault();
            $('.errormsg').html('');
            var error = 0;
            var email = $('#billing_email').val();
            var reEmail = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
            var password = $('#billing_password').val();
            
            if ($("#terms_con").prop('checked') == false) {
                $('#errTermsLogin').text('Please accept terms and conditions');
                error = 1;
            } else {
                $('#errTermsLogin').hide();
            }
            if (email == "" || email == " ") {
                $('#errEmail').text('Email cannot be empty');
                error = 1;
            } else if (email.length > 100) {
                $('#errEmail').text('Email cannot exceed 100 characters');
                error = 1;
            } else if (!reEmail.test(email)) {
                $('#errEmail').text('Invalid Email');
                error = 1;
            } else {
                $('#errEmail').hide();
            }
            if (password == '' || password == ' ') {
                $('#errPassword').text('Please enter password');
                error = 1;
            } else if (50 <= $.trim(password).length >= 8) {
                $('#errPassword').text('Please enter min 8 digit');
                error = 1;
            } else {
                $('#errPassword').hide();
            }
            if (error) {
                $('.errormsg').html('<span style="color:red;">Please fill all required fields<span>');
                return false;
            } else {
                $('.errormsg').html('');
            }

            var formData = new FormData(this);
            var burl = '<?php echo base_url('Login/get'); ?>';
            if (error == 0) {
                $.ajax({
                    type: "POST",
                    url: burl,
                    processData: false,
                    contentType: false,
                    data: formData,
                    success: function (response) {
                        if (response == '2') {
                            window.location.href = '<?php echo base_url('dashboard'); ?>';
                        } else if (response == '6') {
                            $('#reviewPage').html('');
                            $('#reviewPage').load('<?php echo base_url('Registration/emailVerification'); ?>');
                        } else if (response == '3') {
                            $('.errormsg').html('<span style="color:red;">Email and Password Wrong!<span>');
                        } else if (response == '4') {
                            $('#reviewPage').html('');
                            $('#reviewPage').load('<?php echo base_url('Registration/profileReview'); ?>');
                        }
                    }
                });
                event.preventDefault();
            }
        });
    });
</script>