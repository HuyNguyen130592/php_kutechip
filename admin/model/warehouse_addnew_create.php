<?php
	include("../conn.php");
	mysqli_set_charset($conn, 'UTF8');
	include("../session.php");
	include("../library/id_create.php");
	$id_admin=$_SESSION['login']['id'];
	$id_cus=addslashes($_POST['id_cus']);
	$name_cus=addslashes($_POST['name_customer']);
	if($id_cus=="")
		{
			$id_cus=id_create($conn,'supplier','ID','SP',3);
			$name_cus = addslashes($_POST['name_customer']);
			$mobile_cus=addslashes($_POST['mobile']);
			$id_city = addslashes($_POST['city']);
			$id_distric=addslashes($_POST['distric']);
			if(isset($_POST['ward'])){$name_ward = $_POST['ward'];}else{$name_ward="";}
			$name_street=addslashes($_POST['street']);
			$date_create1 =date("Y-m-d h:i:sa");
			mysqli_query($conn,"INSERT INTO supplier(ID,Name,address,mobile,ward,id_district,id_city,date_create) VALUES('$id_cus','$name_cus','$name_street','$mobile_cus','$name_ward','$id_distric','$id_city','$date_create1')");
		}
	$id_oder=id_create($conn,'product_import','ID_Product_Import','IP',10);
	$sum_pro_money = 0;
	foreach($_SESSION['import'][$id_admin] as $id_product => $pro_price)
		{
			$pro_id = $id_product;
			
			foreach($pro_price as $key =>$value)
				{
					$price_pro = str_replace(",","",$key);
					$pro_quantity = $value;
				}
			$sum_pro_money_sub=$price_pro*$pro_quantity;
			$sum_pro_money =$sum_pro_money+ $sum_pro_money_sub;
			
			$query3_1 = mysqli_query($conn,"SELECT * FROM `price_export_calculation` WHERE id='$pro_id' ORDER BY stt DESC");
			$row3_1 = mysqli_fetch_array($query3_1);
			if($row3_1['price']==null)
				{
					mysqli_query($conn,"INSERT INTO price_export_calculation(id,price,id_product_import) VALUES('$pro_id','$price_pro','$id_oder')");
				}else
				{
					$price_export_old = $row3_1['price'];
					$query3_2 = mysqli_query($conn,"SELECT SUM(product_import_detail.Quantity_Import) AS nhap FROM product_import_detail WHERE product_import_detail.ID_Product='$pro_id'");
					$row3_2 = mysqli_fetch_array($query3_2);
					$nhap=$row3_2['nhap'];
					$query3_3 = mysqli_query($conn,"SELECT SUM(product_export.Product_Quantity) AS xuat FROM product_export WHERE product_export.ID_Product='$pro_id'");
					$row3_3 = mysqli_fetch_array($query3_3);
					
					$xuat = $row3_3['xuat'];
					
					$ton = $nhap-$xuat;
					
					
					
					$price_export_new =  ($price_export_old*$ton + $sum_pro_money_sub)/($ton+$pro_quantity);
					mysqli_query($conn,"INSERT INTO price_export_calculation(id,price,id_product_import) VALUES('$pro_id','$price_export_new','$id_oder')");
				}
			mysqli_query($conn,"INSERT INTO product_import_detail(ID_Product_Import,ID_Product,Quantity_Import,Price_Import)VALUES('$id_oder','$pro_id','$pro_quantity','$price_pro')");
		}
	unset($_SESSION['import'][$id_admin]);
	if(isset($_POST['ship_fee'])){if($sum_pro_money>=2000000){$ship_fee =0;}else{$ship_fee = str_replace(",","",$_POST['ship_fee']);}}else{$ship_fee=0;}
	if(isset($_POST['shop_note'])){$shop_note = $_POST['shop_note'];}else{$shop_note ="";}
	$cus_note=$_POST['cus_note'];
	$date_create =date("Y-m-d h:i:sa");
	
	$oder_sum = $sum_pro_money+$ship_fee;
	mysqli_query($conn,"INSERT INTO product_import(ID_Product_Import,ID_Manager,Date_Create,Total,ID_Supplier,ship_fee,Notice) VALUES('$id_oder','$id_admin','$date_create','$sum_pro_money','$id_cus','$ship_fee','$cus_note')");
	mysqli_close($conn);
	header("location:../warehouse_invoice.php?id=$id_oder");
?>