<script src="<?php echo base_url(); ?>assets/dist/js/jquery-2.2.3.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/dist/js/bootstrap.js" type="text/javascript"></script>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Default Setting Detail</h1>
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
                        <!--<a href="<?php // echo base_url(); ?>admin/defaults/add"><input type="button" value="Add Default Setting" class="btn  btn-success" title="Add User Content"/></a>-->
                    </div>
                    <span id="sucess" style="color: #16e216;">
                        <?php
                        if ($this->session->flashdata('inserted')) {
                            echo '<p style="margin-left:10px;font-size:18px;">Default Setting Update Sucessfully</p>';
                        } else if ($this->session->flashdata('update')) {
                            echo '<p style="margin-left:10px;font-size:18px;>Default Setting Inserted Sucessfully</p>';
                        }
                        ?>
                    </span>
                    <div class="box-body">
                        <table class="table table-bordered table-striped example1">
                            <thead>
                                <tr>
                                    <th style="width:10%;">S.No</th>
                                    <th style="width:10%;">Coin</th>
                                    <th style="width:10%;">Tax(%)</th>
                                    <th style="width:20%;">Commission(%)</th>
                                    <th style="width:10%;">Type</th>
                                    <th style="width:20%;">Transactions Charges(INR)</th>
                                    <th style="width:20%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                if ($data) {
                                    foreach ($data as $row) {
                                        ?>
                                        <tr>
                                            <td style="width:10%;"><?php echo $i; ?></td>
                                            <td style="width:10%;"><?php echo $row->coin; ?></td>
                                            <td style="width:10%;"><?php echo $row->tax; ?></td>
                                            <td style="width:20%;"><?php echo $row->commision; ?></td>
                                            <td style="width:10%;">
                                                <?php if($row->type == 1){
                                                echo 'BUY'; }else{ echo 'SELL'; } ?></td>
                                            <td style="width:20%;"><?php echo $row->charges; ?></td>
                                            <td style="width:20%;">
                                                <?php if ($row->status == 1) { ?>
                                                    <img src="<?php echo base_url('assets/images/accept.png');?>" alt="Active Notification"  onclick="updatestatus(<?php echo $row->id; ?>, <?php echo $row->status; ?>)" width="20" height="20" style="cursor: pointer;" title="Active Notification"/>
                                                <?php }else{ ?>
                                                    <img src="<?php echo base_url('assets/images/decline.png'); ?>" alt="Inactive Notification" onclick="updatestatus(<?php echo $row->id; ?>, <?php echo $row->status; ?>)" width="20" height="20" style="cursor: pointer;" title="Inactive Notification"/></a>
                                                <?php }  ?>
                                                <a href="<?php echo base_url(); ?>admin/defaults/add/<?php echo $row->id; ?>"><img src="<?php echo base_url('assets/images/edit.png'); ?>" alt="Update page"  width="20" height="20" style="cursor: pointer;" title="Update Page"/></a>
                                                <a class="iframe" href="<?php echo base_url(); ?>admin/defaults/userView/<?php echo $row->id; ?>">
                                                    <img src="<?php echo base_url('assets/images/Eye.png'); ?>" alt="View User" width="20" height="20" style="cursor: pointer;" title="View Details"/></a>
                                                
                                            </td>
                                        </tr>
                                        <?php
                                        $i++;
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
    
    function deleteUser(id) {
        if (confirm('Are you sure want to delete Default Setting?')) {
            $.ajax({
                url: '<?php echo base_url('admin/users/deleteuser'); ?>',
                type: 'post',
                data: {'id': id, 'table': 'tbl_default'},
                success: function (data) {
                    alert('Default Setting Deleted Sucessfully');
                    window.location.reload();
                }, error: function () {
                    alert('Some Internal Error.');
                }
            });
        }
    }
    
    function updatestatus(id, status) {
        if (status == 0) {
            var msg = 'Active';
        } else {
            var msg = 'Inactive';
        }
        if (confirm('Are you sure want to ' + msg + ' for this Notification?')) {
            $.ajax({
                url: '<?php echo base_url('admin/Defaults/updateStatus'); ?>',
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
<script type="text/javascript">
    $('#myTab a').click(function (e) {
        e.preventDefault();
        $(this).tab('show');
    });

// store the currently selected tab in the hash value
    $("ul.nav-tabs > li > a").on("shown.bs.tab", function (e) {
        var id = $(e.target).attr("href").substr(1);
        window.location.hash = id;
    });

// on load of the page: switch to the currently selected tab
    var hash = window.location.hash;
    $('#myTab a[href="' + hash + '"]').tab('show');
</script>

