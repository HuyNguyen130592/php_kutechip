<?php
	include("../conn.php");
	mysqli_set_charset($conn, 'UTF8');
	include("../session.php");
	 $fuserid=$_SESSION['login']['id'];
	$query=mysqli_query($conn,"SELECT * FROM `member`  INNER JOIN member_duty ON member.ID_Member_Duty=member_duty.ID_Member_Duty WHERE ID_Member='$fuserid'");
	if(isset($_SESSION['login']['id']))
		{
			$row=mysqli_fetch_array($query);
			$id = addslashes($_POST['id']);
			$string_price =addslashes($_POST['price']);
			$price =str_replace(",","",$string_price);
			mysqli_query($conn,"UPDATE ship_fee SET fee='$price' WHERE id='$id'");
			header("location:../delivery_ship_fee.php");
		}else{header("location:..login.php");}
	
?>