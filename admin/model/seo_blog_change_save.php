<?php
	include("../conn.php");
	mysqli_set_charset($conn, 'UTF8');
	include("../session.php");
	 $fuserid=$_SESSION['login']['id'];
	$query=mysqli_query($conn,"SELECT * FROM `member`  INNER JOIN member_duty ON member.ID_Member_Duty=member_duty.ID_Member_Duty WHERE ID_Member='$fuserid'");
	$id = $_POST['id'];
	
	$keyword = $_POST['name'];
	
	$title = $_POST['des'];
	
	$content = $_POST['content'];
	
	mysqli_query($conn,"UPDATE blog_news SET keyword='$keyword',title='$title',description='$content' WHERE news_id='$id'");
	mysqli_close($conn);
	header("location:../seo_blog.php");
	 
	?>
