<?php
	include("../conn.php");
	mysqli_set_charset($conn, 'UTF8');
	$id = $_POST['id'];
	$query = mysqli_query($conn,"SELECT * FROM `ship_fee` WHERE id='$id'");
	$row = mysqli_fetch_array($query);
	echo number_format($row['fee']);
	mysqli_close($conn);
?>