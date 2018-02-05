<footer class="page_footer ds texture_bg section_padding_top_65 section_padding_bottom_65 columns_padding_25 table_section">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-12 col-md-push-4 text-center">
                <div class="widget widget_text">
                    <a href="<?php echo base_url('home'); ?>" class="logo"></a>
                    <h3 class="widget-title topmargin_15">GCC Blockstat</h3>
                    <p class="bottommargin_10">Buy and Sell Bitcoin, Litecoin and other crypto tokens Quickly and Easily in Canada (CAD) &amp; now in Indian currency (INR)</p>
                    <p class="small-text grey colorlinks"> GCC blockstat,  DOBRINSKY DR WINNIPEG MANITOBA <br>Canada - R2P 2N1 <a href="mailto: contact@grabcryptocoins.com"> contact@grabcryptocoins.com</a> </p>
                    <p class="topmargin_25">
                        <a href="https://www.facebook.com/GCCblockstat" class="social-icon color-icon rounded-icon border-icon soc-facebook"></a>
                        <a href="https://twitter.com/GCCblockstat" class="social-icon color-icon rounded-icon border-icon soc-twitter"></a>
                        <a href="#" class="social-icon color-icon rounded-icon border-icon soc-youtube"></a> </p>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 col-md-pull-4 text-center">
                <div class="widget widget_recent_entries widget_media_margin">
                    <h3 class="widget-title">Quick Links</h3>
                    <ul class="greylinks">
                        <li>

                            <p class="inline-content darklinks small-text no-spacing"> <a href="<?php echo base_url('about'); ?>">
                                    <i class="rt-icon2-calendar4 rightpadding_5 highlight"></i>
                                    <time datetime="2017-10-03T08:50:40+00:00">
                                        about us 
                                    </time>
                                </a> <a href="<?php echo base_url('about'); ?>">
                                    <i class="rt-icon2-user rightpadding_5 highlight"></i>
                                    team
                                </a> <a href="<?php echo base_url('value'); ?>">
                                    <i class="rt-icon2-clip rightpadding_5 highlight"></i>
                                    values 
                                </a> </p>
                        </li>
                        <li>

                            <p class="darklinks small-text no-spacing"> <a href="<?php echo base_url('terms-conditions.pdf'); ?>"  target="_blank">
                                    <i class="rt-icon2-calendar4 rightpadding_5 highlight"></i>
                                    <time datetime="2017-10-03T08:50:40+00:00">
                                        terms & conditions
                                    </time>
                                </a> <a href="<?php echo base_url('launchpad'); ?>" style="padding-left:10px;">
                                    <i class="rt-icon2-user rightpadding_5 highlight"></i>
                                    announcements
                                </a>  </p>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 text-center">
                <div class="widget widget_mailchimp widget_media_margin">
                    <h3 class="widget-title">Newsletter</h3>
                    <form class="signup" action="" method="post" id="newsletterSignup">
                        <p class="bottommargin_30">Subscribe to our mailing list to receive new updates.</p>
                        <div class="form-group-wrap">
                            <div class="form-group">
                                <label for="footer-mailchimp" class="sr-only">Enter your email here</label>
                                <input name="email" type="email" id="newsletter_email" class="form-control" placeholder="Email Address">
                            </div>
                            <button type="submit" class="theme_button no_bg_button color1" id="">Subscribe</button>
                        </div>
                        <div class="response" id="news_response"></div> 
                    </form>
                </div>
            </div>
        </div>
    </div>
</footer>
<section class="ls page_copyright section_padding_15">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 text-center">
                <p class="small-text thin">&copy; Copyright 2017. All Rights Reserved.</p>
            </div>
        </div>
    </div>
</section>
</div>
<!-- eof #box_wrapper -->
</div>
<!-- eof #canvas -->
<script src="<?php echo base_url("assets/js/compressed.js"); ?>"></script>
<script src="<?php echo base_url("assets/js/main.js"); ?>"></script>

<!-- Google Map Script -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDTwYSMRGuTsmfl2z_zZDStYqMlKtrybxo"></script>
</body>

</html>

