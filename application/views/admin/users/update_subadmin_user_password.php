<link href="<?php echo base_url('assets/plugins/datatables/dataTables.bootstrap.css'); ?>" rel="stylesheet" type="text/css" /> 
<link href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />    
<!-- FontAwesome 4.3.0 -->
<!-- Theme style -->
<link href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />  
<!-- Content Header (Page header) -->

<section class="content-header">
    <h1>Update Password Of <?php echo ucwords($row->fname . ' ' . $row->mname . ' ' . $row->lname); ?></h1>
</section>
<!-- Main content -->
<section class="content">
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header"></div>
                <form class="popupAdd" id="popupUpdatePwd">
                    <div class="form-group" style="width:100%">
                        <label for="buy">Enter Password:</label>
                        <input type="password" name="password" id="popupSubadmin" class="form-control" style="width:100%">
                        <span class="grey" style="color:red;" id="errSubPwd"></span>
                    </div>
                    <div class="form-group" style="width:100%">
                        <label for="buy">Confirm Password:</label>
                        <input type="password" name="confirm_password" id="popupSubadminConfirm" class="form-control" style="width:100%">
                        <span class="grey" style="color:red;" id="errSubConfirmPwd"></span>
                    </div>
                    <input type="hidden" name="userID" id="useramountID" value="<?php echo $row->id; ?>">
                    <div class="modal-footer">
                        <span  style="color:green;" id="suceesSubadminAcc"></span>
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
        $('form#popupUpdatePwd').submit(function (event) {
            event.preventDefault();
            $('.errormsg').html('');
            var error = 0;
            var pwd = $('#popupSubadmin').val();
            var cpwd = $('#popupSubadminConfirm').val();
            
            if (pwd == '' && pwd == '') {
                $('#errSubPwd').text('Please enter the Password');
                error = 1;
            }else {
                $('#errSubPwd').hide();
            }

            if (cpwd == '' && cpwd == '') {
                $('#errSubConfirmPwd').text('Please renter the Password');
                error = 1;
            }else if(pwd != cpwd){
                $('#errSubConfirmPwd').text('Password and Confirm Password does not match');
                $('#errSubConfirmPwd').show();
                error = 1;
            }else {
                $('#errSubConfirmPwd').hide();
            }
            
            var formData = new FormData(this);
            var burl = '<?php echo base_url('admin/users/updateSubadminUserPwd'); ?>';
            if (error == 0) {
                $.ajax({
                    type: "POST",
                    url: burl,
                    contentType: false,
                    processData: false,
                    data: formData,
                    success: function (response) {
                        if (response == '2') {
                            $('#suceesSubadminAcc').text('User Password Updated Sucessfully');
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

