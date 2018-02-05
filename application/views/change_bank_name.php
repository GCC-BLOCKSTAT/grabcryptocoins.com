<div class="dropdown" style="width: 100%">
    <button class="dropdown-toggle bank-deropdown" type="button" data-toggle="dropdown"><span id="bankAccName"><?php echo strtoupper($bankData->bank_name); ?></span>
        <span class="caret"></span></button>
    <ul class="dropdown-menu bank-meneu" id="myBankId">
        <?php
        if (!empty($all_bank)) {
            foreach ($all_bank as $bank_datails):
                //if ($bank_datails->id != $bankName->id) {
                    ?>
                    <li><a href="javascript:void(0)" ><?php echo strtoupper($bank_datails->bank_name); ?></a></li>
        <?php //} 
        endforeach;
} ?>
    </ul>
</div>
<div class="form-group">
    <div class="bankacdetails">
        <h4 style="margin-bottom: 0px"><?php echo strtoupper($bankData->bank_name); ?></h4>
        <p style="margin-bottom: 0px"><b>Name: <?php echo $bankData->username; ?></b></p>
        <p style="margin-bottom: 0px"><b>Account Number: <?php echo $bankData->account_number; ?></b></p>
        <p style="margin-bottom: 0px"><b>IFSC Code: <?php echo $bankData->ifsc; ?></b></p>
    </div>
    <input type="hidden" value="<?php echo $user_id; ?>" id="getBankUserID">
    <input type="hidden" value="<?php echo $bankData->bank_name; ?>" name="bank_with_name" id="bankDetailsID">
</div>

<script type="text/javascript">
    $(document).ready(function(){
        $("#myBankId li").click(function() {
        
            var bankvalue = $(this).text();
            var userid = $('#getBankUserID').val();
            var bank_id_url = '<?php echo base_url('Bank/getBankName'); ?>';
            $.ajax({
                type: "POST",
                url: bank_id_url,
                data: {name: bankvalue, user_id: userid},
                success: function (response) {
                    $('#firstBank').hide();
                    $('#showBankDetails').html(response);
                    //$('#bankAccName').text(bankvalue);
                }
            });

        });
        
    });
    
</script>