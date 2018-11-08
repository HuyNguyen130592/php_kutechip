<?php
	include("../conn.php");
	mysqli_set_charset($conn, 'UTF8');
	include("../session.php");
	$fuserid=$_SESSION['login']['id'];
	$query=mysqli_query($conn,"SELECT * FROM `member`  INNER JOIN member_duty ON member.ID_Member_Duty=member_duty.ID_Member_Duty WHERE ID_Member='$fuserid'");
	$row=mysqli_fetch_array($query);
	$id = addslashes($_POST['id']);
	$query3=mysqli_query($conn,"SELECT * FROM `blog_news` WHERE news_id='$id'");
	$row3=mysqli_fetch_array($query3);
	$img = $row3['news_image'];
	if($_FILES['main_img']['name']!="")
	{
		$name_img = stripslashes($_FILES['main_img']['name']);
		$source_img = $_FILES['main_img']['tmp_name'];
		$extend_img = array("png","jpg","gif","jpeg");
		$extend_name_before_img = explode(".",$name_img);
		$extend_name_img = end($extend_name_before_img);
		if(in_array($extend_name_img,$extend_img))
		{
			$rename_img=time();
			$img_insert = $rename_img.$name_img;
			$path_img ="../dist/img/".$rename_img.$name_img;
			move_uploaded_file($source_img, $path_img);
		}
	}else{$img_insert =$img;}
	$name = addslashes($_POST['name']);
	$des=addslashes($_POST['des']);
	$content = addslashes($_POST['content']);
	$category = addslashes($_POST['category']);
	mysqli_query($conn,"UPDATE blog_news SET news_name='$name',news_title='$des',news_image='$img_insert',news_content='$content',id_cat='$category' WHERE news_id='$id'");
	mysqli_close($conn);
	header("location:../blog.php");
	
?>