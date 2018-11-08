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
            Thông tin cá nhân
            <small><?php echo $_SESSION['login']['name']; ?></small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">User Information</li>
          </ol>
        </section>
        <section class="content">
     <!-- Main content -->
     	<div class="row">
        	<div class="col-md-12">
            	<div class="box box-primary">
                
                <!-- form start -->
                <form role="form" method="post" action="model/user_information_change.php" enctype="multipart/form-data">
                  <div class="box-body">
                  <div class="row">
                  <div class="col-xs-3">
                  	 <img class="img-responsive img-thumbnail" src="<?php if($row['img']==''){ echo'dist/img/2.jpg';}else{echo 'dist/img/'.$row['img'];}?>">
                     <div class="form-group">
                      <label for="exampleInputFile">Thay đổi hình đại diện</label>
                      <input type="file" id="img" name="img">
                      
                    </div> 
                  </div>
                  <div class="col-xs-9">
                    <div class="form-group">
                    
                      <label for="exampleInputEmail1">Tên của thành viên</label>
                      <input type="text" class="form-control" name="name" id="name" value="<?php echo $row['Member_Name']; ?>" >
                    </div >
                   <div class="form-group">
                      <label for="exampleInputEmail1">Account</label>
                      <input type="text" class="form-control"  value="<?php echo $row['Member_Acc']; ?>" >
                    </div >              
                    <div class="form-group">
                      <label for="exampleInputEmail1">Password</label>
                      <input type="password" name = "password" class="form-control" id="password" placeholder="Thay đổi mật khẩu" >
                    </div >
                    <div class="form-group">
                      <label for="exampleInputEmail1">Mobile</label>
                      <input type="text" class="form-control" name="mobile" id="mobile" value ="<?php echo $row['Member_Mobile']; ?>">
                    </div >
                   <div class="form-group">
                      <label for="exampleInputEmail1">Cấp độ User</label>
                      <input type="text" class="form-control"  value ="<?php echo $row['Member_Duty_Name']; ?>">
                    </div >                                   
                  <div class="clearfix"></div>
                    </div>
                    </div> 
					<?php mysqli_close($conn); ?>
                  <div class="box-footer">
                  <div class="row">
                  	
                    <div class="col-xs-12">
                    <button type="submit" class="btn btn-primary pull-right">Cập nhật</button>
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
    
<?php include("js_ckeditor.php"); ?>
</body>
</html>
