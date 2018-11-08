<?php
	include("../conn.php");
	mysqli_set_charset($conn, 'UTF8');
	include("../session.php");
	 $fuserid=$_SESSION['login']['id'];
	$query=mysqli_query($conn,"SELECT * FROM `member`  INNER JOIN member_duty ON member.ID_Member_Duty=member_duty.ID_Member_Duty WHERE ID_Member='$fuserid'");
	$id = addslashes($_POST['id']);
	
	$keyword = addslashes($_POST['name']);
	
	$title = addslashes($_POST['des']);
	
	$content = addslashes($_POST['content']);
	
	mysqli_query($conn,"UPDATE product_type SET keyword='$keyword',title='$title',description='$content' WHERE ID_Product='$id'");
	mysqli_close($conn);
	header("location:../seo_product.php");
	 
	?>
