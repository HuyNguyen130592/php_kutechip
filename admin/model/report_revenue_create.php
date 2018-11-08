<?php
	include("../conn.php");
	mysqli_set_charset($conn, 'UTF8');
	include("../session.php");
	 $fuserid=$_SESSION['login']['id'];
	$query=mysqli_query($conn,"SELECT * FROM `member`  INNER JOIN member_duty ON member.ID_Member_Duty=member_duty.ID_Member_Duty WHERE ID_Member='$fuserid'");
	$row=mysqli_fetch_array($query);
	if(isset($_SESSION['login']['id']))
		{	
			$ket_qua = array();
			$date_send = $_POST['date_send'];
			
			$date_start = date('Y/m/d ',strtotime(substr($date_send,0,10)));
			
			$date_end = date('Y/m/d ',strtotime(substr($date_send,12,22)));
			$query2_1  = mysqli_query($conn,"SELECT SUM(Oder_Sum) AS tong_tien,sum(Oder_ShipFee_Delivery) AS tong_ship FROM oder WHERE Oder_Status='OS05' AND Oder_Date<='$date_end' AND Oder_Date>='$date_start'");
			$row2_1 = mysqli_fetch_array($query2_1);
			$doanh_thu=$row2_1['tong_tien'];
			$ship_hoan_thanh=$row2_1['tong_ship'];
			$query2_2 = mysqli_query($conn,"SELECT sum(Oder_ShipFee_Delivery) AS tong_ship FROM oder WHERE Oder_Status='OS06' AND Oder_Date<='$date_end' AND Oder_Date>='$date_start'");
			$row2_2 = mysqli_fetch_array($query2_2);
			$ship_huy = 1.5*$row2_2['tong_ship'];
			$query2_3 = mysqli_query($conn,"SELECT SUM(product_export.Product_Quantity*product_export.price) AS tong_tien FROM product_export INNER JOIN oder ON oder.ID_Oder=product_export.ID_Oder WHERE oder.Oder_Status='OS05' AND oder.Oder_Date<='$date_end' AND oder.Oder_Date>='$date_start'");
			$row2_3=mysqli_fetch_array($query2_3);
			$gia_von = $row2_3['tong_tien'];
			$tong_ship = $ship_hoan_thanh+$ship_huy;
			$loi_nhuan=$doanh_thu-$ship_hoan_thanh-$ship_huy-$gia_von;
			$ket_qua['doanh_thu'][0]['trang_thai']='Doanh thu';
			$ket_qua['doanh_thu'][0]['so_luong']=number_format($doanh_thu);
			$ket_qua['doanh_thu'][1]['trang_thai']='Chi phí giao hàng';
			$ket_qua['doanh_thu'][1]['so_luong']=number_format($tong_ship);
			$ket_qua['doanh_thu'][2]['trang_thai']='Giá vốn';
			$ket_qua['doanh_thu'][2]['so_luong']=number_format($gia_von);
			$ket_qua['doanh_thu'][3]['trang_thai']='Lợi nhuận';
			$ket_qua['doanh_thu'][3]['so_luong']=number_format($loi_nhuan);
			echo json_encode($ket_qua);
		}
?>