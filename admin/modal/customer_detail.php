<div id="myModal<?php echo $id_cus; ?>" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Danh sách mua hàng</h4>
      </div>
      <div class="modal-body" style="overflow: auto">
      <div>
      	
       </div>
      	<?php 
			$query1_1 = mysqli_query($conn,"SELECT oder.ID_Oder,oder.Oder_Sum,oder.Oder_Date,Oder_Status.Name FROM oder INNER JOIN Oder_Status ON Oder_Status.ID=oder.Oder_Status WHERE oder.ID_Customer='$id_cus'");
			while($row1_1= mysqli_fetch_array($query1_1));
				{
					$ngay = date('d/m/Y ',strtotime($row1_1['Oder_Date']));
					$ma_dh = $row1_1['ID_Oder'];
					$gt_dh = number_format($row1_1['Oder_Sum']);
					$status_dh = $row1_1['Name'];
					
					echo $ngay;
					
				}
		?>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>