<link href="<?php echo base_url('assets/plugins/datatables/dataTables.bootstrap.css'); ?>" rel="stylesheet" type="text/css" /> 
<link href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />    
<!-- FontAwesome 4.3.0 -->
<!-- Theme style -->
<link href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />  
<!-- Content Header (Page header) -->
<?php
if ($data && $data->num_rows()) {
    foreach ($data->result() as $row) {
        $userid = $row->id_admin;
        ?>
        <section class="content-header">
            <h1>
                Subadmin Details Of <?php echo $row->name; ?>
            </h1>
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-body table-responsive no-padding" >
                            <table id="example1"  class="table table-hover">
                                <thead>
                                    <tr>
                                        <th> Name</th>
                                        <td><?php echo $row->name; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Email</th>
                                        <td><?php echo $row->email; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Phone</th>
                                        <td><?php echo $row->phone; ?></td>
                                    </tr>
                                    <tr>
                                        <th>City</th>
                                        <td><?php echo $row->city; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Role</th>
                                        <td><?php if($row->role == 1){ echo 'Power User'; }else{ echo 'Operator'; } ?></td>
                                    </tr>
                                    <tr>
                                        <th>Image</th>
                                        <td>
                                            <?php
                                            $id = $row->id_admin;
                                            $image = $row->profile_image;
                                            ?>
                                            <a <?php if ($image != "") { ?> class="iframe"  href="<?php echo base_url() . 'admin/users/viewimage/' . $id; ?>" <?php } ?>>
                                                <img src="<?php
                                                if (filter_var($image, FILTER_VALIDATE_URL)) {
                                                    echo $image;
                                                } else if ($image != "") {
                                                    echo base_url('uploads/admin/' . $image);
                                                } else {
                                                    echo base_url() . 'assets/images/default_img.png';
                                                }
                                                ?>" height="50" width="50" title="Profile Image" alt="Profile Image"/>
                                            </a>
                                        </td>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div><!-- /.box-body -->
                    </div><!-- /.box -->
                </div><!-- /.col -->
            </div><!-- /.row -->
        </section><!-- /.content 
        <?php
    }
}
?>

