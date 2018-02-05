<script src="<?php echo base_url(); ?>assets/dist/js/jquery-2.2.3.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/dist/js/bootstrap.js" type="text/javascript"></script>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Subadmin Detail</h1>
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
                        <a  href="<?php echo base_url(); ?>admin/subadmin/add"><input type="button" value="Add Subadmin" class="btn  btn-success" title="Add Subadmin Content"/></a>
                    </div>
                    <span id="sucess" style="color: #16e216;">
                        <?php
                        if ($this->session->flashdata('inserted')) {
                            echo '<p style="margin-left:10px;font-size:18px;">Subadmin Update Sucessfully</p>';
                        } else if ($this->session->flashdata('update')) {
                            echo '<p style="margin-left:10px;font-size:18px;>Subadmin Inserted Sucessfully</p>';
                        }
                        ?>
                    </span>
                    <div class="box-body">
                        <table class="table table-bordered table-striped example1">
                            <thead>
                                <tr>
                                    <th style="width:10%;">S.No</th>
                                    <th style="width:15%;">Name</th>
                                    <th style="width:15%;">Email</th>
                                    <th style="width:15%;">Phone</th>
                                    <th style="width:15%;">City</th>
                                    <th style="width:15%;">Role</th>
                                    <th style="width:15%">Action</th>
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
                                            <td style="width:15%;"><?php echo $row->name; ?></td>
                                            <td style="width:15%;"><?php echo $row->email; ?></td>
                                            <td style="width:15%;"><?php echo $row->phone; ?></td>
                                            <td style="width:15%;"><?php echo $row->city; ?></td>
                                            <td style="width:15%;"><?php if($row->role == 1){ echo 'Power User'; }else{ echo 'Operator'; } ?></td>
                                            <td style="width:15%;">
                                                <a href="<?php echo base_url(); ?>admin/subadmin/add/<?php echo $row->id_admin; ?>"><img src="<?php echo base_url('assets/images/edit.png'); ?>" alt="Update page"  width="20" height="20" style="cursor: pointer;" title="Update Page"/></a>
                                                <a class="iframe" href="<?php echo base_url(); ?>admin/subadmin/userView/<?php echo $row->id_admin; ?>">
                                                    <img src="<?php echo base_url('assets/images/Eye.png'); ?>" alt="View User" width="20" height="20" style="cursor: pointer;" title="View Details"/></a>
                                                <img src="<?php echo base_url('assets/images/delete.png'); ?>" onclick="deleteUser(<?php echo($row->id_admin); ?>)" width="20" height="20" style="cursor: pointer;">
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
        if (confirm('Are you sure want to delete Subadmin?')) {
            $.ajax({
                url: '<?php echo base_url('admin/subadmin/deleteSubadmin'); ?>',
                type: 'post',
                data: {'id': id, 'table': 'tbl_admin'},
                success: function (data) {
                    alert('Subadmin Deleted Sucessfully');
                    window.location.reload();
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

