<div id="kind_edit<?php echo $kind_id ?>" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Thay đổi thông tin Chủng loại sản phẩm</h4>
      </div>
      <div class="modal-body">
      <form role="form" method="POST" action="model/kind_edit.php">
      	<label for="usr">Tên chủng loại:</label>
        <input type="text" style="display:none" name="id" value="<?php echo $kind_id ?>"/>
         <input type="text" class="form-control" id="name" name="name" value="<?php echo $name_kind; ?>">
      </div>
      <div class="modal-footer">
      <input type="submit" value="Save"/>
       
      </div>
      </form>
    </div>

  </div>
</div>