<?php
	include("../conn.php");
	mysqli_set_charset($conn, 'UTF8');
	include("../library/id_create.php");
	$id_create = id_create($conn,"size","ID_Size","SI",2);
	$name = addslashes($_POST['name']);
	
	mysqli_query($conn,"INSERT INTO size(ID_Size,Size_Name) VALUES('$id_create','$name')");
	mysqli_close($conn);
	header("location:../size.php");
	
?>