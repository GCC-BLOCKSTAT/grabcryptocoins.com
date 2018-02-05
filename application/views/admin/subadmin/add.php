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
if (!empty($data) && $data->num_rows()) {
    $row = $data->row();
    $id = $row->id_admin;
    $fname = $row->name;
    $email = $row->email;
    $username = $row->username;
    $mobile = $row->phone;
    $city = $row->city;
    $state = $row->state;
    $country = $row->country;
    $role = $row->role;
    $status = $row->status;
    $description = $row->description;
    $image = $row->profile_image;
} else {
    $id = "";
    $fname = "";
    $password = "";
    $email = "";
    $mobile = "";
    $username = "";
    $city = "";
    $state = "";
    $country = "";
    $role = "";
    $status = "";
    $description = "";
    $image = "";
}
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Subadmin User Profile Screen
            <!--<small>Preview</small>-->
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>admin/home"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="<?php echo base_url(); ?>admin/subadmin">Back</a></li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Subadmin User Profile</h3>
                    </div>
                    <?php
                    $attributes = array('id_admin' => 'myform');
                    echo form_open_multipart('admin/subadmin/add/' . $id, $attributes);
                    ?>
                    <div class="box-body"> 
                        <div id="sucess" style="color:green;">
                            <?php
                            if ($this->session->flashdata('inserted'))
                                echo "Subadmin Profile Update Sucessfully";
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
                                <label for="firstname">Full Name*</label>
                                <?php
                                $firstname = array(
                                    'name' => 'fname',
                                    'id' => 'fname',
                                    'maxlength' => '100',
                                    'placeholder' => 'First Name',
                                    'value' => $fname,
                                    'class' => 'form-control',
//                                'required' => TRUE,
                                );
                                echo form_input($firstname);
                                ?>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="city">Username</label>
                                <?php
                                $usernames = array(
                                    'name' => 'username',
                                    'id' => 'username',
                                    'maxlength' => '100',
                                    'value' => $username,
                                    'placeholder' => 'Enter Username.',
                                    'class' => 'form-control',
                                    'type' => 'text',
                                );
                                echo form_input($usernames);
                                ?>
                            </div>
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
                        </div>
                        <div class="form-group row">
                            <div class="form-group col-md-4">
                                <label for="lastname">Mobile</label>
                                <?php
                                $mobiles = array(
                                    'name' => 'mobile',
                                    'id' => 'mobile',
                                    'maxlength' => '100',
                                    'placeholder' => 'Mobile',
                                    'value' => $mobile,
                                    'class' => 'form-control'
                                );
                                echo form_input($mobiles);
                                ?>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="email">City*</label>
                                <?php
                                $citys = array(
                                    'name' => 'city',
                                    'id' => 'city',
                                    'maxlength' => '100',
                                    'placeholder' => 'City',
                                    'value' => $city,
                                    'class' => 'form-control',
                                    'type' => 'text',
                                );

                                echo form_input($citys);
                                ?>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="roll">Role</label>
                                <select class="form-control" name="role">
                                    <?php if ($id) { ?>
                                        <option value="1" <?php if ($role == '1') {
                                        echo 'selected';
                                    } ?>>Power User</option>
                                        <option value="2" <?php if ($role == '2') {
                                        echo 'selected';
                                    } ?>>Operator</option>
<?php } else { ?>
                                        <option value="1">Power User</option>
                                        <option value="2">Operator</option>
<?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="form-group col-md-4">
                                <label for="email">State*</label>
                                <?php
                                $states = array(
                                    'name' => 'state',
                                    'id' => 'state',
                                    'maxlength' => '100',
                                    'placeholder' => 'State',
                                    'value' => $state,
                                    'class' => 'form-control',
                                    'type' => 'text',
                                );

                                echo form_input($states);
                                ?>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="city">Country</label>
                                <?php
                                $countrys = array(
                                    'name' => 'country',
                                    'id' => 'country',
                                    'maxlength' => '100',
                                    'value' => $country,
                                    'placeholder' => 'Enter Country.',
                                    'class' => 'form-control',
                                    'type' => 'text',
                                );

                                echo form_input($countrys);
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
                                    'type' => 'password',
                                );
                                echo form_input($passwords);
                                ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="lastname">Description</label>
                            <?php
                            $meta_description = array(
                                'name' => 'description',
                                'id' => 'content',
                                'placeholder' => 'Description',
                                'value' => $description,
                                'class' => 'form-control',
                                'required' => TRUE,
                            );
                            echo form_textarea($meta_description);
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
                                    echo base_url('uploads/admin/' . $image);
                                } else {
                                    echo base_url('assets/images/default_img.png');
                                }
                                ?>" width="50" title="Profile Pic"/>
                                <img id="output" width="50"  style="margin-left:100px"/></p>
                        </div>

                        <div class="form-group">
                            <label for="status">status</label>
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
                            'id_admin' => $id,
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
                        echo '<a href="' . base_url('admin/subadmin') . '" class="btn btn-primary" />Back</a>';
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
<script type="text/javascript">
    $(function () {
        CKEDITOR.replace('content');
    });
</script>