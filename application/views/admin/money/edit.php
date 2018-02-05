
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
            User Profile Screen
            <!--<small>Preview</small>-->
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>admin/home"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="<?php echo base_url(); ?>admin/money">Back</a></li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">User Profile</h3>
                    </div>
                    <?php
                    $attributes = array('id' => 'myform');
                    echo form_open_multipart('admin/money/edit/' .$userDetailPayment->id, $attributes);
                    ?>
                    <div class="box-body"> 
                        <div id="sucess" style="color:green;">
                            <?php
                            if ($this->session->flashdata('inserted'))
                                echo "User Profile Payment Updated Sucessfully";
                            ?>

                        </div>
                            <div class="form-group">
                                <label for="firstname">Ammount</label>
                                <?php
                                $firstname = array(
                                    'name' => 'payment_amt',
                                    'id' => 'payment_amt',
                                    'maxlength' => '100',
                                    'value' => $userDetailPayment->payment_amt,
                                    'class' => 'form-control'
                                );
                                echo form_input($firstname);
                                ?>
                            </div>
                            <div class="form-group">
                                <label for="firstname">Transaction ID</label>
                                <?php
                                $middlename = array(
                                    'name' => 'txn_id',
                                    'id' => 'txn_id',
                                    'maxlength' => '100',
                                    'value' => $userDetailPayment->txn_id,
                                    'class' => 'form-control'
                                );
                                echo form_input($middlename);
                                ?>
                            </div>
                        <?php if($userDetailPayment->method_values){?>
                        <div class="form-group">
                                <label for="firstname">Mtcn Number</label>
                                <?php
                                $lastname = array(
                                    'name' => 'mtcn_number',
                                    'id' => 'mtcn_number',
                                    'maxlength' => '100',
                                    'value' => $userDetailPayment->method_values,
                                    'class' => 'form-control'
                                );
                                echo form_input($lastname);
                                ?>
                        </div>
                        <?php } ?>
                        <input type="hidden" name="paymentId" value="<?php echo $userDetailPayment->id; ?>">
<!--                        <div class="form-group">
                            <label for="status">Active/Inactive</label>
                            <?php // if ($userDetailPayment->status == '' || $userDetailPayment->status == '0') { ?>
                                <input type="checkbox" name="status" value="1">
                            <?php // } else { ?>
                                <input type="checkbox" name="status" checked value="1">
<?php // } ?>
                        </div>-->
                    </div>
                    <div class="box-footer">
                        <?php
                        $tock = array(
                            $this->security->get_csrf_token_name() => $this->security->get_csrf_hash(),
                        );

                        echo form_hidden($tock);
                        $id = array(
                            'id' => $userDetailPayment->id,
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
                        echo '<a href="' . base_url('admin/money') . '" class="btn btn-primary" />Back</a>';
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
