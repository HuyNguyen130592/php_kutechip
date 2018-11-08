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
                        <th>Tên nhóm sản phẩm</th>
                        <th>Chủng loại</th>
                        <th>Từ khóa</th>
                        <th>Mô tả từ khóa</th>
                        <th>Nội dung</th>
                        <th>Tùy chỉnh</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
						$query3=mysqli_query($conn,"SELECT product_category.id,product_category.name,product_category.keyword,product_category.title,product_category.description,product_kind.Product_Kind_Name AS product_kind_name FROM `product_category` INNER JOIN product_kind ON product_category.kind=product_kind.ID_Product_Kind");
						while($row3 = mysqli_fetch_array($query3))
						{
							$id_cate = $row3['id'];
							$name_cate= $row3['name'];
							$name_kind=$row3['product_kind_name'];
							$keyword = $row3['keyword'];
							$title = $row3['title'];
							$content = $row3['description'];
                      echo"<tr>";
					  	
						
                        echo"<td>$name_cate</td>";
                        
                         echo"<td>$name_kind</td>"; 
						 echo"<td>$keyword</td>";
						  echo"<td>$title</td>";
						   echo"<td>$content</td>";
                        echo"<td><div class='btn'><a href='seo_category_create.php?id=$id_cate'><i class='fa fa-edit'></i> Edit</a></div></td>";
                        
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
