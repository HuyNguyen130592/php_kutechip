<?php
	include("../conn.php");
	mysqli_set_charset($conn, 'UTF8');
	include("../library/id_create.php");
	$id = $_POST['id'];
	$name = $_POST['name'];
	
	mysqli_query($conn,"UPDATE product_kind SET Product_Kind_Name ='$name' WHERE ID_Product_Kind='$id'");
	mysqli_close($conn);
	header("location:../kind.php");
	
?>