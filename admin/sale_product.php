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
            <small>Khuyến mãi theo sản phẩm</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">SALE</li>
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
                        <th>Tên sản phẩm</th>
                        <th>Nhóm sản phẩm</th>
                        <th>Giá gốc</th>
                        <th>Giá sau khi khuyến mãi</th>
                        
                        <th>Tùy chỉnh</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
						$query3=mysqli_query($conn,"SELECT product_type.ID_Product,product_type.Name_Product,product_category.name,product_sale_price.price,product_sale_price.sale_rate FROM product_type INNER JOIN product_category ON product_category.id=product_type.id_category LEFT JOIN product_sale_price ON product_sale_price.id=product_type.ID_Product");
						while($row3 = mysqli_fetch_array($query3))
						{
							$id_product = $row3['ID_Product'];
							$name_product= $row3['Name_Product'];
							$name_category=$row3['name'];
							$price = $row3['price'];
							$price1=number_format($price);
							$sale_rate= $row3['sale_rate'];
							$price_after =number_format($price*(1-$sale_rate/100));
							$price_after1 =$price*(1-$sale_rate/100);
                      echo"<tr>";
					  	
						
                        echo"<td>$name_product</td>";
                        
                         echo"<td>$name_category</td>"; 
						 echo"<td>$price1</td>";
						  echo"<td>$price_after</td>";
						   
                        echo"<td><div class='btn'><a href='#' data-toggle='modal' data-target='#sale_pro".$id_product."'><i class='fa fa-edit'></i> Edit</a></div></td>";
                      include("modal/sale_product.php");  
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
