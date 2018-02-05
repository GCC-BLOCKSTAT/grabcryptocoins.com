<link href="<?php echo base_url('assets/plugins/datatables/dataTables.bootstrap.css'); ?>" rel="stylesheet" type="text/css" /> 
<link href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />    
<!-- FontAwesome 4.3.0 -->
<!-- Theme style -->
<link href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />  
<!-- Content Header (Page header) -->

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
                                    <?php if($data->aadhar != ''){?>
                                    <tr>
                                        <th>Aadhar Card No.</th>
                                        <td><?php echo $data->aadhar; ?></td>
                                    </tr>
                                    <?php }else if($data->pan != ''){ ?>
                                    <tr>
                                        <th>Pan Card No.</th>
                                        <td><?php echo $data->pan; ?></td>
                                    </tr>
                                    <?php }else if($row->pan != ''){ ?>
                                    <tr>
                                        <th>Passport Card No.</th>
                                        <td><?php echo $data->passport; ?></td>
                                    </tr>
                                    <?php } ?>
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
                                    <?php if($userDetailPayment->method_values){?>
                                    <tr>
                                        <th>MTCIN Number</th>
                                        <td><?php echo $userDetailPayment->method_values; ?></td>
                                    </tr>
                                    <?php } ?>
                                    <tr>
                                        <th>Payment</th>
                                        <td><?php echo $userDetailPayment->payment; ?></td>
                                    </tr>
                                    <tr>
                                        <th>User Approved By</th>
                                        <td><?php if(!empty($approvedUserData)){
                                            echo $approvedUserData->name;
                                            if($approvedUserData->role == 0){ 
                                                echo ' (Admin)';
                                            }elseif($approvedUserData->role == 1){ 
                                                echo ' (Power User)';
                                            }else{ 
                                                echo ' (Operator)';
                                            }
                                        }else{ echo '-------' ; } ?></td>
                                    </tr>
                                    <tr>
                                        <th>Add Money Request Approved By</th>
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
<!--                                    <tr>
                                        <th>Reference</th>
                                        <td><?php // echo $row->reference; ?></td>
                                    </tr>-->
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div><!-- /.box-body -->
                    </div><!-- /.box -->
                </div><!-- /.col -->
            </div><!-- /.row -->
        </section><!-- /.content 
      

