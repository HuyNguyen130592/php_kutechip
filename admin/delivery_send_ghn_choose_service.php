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
            <small>Chọn gói giao hàng của GHN</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Chọn gói giao hàng</li>
          </ol>
        </section>
     <!-- Main content -->
     	<div class="box">
                <div class="box-header">
                  <h3 class="box-title">Toàn bộ gói giao hàng</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Tên gói</th>
                        <th>Giá cước</th>
                        <th>Ước lượng thời gian giao hàng</th>
                       
                        <th>Tùy chỉnh</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
						$id_oder = $_GET['id'];
						$id_warehouse = $_GET['id_warehouse'];
						$query15 = mysqli_query($conn,"SELECT * FROM `delivery_information` WHERE id='DL02'");
						$row15 = mysqli_fetch_array($query15);
						$token = $row15['token'];
						$query16 = mysqli_query($conn,"SELECT * FROM `oder` LEFT JOIN customer_detail ON oder.ID_Customer = customer_detail.ID_Customer WHERE oder.ID_Oder='$id_oder'");
						$row16 = mysqli_fetch_array($query16);
						$cus_district = $row16['ID_District'];
						$query17 = mysqli_query($conn,"SELECT * FROM `delivery_warehouse_information` WHERE id='$id_warehouse'");
						$row17 = mysqli_fetch_array($query17);
						$shop_district = $row17['id_district'];
						
						$order = array(
												"token"=>$token,
												"Weight"=> 200,
												"Length"=> 20,
												"Width"=> 10,
												"Height"=> 10,
												"FromDistrictID"=>(int)$shop_district,
												"ToDistrictID"=> (int)$cus_district
												);
						
						$curl = curl_init();
						curl_setopt_array($curl, array(
							CURLOPT_URL => "http://api.serverapi.host/api/v1/apiv3/FindAvailableServices",
							CURLOPT_RETURNTRANSFER => true,
							CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
							CURLOPT_CUSTOMREQUEST => "POST",
							CURLOPT_POSTFIELDS => json_encode($order,false),
							CURLOPT_HTTPHEADER => array(
								"Content-Type: application/json",
								"Content-Length: " . strlen(json_encode($order)),
							),
						));
						
						$response = curl_exec($curl);
						curl_close($curl);
						$service_find = array();
						$service_find=json_decode($response,true);
						
						for($i=0;$i<count($service_find['data']);$i++)
							{
								$date_service=date('d/m/Y ',strtotime($service_find['data'][$i]['ExpectedDeliveryTime']));
								$id_service = $service_find['data'][$i]['ServiceID'];
								$fee_service=number_format($service_find['data'][$i]['ServiceFee']);
								$name_service = $service_find['data'][$i]['Name'];
								
								
									
								 echo"<tr>";
								  echo"<td>$name_service</td>";
								  echo"<td>$fee_service</td>";
								  echo"<td>$date_service</td>";
								 
								  echo"<td><div class='btn'><a href='model/ghn_create_oder.php?id_oder=$id_oder&id_warehouse=$id_warehouse&id_service=$id_service'><i class='fa fa-edit' ></i> Chọn </a></div></td>";
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