<script type="text/javascript">
    $(document).ready(function () {
        $('#skipStep').click(function () {
            $('#emailVerified').html('');
            $('#emailVerified').load('<?php echo base_url('Registration/profileReview'); ?>');
        });
        $('form#loginForm').submit(function (event) {
            event.preventDefault();
            $('.errormsg').html('');
            var error = 0;
            var email = $('#billing_email').val();
            var reEmail = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
            var password = $('#billing_password').val();
            var captcha=$('#g-recaptcha-response').val();
            
            if(captcha=="" || !captcha){
                $('.errormsg').html('<span style="color:red;">Please select captcha<span>');
                return false;
            }
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
            var burl = '<?php echo base_url('Login/action'); ?>';
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
                        }else{
                             $('#reviewPage').html(response);
                        }
                    }
                });
                event.preventDefault();
            }
        });
    });
    $(document).ready(function () {
        $('form#registrationForm').submit(function (event) {
            event.preventDefault();
            $('.errormsg').html('');
            var error = 0;
            var captcha=$('#g-recaptcha-response').val();
            var fname = $('#billing_first_name').val();
            var mname = $('#billing_middle_name').val();
            var lname = $('#billing_last_name').val();
            var email = $('#billing_email').val();
            var mobile = $('#billing_phone').val();
            var radio1 = $("input[name='options']:checked").val();
            var billing_company = $('#billing_company').val();
            var photot = $('#filePhoto').val();
            var address = $('#billing_address').val();
            var password = $('#billing_password').val();
            var renterpassword = $('#billing_renter_password').val();
            var city = $('#billing_city_name').val();
            var state = $('#billing_state_name').val();
            var postal = $('#billing_postal_code').val();
            var reEmail = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
            var regpan = /^([a-zA-Z]){5}([0-9]){4}([a-zA-Z]){1}?$/;
            //////////////
            if(captcha=="" || !captcha){
                $('.errormsg').html('<span style="color:red;">Please select captcha<span>');
                return false;
            }
            if ($("#terms_con").prop('checked') == false) {
                $('#errTerms').text('Please accept terms and conditions');
                error = 1;
            } else {
                $('#errTerms').hide();
            }
            if (password == '' || password == ' ') {
                $('#errPassword').text('Please enter password');
                error = 1;
            } else {
                $('#errPassword').hide();
            }
            if (renterpassword == '' || renterpassword == ' ') {
                $('#errRpassword').text('Please re enter the password ');
                error = 1;
            } else if (renterpassword != password) {
                $('#errRpassword').show();
                $('#errRpassword').text('Confirm password and password not matched');
                error = 1;
            } else {
                $('#errRpassword').hide();
            }

            ///////////
            if (city == '' || city == ' ') {
                $('#errCity').text('Please enter city');
                error = 1;
            } else if (!(/[a-zA-Z]+$/.test(city))) {
                $('#errCity').text('Please enter alphabet characters only');
                error = 1;
            } else {
                $('#errCity').hide();
            }

            if (state == '' || state == ' ') {
                $('#errState').text('Please enter state name');
                error = 1;
            } else if (!(/[a-zA-Z]+$/.test(state))) {
                $('#errState').text('Please enter alphabet characters only');
                error = 1;
            } else {
                $('#errState').hide();
            }
            if (postal == '' || postal == ' ') {
                $('#errPostal').text('Please enter postal code');
                error = 1;
            } else if (isNaN(postal)) {
                $('#errPostal').text("Please enter the numeric value");
                error = 1;
            } else if ($.trim(postal).length != 6) {
                $('#errPostal').text('Please enter 6 digit postal code');
                error = 1;
            } else {
                $('#errPostal').hide();
            }

            ////////////
            if (fname == '' || fname == '') {
                $('#errFname').text('Please enter Name');
                error = 1;
            } else if (!(/[a-zA-Z]+$/.test(fname))) {
                $('#errFname').text('Please enter alphabet characters only');
                error = 1;
            } else {
                $('#errFname').hide();
            }

            if (mname != '') {
                if (!(/[a-zA-Z]+$/.test(mname))) {
                    $('#errMname').text('Please enter alphabet characters only');
                    error = 1;
                } else {
                    $('#errMname').hide();
                }
            }

            if (lname == '' || lname == '') {
                $('#errLname').text('Please enter last name');
                error = 1;
            } else if (!(/[a-zA-Z]+$/.test(lname))) {
                $('#errLname').text('Please enter alphabet characters only');
                error = 1;
            } else {
                $('#errLname').hide();
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
            if (mobile == "" || mobile == " ") {
                $('#errNumber').text('Please enter mobile number');
                error = 1;
            } else if (isNaN(mobile)) {
                $('#errNumber').text("Please enter the numeric value");
                error = 1;
            } else if ($.trim(mobile).length != 10) {
                $('#errNumber').text('Please enter 10 Digit mobile number');
                error = 1;
            } else {
                $('#errNumber').hide();
            }

            if (radio1 == '1') {
                if (billing_company == '' || billing_company == '') {
                    $('#errAadhar').text('Please enter aadhar card');
                    error = 1;
                } else if (isNaN(billing_company)) {
                    $('#errAadhar').text("Please enter the numeric value");
                    error = 1;
                } else if ($.trim(billing_company).length != '12') {
                    $('#errAadhar').text('Please enter 12 digit number');
                    error = 1;
                } else {
                    $('#errAadhar').hide();
                }
                if (!(/\.(gif|jpg|jpeg|tiff|png)$/i).test(photot)) {
                    $('#errPhoto').text('Please select a valid file format(gif,jpg,jpeg,png,pdf)');
                    error = 1;
                } else if (photot == '') {
                    $('#errPhoto').text('You must select an adhar copy)');
                    error = 1;
                } else {
                    $('#errPhoto').hide();
                }
            }
            if (radio1 == '2') {
                if (billing_company == '' || billing_company == '') {
                    $('#errAadhar').text('Please enter pan card');
                    error = 1;
                }
                // else if ($.trim(billing_company).length != '16') {
                //    $('#errAadhar').text('Pan Card  exceed 16 digit');
                //error = 1;
                //}
                else if (!regpan.test(billing_company)) {
                    $('#errAadhar').text('Please enter correct pan card number');
                    error = 1;
                } else {
                    $('#errAadhar').hide();
                }
                if (!(/\.(gif|jpg|jpeg|tiff|png)$/i).test(photot)) {
                    $('#errPhoto').text('Please select a valid file format(gif,jpg,jpeg,png,pdf)');
                    error = 1;
                } else if (photot == '') {
                    $('#errPhoto').text('You must select an pan card copy)');
                    error = 1;
                } else {
                    $('#errPhoto').hide();
                }
            }
//            var varTwo = billing_company.substring(0, 1);
//            var VarThree = billing_company.substring(2, 8);
//            var passCheck = /^\d+$/.test(varTwo);
//            var passrCheck = /^[a-zA-Z\s]+$/.test(VarThree);
//            var check = /[0-9]{2}[a-zA-Z]{7}/;
            if (radio1 == '3') {
                if (billing_company == '' || billing_company == '') {
                    $('#errAadhar').text('Please enter passport number');
                    error = 1;
                }
//                else if (!check.test(billing_company)) {
//                    $('#errAadhar').show();
//                    $('#errAadhar').text('Please enter correct passport Number Example 12ABCDEGH');
//                    error = 1;
//                }
                else if ($.trim(billing_company).length > '10') {
                    $('#errAadhar').show();
                    $('#errAadhar').text('Please enter max 10 digit number');
                    error = 1;
                }
                else {
                    $('#errAadhar').hide();
                }
                if (!(/\.(gif|jpg|jpeg|tiff|png)$/i).test(photot)) {
                    $('#errPhoto').text('Please select a valid file format(gif,jpg,jpeg,png,pdf)');
                    error = 1;
                } else if (photot == '') {
                    $('#errPhoto').text('You must select an passport copy)');
                    error = 1;
                } else {
                    $('#errPhoto').hide();
                }
            }
            if (address == '' || address == '') {
                $('#errAddress').text('Please enter Address');
                error = 1;
            } else {
                $('#errAddress').hide();
            }
            if (error) {
                $('.errormsg').html('<span style="color:red;">Please fill all required fields<span>');
            } else {
                $('.errormsg').html('');
                $(".loader-wrapper").css('display', 'block');
            }

            var formData = new FormData(this);
            var burl = '<?php echo base_url('Registration/action'); ?>';
            if (error == 0) {
                $.ajax({
                    type: "POST",
                    url: burl,
                    processData: false,
                    contentType: false,
                    data: formData,
                    success: function (response) {
                        if (response == '2') {
                            $('.errormsg').html('<span color="red">Server error in submitting the form! Please try again</span>');
                        } else if (response == '3') {
                            $('#errEmail').show();
                            $('#errEmail').html('<span style="color:red;">Email already registered.<span>');
                        } else if (response == '4') {
                            $('#errMobile').show();
                            $('#errMobile').html('<span style="color:red;">Mobile already registered.<span>');
                        } else {
                            $('#registerGcc').html('');
                            $('#registerGcc').html(response);
                            window.location.href = '<?php echo base_url('registration');?>#registerGcc';
                        }
                        $(".loader-wrapper").css('display', 'none');
                    }
                });
                event.preventDefault();
            }
        });

    });
</script>
<script>
    $('#registerGCC').click(function (event) {
        $('.errormsg').html('');
        var error = 0;
        var fname = $('#billing_first_name').val();
        var mname = $('#billing_middle_name').val();
        var lname = $('#billing_last_name').val();
        var email = $('#billing_email').val();
        var mobile = $('#billing_phone').val();
        var radio1 = $("input[name='options']:checked").val();
        var photot = $('#filePhoto').val();
        var address = $('#billing_address').val();
        var password = $('#billing_password').val();
        var billing_company = $('#billing_company').val();
        var reEmail = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
        if (fname == '' || fname == '') {
            $('#errFname').text('Please enter Name');
            error = 1;
        } else if (!isNaN(fname)) {
            $('#errFname').text('Please enter alphabet characters only');
            error = 1;
        } else {
            $('#errFname').hide();
        }

        if (mname) {
            if (!isNaN(mname)) {
                $('#errMname').text('Please enter alphabet characters only');
                error = 1;
            } else {
                $('#errMname').hide();
            }
        }

        if (lname) {
            if (!isNaN(lname)) {
                $('#errLname').text('Please enter alphabet characters only');
                error = 1;
            } else {
                $('#errLname').hide();
            }
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

        if (mobile == "" || mobile == " ") {
            $('#errNumber').text('Please enter mobile number');
            error = 1;
        } else if (isNaN(mobile)) {
            $('#errNumber').text("Please enter the numeric value");
            error = 1;
        } else if ($.trim(mobile).length != 10) {
            $('#errNumber').text('Please enter 10 digit mobile number');
            error = 1;
        } else {
            $('#errNumber').hide();
        }

        if (radio1 == '1') {
            if (billing_company == '' || billing_company == '') {
                $('#errAadhar').text('Please enter aadhar card');
                error = 1;
            } else if (isNaN(billing_company)) {
                $('#errAadhar').text("Please enter the numeric value");
                error = 1;
            } else {
                $('#errAadhar').hide();
            }
            if (!(/\.(gif|jpg|jpeg|tiff|png)$/i).test(photot)) {
                $('#errPhoto').text('You must select an file only(gif,jpg,jpeg,png)');
                error = 1;
            } else if (photot == '') {
                $('#errPhoto').text('You must select an aadhar card copy');
                error = 1;
            } else {
                $('#errPhoto').hide();
            }
        }

        if (radio1 == '2') {
            if (billing_company == '' || billing_company == '') {
                $('#errAadhar').text('Please enter Pan Card');
                error = 1;
            } else if (isNaN(billing_company)) {
                $('#errAadhar').text("Please enter the numeric value");
                error = 1;
            } else {
                $('#errAadhar').hide();
            }
            if (!(/\.(gif|jpg|jpeg|tiff|png)$/i).test(photot)) {
                $('#errPhoto').text('You must select an file only(gif,jpg,jpeg,png)');
                error = 1;
            } else if (photot == '') {
                $('#errPhoto').text('You must select an Pan Card Photocoy)');
                error = 1;
            } else {
                $('#errPhoto').hide();
            }
        }

        if (radio1 == '3') {
            if (billing_company == '' || billing_company == '') {
                $('#errAadhar').text('Please enter passport card');
                error = 1;
            } else if (isNaN(billing_company)) {
                $('#errAadhar').text("Please enter the numeric value");
                error = 1;
            } else {
                $('#errAadhar').hide();
            }
            if (!(/\.(gif|jpg|jpeg|tiff|png)$/i).test(photot)) {
                $('#errPhoto').text('You must select an file only(gif,jpg,jpeg,png)');
                error = 1;
            } else if (photot == '') {
                $('#errPhoto').text('You must select an passport copy');
                error = 1;
            } else {
                $('#errPhoto').hide();
            }
        }

        if (address == '' || address == '') {
            $('#errAddress').text('Please enter address');
            error = 1;
        } else {
            $('#errAddress').hide();
        }

        if (error) {
            $('.errormsg').html('<span style="color:red;">Please fill all required fields<span>');
            return false;
        } else {
            $('.errormsg').html('');
            $(".loader-wrapper").css('display', 'block');
        }

        var formData = new FormData(this);
        if (error == '0') {
            $.ajax({
                url: '<?php echo base_url('Registration/action'); ?>',
                data: formData,
                type: "POST",
                success: function (response) {
                    if (response == '2') {
                        $('.errormsg').html('<span color="red">Server error in submitting the form! Please try again</span>');
                    } else if (response == '3') {
                        $('#errEmail').html('<span style="color:red;">Email is already register.<span>');
                    } else if (response == '4') {
                        $('#errEmail').html('<span style="color:red;">Mobile number is already register.<span>');
                    } else {
                        alert('thankyou');
//                            $('.form-outline').html('');
//                            $('.form-outline').html(response);
//                            window.location.href = '<?php // echo base_url();       ?>';
                    }
                    $(".loader-wrapper").css('display', 'none');
                }
            });

        }
        event.preventDefault();
        return false;
    });
</script>
<script type="text/javascript">
    $(document).ready(function () {
        $('form#newsletterSignup').submit(function (event) {
            
            $('#news_response').html('');
            var reEmail = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
            var emails = $('#newsletter_email').val();
            
            if (emails == "" || emails == " ") {
                $('#news_response').text('Please enter your email id');
                return false;
            } else if (emails.length > 100) {
                $('#news_response').text('Email cannot exceed 100 characters');
                return false;
            } else if (!reEmail.test(emails)) {
                $('#news_response').text('Invalid Email');
                return false;
            }

            $.ajax({
                type: "POST",
                url: '<?php echo base_url('login/newsletter'); ?>',
                data: {email: emails},
                success: function (response) {
                    $('#news_response').html(response);
                    $('#newsletter_email').val('');
                }
            });
            event.preventDefault();

        });
        $('form#forgetSubmit').submit(function (event) {
            event.preventDefault();
            $('.errormsg').html('');
            var error = 0;
            var emails = $('#emails').val();
            var reEmail = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;

            if (emails == "" || emails == " ") {
                $('#errEmails').text('Email cannot be empty');
                error = 1;
            } else if (emails.length > 100) {
                $('#errEmails').text('Email cannot exceed 100 characters');
                error = 1;
            } else if (!reEmail.test(emails)) {
                $('#errEmails').text('Invalid Email');
                error = 1;
            } else {
                $('#errEmails').hide();
            }
            if (error) {
                $('.errormsg').html('<span style="color:red;">Please fill all required fields<span>');
                return false;
            } else {
                $('.errormsg').html('');
            }

            var formData = new FormData(this);
            var burl = '<?php echo base_url('Login/forgetPassword'); ?>';
            if (error == 0) {
                $.ajax({
                    type: "POST",
                    url: burl,
                    processData: false,
                    contentType: false,
                    data: formData,
                    success: function (response) {
                        if (response == '3') {
                            $('.errEmailnot').html('<span style="color:red;">Email does not exist.<span>');
                        } else if (response == '4') {
                            $('.errEmailnot').html('<span style="color:green;">Please check your email for password reset link.<span>');
                        }
                    }
                });
                event.preventDefault();
            }
        });
    });
    $(document).ready(function () {
        $('form#formWallet').submit(function (event) {
            event.preventDefault();
            $('.errormsg').html('');
            var error = 0;
            var bitcoin = $("#billing_bitcoin").val();
            var litecoin = $("#billing_litecoin").val();
            var ethereum = $("#billing_ethereum").val();
            var bitcoincash = $("#billing_bitcoincash").val();
            var ripple = $("#billing_ripple").val();
            var cardano = $("#billing_cardano").val();
            var hiddenUserId = $("#hiddenUserId").val();

            if (bitcoin == '' && litecoin == '' && ethereum == '' && bitcoincash == '' && ripple == '' && cardano == '') {
                $('#errWallet').text('Please enter Atleast one Wallet Address');
                error = 1;
            } else {
                $('#errWallet').hide();
            }

            var formData = new FormData(this);
            var burl = '<?php echo base_url('Registration/addWalletAddress'); ?>';
            if (error == 0) {
                $.ajax({
                    type: "POST",
                    url: burl,
                    processData: false,
                    contentType: false,
                    data: formData,
                    success: function (response) {
                        if (response == '2') {
                            $('#errWallet').show();
                            $('#errWallet').text('Invalid User');
                        } else {
                            $('#emailVerified').html('');
                            $('#emailVerified').html(response);
                        }
                    }
                });
                event.preventDefault();
            }
        });
    });
    $(document).ready(function () {
        $('form#formWalletDash').submit(function (event) {
            event.preventDefault();
            $('.errormsg').html('');
            var error = 0;
            var bitcoin = $("#coin_BTC").val();
            var litecoin = $("#coin_LTC").val();
            var ethereum = $("#coin_ETH").val();
            var bitcoincash = $("#coin_BCH").val();
            var ripple = $("#coin_XRP").val();
            var cardano = $("#coin_ADA").val();
            var hiddenUserId = $("#hiddenUserId").val();

            if (bitcoin == '' && litecoin == '' && ethereum == '' && bitcoincash == '' && ripple == '' && cardano == '') {
                $('#errWallet').text('Please enter Atleast one Wallet Address');
                error = 1;
            } else {
                $('#errWallet').hide();
            }

            var formData = new FormData(this);
            var burl = '<?php echo base_url('Dashboard/addWalletAddress'); ?>';
            if (error == 0) {
                $.ajax({
                    type: "POST",
                    url: burl,
                    processData: false,
                    contentType: false,
                    data: formData,
                    success: function (response) {
                        if (response == '2') {
                            if(bitcoin != ''){
                                $('#coin_BTC').attr('readonly','true');
                            }
                            if(litecoin != ''){
                                $('#coin_LTC').attr('readonly','true');
                            }
                            if(ethereum != ''){
                                $('#coin_ETH').attr('readonly','true');
                            }
                            if(bitcoincash != ''){
                                $('#coin_BCH').attr('readonly','true');
                            }
                            if(ripple != ''){
                                $('#coin_XRP').attr('readonly','true');
                            }
                            if(cardano != ''){
                                $('#coin_ADA').attr('readonly','true');
                            }
                            $('#addWallet').text("Wallet Address Added Successfully!");
                            $("#addWallet").show();
                            setTimeout(function() {
                                $("#addWallet").hide(); 
                            }, 5000);
                        }
                    }
                });
                event.preventDefault();
            }
        });
    });
    $(document).ready(function () {
        $('form#formResetPassword').submit(function (event) {
          event.preventDefault();
            $('.errormsg').html('');
            var error = 0;
            var oldpassword = $("#old_loginpassword").val();
            var password = $("#new_loginpassword").val();
            var repassword = $("#new_reloginpassword").val();
            
            if (oldpassword == '' && oldpassword == '') {
                $('#errOldPassword').text('Please enter Old Password');
                error = 1;
            } else {
                $('#errOldPassword').hide();
            }
            if (password == '' && password == '') {
                $('#errResetPassword').text('Please enter New Password');
                error = 1;
            } else {
                $('#errResetPassword').hide();
            }
            if (repassword == '' && repassword == '') {
                $('#errResetNewPassword').text('Please Re Enter New Password');
                error = 1;
            }else  if(password != repassword){
                $('#errResetNewPassword').show();
                $('#errResetNewPassword').text('New password and Re Enter Password do not Match.');
                error = 1;
            }else {
                $('#errResetNewPassword').hide();
            }

            var formData = new FormData(this);
            var burl = '<?php echo base_url('Dashboard/updatePassword'); ?>';
            
        if (error == 0) {
                $.ajax({
                    type: "POST",
                    url: burl,
                    processData: false,
                    contentType: false,
                    data: formData,
                    success: function (response) {
                        if (response == '1') {
                            $('#suceesPassword').html('Passsword Update Successfully!');
                        }else if(response == '4'){
                            $('#errorPassword').html('New Password and Old password is same.');
                        }else if(response == '3'){
                            $('#errorPassword').html('Old Password is incorrect.');
                        }
                    }
                });
                event.preventDefault();
            }
        });
    });
    $(document).ready(function () {
        $('form#paymentSubmit').submit(function (event) {
            var amount = $("#billing_payment").val();
            
            if (amount == '' && amount == '') {
                $('#errAmount').text('Enter Amount In INR');
                error = 1;
            } else if (isNaN(amount)) {
                $('#errAmount').text('Please enter numeric value only');
                error = 1;
            } else {
                $('#errAmount').hide();
            }
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function () {
        $('input[type="radio"]').click(function () {
//       $("input[name='options']:checked").val();
            var inputvalue = $(this).val();
            if (inputvalue == '1') {
                $("#showCard").html('Enter Aadhar Number');
                $("#uploadAdharMessage").html('Upload Aadhar Card Photocopy');
            } else if (inputvalue == '2') {
                $("#showCard").html('Enter Pan Number');
                $("#uploadAdharMessage").html('Upload Pan Card Photocopy');
            } else if (inputvalue == '3') {
                $("#showCard").html('Enter Passport Number');
                $("#uploadAdharMessage").html('Upload Passport Photocopy');
            }
        });
    });
    
</script>
