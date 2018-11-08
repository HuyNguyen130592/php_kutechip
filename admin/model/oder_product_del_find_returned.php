<?php
	include("../conn.php");
	mysqli_set_charset($conn, 'UTF8');
	include("../session.php");
	$id_admin = $_SESSION['login']['id'];
	$id = $_POST['id'];
	unset($_SESSION['oder_returned'][$id_admin][$id]);
	
?>