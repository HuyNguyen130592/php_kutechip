<?php
	include("../conn.php");
	mysqli_set_charset($conn, 'UTF8');
	include("../library/id_create.php");
	$id_warehouse = $_GET['id'];
	$name_warehouse = $_POST['name_warehouse'];
	$mobile_warehouse = $_POST['mobile_warehouse'];
	$city  = $_POST['city'];
	$district = $_POST['distric'];
	$add = $_POST['street'];
	mysqli_query($conn,"UPDATE delivery_warehouse_information SET name='$name_warehouse',street='$add',id_district='$district',mobile='$mobile_warehouse',id_province='$city' WHERE id='$id_warehouse'");
	mysqli_close($conn);
	header("location:../delivery_warehouse.php");
	
	
?>