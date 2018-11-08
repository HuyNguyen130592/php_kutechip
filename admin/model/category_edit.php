<?php
	include("../conn.php");
	mysqli_set_charset($conn, 'UTF8');
	include("../library/id_create.php");
	$id = $_POST['id'];
	$name = $_POST['name'];
	$id_kind = $_POST['kind'];
	mysqli_query($conn,"UPDATE product_category SET name='$name',kind='$id_kind' WHERE id='$id'");
	mysqli_close($conn);
	header("location:../category.php");
	
?>