<?php
	
	include("../conn.php");
	mysqli_set_charset($conn, 'UTF8');
	include("../library/id_create.php");
	$id = $_GET['id'];
	
	mysqli_query($conn,"UPDATE oder SET oder_status='OS06' WHERE ID_Oder='$id'");
	$query2_0 = mysqli_query($conn,"SELECT * FROM `oder` WHERE ID_Oder='$id'");
	$row2_0 = mysqli_fetch_array($query2_0);
	$ship_fee = $row2_0['Oder_ShipFee_Delivery'];
	$query4_0 = mysqli_query($conn,"SELECT SUM(Oder_Quantity) AS tong FROM oder_detail WHERE ID_Oder='$id'");
	$row4_0 = mysqli_fetch_array($query4_0);
	$tong_sp = $row4_0['tong'];
	$ship_fee_plus = $ship_fee/$tong_sp;
	$query1_0 = mysqli_query($conn,"SELECT * FROM oder_detail WHERE ID_Oder='$id'");
	$id_import=id_create($conn,'product_import','ID_Product_Import','IP',10);
	while($row1_0 = mysqli_fetch_array($query1_0))
	{
		$id_pro = $row1_0['ID_Product'];
		$price = $row1_0['Oder_Product_Price'];
		$quatity = $row1_0['Oder_Quantity'];
		$query3_1 = mysqli_query($conn,"SELECT * FROM `price_export_calculation` WHERE id='$id_pro' ORDER BY stt DESC");
		$row3_1 = mysqli_fetch_array($query3_1);
		$price_export_old = $row3_1['price'];
		$query3_2 = mysqli_query($conn,"SELECT SUM(product_import_detail.Quantity_Import) AS nhap FROM product_import_detail WHERE product_import_detail.ID_Product='$id_pro'");
		$row3_2 = mysqli_fetch_array($query3_2);
		$nhap=$row3_2['nhap'];
		$query3_3 = mysqli_query($conn,"SELECT SUM(product_export.Product_Quantity) AS xuat FROM product_export WHERE product_export.ID_Product='$id_pro'");
		$row3_3 = mysqli_fetch_array($query3_3);
		$xuat = $row3_3['xuat'];
		$ton = $nhap-$xuat;
		$price_export_new =  ($price_export_old*$ton + $price*$quatity+$quatity*$ship_fee_plus)/($ton+$quatity);
		mysqli_query($conn,"INSERT INTO price_export_calculation(id,price,id_product_import) VALUES('$id_pro','$price_export_new','$id')");
		mysqli_query($conn,"INSERT INTO product_import_detail(ID_Product_Import,ID_Product,Quantity_Import,Price_Import) VALUES('$id_import','$id_pro','$quatity','$price')");
		
	}
	mysqli_close($conn);
	header("location:../delivery_status.php");
?>