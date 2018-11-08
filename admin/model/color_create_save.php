<?php
	include("../conn.php");
	mysqli_set_charset($conn, 'UTF8');
	include("../library/id_create.php");
	$id_create = id_create($conn,"color","ID_Color","CL",2);
	$name = addslashes($_POST['name']);
	$id= addslashes($_POST['id']);
	mysqli_query($conn,"INSERT INTO color(ID_Color,Color_Name,id) VALUES('$id_create','$name','$id')");
	mysqli_close($conn);
	header("location:../color.php");
	
?>