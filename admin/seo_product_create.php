<?php
	include("conn.php");
	mysqli_set_charset($conn, 'UTF8');
	include("session.php");
	 $fuserid=$_SESSION['login']['id'];
	$query=mysqli_query($conn,"SELECT * FROM `member`  INNER JOIN member_duty ON member.ID_Member_Duty=member_duty.ID_Member_Duty WHERE ID_Member='$fuserid'");
	$row=mysqli_fetch_array($query);
	$id_product = $_GET['id'];
	$query3 = mysqli_query($conn,"SELECT * FROM `product_type` WHERE ID_Product='$id_product'");
	$row3 = mysqli_fetch_array($query3);
	$keyword=$row3['keyword'];
	$title = $row3['title'];
	$content = $row3['description'];
	 
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
            <small>SEO sản phẩm</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">SEO</li>
          </ol>
        </section>
        <section class="content">
     <!-- Main content -->
     	<div class="row">
        	<div class="col-md-12">
            	
                
                <!-- form start -->
                <form role="form" method="post" action="model/seo_product_change_save.php" enctype="multipart/form-data">
                  
                  <div class="col-xs-9">
                    <div class="form-group">
                      <label>Từ khóa</label>
                      <input type="text" name="id" value="<?php echo $id_product; ?>" style="display:none" id="id"/>
                      <input type="text" class="form-control" name="name" id="name" placeholder="Điền từ khóa" value="<?php echo $keyword;?>">
                    </div >
                    <div class="form-group">
                    
                      <label>Mô tả từ khóa</label>
                      <textarea name="des" rows="5" cols="10" class="form-control" placeholder="Điền tiêu đề"><?php echo $title; ?></textarea>
                     
                      
                    </div>
                    <div class="form-group">
                      <label>Nội dung</label>
                      <textarea class="form-control"  cols =10 rows="6" placeholder="Nội dung" name="content"><?php echo $content;?></textarea>
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
     <!-- end main content -->
     </section>
     
    </div>
 <!--end content-->
 	
 
    </div>
    
<?php include("js_product_create.php"); ?>
</body>
</html>
