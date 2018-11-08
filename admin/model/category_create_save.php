<?php
	include("../conn.php");
	mysqli_set_charset($conn, 'UTF8');
	include("../library/id_create.php");
	$id_create = id_create($conn,"product_category","id","CT",3);
	$name = $_POST['name'];
	$kind=$_POST['kind'];
	mysqli_query($conn,"INSERT INTO product_category(id,name,kind) VALUES('$id_create','$name','$kind')");
	mysqli_close($conn);
	header("location:../category.php");
	
?>