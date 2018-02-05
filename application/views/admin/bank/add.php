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
            Bank Detail Profile Screen
            <!--<small>Preview</small>-->
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>admin/home"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="<?php echo base_url(); ?>admin/bank">Back</a></li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Bank Account Profile</h3>
                    </div>
                    <?php
                    $attributes = array('id' => 'myform');
                    echo form_open_multipart('admin/bank/add/' . $data->id, $attributes);
                    ?>
                    <div class="box-body"> 
                        <div id="sucess" style="color:green;">
                            <?php
                            if ($this->session->flashdata('inserted'))
                                echo "Bank Account Updated Sucessfully";
                            ?>

                        </div>
                        <div id="error">
                            <?php
                            echo validation_errors();
                            if ($this->session->flashdata('error'))
                                print_r($this->session->flashdata('error'));
                            ?>
                        </div>
                        <div class="form-group row">
                            <div class="form-group col-md-4">
                                <label for="firstname">Bank Name</label>
                                <?php
                                $firstname = array(
                                    'name' => 'name',
                                    'id' => 'name',
                                    'maxlength' => '100',
                                    'placeholder' => 'Bank Name',
                                    'value' => $data->name,
                                    'class' => 'form-control'
                                );
                                echo form_input($firstname);
                                ?>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="firstname">Beneficiary Name</label>
                                <?php
                                $middlename = array(
                                    'name' => 'beneficiary',
                                    'id' => 'beneficiary',
                                    'maxlength' => '100',
                                    'placeholder' => 'Beneficiary Name',
                                    'value' => $data->beneficiary,
                                    'class' => 'form-control'
                                );
                                echo form_input($middlename);
                                ?>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="firstname">Account Number</label>
                                <?php
                                $lastname = array(
                                    'name' => 'account',
                                    'id' => 'account',
                                    'maxlength' => '100',
                                    'placeholder' => 'Account Number',
                                    'value' => $data->account,
                                    'class' => 'form-control'
                                );
                                echo form_input($lastname);
                                ?>
                            </div>
                            
                        </div>
                        <div class="form-group row">
                            <div class="form-group col-md-4">
                                <label for="email">IFSC (RTGS/NEFT/IMPS)</label>
                                <?php
                                $email = array(
                                    'name' => 'ifsc',
                                    'id' => 'ifsc',
                                    'maxlength' => '100',
                                    'placeholder' => 'IFSC (RTGS/NEFT/IMPS)',
                                    'value' => $data->ifsc,
                                    'class' => 'form-control',
                                    'type' => 'text',
                                );
                                echo form_input($email);
                                ?>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="lastname">Type</label>
                                <?php
                                $lastname = array(
                                    'name' => 'type',
                                    'id' => 'type',
                                    'maxlength' => '100',
                                    'placeholder' => 'Type',
                                    'value' => $data->type,
                                    'class' => 'form-control'
                                );
                                echo form_input($lastname);
                                ?>
                            </div>
                        <div class="form-group col-md-4">
                            <label for="status">Active/Inactive</label>
                            <?php if ($data->status == '' || $data->status == '0') { ?>
                                <input type="checkbox" name="status" value="1">
                            <?php } else { ?>
                                <input type="checkbox" name="status" checked value="1">
<?php } ?>
                                </div>
                        </div>
                    </div>
                    <div class="box-footer">
                        <?php
                        $tock = array(
                            $this->security->get_csrf_token_name() => $this->security->get_csrf_hash(),
                        );

                        echo form_hidden($tock);
                        $id = array(
                            'id' => $data->id,
                        );
                        echo form_hidden($id);
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
                        echo '<a href="' . base_url('admin/bank') . '" class="btn btn-primary" />Back</a>';
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
<script type="text/javascript">
    $(document).ready(function () {
        $('#dob').datepicker({
        });
    });

</script>
