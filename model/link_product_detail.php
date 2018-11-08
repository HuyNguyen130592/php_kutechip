<?php
	include("../admin/conn.php");
	mysqli_set_charset($conn, 'UTF8');
	include("../admin/library/unicode_convert.php");
	include("../ip_address.php");
	$id_pro = $_POST['id'];
	$query1_0 = mysqli_query($conn,"SELECT * FROM `product_type` WHERE ID_Product='$id_pro'");
	$row1_0 = mysqli_fetch_array($query1_0);
	$name_pro = $row1_0['Name_Product'];
	$name = unicode_convert($name_pro);
	$ket_qua ="http://localhost:8080/www/web_1/san-pham/".$id_pro."/".$name.".html";
	echo $ket_qua;
?>