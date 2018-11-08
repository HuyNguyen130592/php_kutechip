<?php
	include("../conn.php");
	mysqli_set_charset($conn, 'UTF8');
	include("../library/id_create.php");
	$id = $_POST['id'];
	$name = $_POST['name'];
	
	mysqli_query($conn,"UPDATE color SET Color_Name='$name' WHERE ID_Color='$id'");
	mysqli_close($conn);
	header("location:../color.php");
	
?>
