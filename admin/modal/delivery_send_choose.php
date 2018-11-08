<div id="delivery_send_choose<?php echo $id_oder; ?>" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Chọn dịch vụ giao hàng</h4>
      </div>
      <div class="modal-body">
     <form method="post" action="model/delivery_send_addnew.php" >
     <input type="text" value="<?php echo  $id_oder ?>" style="display:none" name="id_oder"/>
     <div class="form-group">
      <select class="form-control" name="id_delivery">
      	<option value="DL01">Chọn dịch vụ giao hàng</option>
      <?php
	   $query12 = mysqli_query($conn,"SELECT * FROM `delivery_information`");
	   while($row12 = mysqli_fetch_array($query12))
	   		{
				$delivery_id = $row12['id'];
				$delivery_name = $row12['name'];
				echo"<option value='$delivery_id'>$delivery_name</option>";
		   }
	  ?>
      </select>
     </div>
     <div class="form-group">
      <select class="form-control" name="id_warehouse">
      	<option value="WI01">Chọn kho lấy hàng</option>
        <?php
			$query13 = mysqli_query($conn,"SELECT * FROM `delivery_warehouse_information`");
			while($row13 = mysqli_fetch_array($query13))
				{
					$warehouse_name = $row13['name'];
					$warehouse_id = $row13['id'];
					echo"<option value='$warehouse_id'>$warehouse_name</option>";
				}
			
		?>
        
      </select>
     </div>
      </div>
      <div class="modal-footer">
        <input type="submit" class="btn btn-success" value="Giao hàng"/>
      </div>
      </form>
    </div>

  </div>
</div>