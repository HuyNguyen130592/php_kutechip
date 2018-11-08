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
	foreach($_SESSION['oder_return'][$id_admin] as $id_product => $pro_price)
		{
			$pro_id = $id_product;
			
			foreach($pro_price as $key =>$value)
				{
					$price_pro = str_replace(",","",$key);
					$pro_quantity = $value;
				}
			$sum_pro_money_sub=$price_pro*$pro_quantity;
			$sum_pro_money =$sum_pro_money+ $sum_pro_money_sub;
			mysqli_query($conn,"INSERT INTO oder_detail(ID_Oder,ID_Product,Oder_Quantity,Oder_Product_Price) VALUES('$id_oder','$pro_id','$pro_quantity','$price_pro')");
		}
	unset($_SESSION['oder_return'][$id_admin]);
	$id_import=id_create($conn,'product_import','ID_Product_Import','IP',10);
	foreach($_SESSION['oder_returned'][$id_admin] as $id_product_return => $pro_price_return)
		{
			$pro_id_return = $id_product_return;
			
			foreach($pro_price_return as $key =>$value)
				{
					$price_pro_return = str_replace(",","",$key);
					$pro_quantity_return = $value*(-1);
				}
			$sum_pro_money_sub_return=$price_pro_return*$pro_quantity_return;
			$sum_pro_money =$sum_pro_money+$sum_pro_money_sub_return;
			mysqli_query($conn,"INSERT INTO oder_detail(ID_Oder,ID_Product,Oder_Quantity,Oder_Product_Price) VALUES('$id_oder','$pro_id_return','$pro_quantity_return','$price_pro_return')");
			$query3_1 = mysqli_query($conn,"SELECT * FROM `price_export_calculation` WHERE id='$pro_id_return' ORDER BY stt DESC");
			$row3_1 = mysqli_fetch_array($query3_1);
			$price_export_old = $row3_1['price'];
			$query3_2 = mysqli_query($conn,"SELECT SUM(product_import_detail.Quantity_Import) AS nhap FROM product_import_detail WHERE product_import_detail.ID_Product='$pro_id_return'");
			$row3_2 = mysqli_fetch_array($query3_2);
			$nhap=$row3_2['nhap'];
			$query3_3 = mysqli_query($conn,"SELECT SUM(product_export.Product_Quantity) AS xuat FROM product_export WHERE product_export.ID_Product='$pro_id_return'");
			$row3_3 = mysqli_fetch_array($query3_3);
			$xuat = $row3_3['xuat'];
			$ton = $nhap-$xuat;
			$price_export_new =  ($price_export_old*$ton - $price_pro_return*$pro_quantity_return)/($ton+$pro_quantity_return*(-1));
			mysqli_query($conn,"INSERT INTO price_export_calculation(id,price,id_product_import) VALUES('$pro_id_return','$price_export_new','$id_oder')");
			mysqli_query($conn,"INSERT INTO product_import_detail(ID_Product_Import,ID_Product,Quantity_Import,Price_Import) VALUES('$id_oder','$pro_id_return','$value','$price_pro_return')");
		}
	unset($_SESSION['oder_returned'][$id_admin]);
	if(isset($_POST['ship_fee'])){if($sum_pro_money>=500000){$ship_fee =0;}else{$ship_fee = $price =str_replace(",","",$_POST['ship_fee']);}}else{$ship_fee=0;}
	if(isset($_POST['shop_note'])){$shop_note = $_POST['shop_note'];}else{$shop_note ="";}
	$cus_note=$_POST['cus_note'];
	$date_create =date("Y-m-d h:i:sa");
	$status = "OS01";
	$oder_sum = $sum_pro_money+$ship_fee;
	mysqli_query($conn,"INSERT INTO oder(ID_Oder,ID_Customer,Oder_ShipFee_Customer,Oder_Price_Sum,Oder_Notice_Shop,Oder_Notice_Customer,Oder_Status,Oder_Date,Oder_Sum) VALUES('$id_oder','$id_cus','$ship_fee','$sum_pro_money','$shop_note','$cus_note','$status','$date_create','$oder_sum')");
	mysqli_close($conn);
	header("location:../invoice.php?id=$id_oder");
?>