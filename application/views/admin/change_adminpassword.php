<script src="<?php echo base_url(); ?>assets/dist/js/jquery-2.2.3.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/dist/js/bootstrap.js" type="text/javascript"></script>
<style>  
    #error{
        color:red;
    }
    #sucess{
        color:green;
    }
</style>  
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            My Account
            <!--<small>Preview</small>-->
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>admin/home"><i class="fa fa-dashboard"></i> Home</a></li
        </ol>
    </section>
    <section class="content">
        <div class="row">          
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <?php
                    $attributes = array('id' => 'myform');
                    echo form_open_multipart('admin/home/changepassword/'.$id, $attributes);
                    ?>
                    <div class="box-body"> 
                        <div id="sucess">
                            <?php
                            if ($this->session->flashdata('inserted'))
                                echo "Password Updated Sucessfully";
                            ?>
                        </div>
                        <div id="error">
                            <?php
                            echo validation_errors();
                            if ($this->session->flashdata('error'))
                                print_r($this->session->flashdata('error'));
                            if ($this->session->flashdata('passworderror')) {
                                echo "Current Password doesn't exists";
                            }
                            if ($this->session->flashdata('passwordmatch')) {
                                echo "New Password and confirm password doesn't match";
                            }
                            ?>
                        </div>
                        <div class="box-header">
                            <!--  <h3 class="box-title">Password Screen</h3>-->
                        </div>
                        <div class="form-group">
                            <label for="current_password">Current Password</label>
                            <?php
                            $current_password = array(
                                'name' => 'current_password',
                                'id' => 'current_password',
                                'maxlength' => '100',
                                'type' => 'password',
                                'placeholder' => 'Enter current password.',
                                'class' => 'form-control'
                            );
                            echo form_input($current_password);
                            ?>
                        </div>
                        <div class="form-group">
                            <label for="new_password">New Password</label>
                            <?php
                            $new_password = array(
                                'name' => 'new_password',
                                'id' => 'new_password',
                                'maxlength' => '100',
                                'type' => 'password',
                                'placeholder' => 'Enter new password at least 8 characters.',
                                'class' => 'form-control'
                            );
                            echo form_input($new_password);
                            ?>
                        </div>
                        <div class="form-group">
                            <label for="current_password">Confirm Password</label>
                            <?php
                            $confirm_password = array(
                                'name' => 'confirm_password',
                                'id' => 'confirm_password',
                                'maxlength' => '100',
                                'type' => 'password',
                                'placeholder' => 'Reenter new password.',
                                'class' => 'form-control'
                            );
                            echo form_input($confirm_password);
                            ?>
                        </div>
                    </div>
                    <div class="box-footer">
                        <?php
                        $tock = array(
                            $this->security->get_csrf_token_name() => $this->security->get_csrf_hash(),
                        );
                        $submit = array(
                            'name' => 'submit',
                            'type' => 'submit',
                            'value' => 'Update',
                            'class' => 'btn btn-primary',
                        );
                        echo form_submit($submit);
                        $back = array(
                            'name' => 'button',
                            'id' => 'button',
                            'type' => 'button',
                            'content' => 'Back',
                            'class' => 'btn btn-primary',
                        );
                        echo '<a href="' . base_url('admin/home') . '" class="btn btn-primary" />Back</a>';
                        ?>
                    </div>
                    <?php
                    echo form_close();
                    ?>
                </div>
            </div>
        </div>   
    </section>
</div><!-- /.content-wrapper -->


