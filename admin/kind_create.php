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
            <small>Tạo chủng loại sản phẩm</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
          </ol>
        </section>
        <section class="content">
     <!-- Main content -->
     	<div class="row">
        	<div class="col-md-12">
            	<div class="box box-primary">
                
                <!-- form start -->
                <form role="form" method="post" action="model/kind_create_save.php" enctype="multipart/form-data">
                  <div class="box-body">
                  <div class="col-md-10">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Loại sản phẩm</label>
                      <input type="text" class="form-control " id="name" name="name">
                        
                    </div >
                   </div>
                   
                   
                    <div class="clearfix"></div>
                    
                   
                    
                    
                   
                    
                  </div><!-- /.box-body -->
					
                  <div class="box-footer">
                  <div class="row">
                  	
                    <div class="col-xs-10">
                    <button type="submit" class="btn btn-primary pull-left">Save</button>
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
    <?php mysqli_close($conn); ?>
<?php include("js_color_create.php"); ?>
</body>
</html>
