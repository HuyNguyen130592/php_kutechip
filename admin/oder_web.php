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
            <small>Đơn hàng trên Web</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Đơn hàng trên web</li>
          </ol>
        </section>
     <!-- Main content -->
     	<div class="box">
                <div class="box-header">
                  <h3 class="box-title">Toàn bộ đơn hàng</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                      	<th>Ngày đặt hàng</th>
                       
                        <th>Tên khách hàng</th>
                        
                        <th>Tổng tiền</th>
                        <th>Tình trạng</th>
                        <th>Tùy chỉnh</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
						$query3=mysqli_query($conn,"SELECT * FROM `oder_temporay` INNER JOIN oder_status ON oder_temporay.status = oder_status.ID ORDER BY oder_temporay.id DESC");
						while($row3 = mysqli_fetch_array($query3))
						{
							
							$id_oder = $row3['id'];
							
							$name_customer=$row3['Cus_name'];
							$mobile = $row3['Cus_mobile'];
							$street = $row3['Cus_address'];
							$sum_sub = number_format($row3['total']);
							$ship_cus=number_format($row3['ship_fee']);
							$sum=number_format($row3['total'] +$row3['ship_fee']);
							
							
							$status = $row3['status'];
							$day = date('d/m/Y ',strtotime($row3['Date_create']));
							$oder_status = $row3['Name'];
							$cus_note = $row3['Cus_Note'];
							
							
                      echo"<tr>";
                        echo"<td>$day</td>";
						
						echo"<td>$name_customer</td>";
						
						
						echo"<td>$sum</td>";
						echo"<td>$oder_status</td>";
						if($status =="OS08")
							{
								echo"<td><div class='btn'><a href='invoice_oder_web.php?id=$id_oder' ><i class='fa fa-edit' ></i>Xử lý đơn hàng</a></div></td>";
							}else
								{
									echo"<td><div class='btn'><a href='oder_web_view.php?id=$id_oder' target='_blank'><i class='fa fa-edit' ></i>Chi tiết</a></div></td>";
								}
                        
                        
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
