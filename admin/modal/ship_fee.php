<div id="ship_fee<?php echo $id_dis ?>" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
      
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Thay đổi phí ship</h4>
      </div>
     
      
      <form role="form" method="POST" action="model/delivery_ship_fee_change.php" class="form-horizontal">
       <div class="modal-body">
          <div class="form-group">
            <label class="control-label" for="email">Phí ship:</label>
            <input type="text" style="display:none" value="<?php echo $id_dis; ?>" name="id"/>
              <input type="text"  class="form-control price"  placeholder="Điền giá gốc của sản phẩm" name="price" value="<?php echo $ship_fee; ?>">
           
         </div>
         
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-success" >Save</button>
      </div>
    </form>
    </div>
  </div>
  </div>
</div>