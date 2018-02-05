<link href="<?php echo base_url('assets/plugins/datatables/dataTables.bootstrap.css'); ?>" rel="stylesheet" type="text/css" /> 
<link href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />    
<!-- FontAwesome 4.3.0 -->
<!-- Theme style -->
<link href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />  
<!-- Content Header (Page header) -->

<section class="content-header">
    <h1> <?php echo $data->fname . ' ' . $data->mname . ' ' . $data->lname; ?></h1>
</section>
<!-- Main content -->
<section class="content">
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary">
                <form class="popupClass" id="statusSubmit" >
                    <div class="form-group" style="width:100%">
                        <label for="level">Transaction Number</label>
                        <input type="text"  class="form-control" name="trans" id="trans" style="width:100%">
                        <span class="grey" style="color:red;" id="errTrans"></span>
                    </div>
                    <div class="form-group">
                        <label for="buy">Status(Completed)</label>
                        <input type="checkbox" name="status" id="status" checked="checked">
                        <input type="hidden" name="idUser" value="<?php echo $data->id; ?>">
                        <input type="hidden" name="idPayment" value="<?php echo $paymentId; ?>">
                        <input type="hidden" name="ammountPayment" value="<?php echo $userDetailPayment->payment_amt; ?>">
                        <span class="grey" style="color:red;" id="errStatus"></span>
                    </div>
                    
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
        $('form#statusSubmit').submit(function (event) {
            event.preventDefault();
            $('.errormsg').html('');
            var error = 0;
            var trans = $("#trans").val();

            if (trans == '' && trans == '') {
                $('#errTrans').text('Please Transaction Number.');
                error = 1;
            } else {
                $('#errTrans').hide();
            }
            
            var formData = new FormData(this);
            var burl = '<?php echo base_url('admin/money/add'); ?>';
            if (error == 0) {
                $.ajax({
                    type: "POST",
                    url: burl,
                    contentType: false,
                    processData: false,
                    data: formData,
                    success: function (response) {
                        if (response == '2') {
                            $('#suceesLevel').html('Status Payment activated Successfully.');
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

