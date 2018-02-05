<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Grabcrypto Coins | Log in</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- Bootstrap 3.3.2 -->
        <link href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- Font Awesome Icons -->
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
        <!-- iCheck -->
        <link href="<?php echo base_url(); ?>assets/plugins/iCheck/square/blue.css" rel="stylesheet" type="text/css" />
    </head>
    <body class="login-page">
        <div class="login-box">
            <div class="login-logo">
                <a href="<?php echo base_url(); ?>"><b>Grabcrypto </b>Coins </b></a>
            </div><!-- /.login-logo -->
            <div class="login-box-body">
                <?php if (isset($_SESSION['error'])) { ?>
                    <div class="error" style="color:red"><?php print_r($_SESSION['error']); ?></div>
                    <?php
                    unset($_SESSION['error']);
                }
                ?>
                <p class="login-box-msg"> <div id="sucess"><?php
                    if ($this->session->flashdata('Password_reset_message')) {
                        echo "<b style='color:green'>Password Update Successfully</b>";
                    }
                    ?>  </div>
                <div id="error" style="color:red;">
                    <?php
                    echo validation_errors();
                    if ($this->session->flashdata('error'))
                        print_r($this->session->flashdata('error'));
                    ?>
                </div>Sign in to start your session</p>
                <form action="<?php echo base_url('admin/login'); ?>" method="post">
                    <div class="form-group has-feedback">
                        <input type="text" class="form-control" placeholder="Username" name="username"/>
                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="password" class="form-control" placeholder="Password" name="password"/>
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    </div>
                    <div class="row">
                        <div class="col-xs-8">    
                            <div class="checkbox icheck">
                                <a href="<?php echo base_url('admin/Home/forgetPassword'); ?>">Forgot Password?</a>
                            </div>                        
                        </div><!-- /.col -->
                        <div class="col-xs-4">
                            <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
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
