<?php
	include("conn.php");
	mysqli_set_charset($conn, 'UTF8');
	include("session.php");
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
            <small>Control panel</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
          </ol>
        </section>
    <?php
		$month=date('m');
		$year = date('Y');
		$query1_1 = mysqli_query($conn,"SELECT COUNT(ID_Oder) AS tong_don,SUM(Oder_Sum) AS tong_tien FROM oder WHERE MONTH(Oder_Date)='$month' AND YEAR(Oder_Date)='$year'");
		$row1_1 = mysqli_fetch_array($query1_1);
		$tong_don= number_format($row1_1['tong_don']);
		$tong_tien=number_format($row1_1['tong_tien']);
		
	?>
     	<section class="content">
         <!-- Main content -->
        <div class="row">
            <div class="col-lg-6 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                  <h3><?php echo $tong_don; ?></h3>
                  <p>Đơn hàng</p>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
                <a href="report_oder.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-6 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                  <h3><?php echo $tong_tien ?><sup style="font-size: 20px">vnd</sup></h3>
                  <p>Doanh số</p>
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div>
                <a href="report_oder.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            
            
          </div>
        <div class="row">
        	<section class=" col-lg-12 connectedSortable ui-sortable">
            	<div id="container"></div>
            </section>
        </div>
        
     <!-- end main content -->
     </section>  
    </div>
 <!--end content-->
    </div>
<?php include("js_index.php"); ?>
</body>
</html>
