<script src="<?php echo base_url(); ?>assets/dist/js/jquery-2.2.3.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/dist/js/bootstrap.js" type="text/javascript"></script>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Notifications</h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>admin/home"><i class="fa fa-dashboard"></i> Home</a></li>

        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <a href="<?php echo base_url(); ?>admin/notifications/add"><input type="button" value="Add Notification" class="btn  btn-success" title="Add Notification Content"/></a>
                    </div>
                    <span id="sucess" style="color: #3c763d;">
                        <?php
                        if ($this->session->flashdata('inserted')) {
                            echo '<p style="margin-left:10px;font-size:18px;">Notification Update Sucessfully</p>';
                        } else if ($this->session->flashdata('update')) {
                            echo '<p style="margin-left:10px;font-size:18px;>Notification Inserted Sucessfully</p>';
                        }
                        ?>
                    </span>
                    <div class="box-body">
                        <table class="table table-bordered table-striped example1">
                            <thead>
                                <tr>
                                    <th style="width:10%;">S.No</th>
                                    <th style="width:50%;">Name</th>
                                    <th style="width:20%;">Status</th>
                                    <th style="width:20%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                if ($data) {
                                    foreach ($data as $row) { ?>
                                        <tr>
                                            <td style="width:10%;"><?php echo $i; ?></td>
                                            <td style="width:50%;"><?php echo $row->content; ?></td>
                                            <td style="width:20%;">
                                               <?php if ($row->status == 1) { ?>
                                                    <img src="<?php echo base_url('assets/images/accept.png');?>" alt="Active Notification"  onclick="updatestatus(<?php echo $row->id; ?>, <?php echo $row->status; ?>)" width="20" height="20" style="cursor: pointer;" title="Active Notification"/>
                                                <?php } else if ($row->status == 0) { ?>
                                                    <img src="<?php echo base_url('assets/images/decline.png'); ?>" alt="Inactive Notification" onclick="updatestatus(<?php echo $row->id; ?>, <?php echo $row->status; ?>)" width="20" height="20" style="cursor: pointer;" title="View Details"/></a>
                                                <?php }  ?>
                                            </td>
                                            <td style="width:20%;"><a href="<?php echo base_url(); ?>admin/notifications/add/<?php echo $row->id; ?>"><img src="<?php echo base_url('assets/images/edit.png'); ?>" alt="Update Notifications"  width="20" height="20" style="cursor: pointer;" title="Update Notifications"/></a></td>
                                        </tr>
        <?php $i++;
            }
        } else {
            echo '<tr><td colspan=7 align=center><font color="red">No Data Found</font></td></tr>';
        }
        ?>
                            </tbody>

                        </table>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->

            </div><!-- /.col -->
        </div><!-- /.row -->
    </section><!-- /.content -->
</div>


<script type="text/javascript">
    function updatestatus(id, status) {
        if (status == 0) {
            var msg = 'Active';
        } else {
            var msg = 'Inactive';
        }
        if (confirm('Are you sure want to ' + msg + ' for this Notification?')) {
            $.ajax({
                url: '<?php echo base_url('admin/Notifications/updateStatus'); ?>',
                type: 'post',
                data: {id: id,status: status},
                success: function (data) {
                    window.location.href = window.location.href;
                }, error: function () {
                    alert('Some Internal Error.');
                }

            });
        }
    }
</script>