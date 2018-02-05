<link href="<?php echo base_url('assets/plugins/datatables/dataTables.bootstrap.css'); ?>" rel="stylesheet" type="text/css" /> 
<link href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />    
<!-- FontAwesome 4.3.0 -->
<!-- Theme style -->
<link href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />  
<!-- Content Header (Page header) -->
<?php
if ($data && $data->num_rows()) {
    foreach ($data->result() as $row) {
        $userid = $row->id;
        ?>
        <section class="content-header">
            <h1>User Details Of <?php echo $row->fname.' '.$row->mname.' '.$row->lname; ?></h1>
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-body table-responsive no-padding">
                            <table id="example1"  class="table table-hover">
                                <thead>
                                    <tr>
                                        <th> Name</th>
                                        <td><?php echo $row->fname.' '.$row->mname.' '.$row->lname; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Email</th>
                                        <td><?php echo $row->email; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Phone</th>
                                        <td><?php echo $row->mobile; ?></td>
                                    </tr>
                                    <?php if($row->aadhar != ''){?>
                                    <tr>
                                        <th>Aadhar Card No.</th>
                                        <td><?php echo $row->aadhar; ?></td>
                                    </tr>
                                    <?php }else if($row->pan != ''){ ?>
                                    <tr>
                                        <th>Pan Card No.</th>
                                        <td><?php echo $row->pan; ?></td>
                                    </tr>
                                    <?php }else if($row->pan != ''){ ?>
                                    <tr>
                                        <th>Passport Card No.</th>
                                        <td><?php echo $row->passport; ?></td>
                                    </tr>
                                    <?php } ?>
                                    <tr>
                                        <th>User Transactions Limit</th>
                                        <td><?php echo $row->limitation; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Address</th>
                                        <td><?php echo $row->address; ?></td>
                                    </tr>
                                    <tr>
                                        <th>City</th>
                                        <td><?php echo $row->city; ?></td>
                                    </tr>
                                    <tr>
                                        <th>State</th>
                                        <td><?php echo $row->state; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Approved By</th>
                                        <td><?php if(!empty($approved_by)){
                                            echo $approved_by->name;
                                            if($approved_by->role == 0){ 
                                                echo ' (Admin)';
                                            }elseif($approved_by->role == 1){ 
                                                echo ' (Power User)';
                                            }else{ 
                                                echo ' (Operator)';
                                            }
                                        }else{ echo '-------' ; } ?></td>
                                    </tr>
                                    <tr>
                                        <th>Reference</th>
                                        <td><?php echo $row->reference; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Image</th>
                                        <td>
                                            <?php
                                            $id = $row->id;
                                            $image = $row->image;
                                            ?>
                                            <a <?php if ($image != "") { ?> class="iframe"  href="<?php echo base_url() . 'uploads/users/' . $image; ?>" <?php } ?>>
                                                <img src="<?php
                                                if (filter_var($image, FILTER_VALIDATE_URL)) {
                                                    echo $image;
                                                } else if ($image != "") {
                                                    echo base_url('uploads/users/' . $image);
                                                } else {
                                                    echo base_url() . 'assets/img/aadhar.jpg';
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

