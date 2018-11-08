<?php
	include("../conn.php");
	mysqli_set_charset($conn, 'UTF8');
	include("../library/id_create.php");
	$id_warehouse = id_create($conn,'delivery_warehouse_information','id','WI',2);
	$name_warehouse = $_POST['name_warehouse'];
	$mobile_warehouse = $_POST['mobile_warehouse'];
	$city  = $_POST['city'];
	$district = $_POST['distric'];
	$add = $_POST['street'];
	mysqli_query($conn,"INSERT INTO delivery_warehouse_information(id,name,street,id_district,mobile,id_province) VALUES('$id_warehouse','$name_warehouse','$add','$district','$mobile_warehouse','$city')");
	mysqli_close($conn);
	header("location:../delivery_warehouse.php");
	
	
?>