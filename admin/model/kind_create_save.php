<?php
	include("../conn.php");
	mysqli_set_charset($conn, 'UTF8');
	include("../library/id_create.php");
	$id_create = id_create($conn,"product_kind","ID_Product_Kind","KI",2);
	$name = $_POST['name'];
	
	mysqli_query($conn,"INSERT INTO product_kind(ID_Product_Kind,Product_Kind_Name) VALUES('$id_create','$name')");
	mysqli_close($conn);
	header("location:../kind.php");
	
?>