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
            <small>Danh mục sản phẩm</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Danh mục sản phẩm</li>
          </ol>
        </section>
     <!-- Main content -->
     	<div class="box">
                <div class="box-header">
                  <h3 class="box-title">Danh sách sản phẩm</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                      	<th>Hình ảnh</th>
                        <th>Tên sản phẩm</th>
                        <th>Nhóm sản phẩm</th>
                        <th>Ngày khởi tạo</th>
                        <th>Tùy chỉnh</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
						$query3=mysqli_query($conn,"SELECT * FROM `product_type` INNER JOIN product_category ON product_type.id_category=product_category.id");
						while($row3 = mysqli_fetch_array($query3))
						{
							$id_product = $row3['ID_Product'];
							$name_product= $row3['Name_Product'];
							$name_category=$row3['name'];
							$img_product= $row3['Product_Type_Image'];
							$day = date('d - m - Y ',strtotime($row3['Date_Create']));
                      echo"<tr>";
					  	echo"<td><div class='center-block'><img src='dist/img/$img_product' style='width:15%;height:auto'/></div></td>";
						
                        echo"<td>$name_product</td>";
                        
                         echo"<td>$name_category</td>"; 
						 echo"<td>$day</td>";
                        echo"<td><div class='btn'><a href='product_create_change.php?id=$id_product'><i class='fa fa-edit'></i> Edit</a></div></td>";
                        
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
