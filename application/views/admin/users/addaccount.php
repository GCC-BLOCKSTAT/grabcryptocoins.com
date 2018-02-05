<link href="<?php echo base_url('assets/plugins/datatables/dataTables.bootstrap.css'); ?>" rel="stylesheet" type="text/css" /> 
<link href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />    
<!-- FontAwesome 4.3.0 -->
<!-- Theme style -->
<link href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />  
<!-- Content Header (Page header) -->

<section class="content-header">
    <h1>Make Account Of <?php echo $row->fname . ' ' . $row->mname . ' ' . $row->lname; ?></h1>
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
                <form class="popupAdd" id="popupAddMoney">
                    <div class="form-group" style="width:100%">
                        <label for="sel1">Buy:</label>
                        <select class="form-control" name="accType" id="sel1" style="width:100%">
                            <option value="paypal">Paypal</option>
                            <option value="western">Western</option>
                            <option value="money">Money Gram</option>
                            <option value="paytm">Paytm</option>
                        </select>
                    </div>
                    <div class="form-group" style="width:100%">
                        <label for="buy">Amount:</label>
                        <input type="text" name="popupbuyingamount" id="popupbuyingamount" class="form-control" style="width:100%">
                        <span class="grey" style="color:red;" id="errAmount"></span>
                    </div>
                    <input type="hidden" name="useramountID" id="useramountID" value="<?php echo $row->id; ?>">
                    <div class="modal-footer">
                        <span  style="color:green;" id="suceesLevelAcc"></span>
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
        $('form#popupAddMoney').submit(function (event) {
            event.preventDefault();
            $('.errormsg').html('');
            var error = 0;
            var amount = $("#popupbuyingamount").val();
            if (amount == '' && amount == '') {
                $('#errAmount').text('Please enter Amount');
                error = 1;
            } else if (isNaN(amount)) {
                $('#errAmount').show();
                $('#errAmount').text("Please enter the numeric value");
                error = 1;
            } else {
                $('#errAmount').hide();
            }
            
            var formData = new FormData(this);
            var burl = '<?php echo base_url('admin/users/addMoney'); ?>';
            if (error == 0) {
                $.ajax({
                    type: "POST",
                    url: burl,
                    contentType: false,
                    processData: false,
                    data: formData,
                    success: function (response) {
                        if (response == '2') {
                            $('#suceesLevelAcc').html('Wallet Updated Successfully.');
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

