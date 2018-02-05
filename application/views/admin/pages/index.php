<script src="<?php echo base_url(); ?>assets/dist/js/jquery-2.2.3.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/dist/js/bootstrap.js" type="text/javascript"></script>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Pages</h1>
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
                        <a  href="<?php echo base_url(); ?>admin/pages/add"><input type="button" value="Add Page" class="btn  btn-success" title="Add Page Content"/></a>
                    </div>
                    <span id="sucess" style="color: #3c763d;">
                        <?php
                        if ($this->session->flashdata('inserted')) {
                            echo '<p style="margin-left:10px;font-size:18px;">Page Update Sucessfully</p>';
                        } else if ($this->session->flashdata('update')) {
                            echo '<p style="margin-left:10px;font-size:18px;>Page Inserted Sucessfully</p>';
                        }
                        ?>
                    </span>
                    <div class="box-body">
                        <table class="table table-bordered table-striped example1">
                            <thead>
                                <tr>
                                    <th style="width:10%;">S.No</th>
                                    <th style="width:30%;">Name</th>
                                    <th style="width:30%;">Slug</th>
                                    <th style="width:20%;">Status</th>
                                    <th style="width:10%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                if ($data) {
                                    foreach ($data as $row) { ?>
                                        <tr>
                                            <td style="width:10%;"><?php echo $i; ?></td>
                                            <td style="width:30%;"><?php echo $row->name; ?></td>
                                            <td style="width:30%;"><?php echo $row->slug; ?></td>
                                            <td style="width:20%;">
                                                <?php if($row->status == 1){
                                                    echo 'Active';
                                                }else{ echo 'Inactive'; } ?>
                                            </td>
                                            <td style="width:10%;"><a href="<?php echo base_url(); ?>admin/pages/add/<?php echo $row->id; ?>"><img src="<?php echo base_url('assets/images/edit.png'); ?>" alt="Update page"  width="20" height="20" style="cursor: pointer;" title="Update Page"/></a></td>
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


