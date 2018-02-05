<script src="<?php echo base_url(); ?>assets/dist/js/jquery-2.2.3.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/dist/js/bootstrap.js" type="text/javascript"></script>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>User Add Money Detail</h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>admin/home"><i class="fa fa-dashboard"></i> Home</a></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-body">
                        <table class="table table-bordered table-striped example1">
                            <thead>
                                <tr>
                                    <th style="width:4%;">S.No</th>
                                    <th style="width:12%;">Name</th>
                                    <th style="width:8%;">Amount</th>
                                    <th style="width:10%;">Transaction ID</th>
                                    <th style="width:10%;">Payment</th>
                                    <th style="width:8%;">Created</th>
                                    <th style="width:8%;">Updated</th>
                                    <th style="width:6%;">Status</th>
                                    <th style="width:10%;">View</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                if ($data) {
                                    foreach ($data as $row) {
                                        ?>
                                        <tr>
                                            <td style="width:4%;"><?php echo $i; ?></td>
                                            <td style="width:12%;"><?php echo $row->fname.' '.$row->mname.' '.$row->lname; ?></td>
                                            <td style="width:8%;"><?php echo $row->payment_amt; ?></td>
                                            <td style="width:10%;"><?php echo $row->txn_id; ?></td>
                                            <td style="width:10%;"><?php echo $row->payment; ?></td>
                                            <?php if($row->date){
                                                date_default_timezone_set('Asia/Kolkata');
                                                    $created_date = date('d/m/Y h:i:s a', $row->date); 
                                                }else{ 
                                                    $created_date = '-------'; }
                                                  
                                                    ?>
                                            <td style="width:8%;"><?php echo $created_date; ?></td>
                                            <?php if($row->update_date){
                                                date_default_timezone_set('Asia/Kolkata');
                                                    $update_dated = date('d/m/Y h:i:s a', $row->update_date); 
                                                }else{ 
                                                    $update_dated = '-------'; }
                                                  
                                                    ?>
                                            <td style="width:8%;"><?php echo $update_dated; ?></td>
                                            <td style="width:6%;"><?php
                                            if($row->status == 'Completed'){
                                            echo $row->status;  
                                            }else{ ?>
                                                
                                                <a class="iframe" href="<?php echo base_url(); ?>admin/money/userStatus/<?php echo $row->id; ?>/<?php echo $row->paymentID;?>">
                                                <img src="<?php echo base_url('assets/images/Eye.png'); ?>" alt="View User" width="20" height="20" style="cursor: pointer;" title="View Details"/></a>
                                            <?php } ?></td>
                                            <td style="width:10%;">
                                                <a class="iframe" href="<?php echo base_url(); ?>admin/money/userView/<?php echo $row->id; ?>/<?php echo $row->paymentID;?>">
                                                <img src="<?php echo base_url('assets/images/Eye.png'); ?>" alt="View User" width="20" height="20" style="cursor: pointer;" title="View Details"/></a>
                                            </td>
                                        </tr>
                                        <?php
                                        $i++;
                                    }
                                } else {
                                    echo '<tr><td colspan=9 align=center><font color="red">No Data Found</font></td></tr>';
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
//    function deleteUser(id) {
//        if (confirm('Are you sure want to delete User?')) {
//            $.ajax({
//                url: '<?php // echo base_url('admin/users/deleteuser'); ?>',
//                type: 'post',
//                data: {'id': id, 'table': 'tbl_users'},
//                success: function (data) {
//                    alert('User Deleted Sucessfully');
//                    window.location.reload();
//                }, error: function () {
//                    alert('Some Internal Error.');
//                }
//            });
//        }
//    }
//    function updatewalletstatus(userID,buyId, walletstatusID) {
//        if (walletstatusID == 2) {
//            var msg = 'Activate';
//        } else {
//            var msg = (walletstatusID == 0) ? 'Verified' : 'Not Verified';
//        }
//        if (confirm('Are you sure want to ' + msg + ' for this user?')) {
//            $.ajax({
//                url: '<?php // echo base_url('admin/Response/Update'); ?>',
//                type: 'post',
//                data: {userID: userID,walletstatusID:walletstatusID},
//                success: function (data) {
//                    window.location.href = window.location.href;
//                }, error: function () {
//                    alert('Some Internal Error.');
//                }
//
//            });
//        }
//    }
    $(document).ready(function () {
        $('form#popupLevel').submit(function (event) {
            event.preventDefault();
            $('.errormsg').html('');
            var error = 0;
            var levelUser = $("#levelUser").val();
            var buyingLimit = $("#buyingLimit").val();
            var selingLimit = $("#selingLimit").val();
            
            if (levelUser == '' && levelUser == '') {
                $('#errLevelUser').text('Please enter Level');
                error = 1;
            } else {
                $('#errLevelUser').hide();
            }
            if (buyingLimit == '' && buyingLimit == '') {
                $('#errBuyingLimit').text('Please enter Buy Limit');
                error = 1;
            } else if (isNaN(buyingLimit)) {
                $('#errBuyingLimit').show();
                $('#errBuyingLimit').text("Please enter the numeric value");
                error = 1;
            } else {
                $('#errBuyingLimit').hide();
            }
            if (selingLimit == '' && selingLimit == '') {
                $('#errSelingLimit').text('Please enter Sell Limit');
                error = 1;
            }else if (isNaN(selingLimit)) {
                $('#errSelingLimit').show();
                $('#errSelingLimit').text("Please enter the numeric value");
                error = 1;
            } else{
                $('#errSelingLimit').hide();
            }

            var formData = new FormData(this);
            var burl = '<?php echo base_url('admin/Sellwallet/Update'); ?>';
        if (error == 0) {
                $.ajax({
                    type: "POST",
                    url: burl,
                    contentType: false,
                    processData: false,
                    data: formData,
                    success: function (response) {
                        if (response == '2') {
                            $('#suceesLevel').html('Buy wallet trasnsaction has been succcesfully completed.');
                            window.location.href = window.location.href;
                        }
                    }
                });
                event.preventDefault();
            }
            
        });
    });
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

