<?php
	include("../conn.php");
	mysqli_set_charset($conn, 'UTF8');
	include("../session.php");
	include("../library/id_create.php");
	$id_admin=$_SESSION['login']['id'];
	$id_cus=$_POST['id_cus'];
	$name_cus=$_POST['name_customer'];
	if($id_cus=="")
		{
			$id_cus=id_create($conn,'customer_detail','ID_Customer','CM',10);
			$name_cus = $_POST['name_customer'];
			$mobile_cus=$_POST['mobile'];
			$id_city = $_POST['city'];
			$id_distric=$_POST['distric'];
			if(isset($_POST['ward'])){$name_ward = $_POST['ward'];}else{$name_ward="";}
			$name_street=$_POST['street'];
			mysqli_query($conn,"INSERT INTO customer_detail(ID_Customer,Customer_Name,Customer_Mobile,Customer_Street,ID_Ward,ID_District,ID_Province) VALUES('$id_cus','$name_cus','$mobile_cus','$name_street','$name_ward','$id_distric','$id_city')");
		}
	$id_oder=id_create($conn,'oder','ID_Oder','OD',10);
	$sum_pro_money = 0;
	foreach($_SESSION['oder_web'][$id_admin] as $key => $value1)
		{
			$pro_id = $key;
			$price_pro = $value1['price'];
			$pro_quantity = $value1['quantity'];
			$sum_pro_money_sub=$price_pro*$pro_quantity;
			$sum_pro_money =$sum_pro_money+ $sum_pro_money_sub;
			mysqli_query($conn,"INSERT INTO oder_detail(ID_Oder,ID_Product,Oder_Quantity,Oder_Product_Price) VALUES('$id_oder','$pro_id','$pro_quantity','$price_pro')");
		}
	unset($_SESSION['oder_web'][$id_admin]);
	if(isset($_POST['ship_fee'])){if($sum_pro_money>=500000){$ship_fee =0;}else{$ship_fee = $_POST['ship_fee'];}}else{$ship_fee=0;}
	if(isset($_POST['shop_note'])){$shop_note = $_POST['shop_note'];}else{$shop_note ="";}
	$cus_note=$_POST['cus_note'];
	$date_create =date("Y-m-d h:i:sa");
	$status = "OS01";
	$oder_sum = $sum_pro_money+$ship_fee;
	mysqli_query($conn,"INSERT INTO oder(ID_Oder,ID_Customer,Oder_ShipFee_Customer,Oder_Price_Sum,Oder_Notice_Shop,Oder_Notice_Customer,Oder_Status,Oder_Date,Oder_Sum) VALUES('$id_oder','$id_cus','$ship_fee','$sum_pro_money','$shop_note','$cus_note','$status','$date_create','$oder_sum')");
	mysqli_close($conn);
	header("location:../invoice.php?id=$id_oder");
?>