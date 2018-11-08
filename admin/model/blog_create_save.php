<?php
	include("../conn.php");
	mysqli_set_charset($conn, 'UTF8');
	include("../session.php");
	include("../library/id_create.php");
	 $fuserid=$_SESSION['login']['id'];
	$query=mysqli_query($conn,"SELECT * FROM `member`  INNER JOIN member_duty ON member.ID_Member_Duty=member_duty.ID_Member_Duty WHERE ID_Member='$fuserid'");
	$row=mysqli_fetch_array($query);
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
		
		
	}else{$img_insert ="download.png";}
	
	
	$name=addslashes($_POST['name']);
	$category= addslashes($_POST['category']);
	$des=addslashes($_POST['des']);
	$content=addslashes($_POST['content']);
	$day=date("y/m/d");
	$id=id_create($conn,'blog_news','news_id','BN',10);
	mysqli_query($conn,"INSERT INTO blog_news(news_id,news_name,news_title,news_content,date_create,news_image,id_cat) VALUES('$id','$name','$des','$content','$day','$img_insert','$category')");
	mysqli_close($conn);
	header("location:../blog.php");
?>