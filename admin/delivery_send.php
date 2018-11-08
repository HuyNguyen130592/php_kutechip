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
                      	<th>Ngày đặt hàng</th>
                        <th>Đơn hàng</th>
                        <th>Tên khách hàng</th>
                        <th>Số điện thoại</th>
                        <th>Địa chỉ</th>
                        <th>Ghi chú của shop</th>
                       
                        <th>Ghi chú của khách hàng</th>
                        <th>Tổng tiền</th>
                        
                        <th>Tùy chỉnh</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
						$query3=mysqli_query($conn,"SELECT * FROM `oder` LEFT JOIN customer_detail ON oder.ID_Customer=customer_detail.ID_Customer LEFT JOIN oder_status ON oder.Oder_Status=oder_status.ID WHERE oder.Oder_Status='OS02' ORDER BY oder.ID_Oder DESC ");
						while($row3 = mysqli_fetch_array($query3))
						{
							
							$id_oder = $row3['ID_Oder'];
							$id_customer = $row3['ID_Customer'];
							$name_customer=$row3['Customer_Name'];
							$mobile = $row3['Customer_Mobile'];
							$street = $row3['Customer_Street'];
							$ward = $row3['ID_Ward'];
							$sum=number_format($row3['Oder_Sum']);
							$sum_sub = number_format($row3['Oder_Price_Sum']);
							$ship_cus=number_format($row3['Oder_ShipFee_Customer']);
							$ship_shop = number_format($row3['Oder_ShipFee_Delivery']);
							$day = date('d/m/Y ',strtotime($row3['Oder_Date']));
							$oder_status = $row3['Name'];
							$cus_note = $row3['Oder_Notice_Customer'];
							$shop_note = $row3['Oder_Notice_Shop'];
							$query4 = mysqli_query($conn,"SELECT district.name as district_name,province.name AS province_name FROM `customer_detail` LEFT JOIN district ON customer_detail.ID_District=district.ID  LEFT JOIN province ON customer_detail.ID_Province=province.id WHERE ID_Customer='$id_customer'");
							$row4=mysqli_fetch_array($query4);
							$name_district = $row4['district_name'];
							$name_province = $row4['province_name'];
							$address = $street.",".$ward.",".$name_district.",".$name_province;
                      echo"<tr>";
                        echo"<td>$day</td>";
						echo"<td>$id_oder</td>";
						echo"<td>$name_customer</td>";
						echo"<td>$mobile</td>";
						
						echo"<td>$address</td>";
						echo"<td>$shop_note</td>";
						
						
						echo"<td>$cus_note</td>";
						echo"<td>$sum</td>";
						
                        echo"<td><div class='btn'><a href='#' data-toggle='modal' data-target='#delivery_send_choose".$id_oder."' ><i class='fa fa-edit' ></i> Chọn dịch vụ giao hàng</a></div></td>";
                      include("modal/delivery_send_choose.php");  
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
