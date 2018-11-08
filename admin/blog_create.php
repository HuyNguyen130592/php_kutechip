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
            <small>Tạo bài viết</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Bài viết mới</li>
          </ol>
        </section>
        <section class="content">
     <!-- Main content -->
     	<div class="row">
        	<div class="col-md-12">
            	<div class="box box-primary">
                
                <!-- form start -->
                <form role="form" method="post" action="model/blog_create_save.php" enctype="multipart/form-data">
                  <div class="box-body">
                  <div class="row">
                  <div class="col-xs-3">
                  	 <img class="img-responsive img-thumbnail" src="dist/img/download.png" id="img_main">
                     <div class="form-group">
                      <label for="exampleInputFile">Thay đổi hình đại diện bài viết</label>
                      <input type="file" id="main_img" name="main_img" onchange="demo(event);" accept="image/*">
                      
                    </div> 
                  </div>
                  <div class="col-xs-9">
                    <div class="form-group">
                    
                      <label for="exampleInputEmail1">Tiêu đề bài viết</label>
                      <input type="text" class="form-control" name="name" id="name" placeholder="Điền tên bài viết">
                    </div >
                    <div class="form-group">
                    
                      <label>Chuyên mục</label>
                      <select class="form-control" name="category">
                      <?php
					   $query4 = mysqli_query($conn,"SELECT * FROM blog_category ");
					   while($row4=mysqli_fetch_array($query4))
					   {
						   $id_category=$row4['id_cat'];
						   $name_category=$row4['name_cat'];
                        echo"<option value='$id_category'>$name_category</option>";
					   }
					?>
                      </select>
                    </div>
                    <div class="form-group">
                    
                      <label>Mô tả bài viết</label>
                      <textarea name="des" rows="5" cols="10" class="form-control"></textarea>
                     
                      
                    </div>
                    <div class="form-group">
                      <label>Nội dung bài viết</label>
                      <textarea class="form-control"  id="editor" rows="10" placeholder="Nội dung bài viết" name="content"></textarea>
                    </div>
                                                  
                  <div class="clearfix"></div>
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
