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
                <form class="popupAdd" id="popupBuyMoney">
                    <div class="form-group">
                        <label for="buy">Wallet Address:</label>
                        <input type="text" name="wallet" id="popupbuyingamount" value="<?php echo $row->useraddress; ?>" class="form-control" readonly="readonly">
                        <span class="grey" style="color:red;" id="errAmount"></span>
                    </div>
                    <div class="form-group">
                        <label for="buy">Amount:</label>
                        <input type="text" name="amount" id="popupbuyingamount" value="<?php echo $row->coin; ?>" class="form-control" readonly="readonly">
                        <span class="grey" style="color:red;" id="errAmount"></span>
                    </div>
                    <div class="form-group" style="width:100%">
                        <label for="buy">Coin Name:</label>
                        <input type="text" name="coin_name" id="popupbuyingamount" value="<?php echo $row->buy_coin_name; ?>" class="form-control" readonly="readonly" style="width:100%">
                    </div>
                    <div class="form-group" style="width:100%">
                        <label for="buy">Coin Value:</label>
                        <input type="text" name="coin_value" id="popupbuyingamount" value="<?php echo $row->buy_coin_value; ?>" class="form-control" readonly="readonly" style="width:100%">
                    </div>
                    <div class="form-group">
                        <label for="buy">Transaction Number:</label>
                        <input type="text" name="txn" value="<?php echo $txn_number; ?>" class="form-control" readonly="readonly">
                        <span class="grey" style="color:red;" id="errAmount"></span>
                    </div>
                    <input type="hidden" name="buyID" id="buyID" value="<?php echo $row->buyid; ?>">
                    <input type="hidden" name="stauseAorove" id="stauseAorove" value="<?php echo $row->buyid; ?>">
                    <input type="hidden" name="statusID" id="stauseAorove" value="<?php echo $row->walletstatus; ?>">
                    <input type="hidden" name="user_id" id="stauseAorove" value="<?php echo $user_id; ?>">
                    <input type="hidden" value="" id="txnStatus">
                    <div class="form-group" style="width:100%">
                        <label class="checkbox-inline"><input type="radio" name="status" id="status1" value="0">Pending</label>
                        <label class="checkbox-inline"><input type="radio" name="status" id="status2" value="1">Success</label>
                        <label class="checkbox-inline"><input type="radio" name="status" id="status3" value="2">Canceled</label>
                        <br><span id="labelCError" style="color:red;"></span>
                    </div>
                     <?php if(isset($_SESSION['admin'])){
                            $ses_id = $_SESSION['admin'];
                    }elseif(isset($_SESSION['poweruser'])){
                            $ses_id = $_SESSION['poweruser'];
                    }else{
                            $ses_id = $_SESSION['operator'];
                    } ?>
                    <input type="hidden" name="approved_by" value="<?php echo $ses_id; ?>">
<!--                    <div class="form-group" id="successShow" style="display:none;width:100%">
                        <label for="buy">Transaction Number:</label>
                        <input type="text" name="txn" id="txn"  class="form-control" style="width:100%">
                        <span class="grey" style="color:red;" id="errTxn"></span>
                    </div>-->
                    <div class="modal-footer">
                        <span  style="color:green;" id="suceesLevelAcc"></span>
                        <button type="submit" class="btn btn-default" id="loadSubmit">Submit</button>
                    </div>
                        
                </form>
            </div>
        </div>
    </div>   
</section>
<script type = "text/javascript" src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('form#popupBuyMoney').submit(function (event) {
            event.preventDefault();
            var txn = $('#txn').val();
            var status = $('#txnStatus').val();
            if(status == '1'){
                if(txn == '' || txn == ' '){
                    $("#errTxn").text('Please Enter Tx No');
                    return false;
                }else{
                    $("#errTxn").hide();
                }
            }
            
            if ($('input[type=radio]:checked').length <= 0) {
                $('#labelCError').text('Please Select atleast one status');
                error = 1;
            } else {
                $('#labelCError').hide();
            }
            
            var formData = new FormData(this);
            var burl = '<?php echo base_url('admin/Sellwallet/statusView'); ?>';
                $.ajax({
                    type: "POST",
                    url: burl,
                    contentType: false,
                    processData: false,
                    data: formData,
                    success: function (response) {
                        if (response == '2') {
                            $('#suceesLevelAcc').html('Sell Wallet Updated Successfully.');
                            setTimeout(function() {
                                window.location.reload(1);
                            }, 3000);
                            window.parent.location.reload();
                        }
                    }
                });
                event.preventDefault();
            
        });
    });
    $(document).ready(function () {
        $('input[type="radio"]').click(function(){
            var inputvalue = $(this).val();
            if (inputvalue == '0') {
                $('#loadSubmit').hide();
                $('#successShow').hide();
                $('#txnStatus').attr('value', '');
            }else if(inputvalue == '1'){
                $("#successShow").css("display", "none");
                $('#txnStatus').attr('value', '');
                $('#loadSubmit').show();
            }else if(inputvalue == '2'){
                $('#loadSubmit').show();
                $('#successShow').hide();
                $('#txnStatus').attr('value', '');
            }else{
                
            }
        });
    });
</script>

