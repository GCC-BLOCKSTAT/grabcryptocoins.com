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
            $coin = $row->coin;
            $taxs = $row->tax;
            $commisions = $row->commision;
            $charg = $row->charges;
            $coin_address = $row->coin_address;
            $content = $row->notification;
            $type = $row->type;
            $image = $row->qr_image;
        }
    }
} else {
    $coin = "";
    $taxs = "";
    $commisions = "";
    $charg = "";
    $coin_address = '';
    $content = '';
    $type = '';
    $image = '';
}
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Default Setting Screen
            <!--<small>Preview</small>-->
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>admin/home"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="<?php echo base_url(); ?>admin/defaults">Back</a></li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Default Setting Profile</h3>
                    </div>
                    <?php
                    $attributes = array('id' => 'myform');
                    echo form_open_multipart('admin/defaults/add/' . $id, $attributes);
                    ?>
                    <div class="box-body"> 
                        <div id="sucess" style="color:green;">
                            <?php
                            if ($this->session->flashdata('inserted'))
                                echo "Default Setting Update Sucessfully";
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
                                    <label for="firstname">Coin</label>
                                    <?php
                                    $limitized = array(
                                        'name' => 'coin',
                                        'id' => 'Coin',
                                        'maxlength' => '100',
                                        'placeholder' => 'Enter Coin',
                                        'value' => $coin,
                                        'readonly' => TRUE,
                                        'class' => 'form-control'
                                    );
                                    echo form_input($limitized);
                                    ?>
                            </div>
                            <div class="form-group">
                                <label for="lastname">Tax(%)</label>
                                <?php
                                $taxes = array(
                                    'name' => 'tax',
                                    'id' => 'tax',
                                    'maxlength' => '100',
                                    'placeholder' => 'Enter Tax',
                                    'value' => $taxs,
                                    'class' => 'form-control'
                                );
                                echo form_input($taxes);
                                ?>
                            </div>
                            <div class="form-group">
                                <label for="lastname">Commision(%)</label>
                                <?php
                                $commis = array(
                                    'name' => 'commision',
                                    'id' => 'commision',
                                    'maxlength' => '100',
                                    'placeholder' => 'Enter Commision',
                                    'value' => $commisions,
                                    'class' => 'form-control'
                                );
                                echo form_input($commis);
                                ?>
                            </div>
                            <div class="form-group">
                                <label for="lastname">Charges</label>
                                <?php
                                $charged = array(
                                    'name' => 'charges',
                                    'id' => 'charges',
                                    'maxlength' => '100',
                                    'placeholder' => 'Enter Charges',
                                    'value' => $charg,
                                    'class' => 'form-control'
                                );
                                echo form_input($charged);
                                ?>
                            </div>
                            <div class="form-group">
                                <label for="lastname">Coin Address</label>
                                <?php
                                $coin_address = array(
                                    'name' => 'coin_address',
                                    'maxlength' => '100',
                                    'placeholder' => 'Enter Coin Address',
                                    'value' => $coin_address,
                                    'class' => 'form-control'
                                );
                                echo form_input($coin_address);
                                ?>
                            </div>
                            <div class="form-group">
                                <label for="lastname">Type</label>
                                <?php
                                if($type == 1){ $var_val= 'BUY'; }else{ $var_val= 'SELL'; }
                                $type = array(
                                    'name' => 'type',
                                    'maxlength' => '20',
                                    'placeholder' => 'Enter Coin Type',
                                    'value' => $var_val,
                                    'readonly' => TRUE,
                                    'class' => 'form-control'
                                );
                                echo form_input($type);
                                ?>
                            </div>
                            <div class="form-group">
                                <label for="lastname">Notification</label>
                                <?php
                                $content1 = array(
                                    'name' => 'content',
                                    'id' => 'content',
                                    'placeholder' => 'Content',
                                    'value' =>$content,
                                    'class' => 'form-control',
                                    'required' => TRUE,
                                );
                                echo form_textarea($content1);
                                ?>
                            </div>
                            <div class="form-group">
                                <label for="image">QR Code Image</label>
                                <?php
                                $photo = array(
                                    'name' => 'userfile',
                                    'type' => 'file',
                                    'id' => 'uploadIcon',
                                    'accept' => 'image/*',
                                    'onchange' => "loadFile(event)"
                                );
                                echo form_upload($photo);
                                ?>
                                <p class="help-block">
                                    <?php if ($image != "") { ?>
                                        <img src="<?php echo base_url('uploads/default_qr_image/' . $image); ?>" width="50" title="QR Code Image"/>
                                        <input type="hidden"  id="uploadIcon2" value="1">
                                    <?php } ?>
                                        <img id="iconImg" width="100" /></p>
                            </div>
<!--                        <div class="form-group">
                            <label for="status">status</label>
                            <?php // if ($status == '' || $status == '0') { ?>
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
                            'id' => $id,
                        );
                        echo form_hidden($id);
                        $submit = array(
                            'name' => 'submit',
                            'type' => 'submit',
                            'value' => 'Update',
                            'class' => 'btn btn-primary',
                            'id' => 'qrSubmit'
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

<script>
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('content');
    //bootstrap WYSIHTML5 - text editor
    
  });
</script>

<script type="text/javascript">
    $(document).ready(function () {
        $('#dob').datepicker({
        });
    });

    $(document).ready(function(){
        $('#qrSubmit').click(function(){
            var image = $('#uploadIcon').val();
            var simage = $('#uploadIcon2').val();
            if(image == '' simage != ''){
                alert('Please upload the QR code image');
                return false;
            }
        });
    });

    $(function () {
        $("#uploadIcon").change(function (e) {
            //Get reference of FileUpload.
            var fileUpload = $("#uploadIcon")[0];
            var image_data = this.files;
            var file = image_data[0];
            var size = Math.round(file.size / 1024);
            //Check whether the file is valid Image.
            var regex = new RegExp("([a-zA-Z0-9\s_\\.\-:])+(.jpg|.png|.gif|.jpeg|.JPEG|.GIF|.PNG|.JPG)$");
            if (regex.test(fileUpload.value.toLowerCase())) {
                //Check whether HTML5 is supported.
                if (typeof (fileUpload.files) != "undefined") {
                    //Initiate the FileReader object.
                    var reader = new FileReader();
                    //Read the contents of Image File.
                    reader.readAsDataURL(fileUpload.files[0]);
                    reader.onload = function (e) {
                        //Initiate the JavaScript Image object.
                        var image = new Image();
                        //Set the Base64 string return from FileReader as source.
                        image.src = e.target.result;
                        image.onload = function () {
                            //Determine the Height and Width.
                            var height = this.height;
                            var width = this.width;
                            if (height < 250 || height > 300) {
                                alert("Height should in between 250px to 3000px");
                                $("#uploadIcon").val('');
                                return false;
                            } else if (width < 250 || width > 300) {
                                alert("Width should in between 250px to 300px");
                                $("#uploadIcon").val('');
                                return false;
                            } else if (size > 100) {
                                alert("File size should not exceed to 100 KB");
                                $("#uploadIcon").val('');
                                return false;
                            } else {
                                $('#iconImg').attr('src', e.target.result);
                            }
                        };
                    }
                } else {
                    alert("This browser does not support HTML5.");
                    return false;
                }
            } else {
                alert("Please select a valid Image file.");
                return false;
            }
        });
    });


</script>
