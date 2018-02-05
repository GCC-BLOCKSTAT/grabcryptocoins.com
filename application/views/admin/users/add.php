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
<script type="text/javascript">
    var loadFile = function (event) {
        var output = document.getElementById('output');
        output.src = URL.createObjectURL(event.target.files[0]);
    };
</script>

<?php
if (!empty($id)) {
    if ($data && $data->num_rows()) {
        foreach ($data->result() as $row) {
            $id = $row->id;
            $fname = $row->fname;
            $mname = $row->mname;
            $lname = $row->lname;
            $email = $row->email;
            $mobile = $row->mobile;
            $aadahrCard = $row->aadhar;
            $pancardNo = $row->pan;
            $passport = $row->passport;
            $limitationNo = $row->limitation;
            $selllimitationNo = $row->seller_limitation;
            $address = $row->address;
            $waddress = $row->waddress;
            $status = $row->status;
            $level = $row->level;
            $image = $row->image;
        }
    }
} else {
    $fname = "";
    $mname = "";
    $lname = "";
    $email = "";
    $mobile = "";
    $aadahrCard = "";
    $pancardNo = "";
    $passport = '';
    $limitationNo = "";
    $selllimitationNo = "";
    $address = "";
    $waddress = "";
    $status = "";
    $level = "";
    $image = "";
}
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            User Profile Screen
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
                        <h3 class="box-title">User Profile</h3>
                    </div>
                    <?php
                    $attributes = array('id' => 'myform');
                    echo form_open_multipart('admin/users/add/' . $id, $attributes);
                    ?>
                    <div class="box-body"> 
                        <div id="sucess" style="color:green;">
                            <?php
                            if ($this->session->flashdata('inserted'))
                                echo "User Profile Update Sucessfully";
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
                                <label for="firstname">First Name*</label>
                                <?php
                                $firstname = array(
                                    'name' => 'fname',
                                    'id' => 'fname',
                                    'maxlength' => '100',
                                    'placeholder' => 'Full Name',
                                    'value' => $fname,
                                    'class' => 'form-control'
                                );
                                echo form_input($firstname);
                                ?>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="firstname">Middle Name</label>
                                <?php
                                $middlename = array(
                                    'name' => 'mname',
                                    'id' => 'mname',
                                    'maxlength' => '100',
                                    'placeholder' => 'Middle Name',
                                    'value' => $mname,
                                    'class' => 'form-control'
                                );
                                echo form_input($middlename);
                                ?>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="firstname">Last Name</label>
                                <?php
                                $lastname = array(
                                    'name' => 'lname',
                                    'id' => 'lname',
                                    'maxlength' => '100',
                                    'placeholder' => 'Last Name',
                                    'value' => $lname,
                                    'class' => 'form-control'
                                );
                                echo form_input($lastname);
                                ?>
                            </div>
                            
                        </div>
                        <div class="form-group row">
                            <div class="form-group col-md-4">
                                <label for="email">Email*</label>
                                <?php
                                $email = array(
                                    'name' => 'email',
                                    'id' => 'email',
                                    'maxlength' => '100',
                                    'placeholder' => 'Email',
                                    'value' => $email,
                                    'class' => 'form-control',
                                    'type' => 'email',
                                );
                                echo form_input($email);
                                ?>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="lastname">Mobile*</label>
                                <?php
                                $lastname = array(
                                    'name' => 'mobile',
                                    'id' => 'mobile',
                                    'maxlength' => '100',
                                    'placeholder' => 'Mobile',
                                    'value' => $mobile,
                                    'class' => 'form-control'
                                );
                                echo form_input($lastname);
                                ?>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="lastname">Wallet Transfer Address*</label>
                                <?php
                                $waadress = array(
                                    'name' => 'walletaddress',
                                    'id' => 'walletaddress',
                                    'maxlength' => '100',
                                    'placeholder' => 'Enter Wallet Transfer Address',
                                    'value' => $waddress,
                                    'class' => 'form-control'
                                );
                                echo form_input($waadress);
                                ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <?php if($aadahrCard != ''){ ?>
                            <div class="form-group col-md-4">
                                <label for="lastname">Aadhar Card No.*</label>
                                <?php
                                $aadhar = array(
                                    'name' => 'aadahr',
                                    'id' => 'aadahr',
                                    'maxlength' => '100',
                                    'placeholder' => 'Enter Aadhar Card No.',
                                    'value' => $aadahrCard,
                                    'class' => 'form-control'
                                );
                                echo form_input($aadhar);
                                ?>
                            </div>
                            <?php }else if($pancardNo != ''){?>
                            <div class="form-group col-md-4">
                                <label for="lastname">Pan Card No.*</label>
                                <?php
                                $pancrd = array(
                                    'name' => 'pancard',
                                    'id' => 'pancard',
                                    'maxlength' => '100',
                                    'placeholder' => 'Enter Pan Card No.',
                                    'value' => $pancardNo,
                                    'class' => 'form-control'
                                );
                                echo form_input($pancrd);
                                ?>
                            </div>
                            <?php }else if($passport != ''){ ?>
                            <div class="form-group col-md-4">
                                <label for="lastname">Passport Card No.*</label>
                                <?php
                                $passcrd = array(
                                    'name' => 'passcard',
                                    'id' => 'passcard',
                                    'maxlength' => '100',
                                    'placeholder' => 'Enter Passport Card No.',
                                    'value' => $passport,
                                    'class' => 'form-control'
                                );
                                echo form_input($passcrd);
                                ?>
                            </div>
                            <?php }?>
                            <?php if($id == ''){ ?>
                            <div class="form-group col-md-4">
                                <label for="lastname">Aadhar Card No.*</label>
                                <?php
                                $aadhar = array(
                                    'name' => 'aadahr',
                                    'id' => 'aadahr',
                                    'maxlength' => '100',
                                    'placeholder' => 'Enter Aadhar Card No.',
                                    'value' => $aadahrCard,
                                    'class' => 'form-control'
                                );
                                echo form_input($aadhar);
                                ?>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="lastname">Pan Card No.*</label>
                                <?php
                                $pancrd = array(
                                    'name' => 'pancard',
                                    'id' => 'pancard',
                                    'maxlength' => '100',
                                    'placeholder' => 'Enter Pan Card No.',
                                    'value' => $pancardNo,
                                    'class' => 'form-control'
                                );
                                echo form_input($pancrd);
                                ?>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="lastname">Passport Card No.*</label>
                                <?php
                                $passcrd = array(
                                    'name' => 'passcard',
                                    'id' => 'passcard',
                                    'maxlength' => '100',
                                    'placeholder' => 'Enter Passport Card No.',
                                    'value' => $passport,
                                    'class' => 'form-control'
                                );
                                echo form_input($passcrd);
                                ?>
                            </div>
                            <?php } ?>
                            <div class="form-group col-md-4">
                                <label for="lastname">Buy User Transactions Limit*</label>
                                <?php
                                $limitation = array(
                                    'name' => 'limitation',
                                    'id' => 'limitation',
                                    'maxlength' => '100',
                                    'placeholder' => 'Enter Buy User Limitation',
                                    'value' => $limitationNo,
                                    'class' => 'form-control'
                                );
                                echo form_input($limitation);
                                ?>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="lastname">Sell User Transactions Limit*</label>
                                <?php
                                $limitation = array(
                                    'name' => 'seller_limitation',
                                    'id' => 'seller_limitation',
                                    'maxlength' => '100',
                                    'placeholder' => 'Enter Sell User Limitation',
                                    'value' => $selllimitationNo,
                                    'class' => 'form-control'
                                );
                                echo form_input($limitation);
                                ?>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="city">Password</label>
                                <?php
                                $passwords = array(
                                    'name' => 'password',
                                    'id' => 'password',
                                    'maxlength' => '100',
                                    'value' => '',
                                    'placeholder' => 'Enter Password.',
                                    'class' => 'form-control',
                                    'type' => 'text',
                                );

                                echo form_input($passwords);
                                ?>
                            </div>
                        </div>
                        <div class="form-group">
                                <label for="lastname">Address*</label>
                                <?php
                                $dob = array(
                                    'name' => 'address',
                                    'id' => 'address',
                                    'maxlength' => '100',
                                    'placeholder' => 'Enter Address',
                                    'value' => $address,
                                    'class' => 'form-control'
                                );
                                echo form_input($dob);
                                ?>
                            </div>
                        <div class="form-group">
                            <label for="image">Profile Image</label>
                            <?php
                            $photo = array(
                                'name' => 'userfile',
                                'type' => 'file',
                                'id' => 'photo',
                                'accept' => 'image/*',
                                'onchange' => "loadFile(event)"
                            );
                            echo form_upload($photo);
                            ?>
                            <p class="help-block"><?php ?>
                                <img src="<?php
                                if ($image != "") {
                                    echo base_url('uploads/users/' . $image);
                                } else {
                                    echo base_url('assets/images/default_img.png');
                                }
                                ?>" width="50" title="Profile Pic"/>
                                <img id="output" width="50"  style="margin-left:100px"/></p>
                        </div>
                        <div class="form-group">
                            <label for="status">Active/Inactive</label>
                            <?php if ($status == '' || $status == '0') { ?>
                                <input type="checkbox" name="status" value="1">
                            <?php } else { ?>
                                <input type="checkbox" name="status" checked value="1">
<?php } ?>
                        </div>
                    </div>
                    <div class="box-footer">
                        <?php
                        $tock = array(
                            $this->security->get_csrf_token_name() => $this->security->get_csrf_hash(),
                        );

                        echo form_hidden($tock);
                        $id = array(
                            'id' => $id,
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
                        echo '<a href="' . base_url('admin/users') . '" class="btn btn-primary" />Back</a>';
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
