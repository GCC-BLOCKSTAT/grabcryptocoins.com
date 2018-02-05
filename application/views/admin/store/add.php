<script src="<?php echo base_url(); ?>assets/dist/js/jquery-2.2.3.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/dist/js/bootstrap.js" type="text/javascript"></script>
<style>  
    #error{color:red;}
    #sucess{color:green;}
</style>  


<?php
//echo '<pre>'; print_r($categories); die;
if($id){
    if ($data && $data->num_rows()) {
        foreach ($data->result() as $row) {
            $name = $row->title;
            $slug = $row->slug;
            $content = $row->content;
            $status = $row->status;
            $dateDB = $row->date;
            $image = $row->image;
            $id = $row->id;
        }
    } else if ($_POST) {
            $name = $_POST['title'];
            $slug = $_POST['slug'];
            $content = $_POST['content'];
            $status = $_POST['status'];
            $id = $_POST['id'];
    } else {
            $name = '';
            $slug = '';
            $content = '';
            $status = '';
            $id = '';
            $image = '';
    }
}else{
        $name = '';
        $slug = '';
        $content = '';
        $status = '';
        $id = '';
        $image = '';
}
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <?php if($id){ echo'<h1>Edit Store</h1>';
        }else{ echo '<h1>Add Store</h1>'; } ?>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>admin/home"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="<?php echo base_url(); ?>admin/Store">Store</a></li>
         
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header">
                    </div>

                    <?php
                    $attributes = array('id' => 'myform');
                    echo form_open_multipart('admin/store/add/'.$id, $attributes);
                    ?>
                    <div class="box-body"> 

                        <div id="sucess">
                            <?php
                            if ($this->session->flashdata('inserted'))
                                echo "Store Update Sucessfully";
                            ?>

                        </div>
                        <div id="error">
                            <?php
                            echo validation_errors();
                            if ($this->session->flashdata('error'))
                                print_r($this->session->flashdata('error'));
                            ?>
                        </div>
                    <?php if($id){ ?>
                        <div class="form-group">
                            <label for="subject">Name</label>
                            <?php
                            $name = array(
                                'name' => 'title',
                                'maxlength' => '100',
                                'placeholder' => 'Enter Store Name',
                                'value' => $name,
                                'class' => 'form-control',
                                'required' => TRUE,
                            );
                            echo form_input($name);
                            ?>
                        </div>
                        <div class="form-group">
                            <label for="subject">Slug</label>
                            <?php
                            $slug = array(
                                'name' => 'slug',
                                'maxlength' => '100',
                                'placeholder' => 'Enter Store Slug',
                                'value' => $slug,
                                'class' => 'form-control',
                            );
                            echo form_input($slug);
                            ?>
                        </div>
                        <div class="form-group">
                            <label for="lastname">Description</label>
                            <?php
                            $content1 = array(
                                'name' => 'content',
                                'id' => 'content',
                                'placeholder' => 'Content',
                                'value' => $content,
                                'class' => 'form-control',
                                'required' => TRUE,
                            );
                            echo form_textarea($content1);
                            ?>
                        </div>
                        
                        <div class="form-group">
                            <label for="status">Active/Inactive</label>&nbsp;
                            <?php if($status == '' || $status == '0'){?>
                            <input type="checkbox" name="status" value="1">
                            <?php }else{ ?>
                            <input type="checkbox" name="status" checked value="1">
                            <?php } ?>
                        </div>
                        <div class="form-group">
                                <label for="firstname">Last Update </label>
                                <?php
                                $lastme = array(
                                    'value' => date('d',$dateDB).'/'.date('m',$dateDB).'/'.date('Y',$dateDB),
                                    'class' => 'form-control',
                                    'readonly'=>TRUE
                                );
                                echo form_input($lastme);
                                ?>
                    </div>
                        <?php } else{ ?>
                        <div class="form-group">
                            <label for="subject">Name</label>
                            <?php
                            $name = array(
                                'name' => 'title',
                                'maxlength' => '100',
                                'placeholder' => 'Enter Store Name',
                                'value' => set_value('name'),
                                'class' => 'form-control',
                                'required' => TRUE,
                            );
                            echo form_input($name);
                            ?>
                        </div>
                        <div class="form-group">
                            <label for="username">Slug</label>
                            <?php
                            $slug = array(
                                'name' => 'slug',
                                'maxlength' => '100',
                                'placeholder' => 'Store Slug',
                                'value' => set_value('slug'),
                                'class' => 'form-control'
                            );
                            echo form_input($slug);
                            ?>
                        </div>
                        <div class="form-group">
                            <label for="lastname">Description</label>
                            <?php
                            $content1 = array(
                                'name' => 'content',
                                'id' => 'content',
                                'placeholder' => 'Content',
                                'value' => set_value('content'),
                                'class' => 'form-control',
                                'required' => TRUE,
                            );
                            echo form_textarea($content1);
                            ?>
                        </div>
                        
                        <div class="form-group">
                            <label for="status">Active/Inactive</label>&nbsp;
                            <input type="checkbox" name="status" value="1">
                        </div> 
                        
                     <?php } ?>
                        <div class="form-group">
                            <label for="image">Image</label>
                            <?php
                            $photo = array(
                                'name' => 'userfile',
                                'type' => 'file',
                                'id' => 'photo',
                                'accept' => 'image/*',
                                'onchange' => "loadFile(event)",
                                'multiple' =>TRUE
                            );

                            echo form_upload($photo);
                            ?>
                            <p class="help-block">
                                <img src="<?php
                                if ($image != "") {
                                    echo base_url('uploads/store/' . $image);
                                } else {
                                    //echo base_url() . 'assets/images/default_img.png';
                                }
                                ?>" width="100" title=""/>
                                <img id="output" width="100" /></p>
                        </div>
                        <?php $date = strtotime(date("m/d/Y")); ?>
                        <input type="hidden" name="date" value="<?php echo $date; ?>">
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
                            'id' => 'upload_form',
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
                        echo '<a href="' . base_url('admin/store') . '" class="btn btn-primary" />Back</a>';
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

<script type="text/javascript">
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('content');
    //bootstrap WYSIHTML5 - text editor
    
  });
</script>
<script type="text/javascript">
    var loadFile = function (event) {
        var output = document.getElementById('output');
        output.src = URL.createObjectURL(event.target.files[0]);
    };
</script>



