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
<style>
		.row li {
	 margin-left : 10px;
	 margin-right:10px;
	 margin-top:10px;
	 margin-bottom:10px;
	  float: left;
	  list-style-type:none;
	}
	
	img {
	  border: 0 none;
	  display: inline-block;
	  height: auto;
	  max-width: 100%;
	  vertical-align: middle;
	}
		
	
</style>
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
            DASHBOARD
            <small>Tạo sản phẩm</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Tạo sản phẩm mới</li>
          </ol>
        </section>
        <section class="content">
     <!-- Main content -->
     	<div class="row">
        	<div class="col-md-12">
            	<div class="box box-primary">
                
                <!-- form start -->
                <form role="form" method="post" action="model/product_create_save.php" enctype="multipart/form-data">
                  <div class="box-body">
                  <div class="row">
                  <div class="col-xs-3">
                  	 <img class="img-responsive img-thumbnail" src="dist/img/download.png" id="img_main">
                     <div class="form-group">
                      <label for="exampleInputFile">Thay đổi hình đại diện sản phẩm</label>
                      <input type="file" id="main_img" name="main_img" onchange="demo(event);" accept="image/*">
                      
                    </div> 
                  </div>
                  <div class="col-xs-9">
                    <div class="form-group">
                    
                      <label for="exampleInputEmail1">Tên sản phẩm</label>
                      <input type="text" class="form-control" name="name" id="name" placeholder="Điền tên sản phẩm">
                    </div >
                    <div class="form-group">
                    
                      <label>Chọn nhóm sản phẩm</label>
                      <select class="form-control" name="category">
                      <?php
					   $query4 = mysqli_query($conn,"SELECT * FROM `product_category`");
					   while($row4=mysqli_fetch_array($query4))
					   {
						   $id_category=$row4['id'];
						   $name_category=$row4['name'];
                        echo"<option value='$id_category'>$name_category</option>";
					   }
					?>
                      </select>
                    </div>
                     <div class="form-group">
                    
                      <label for="exampleInputEmail1">Giá bán</label>
                      <input type="text" class="form-control" name="price" id="price" placeholder="Điền giá bán">
                    </div >
                    <div class="form-group">
                      <label>Mô tả về sản phẩm</label>
                      <textarea class="form-control"  id="editor" rows="10" placeholder="Điền vào mô tả sản phẩm" name="description"></textarea>
                    </div>
                     <div class="form-group">
                      <label>Thông tin bổ sung</label>
                      <textarea class="form-control"  id="editor2" rows="10" placeholder="Điền vào thông tin bổ sung" name="additional_infomation"></textarea>
                    </div>
                                                  
                  <div class="clearfix"></div>
                    </div>
                  </div>
                  <div class="row">
                  <div class="col-md-6">
                  	<div class="checkbox">
                    <fieldset>
                    	<legend> Chọn màu</legend>
                        <?php 
						 $query5= mysqli_query($conn,"SELECT * FROM `color`");
						 while($row5=mysqli_fetch_array($query5))
						 {
							 $id_color = $row5['ID_Color'];
							 $name_color = $row5['Color_Name'];
                      echo"<label style='margin-right:10px'>";
                        echo"<input type='checkbox' name='color[]' value='$id_color'> $name_color  ";
                      echo"</label>";
						 }
                      ?>
                      </fieldset>
                    </div>
                  </div>
                  <div class="col-md-6">
                  	<div class="checkbox">
                    <fieldset class="scheduler-border">
                    <legend> Chọn size</legend>
                    <?php
					 $query6 = mysqli_query($conn,"SELECT * FROM `size`");
					 while($row6=mysqli_fetch_array($query6))
					 {
						 $id_size = $row6['ID_Size'];
						 $name_size = $row6['Size_Name'];
                  	  echo"<label style='margin-right:10px'>";
                      echo  "<input type='checkbox' name='size[]' value='$id_size'> $name_size";
                      echo"</label>";
					 }
                     ?> 
                      
                      </fieldset>
                     </div>
                  </div>
                  </div> 
                  <div class="row" id="product_img_detail">
                  <label style="padding-left:10px">Hình ảnh chi tiết sản phẩm</label>
                      <div id="small-img" class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <ul>
                       
                          <li>
                            <img src="http://placehold.it/150x100" class="img-responsive inline-block" alt="Responsive image"  />
                          </li>
                          <li>
                            <img src="http://placehold.it/150x100" class="img-responsive inline-block" alt="Responsive image" />
                          </li>
                          <li>
                            <img src="http://placehold.it/150x100" class="img-responsive inline-block" alt="Responsive image" />
                          </li>
                          <li>
                            <img src="http://placehold.it/150x100" class="img-responsive inline-block" alt="Responsive image" />
                          </li>
                          <li>
                            <img src="http://placehold.it/150x100" class="img-responsive inline-block" alt="Responsive image" />
                          </li>
                        </ul>
                      </div>
                    </div>
                    <div class="row">
                    	<div class="col-md-12">
                    	<div class="form-group">
                          <label for="exampleInputFile">Thay đổi hình ảnh chi tiết sản phẩm</label>
                          <input type="file" id="img_file" name="img_file[]" multiple="true" onchange="previewImg(event);">
                          
                        </div>
                        </div>
                    </div>
					<?php mysqli_close($conn); ?>
                  <div class="box-footer">
                  <div class="row">
                  	
                    <div class="col-xs-12">
                    <button type="submit" class="btn btn-primary pull-right">Tạo</button>
                    </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
        </div>
     <!-- end main content -->
     </section>
     
    </div>
 <!--end content-->
 	
 
    </div>
    
<?php include("js_product_create.php"); ?>
</body>
</html>
