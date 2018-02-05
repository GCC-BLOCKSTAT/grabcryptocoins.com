<link href="<?php echo base_url('assets/plugins/datatables/dataTables.bootstrap.css'); ?>" rel="stylesheet" type="text/css" /> 
<link href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />    
<!-- FontAwesome 4.3.0 -->
<!-- Theme style -->
<link href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />  
<!-- Content Header (Page header) -->

<section class="content-header">
    <h1> <?php echo $row->fname . ' ' . $row->mname . ' ' . $row->lname; ?></h1>
</section>
<!-- Main content -->
<section class="content">
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header">
<!--                    <h3 class="box-title">Make Account</h3>-->
                </div>
                <form class="popupClass" id="popupLevel" >
                    <div class="form-group" style="width:100%">
                        <label for="level">Level:</label>
                        <input type="text"  class="form-control" name="levelUser" id="levelUser" style="width:100%">
                        <span class="grey" style="color:red;" id="errLevelUser"></span>
                    </div>
                    <div class="form-group" style="width:100%">
                        <label for="buy">Buy Limit:</label>
                        <input type="text" name="buyingLimit" id="buyingLimit" class="form-control" style="width:100%">
                        <span class="grey" style="color:red;" id="errBuyingLimit"></span>
                    </div>
                    <div class="form-group" style="width:100%">
                        <label for="buy">Sell Limit:</label>
                        <input type="text" name="selingLimit" id="selingLimit" class="form-control" style="width:100%">
                        <span class="grey" style="color:red;" id="errSelingLimit"></span>
                    </div>
                    <div class="form-group" style="width:100%">
                        <label for="buy">Reference:</label>
                        <input type="text" name="reference" id="txnActiveId" class="form-control" style="width:100%">
                        <span class="grey" style="color:red;" id="errTxnActiveId"></span>
                    </div>
                    <input type="hidden" name="userID" id="userID" value="<?php echo $row->id; ?>">
                    <input type="hidden" name="statusID" id="statusID" value="<?php echo $row->status; ?>">
                    <?php if(isset($_SESSION['admin'])){
                            $ses_id = $_SESSION['admin'];
                    }elseif(isset($_SESSION['poweruser'])){
                            $ses_id = $_SESSION['poweruser'];
                    }else{
                            $ses_id = $_SESSION['operator'];
                    } ?>
                    <input type="hidden" name="approved_by" value="<?php echo $ses_id; ?>">
                    <div class="modal-footer">
                        <span class="grey" style="color:green;" id="suceesLevel"></span>
                        <button type="submit" class="btn btn-default" >Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>   
</section>
<script type = "text/javascript" src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('form#popupLevel').submit(function (event) {
            event.preventDefault();
            $('.errormsg').html('');
            var error = 0;
            var levelUser = $("#levelUser").val();
            var buyingLimit = $("#buyingLimit").val();
            var selingLimit = $("#selingLimit").val();
            var sub_txn_id = $('#txnActiveId').val();

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
            } else if (isNaN(selingLimit)) {
                $('#errSelingLimit').show();
                $('#errSelingLimit').text("Please enter the numeric value");
                error = 1;
            } else {
                $('#errSelingLimit').hide();
            }
            
//            if (sub_txn_id == '' && sub_txn_id == '') {
//                $('#errTxnActiveId').text('Please Enter the Transaction ID');
//                error = 1;
//            } else {
//                $('#errTxnActiveId').hide();
//            }

            var formData = new FormData(this);
            var burl = '<?php echo base_url('admin/users/Update'); ?>';
            if (error == 0) {
                $.ajax({
                    type: "POST",
                    url: burl,
                    contentType: false,
                    processData: false,
                    data: formData,
                    success: function (response) {
                        if (response == '2') {
                            $('#suceesLevel').html('User activated Successfully.');
                            setTimeout(function() {
                                window.location.reload(1);
                            }, 3000);
                            window.parent.location.reload();
                        }
                    }
                });
                event.preventDefault();
            }

        });
    });
</script>

