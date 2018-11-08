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
            <small>Phiếu nhập kho</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Phiếu nhập</li>
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
                      	<th>Ngày nhập kho </th>
                        <th>Số phiếu</th>
                        <th>Tên NCC</th>
                        
                        <th>Số điện thoại</th>
                       
                       
                        <th>Tổng tiền</th>
                        
                        <th>Tùy chỉnh</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
						$query3=mysqli_query($conn,"SELECT * FROM product_import LEFT JOIN supplier ON product_import.ID_Supplier=supplier.ID");
						while($row3 = mysqli_fetch_array($query3))
						{
							
							$id_import = $row3['ID_Product_Import'];
							$name_supplier = $row3['Name'];
							$mobile_supplier = $row3['mobile'];
							$total = number_format($row3['Total']);
							$day = date('d/m/Y ',strtotime($row3['Date_Create']));
							
                      echo"<tr>";
                        echo"<td>$day</td>";
						echo"<td>$id_import</td>";
						echo"<td>$name_supplier</td>";
						
						echo"<td>$mobile_supplier</td>";
						
						
						echo"<td>$total</td>";
						
                        echo"<td><div class='btn'><a href='warehouse_invoice.php?id=$id_import' target='_blank'><i class='fa fa-edit' ></i> Chi tiết</a></div></td>";
                        
                      echo"</tr>";
						}
                    ?>  
                    </tbody>
                    
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
