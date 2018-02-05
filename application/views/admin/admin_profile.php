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
if ($data && $data->num_rows()) {
    foreach ($data->result() as $row) {
        $first_name = $row->name;
        $password = $row->password;
        $username = $row->username;
        $email = $row->email;
        $id = $row->id_admin;
        $phone = $row->phone;
        $city = $row->city;
        $state = $row->state;
        $country = $row->country;
        $image = $row->profile_image;
    }
}
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Profile Screen
            <!--<small>Preview</small>-->
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>admin/home"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="<?php echo base_url(); ?>admin/users">User</a></li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header">
                        <?php //echo '<pre>'; print_r($_SESSION); die; ?>
                        <h3 class="box-title">
                            <?php 
                                if(isset($_SESSION['admin'])){
                                    $ses_value = 'Admin';
                                }elseif(isset($_SESSION['poweruser'])){
                                     $ses_value = 'Poweruser';
                                }else{
                                    $ses_value = 'Operator';
                                } 
                                echo $ses_value.' Profile'; ?>
                        </h3>
                    </div>
                    <?php
                    $attributes = array('id' => 'myform');
                    echo form_open_multipart('admin/home/adminprofile/' . $id, $attributes);
                    ?>
                    <div class="box-body"> 
                        <div id="sucess" style="color:green;">
                            <?php
                            if ($this->session->flashdata('inserted'))
                                echo "Profile Updated Sucessfully";
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
                            <label for="firstname">Role : <?php echo $ses_value; ?></label>
                        </div>
                        <div class="form-group">
                            <label for="firstname">Full Name*</label>
                            <?php
                            $firstname = array(
                                'name' => 'fname',
                                'id' => 'fname',
                                'maxlength' => '100',
                                'placeholder' => 'Full Name',
                                'value' => $first_name,
                                'class' => 'form-control',
                                'required' => TRUE,
                            );
                            echo form_input($firstname);
                            ?>
                        </div>
                        <div class="form-group">
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
                                'required' => TRUE,
                            );

                            echo form_input($email);
                            ?>
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone*</label>
                            <?php
                            $phone = array(
                                'name' => 'phone',
                                'id' => 'phone',
                                'maxlength' => '15',
                                'placeholder' => 'Phone',
                                'value' => $phone,
                                'class' => 'form-control',
                                'type' => 'mobile',
                                'required' => TRUE,
                            );
                            echo form_input($phone);
                            ?>
                        </div>
                        <div class="form-group">
                            <label for="city">City</label>
                            <?php
                            $city = array(
                                'name' => 'city',
                                'id' => 'city',
                                'maxlength' => '100',
                                'value' => $city,
                                'placeholder' => 'Enter City.',
                                'class' => 'form-control',
                                'type' => 'text',
                            );

                            echo form_input($city);
                            ?>
                        </div>
                        <div class="form-group">
                            <label for="state">State</label>
                            <?php
                            $state = array(
                                'name' => 'state',
                                'id' => 'state',
                                'maxlength' => '100',
                                'value' => $state,
                                'placeholder' => 'Enter State.',
                                'class' => 'form-control',
                                'type' => 'tex',
                            );

                            echo form_input($state);
                            ?>
                        </div>
                        <div class="form-group">
                            <label for="country">Country</label>
                            <?php
                            $country = array(
                                'name' => 'country',
                                'id' => 'country',
                                'maxlength' => '100',
                                'value' => $country,
                                'placeholder' => 'Enter Country.',
                                'class' => 'form-control',
                                'type' => 'text',
                            );

                            echo form_input($country);
                            ?>
                        </div>                      
                        <div class="form-group">
                            <p class="help-block"></p>
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


