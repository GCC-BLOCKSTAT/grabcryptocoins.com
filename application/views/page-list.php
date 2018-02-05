<?php

$i = 1;
if ($data) {
    $content = $data->description;
?>
    <?php echo $content; ?>
    <?php

    $i++;
} else {
    echo '<font color="red">No Data Found</font>';
}
    ?>
<!-- Modal -->
<!--<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

     Modal content
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">
        <p>Some text in the modal.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>-->
<!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function () {
            $('.with_overlapped_button').click(function () {
             $('#myModal').modal('show'); 
        }); 
    });
</script>-->