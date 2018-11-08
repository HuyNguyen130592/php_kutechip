<div id="sale_pro<?php echo $id_product ?>" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
      
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Thay đổi giá khuyến mãi</h4>
      </div>
     
      
      <form role="form" method="POST" action="model/sale_product_change.php" class="form-horizontal">
       <div class="modal-body">
          <div class="form-group">
            <label class="control-label" for="email">Giá gốc:</label>
            <input type="text" style="display:none" value="<?php echo $id_product; ?>" name="id"/>
              <input type="text"  class="form-control price"  placeholder="Điền giá gốc của sản phẩm" name="price" value="<?php echo $price1; ?>">
           
         </div>
         <div class="form-group">
        
            <label class="control-label" for="pwd">Giá sau khi giảm:</label>
           
              <input type="text" class="form-control price_after"  placeholder="Điền giá sau khi giảm" name="price_after" value="<?php echo $price_after; ?>">
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