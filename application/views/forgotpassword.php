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
                <h2>Forgot Password</h2>
            </div>
        </div>
    </div>
</section>
<section class="ls section_padding_top_100 section_padding_bottom_100">
    <div class="container">
        <span>Not Member ! <a href="<?php echo base_url('registration'); ?>">Register here</a></span>
        <?php
        if ($this->session->flashdata('error')) {
            echo "<span><h4 id='error'>" . $this->session->flashdata('error') . "</h4></span>";
        } else if ($this->session->flashdata('valid_error')) {
            echo "<span><h4 id='error'>" . $this->session->flashdata('valid_error') . "</h4></span>";
        } else if ($this->session->flashdata('succuss')) {
            echo "<span><h4 id='sucess'>" . $this->session->flashdata('succuss') . "</h4></span>";
        }
        ?>
        <div class="row">
            <form class="shop-register" role="form" action="<?php echo base_url('login/forgetPassword'); ?>" method="post" id="forgetSubmit">                
                <div class="col-sm-6">
                    <div class="form-group validate-required validate-phone" id="billing_user_field"> <label for="billing_user" class="control-label">
                            <span class="required">*</span>
                        </label> <input type="text" class="form-control " name="email" id="emails" placeholder="Email"> </div>
                        <span id="errEmails" style="color:red;font-size:13px;margin-bottom: 5px !important;"></span>
                        <div class="errEmailnot"></div>
                </div>
                <div class="col-sm-12"> 
                    <button type="submit" class="theme_button wide_button color1 topmargin_40">Forgot Password</button>
                </div>
            </form>
        </div>
    </div>
</section>
<?php $this->load->view('includes/footer'); ?>