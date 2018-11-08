<?php
	include("conn.php");
	mysqli_set_charset($conn, 'UTF8');
	include("session.php");
	 $fuserid=$_SESSION['login']['id'];
	$query=mysqli_query($conn,"SELECT * FROM `member`  INNER JOIN member_duty ON member.ID_Member_Duty=member_duty.ID_Member_Duty WHERE ID_Member='$fuserid'");
	$row=mysqli_fetch_array($query);
	?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Trang quản trị</title>
    <?php include("head.php"); ?>

</head>

<body class="skin-blue">
	<div class="wrapper">
 <!-- header+ sidemenu-->
    <?php include("sidemenu.php"); ?>
 <!--end header+side menu-->
 <!--content-->
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Dashboard
            <small>Đơn hàng</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Đơn hàng</li>
          </ol>
        </section>
     <!-- Main content -->
     	<div class="box">
                <div class="box-header">
                  <h3 class="box-title">Toàn bộ đơn hàng</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                      	<th>Mã hàng</th>
                        <th>Tên hàng</th>
                        <th>Tồn kho</th>
                        <th>Giá nhập kho</th>
                        <th>Tổng tiền</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
						$query3=mysqli_query($conn,"SELECT product_main.ID_Product,product_main.Product_Name FROM product_main  ORDER BY product_main.ID_Product");
						$sum_total = 0;
						while($row3 = mysqli_fetch_array($query3))
						{
							
							$id_pro=$row3['ID_Product'];
							$query3_1 = mysqli_query($conn,"SELECT * FROM price_export_calculation WHERE id='$id_pro' ORDER BY stt DESC");
							$row3_1 = mysqli_fetch_array($query3_1);
							$price_import=$row3_1['price'];
							$name_pro = $row3['Product_Name'];
							$query4 = mysqli_query($conn,"SELECT SUM(Quantity_Import) AS import_pro FROM product_import_detail WHERE ID_Product='$id_pro'");
							$row4 = mysqli_fetch_array($query4);
							$import_pro = $row4['import_pro'];
							$query5 = mysqli_query($conn,"SELECT SUM(Product_Quantity) AS export_pro FROM product_export WHERE ID_Product='$id_pro'");
							$row5 = mysqli_fetch_array($query5);
							$export_pro = $row5['export_pro'];
							$warehouse = $import_pro-$export_pro;
							
							$sub_sum = $price_import*$warehouse;
							$sum_total+=$sub_sum;
							
						  echo"<tr>";
							echo"<td>$id_pro</td>";
							echo"<td>$name_pro</td>";
							echo"<td>$warehouse</td>";
							echo"<td>".number_format($price_import)."</td>";
							echo"<td>".number_format($sub_sum)."</td>";
							
							
						
							
						  echo"</tr>";
						}
                    ?>  
                    </tbody>
                     <tfoot>
                    	<tr>
                        	<td colspan="2" style="color:#FF0000">Tổng giá trị tồn kho hiện tại </td>
                            <td colspan="2" style="color:#FF0000"><?php echo number_format($sum_total);?></td>
                        </tr>
                    </tfoot>
                  </table>
                </div><!-- /.box-body -->
                
              </div>
              
     <!-- end main content -->  
    </div>
 <!--end content-->
    </div>
    <?php mysqli_close($conn)?>
<?php include("js_table.php"); ?>
</body>
</html>
