<script type = "text/javascript" src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>assets/dist/js/bootstrap.js" type="text/javascript"></script>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Bank Detail</h1>
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
                    </div>
                    <span id="sucess" style="color: #16e216;">
                        <?php
                        if ($this->session->flashdata('inserted')) {
                            echo '<p style="margin-left:10px;font-size:18px;">Bank Account Updated Sucessfully</p>';
                        } else if ($this->session->flashdata('update')) {
                            echo '<p style="margin-left:10px;font-size:18px;>Bank Account Updated Sucessfully</p>';
                        }
                        ?>
                    </span>
                    <div class="box-body">
                        <table class="table table-bordered table-striped example1">
                            <thead>
                                <tr>
                                    <th style="width:10%;">S.No</th>
                                    <th style="width:20%;">Bank Name</th>
                                    <th style="width:20%;">Account Number</th>
                                    <th style="width:10%;">Status</th>
                                    <th style="width:15%;">Created</th>
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
                                            <td style="width:20%;"><?php echo $row->name; ?></td>
                                            <td style="width:10%;"><?php echo $row->account; ?></td>
                                            <td style="width:10%;"><?php if($row->status == '1'){ echo 'Active'; }else{ echo 'Inactive'; } ?></td>
                                            <td style="width:15%;">
                                                <?php if(!empty($row->created)){
                                                    date_default_timezone_set('Asia/Kolkata');
                                                    echo date('d/m/y h:i:s a', $row->created);
                                                }else{
                                                    echo '-------';
                                                } ?>
                                            </td>
                                            <td style="width:20%;">  
                                            <!-- Set Edit Icon for admin Icon -->
                                                    <a href="<?php echo base_url(); ?>admin/bank/add/<?php echo $row->id; ?>"><img src="<?php echo base_url('assets/images/edit.png'); ?>" alt="Update page"  width="20" height="20" style="cursor: pointer;" title="Update Page"/></a>
                                                
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

<script>
    function deleteUser(id) {
        if (confirm('Are you sure want to delete User?')) {
            $.ajax({
                url: '<?php echo base_url('admin/users/deleteuser'); ?>',
                type: 'post',
                data: {'id': id, 'table': 'tbl_users'},
                success: function (data) {
                    alert('User Deleted Sucessfully');
                    window.location.reload();
                }, error: function () {
                    alert('Some Internal Error.');
                }
            });
        }
    }
    function updatestatus(userID, statusID) {
//    alert(userID);
        if (statusID == 2) {
            var msg = 'Activate';
        } else {
            var msg = (statusID == 0) ? 'Active' : 'Inactive';
        }
        if (confirm('Are you sure want to ' + msg + ' for this user?')) {
         $.ajax({
                url: '<?php echo base_url('admin/Users/Update'); ?>',
                type: 'post',
                data: {userID: userID,statusID:statusID},
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

