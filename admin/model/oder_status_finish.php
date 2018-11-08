<?php
	include("../conn.php");
	mysqli_set_charset($conn, 'UTF8');
	$id = addslashes($_GET['id']);
	mysqli_query($conn,"UPDATE oder SET oder_status='OS05' WHERE ID_Oder='$id'");
	mysqli_close($conn);
	header("location:../delivery_status.php");
?>