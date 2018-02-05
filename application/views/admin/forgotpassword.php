<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Grabcrypto Coins | Forgot password</title>
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
                <a href="<?php echo base_url(); ?>"><b>Grabcrypto  </b>Coins</a>
            </div><!-- /.login-logo -->
            <div class="login-box-body">
                <p class="login-box-msg"> 
                <!--<div id="sucess">-->
                    <?php
//                    if ($this->session->flashdata('Password_reset_email'))
//                        echo "Password reset link sent successfully on your email.";
                    ?>
                <!--</div>-->
                <!--<div id="error">-->
                    <?php
//                    if ($this->session->flashdata('error')) {
//                        echo validation_errors();
//                    }


//                    if ($this->session->flashdata('admin_not_exists')) {
//                        echo "Email not exists.";
//                    }
//                    if ($this->session->flashdata('email_content_not_found')) {
//                        echo "Email Content not exists.";
//                    }
                    ?>
                <!--</div>-->
                
                <?php
                    if ($this->session->flashdata('error')) {
                        echo "<div id='error'><h4>" . $this->session->flashdata('error') . "</h4></div>";
                    } 
                    else if ($this->session->flashdata('valid_error')) {
                        echo "<div id='error'><h4>" . $this->session->flashdata('valid_error') . "</h4></div>";
                    } 
                    else if ($this->session->flashdata('succuss')) {
                        echo "<div id='sucess'><h4>" . $this->session->flashdata('succuss') . "</h4></div>";
                    }
                    ?>
                
                Enter Your Email</p>
                <form action="<?php echo base_url('admin/home/forgetpassword'); ?>" method="post">
                    <div class="form-group has-feedback">
                        <input type="text" class="form-control" placeholder="email" name="email"/>
                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    </div>

                    <div class="row">

                        
                        <div class="col-xs-6">
                            <button type="submit" class="btn btn-primary btn-block btn-flat">Forgot Password</button>
                        </div><!-- /.col -->
                        <div class="col-xs-6 text-right">
                            <a href="<?php echo base_url('admin/login'); ?>">Login</a>
                        </div>
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