<?php $this->load->view('includes/header'); ?>
<style>  
            #error{
                color:red;
            }
            #sucess{
                color:green;
            }
        </style>  
   <section class="page_breadcrumbs cs gradient background_cover color_overlay section_padding_top_65 section_padding_bottom_65">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 text-center">
                <h2>Reset Password</h2>
            </div>
        </div>
    </div>
</section>
<section class="ls section_padding_top_100 section_padding_bottom_100">
    <div class="container">
        <span>Not Member ! <a href="<?php echo base_url('registration');?>">Register here</a></span>
        <?php if ($this->session->flashdata('Password_reset_message')) {
                        echo "<span><h4 id='sucess'>Password Update Successfully.</h4></span>";
                    }
                    ?>
        <?php
                    if ($this->session->flashdata('error')) {
                        echo "<span><h4 id='error'>".validation_errors()."</h4></span>";
                    }
                    if ($this->session->flashdata('Invalid_Token_Unauthorized_user')) {
                        echo "<span><h4 id='error'>Invalid Token or Unauthorized user.</h4></span>";
                    }

                    if ($this->session->flashdata('password_not_match')) {
                        echo "<span><h4 id='error'>Password and confirm password doesn't match.</h4></span>";
                    }
                    if ($this->session->flashdata('token_expired')) {
                        echo "<span><h4 id='error'>Token Expired.</h4></span>";
                    }

                    if ($this->session->flashdata('Invalid_user')) {
                        echo "<span><h4 id='error'> Invalid User.</h4></span>";
                    }
                    ?>
        <div class="row">
            <form class="shop-register" role="form" action="<?php echo base_url('login/resetPassword');?>" method="post">                
                <div class="col-sm-6">
                    <div class="form-group validate-required validate-phone" id="billing_user_field"> 
                        <label for="billing_user" class="control-label"></label>
                        <input type="password" class="form-control" placeholder="Password" name="password"/></div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group validate-required" id="billing_middle_name_field">
                        <label for="middle_name" class="control-label"></label>
                        <input type="password" class="form-control" placeholder="Confirm Password" name="confirmpassword"/></div>
                </div>
                <input type="hidden" name="ucode" value="<?php echo $ucode; ?>" />
                <div class="col-sm-12"> 
                    <button type="submit" class="theme_button wide_button color1 topmargin_40">Reset Password</button>
                </div>
            </form>
        </div>
    </div>
</section>
<?php $this->load->view('includes/footer'); ?>