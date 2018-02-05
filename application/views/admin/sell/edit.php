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
<?php
    $id = $data->id;
    $waddress = $data->waddress;
    $amount = $data->amount;
    $coin_name = $data->coin_name;
    $coin_value = $data->coin_value;
    $txn = $data->txn_number;

?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
             Edit Buy Response
            <!--<small>Preview</small>-->
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>admin/home"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="<?php echo base_url(); ?>admin/users">Back</a></li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Buy Response Profile</h3>
                    </div>
                    <?php
                    $attributes = array('id' => 'myform');
                    echo form_open_multipart('admin/Sellwallet/edit/' . $id, $attributes);
                    ?>
                    <div class="box-body"> 
                        <div id="sucess" style="color:green;">
                            <?php
                            if ($this->session->flashdata('inserted'))
                                echo "Sell Response Updated Sucessfully";
                            ?>

                        </div>
                        <div id="error">
                            <?php
                            echo validation_errors();
                            if ($this->session->flashdata('error'))
                                print_r($this->session->flashdata('error'));
                            ?>
                        </div>
                            <div class="form-group">
                                <label for="firstname">Wallet Address</label>
                                <?php
                                $firstname = array(
                                    'name' => 'waddress',
                                    'id' => 'waddress',
                                    'maxlength' => '100',
                                    'placeholder' => 'Enter Wallet Address',
                                    'value' => $waddress,
                                    'class' => 'form-control'
                                );
                                echo form_input($firstname);
                                ?>
                            </div>
                            <div class="form-group">
                                <label for="firstname">Amount</label>
                                <?php
                                $middlename = array(
                                    'name' => 'amount',
                                    'id' => 'amount',
                                    'maxlength' => '100',
                                    'placeholder' => 'Enter Amount',
                                    'value' => $amount,
                                    'class' => 'form-control'
                                );
                                echo form_input($middlename);
                                ?>
                            </div>
                            <div class="form-group">
                                <label for="firstname">Coin Name</label>
                                <?php
                                $coin_name = array(
                                    'name' => 'amount',
                                    'maxlength' => '100',
                                    'placeholder' => 'Enter Coin Name',
                                    'value' => $coin_name,
                                    'class' => 'form-control'
                                );
                                echo form_input($coin_name);
                                ?>
                            </div>
                            <div class="form-group">
                                <label for="firstname">Coin Value</label>
                                <?php
                                $coin_value = array(
                                    'name' => 'coin_value',
                                    'maxlength' => '100',
                                    'placeholder' => 'Enter Coin Value',
                                    'value' => $coin_value,
                                    'class' => 'form-control'
                                );
                                echo form_input($coin_value);
                                ?>
                            </div>
                            <div class="form-group">
                                <label for="firstname">Transaction Id </label>
                                <?php
                                $lastname = array(
                                    'name' => 'txn',
                                    'id' => 'txn',
                                    'maxlength' => '100',
                                    'placeholder' => 'Enter Transaction Id',
                                    'value' => $txn,
                                    'class' => 'form-control'
                                );
                                echo form_input($lastname);
                                ?>
                            </div>
                        </div>
                    <div class="box-footer">
                        <?php
                        $tock = array(
                            $this->security->get_csrf_token_name() => $this->security->get_csrf_hash(),
                        );

                        echo form_hidden($tock);
//                        $id = array(
//                            'id' => $id,
//                        );
//                        echo form_hidden($id);
//                        $submit = array(
//                            'name' => 'submit',
//                            'type' => 'submit',
//                            'value' => 'Update',
//                            'class' => 'btn btn-primary',
//                        );
//                        echo form_submit($submit);
                        $back = array(
                            'name' => 'button',
                            'id' => 'button',
                            'type' => 'button',
                            'content' => 'Back',
                            'class' => 'btn btn-primary',
                        );
                        echo '<a href="' . base_url('admin/Sellwallet') . '" class="btn btn-primary" />Back</a>';
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
