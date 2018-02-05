<link href="<?php echo base_url('assets/plugins/datatables/dataTables.bootstrap.css'); ?>" rel="stylesheet" type="text/css" /> 
<link href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />    
<!-- FontAwesome 4.3.0 -->
<!-- Theme style -->
<link href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />  
<!-- Content Header (Page header) -->
<?php
if ($data && $data->num_rows()) {
    foreach ($data->result() as $row) {
//        $userid = $row->id;
        ?>
        <section class="content-header">
<!--            <h1>User Details Of <?php // echo $row->name; ?></h1>-->
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
                                        <th> Coin</th>
                                        <td><?php echo $row->coin; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Tax</th>
                                        <td><?php echo $row->tax; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Commision</th>
                                        <td><?php echo $row->commision; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Charge</th>
                                        <td><?php echo $row->charges; ?></td>
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

