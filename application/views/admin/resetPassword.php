<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Grabcrypto Coins | Reset password</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- Bootstrap 3.3.2 -->
        <link href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- Font Awesome Icons -->
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
        <!-- iCheck -->

        <link href="<?php echo base_url(); ?>assets/plugins/iCheck/square/blue.css" rel="stylesheet" type="text/css" />

        <style>  
            #error{
                color:red;
            }
            #sucess{
                color:green;
            }
        </style>  
    </head>
    <body class="login-page">
        <div class="login-box">
            <div class="login-logo">
                <a href="<?php echo base_url(); ?>"><b>Grabcrypto </b>Coins</a>
            </div><!-- /.login-logo -->
            <div class="login-box-body">


                <p class="login-box-msg"><div id="sucess">
                    <?php if ($this->session->flashdata('Password_reset_message')) {
                        echo "Password Update Successfully.";
                    }
                    ?>
                </div>
                <div id="error">
                    <?php
                    if ($this->session->flashdata('error')) {
                        echo validation_errors();
                    }
                    if ($this->session->flashdata('Invalid_Token_Unauthorized_user')) {
                        echo "Invalid Token or Unauthorized user.";
                    }

                    if ($this->session->flashdata('password_not_match')) {
                        echo "Password and confirm password doesn't match.";
                    }
                    if ($this->session->flashdata('token_expired')) {
                        echo "Token Expired.";
                    }

                    if ($this->session->flashdata('Invalid_user')) {
                        echo "Invalid User.";
                    }
                    ?>
                </div>Please Enter Password</p>
                <form action="<?php echo base_url('admin/home/resetPassword'); ?>" method="post">
                    <div class="form-group has-feedback">
                        <input type="password" class="form-control" placeholder="Password" name="password"/>
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="password" class="form-control" placeholder="Confirm Password" name="confirmpassword"/>
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    </div>
                    <input type="hidden" name="ucode" value="<?php echo $ucode; ?>" />
                    <div class="row">

                        <div class="col-xs-6">
                            <button type="submit" class="btn btn-primary btn-block btn-flat">Reset Password</button>
                        </div><!-- /.col -->
                    </div>
                </form>

            </div
        </div>

        <!-- jQuery 2.1.3 -->
        <script src="<?php echo base_url(); ?>assets/plugins/jQuery/jQuery-2.1.3.min.js"></script>
        <!-- Bootstrap 3.3.2 JS -->
        <script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <!-- iCheck -->
        <script src="<?php echo base_url(); ?>assets/plugins/iCheck/icheck.min.js" type="text/javascript"></script>
        <script>
            $(function () {
                $('input').iCheck({
                    checkboxClass: 'icheckbox_square-blue',
                    radioClass: 'iradio_square-blue',
                    increaseArea: '20%' // optional
                });
            });
        </script>
    </body>
</html>