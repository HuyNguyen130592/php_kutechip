<?php
	include("../conn.php");
	mysqli_set_charset($conn, 'UTF8');
	include("../session.php");
	$id_admin = $_SESSION['login']['id'];
	$id = $_POST['id'];
	$name = $_POST['name'];
	$price = $_POST['price'];
	$quantity= $_POST['quantity'];
	$_SESSION['import'][$id_admin][$id][$price]=$quantity;
	$a[] = array(
		'id'=>$id,
		'name'=>$name,
		'price'=>$price,
		'quantity'=>$quantity
	);
	echo json_encode($a);
	
?>