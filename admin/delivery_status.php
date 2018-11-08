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
            <small>Đơn hàng đang giao </small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Đơn hàng đang giao</li>
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
                        <th>Ngày giao hàng</th>
                        <th>Đơn hàng</th>
                        <th>Tên khách hàng</th>
                        <th>Số điện thoại</th>
                        <th>Địa chỉ</th>
                        <th>Dịch vụ giao hàng</th>
                        <th>Tổng tiền</th>
                        <th>Tình trạng</th>
                        <th>Tùy chỉnh</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
						$query3=mysqli_query($conn,"SELECT * FROM `oder` LEFT JOIN customer_detail ON oder.ID_Customer=customer_detail.ID_Customer LEFT JOIN oder_status ON oder.Oder_Status=oder_status.ID LEFT JOIN delivery_information ON oder.ID_delivery_supply=delivery_information.id WHERE oder.Oder_Status='OS03' ORDER BY oder.ID_Oder DESC");
						while($row3 = mysqli_fetch_array($query3))
						{
							
							$id_oder = $row3['ID_Oder'];
							$id_customer = $row3['ID_Customer'];
							$name_customer=$row3['Customer_Name'];
							$mobile = $row3['Customer_Mobile'];
							$street = $row3['Customer_Street'];
							$ward = $row3['ID_Ward'];
							$sum=number_format($row3['Oder_Sum']);
							$sum_sub = number_format($row3['Oder_Price_Sum']);
							$ship_cus=number_format($row3['Oder_ShipFee_Customer']);
							$ship_shop = number_format($row3['Oder_ShipFee_Delivery']);
							$day = date('d/m/Y ',strtotime($row3['Oder_Date']));
							$oder_status = $row3['Name'];
							$cus_note = $row3['Oder_Notice_Customer'];
							$shop_note = $row3['Oder_Notice_Shop'];
							$query4 = mysqli_query($conn,"SELECT district.name as district_name,province.name AS province_name FROM `customer_detail` LEFT JOIN district ON customer_detail.ID_District=district.ID  LEFT JOIN province ON customer_detail.ID_Province=province.id WHERE ID_Customer='$id_customer'");
							$row4=mysqli_fetch_array($query4);
							$name_district = $row4['district_name'];
							$name_province = $row4['province_name'];
							$address = $street.",".$ward.",".$name_district.",".$name_province;
							$date_delivery_create=date('d/m/Y ',strtotime($row3['date_delivery_create']));
							$id_delivery_supply=$row3['id'];
							$name_delivery_supply = $row3['name'];
							$token = $row3['token'];
							$id_delivery = $row3['id_delivery'];
							if($id_delivery_supply=='DL01')
								{
									$url = "https://dev.ghtk.vn/services/shipment/v2/";
									$url_after = $url.$id_delivery;
									$curl = curl_init();

									curl_setopt_array($curl, array(
										CURLOPT_URL => $url_after,
										CURLOPT_RETURNTRANSFER => true,
										CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
										CURLOPT_HTTPHEADER => array(
											"Token:".$token,
										),
									));
									
									$response = curl_exec($curl);
									curl_close($curl);
									$response_decode =array();
									$response_decode = json_decode($response,true);
									$delivery_status = $response_decode['order']['status_text'];
									$id_delivery_status = $response_decode['order']['status'];
								}elseif($id_delivery_supply=='DL02')
								{
									$oder=array(
													"token"=> $token,
    												"OrderCode"=> $id_delivery
													);
									$curl = curl_init();

									curl_setopt_array($curl, array(
										CURLOPT_URL => "http://api.serverapi.host/api/v1/apiv3/OrderInfo",
										CURLOPT_RETURNTRANSFER => true,
										CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
										CURLOPT_CUSTOMREQUEST => "POST",
										CURLOPT_POSTFIELDS => json_encode($oder),
										CURLOPT_HTTPHEADER => array(
											"Content-Type: application/json",
										   
											"Content-Length: " . strlen(json_encode($oder)),
										),
									));
									
									
									$response = curl_exec($curl);
									curl_close($curl);
									$response_decode =array();
									$response_decode = json_decode($response,true);
									$delivery_status = $response_decode['data']['CurrentStatus'];
									

								}elseif($id_delivery_supply=='DL03')
								{
									$delivery_status="Đang giao";
								}
                      echo"<tr>";
                        echo"<td>$day</td>";
						echo"<td>$date_delivery_create</td>";
						echo"<td>$id_oder</td>";
						echo"<td>$name_customer</td>";
						echo"<td>$mobile</td>";
						echo"<td>$address </td>";
						echo"<td>$name_delivery_supply</td>";
						echo"<td>$sum</td>";
						echo"<td>$delivery_status</td>";
						if($id_delivery_supply=='DL01')
							{
								if($id_delivery_status==-1||$id_delivery_status==11||$id_delivery_status==20||$id_delivery_status==21||$id_delivery_status==5||$id_delivery_status==6||$id_delivery_status==45)
									{
										if($id_delivery_status==-1||$id_delivery_status==11||$id_delivery_status==20||$id_delivery_status==21){$oder_status_update ='OS06';}else{$oder_status_update='OS05';}
									echo"<td><div class='btn'><a href='delivery_invoice.php?id=$id_oder&oder_status_update=$oder_status_update' target='_blank'><i class='fa fa-edit' ></i> Chi tiết đơn hàng</a></div></td>";	
									}else{echo"<td><div class='btn'><a href='delivery_invoice.php?id=$id_oder' target='_blank'><i class='fa fa-edit' ></i> Chi tiết đơn hàng</a></div></td>";}
								
							}elseif($id_delivery_supply=='DL02')
							{
								if(	$delivery_status=='Cancel'||$delivery_status=='Returned'||$delivery_status=='Return'||$delivery_status=='Finish'||$delivery_status=='WaitingToFinish'||$delivery_status=='Delivered')
									{
										if(	$delivery_status=='Cancel'||$delivery_status=='Returned'||$delivery_status=='Return')
											{
												$oder_status_update ='OS06';
											}else{$oder_status_update='OS05';}
										echo"<td><div class='btn'><a href='delivery_invoice.php?id=$id_oder&oder_status_update=$oder_status_update' target='_blank'><i class='fa fa-edit' ></i> Chi tiết đơn hàng</a></div></td>";
									}else{echo"<td><div class='btn'><a href='delivery_invoice.php?id=$id_oder' target='_blank'><i class='fa fa-edit' ></i> Chi tiết đơn hàng</a></div></td>";}
							}elseif($id_delivery_supply=='DL03')
							{
								echo"<td><div class='btn'><a href='delivery_invoice_self_delivery.php?id=$id_oder' target='_blank'><i class='fa fa-edit' ></i> Chi tiết đơn hàng</a></div></td>";	
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
