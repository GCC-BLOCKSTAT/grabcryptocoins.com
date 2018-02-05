<link href="<?php echo base_url('assets/plugins/datatables/dataTables.bootstrap.css'); ?>" rel="stylesheet" type="text/css" /> 
<link href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />    
<!-- FontAwesome 4.3.0 -->
<!-- Theme style -->
<link href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />  
<!-- Content Header (Page header) -->
<?php //echo '<pre>'; print_r($data); die;
if ($data) { ?>
        <section class="content-header">
            <h1>User Details Of <?php echo $data->fname.' '.$data->mname.' '.$data->lname; ?></h1>
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
                                        <td><?php echo $data->fname.' '.$data->mname.' '.$data->lname; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Email</th>
                                        <td><?php echo $data->email; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Phone</th>
                                        <td><?php echo $data->mobile; ?></td>
                                    </tr>
                                    <tr>
                                        <th>User Transactions Limit</th>
                                        <td><?php echo $data->limitation; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Address</th>
                                        <td><?php echo $data->address; ?></td>
                                    </tr>
                                    <tr>
                                        <th>City</th>
                                        <td><?php echo $data->city; ?></td>
                                    </tr>
                                    <tr>
                                        <th>State</th>
                                        <td><?php echo $data->state; ?></td>
                                    </tr>
                                    <tr>
                                        <th>User Approved By</th>
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
                                        <td><?php echo $data->reference; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Withdraw Request Approved By</th>
                                        <td><?php if(!empty($withdraw_approved_by)){
                                            echo $withdraw_approved_by->name;
                                            if($withdraw_approved_by->role == 0){ 
                                                echo ' (Admin)';
                                            }elseif($withdraw_approved_by->role == 1){ 
                                                echo ' (Power User)';
                                            }else{ 
                                                echo ' (Operator)';
                                            }
                                        }else{ echo '-------' ; } ?></td>
                                    </tr>
                                    <tr>
                                        <th>Amount</th>
                                        <td><?php echo $data->withdraw_amount; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Withdraw Method</th>
                                        <td><?php echo $data->withdraw_mehod; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Transaction Number</th>
                                        <td><?php echo $data->withdraw_txn_id; ?></td>
                                    </tr>
                                    <?php if($data->withdraw_created_date){
                                        date_default_timezone_set('Asia/Kolkata');
                                        $created_date = date('d/m/Y h:i:s a', $data->withdraw_created_date); 
                                    }else{ 
                                        $created_date = '-------'; }

                                    if($data->withdraw_update_date){
                                        date_default_timezone_set('Asia/Kolkata');
                                        $update_date = date('d/m/Y h:i:s a', $data->withdraw_update_date); 
                                    }else{ 
                                        $update_date = '-------'; }
                                        ?>
                                    <tr>
                                        <th>Created Date</th>
                                        <td><?php echo $created_date; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Updated Date</th>
                                        <td><?php echo $update_date; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Status</th>
                                        <td><?php if($data->withdrawtatus == '1'){ echo 'Success'; }else if($data->withdrawtatus == '2'){echo 'Cancelled';}else{ echo 'Pending'; } ?></td>
                                    </tr>
                                    <tr>
                                        <th>Image</th>
                                        <td>
                                            <?php
                                            $id = $data->id;
                                            $image = $data->image;
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
        <?php } ?>

