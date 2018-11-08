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
            <small>Danh mục màu sắc</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
          </ol>
        </section>
     <!-- Main content -->
     	<div class="box">
                <div class="box-header">
                  <h3 class="box-title">Danh sách màu sắc</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Tên Kho</th>
                        <th>Số điện thoại</th>
                        <th>Địa chỉ</th>
                        <th>Tùy chỉnh</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
						$query3=mysqli_query($conn,"SELECT delivery_warehouse_information.id as warehouse_id,delivery_warehouse_information.name as warehouse_name, delivery_warehouse_information.street,delivery_warehouse_information.mobile,district.name as district_name, province.name AS province_name FROM delivery_warehouse_information LEFT JOIN district ON delivery_warehouse_information.id_district=district.ID LEFT JOIN province on delivery_warehouse_information.id_province=province.id ORDER BY delivery_warehouse_information.id");
						while($row3 = mysqli_fetch_array($query3))
						{
							$id_warehouse = $row3['warehouse_id'];
							$name_warehouse = $row3['warehouse_name'];
							$mobile = $row3['mobile'];
							$treet = $row3['street'];
							$dis = $row3['district_name'];
							$city = $row3['province_name'];
							$add = $treet.", ".$dis.", ".$city;
                      echo"<tr>";
                        echo"<td>$name_warehouse</td>";
                      	echo"<td>$mobile</td>";
                         echo"<td>$add</td>"; 
                        echo"<td><div class='btn'><a href='delivery_warehouse_addnew_change.php?id=$id_warehouse'><i class='fa fa-edit'></i> Edit</a></div></td>";
                        
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
