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
            <small>Phí Ship hàng</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Ship</li>
          </ol>
        </section>
     <!-- Main content -->
     	<div class="box">
                <div class="box-header">
                  <h3 class="box-title">Danh sách phí ship</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Thành phố/Tỉnh</th>
                        <th>Quận/Huyện</th>
                        <th>Phí ship</th>
                        
                       
                        <th>Tùy chỉnh</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
						$query3=mysqli_query($conn,"SELECT province.name AS province_name,district.ID,district.name,ship_fee.fee FROM district INNER JOIN province ON province.id=district.ID_province LEFT JOIN ship_fee ON ship_fee.id=district.ID");
						while($row3 = mysqli_fetch_array($query3))
						{
							$id_dis = $row3['ID'];
							$name_province= $row3['province_name'];
							$name_dis=$row3['name'];
							$ship_fee= number_format($row3['fee']);
							
							
                      echo"<tr>";
					  	
						
                        echo"<td>$name_province</td>";
                        
                         echo"<td>$name_dis</td>"; 
						 echo"<td>$ship_fee</td>";
						  
                        echo"<td><div class='btn'><a href='#' data-toggle='modal' data-target='#ship_fee".$id_dis."'><i class='fa fa-edit'></i> Edit</a></div></td>";
                        include("modal/ship_fee.php");
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
<?php include("js_sale_product.php"); ?>
</body>
</html>
