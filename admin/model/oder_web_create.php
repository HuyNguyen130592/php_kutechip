<?php
	include("../conn.php");
	mysqli_set_charset($conn, 'UTF8');
	include("../session.php");
	include("../library/id_create.php");
	$id_oder_web = addslashes($_GET['id']);
	
	 if(isset($_SESSION['login']['id']))
	 {
	 	mysqli_query($conn,"UPDATE oder_temporay SET status='OS01' WHERE id='$id_oder'");
		$query1 = mysqli_query($conn,"SELECT * FROM `oder_temporay` WHERE id='$id_oder'");
		$row1 = mysqli_fetch_array($query1);
		$cus_name = $row1['Cus_name'];
		$cus_mobile = $row1['Cus_mobile'];
		$cus_street = $row1['street'];
		$cus_district = $row1['id_district'];
		$cus_province = $row1['id_city'];
		$ship_fee = $row1['ship_fee'];
		$sum_pro = $row1['total'];
		$total = $ship_fee+ $sum_pro;
		$notice = $row1['Cus_Note'];
		$query3=mysqli_query($conn,"SELECT * FROM `customer_detail` WHERE Customer_Mobile='$cus_mobile' AND ID_Province='$cus_province' AND ID_District='$cus_district' ");
		$row3 = mysqli_fetch_array($query3);
		if($row3=="")
		{
			$id_cus = id_create($conn,'customer_detail','ID_Customer','CM',10);
			mysqli_query($conn,"INSERT INTO customer_detail(ID_Customer,Customer_Name,Customer_Mobile,Customer_Street,ID_Province,ID_District,ID_Ward) VALUES('$id_cus','$cus_name','$cus_mobile','$cus_street','$cus_province','$cus_district','$cus_ward')");
		}else
		{
			$id_cus=$row3['ID_Customer'];
		}
		$id_oder=id_create($conn,'oder','ID_Oder','OD',10);
		$query2 = mysqli_query($conn,"SELECT * FROM `oder_temporay_detail`  WHERE oder_temporay_detail.id='$id_oder_web'");
		while($row2 = mysqli_fetch_array($query2))
		{
			$id_pro = $row2['id_pro'];
			$quantity = $row2['quantity'];
			$price = $row2['price'];
			mysqli_query($conn,"INSERT INTO oder_detail(ID_Oder,ID_Product,Oder_Quantity,Oder_Product_Price) VALUES('$id_oder','$id_pro','$quantity','$price')");
		}
		$date_create =date("Y-m-d h:i:sa");
		mysqli_query($conn,"INSERT INTO oder(ID_Oder,ID_Customer,Oder_Sum,Oder_ShipFee_Customer,Oder_Price_Sum,Oder_Notice_Customer,Oder_Status,Oder_Date) VALUES('$id_oder','$id_cus','$total','$ship_fee','$sum_pro','$notice','OS01','$date_create')");
		mysqli_close($conn);
		header("Location:../oder_web.php");
	 	
	 }else
	 {
	 	header("Location:../login.php");
	 }
?>