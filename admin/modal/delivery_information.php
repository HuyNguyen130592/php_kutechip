<div id="delivery_information<?php echo $id ?>" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Thay đổi thông tin Token</h4>
      </div>
      <div class="modal-body">
      <form role="form" method="POST" action="model/delivery_information_edit.php">
      	<label for="usr">Token:</label>
        <input type="text" style="display:none" name="id" value="<?php echo $id ?>"/>
         <input type="text" class="form-control" id="token" name="token" value="<?php echo $token; ?>">
      </div>
      <div class="modal-footer">
      <input type="submit" value="Save"/>
       
      </div>
      </form>
    </div>

  </div>
</div>