<div id="category_edit<?php echo $category_id ?>" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Thay đổi thông tin nhóm sản phẩm</h4>
      </div>
      <div class="modal-body">
      <form role="form" method="POST" action="model/category_edit.php">
      	<label for="usr">Tên nhóm sản phẩm:</label>
        <input type="text" style="display:none" name="id" value="<?php echo $category_id ?>"/>
         <input type="text" class="form-control" id="name" name="name" value="<?php echo $category_name; ?>">
         <label for="usr">Chọn chủng loại sản phẩm:</label>
         <select class="form-control" name="kind">
         	<option value="<?php echo $id_kind  ?>">Chọn chủng lại sản phẩm</option>
            <?php
				$query3_1 = mysqli_query($conn,"SELECT * FROM product_kind");
				while($row3_1 = mysqli_fetch_array($query3_1))
				{
					$id_kind_edit = $row3_1['ID_Product_Kind'];
					$name_kind_edit = $row3_1['Product_Kind_Name'];
					echo" <option value='$id_kind_edit'>$name_kind_edit</option>";
				}
			?>
           
         </select>
      </div>
      
      <div class="modal-footer">
      <input type="submit" value="Save"/>
       
      </div>
      </form>
    </div>

  </div>
</div>