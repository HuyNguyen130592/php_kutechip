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
            <small>Danh sách khách hàng</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Khách hàng</li>
          </ol>
        </section>
     <!-- Main content -->
     	<div class="box">
                <div class="box-header">
                  <h3 class="box-title">Toàn bộ danh sách khách hàng</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                      	<th>Tên </th>
                        <th>Số điện thoại</th>
                        <th>Địa chỉ</th>
                        <th>Số lần đặt hàng</th>
                        <th>Tổng giá trị đã mua</th>
                        <th>Hoàn thành</th>
                        <th>Hủy</th>
                        
                      </tr>
                    </thead>
                    <tbody>
                    <?php
						$query3=mysqli_query($conn,"SELECT customer_detail.ID_Ward,customer_detail.ID_Customer,customer_detail.Customer_Name,customer_detail.Customer_Mobile,customer_detail.Customer_Street,province.name AS province_name,district.name AS district_name FROM `customer_detail`  INNER JOIN province ON customer_detail.ID_Province=province.id INNER JOIN district ON district.ID=customer_detail.ID_District");
						while($row3 = mysqli_fetch_array($query3))
						{
							$id_cus =$row3['ID_Customer'];
							$name_cus = $row3['Customer_Name'];
							$mobile_cus = $row3['Customer_Mobile'];
							$stree = $row3['Customer_Street'];
							$city = $row3['province_name'];
							$district = $row3['district_name'];
							$ward = $row3['ID_Ward'];
							$address = $stree.",".$ward.",".$district.",".$city;
							$query4 = mysqli_query($conn,"SELECT SUM(oder.Oder_Sum) as tong_tien,COUNT(oder.ID_Oder) as so_don FROM oder WHERE oder.ID_Customer='$id_cus'");
							$row4 = mysqli_fetch_array($query4);
							$tong_tien = number_format($row4['tong_tien']);
							$tong_don = number_format($row4['so_don']);
							$query5 = mysqli_query($conn,"SELECT  COUNT(oder.ID_Oder) as so_don FROM oder WHERE oder.ID_Customer='$id_cus' AND oder.Oder_Status='OS05'");
							$row5 = mysqli_fetch_array($query5);
							$hoan_thanh= $row5['so_don'];
							$query6 = mysqli_query($conn,"SELECT  COUNT(oder.ID_Oder) as so_don FROM oder WHERE oder.ID_Customer='$id_cus' AND oder.Oder_Status='OS06'");
							$row6 = mysqli_fetch_array($query6);
							$huy= $row6['so_don'];
							
							
							
						  echo"<tr>";
							echo"<td>$name_cus</td>";
							echo"<td>$mobile_cus</td>";
							echo"<td>$address</td>";
							echo"<td>$tong_don</td>";
							echo"<td>$tong_tien</td>";
							echo"<td>$hoan_thanh</td>";
							echo"<td>$huy</td>";
							
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
