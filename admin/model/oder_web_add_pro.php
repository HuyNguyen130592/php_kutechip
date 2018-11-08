<?php
	include("../conn.php");
	mysqli_set_charset($conn, 'UTF8');
	include("../session.php");
	$id_admin = $_SESSION['login']['id'];
	$id = addslashes($_POST['id']);
	$name = addslashes($_POST['name']);
	$price = addslashes($_POST['price']);
	$quantity= addslashes($_POST['quantity']);
	$_SESSION['oder_web'][$id_admin][$id]=array('name'=>$name,'quantity'=>$quantity,'price'=>$price);
	$a[] = array(
		'id'=>$id,
		'name'=>$name,
		'price'=>$price,
		'quantity'=>$quantity
	);
	echo json_encode($a);
	
?>