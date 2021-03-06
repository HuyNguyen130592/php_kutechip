<?php
	include("conn.php");
	mysqli_set_charset($conn, 'UTF8');
	include("session.php");
	 $fuserid=$_SESSION['login']['id'];
	$query=mysqli_query($conn,"SELECT * FROM `member`  INNER JOIN member_duty ON member.ID_Member_Duty=member_duty.ID_Member_Duty WHERE ID_Member='$fuserid'");
	$row=mysqli_fetch_array($query);
	$id_oder = $_GET['id'];
	$query11 = mysqli_query($conn,"SELECT * FROM oder INNER JOIN customer_detail ON oder.ID_Customer = customer_detail.ID_Customer WHERE oder.ID_Oder='$id_oder'");
	$row11= mysqli_fetch_array($query11);
	$id_cus = $row11['ID_Customer'];
	$query12= mysqli_query($conn,"SELECT district.name as district_name,province.name AS province_name FROM customer_detail INNER JOIN district ON customer_detail.ID_District = district.ID INNER JOIN province ON province.id = customer_detail.ID_Province WHERE customer_detail.ID_Customer='$id_cus'");
	$row12 = mysqli_fetch_array($query12);
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
            <small>Hóa đơn</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Hóa đơn</li>
          </ol>
        </section>
     <!-- Main content -->
     	<section class="invoice">
          <!-- title row -->
          <div class="row">
            <div class="col-xs-12">
              <h2 class="page-header">
                <i class="fa"><img src="dist/img/logo.png" style=" width:5%; height:auto" class="img-responsive"/></i> Kutechip.com
                <small class="pull-right"></small>
              </h2>
            </div><!-- /.col -->
          </div>
          <!-- info row -->
          <div class="row invoice-info">
            <div class="col-sm-4 invoice-col">
              From
              <address>
                <strong>Kutechip.com</strong><br>
                Khu dân cư phú hồng thịnh II, An Phú,<br>
                Thuận An, Bình Dương<br>
                Phone: (804) 123-5432<br/>
                Email: kutechip1234@gmail.com
              </address>
            </div><!-- /.col -->
            <div class="col-sm-4 invoice-col">
              To
              <address>
                <strong><?php echo $row11['Customer_Name']; ?></strong><br>
                <?php echo $row11['Customer_Street'].",".$row11['ID_Ward'].","; ?><br>
                <?php echo $row12['district_name'].", ".$row12['province_name']; ?><br>
                <?php echo $row11['Customer_Mobile']; ?><br/>
               
              </address>
            </div><!-- /.col -->
            <div class="col-sm-4 invoice-col">
              <b>Hóa đơn: <?php echo $row11['ID_Oder']; ?></b><br/>
              <br/>
              <b>Mã vận đơn:</b> <br/>
              <b>Ngày đặt hàng:</b> <?php  echo date('d / m / Y ',strtotime($row11['Oder_Date']));?><br/>
              
            </div><!-- /.col -->
          </div><!-- /.row -->

          <!-- Table row -->
          <div class="row">
            <div class="col-xs-12 table-responsive">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>STT</th>
                    <th>Sản phẩm</th>
                    <th>Đơn giá</th>
                    <th>Số lượng</th>
                    <th>Thành tiền</th>
                  </tr>
                </thead>
                <tbody>
                <?php 
					$query13=mysqli_query($conn,"SELECT * FROM `oder_detail` INNER JOIN product_main ON oder_detail.ID_Product = product_main.ID_Product WHERE oder_detail.ID_Oder='$id_oder'");
					$stt =1;
					while($row13= mysqli_fetch_array($query13))
					{
						$name_product = $row13['Product_Name'];
						$quantity = $row13['Oder_Quantity'];
						$price = number_format($row13['Oder_Product_Price']);
						$sum_price = number_format($quantity * $row13['Oder_Product_Price']);
					  	echo"<tr>";
						echo"<td>$stt</td>";
						echo"<td>$name_product</td>";
						echo"<td>$price</td>";
						echo"<td>$quantity</td>";
						echo"<td>$sum_price</td>";
					  	echo"</tr>";
						$stt++;
				  	}
				?>
                </tbody>
              </table>
            </div><!-- /.col -->
          </div><!-- /.row -->

          <div class="row">
            <!-- accepted payments column -->
            <div class="col-xs-6">
              <h4>Ghi chú</h4>
              <p><?php echo $row11['Oder_Notice_Customer']; ?></p>
              
            </div><!-- /.col -->
            <div class="clearfix"></div>
            <div class="col-xs-6 pull-right">
              <p class="lead">Ngày lập hóa đơn <?php echo date("d/m/y"); ?></p>
              <div class="table-responsive">
                <table class="table">
                  <tr>
                    <th style="width:50%">Thành tiền:</th>
                    <?php $sub_sub = number_format($row11['Oder_Price_Sum']); ?>
                    <td><?php echo $sub_sub  ?></td>
                  </tr>
                  
                  <tr>
                    <th>Phí giao hàng:</th>
                    <?php $ship = number_format($row11['Oder_ShipFee_Customer']); ?>
                    <td><?php echo $ship ?></td>
                  </tr>
                  <tr>
                    <th>Tổng cộng:</th>
                    <?php $sum = number_format($row11['Oder_Sum'])?>
                    <td><?php echo $sum ?></td>
                  </tr>
                </table>
              </div>
            </div><!-- /.col -->
          </div><!-- /.row -->

          <!-- this row will not appear when printing -->
          <div class="row no-print">
            <div class="col-xs-12">
              <a href="model/warehouse_export_invoice_print.php?id=<?php echo $id_oder  ?>" target="_blank" data-id="<?php echo $id_oder?>" class="btn btn-default"><i class="fa fa-print"></i> Xuất kho</a>
              <a href="warehouse_export.php"><button class="btn btn-primary pull-right" style="margin-right: 5px;"><i class="fa  fa-times"></i> Close</button></a>
            </div>
          </div>
        </section>
        
        
     <!-- end main content -->  
    </div>
 <!--end content-->
    </div>
<?php mysqli_close($conn)?>
<?php include("js.php"); ?>
</body>
</html>
