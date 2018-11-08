<?php
	include("../conn.php");
	mysqli_set_charset($conn, 'UTF8');
	include("../session.php");
	 $fuserid=$_SESSION['login']['id'];
	$query=mysqli_query($conn,"SELECT * FROM `member`  INNER JOIN member_duty ON member.ID_Member_Duty=member_duty.ID_Member_Duty WHERE ID_Member='$fuserid'");
	$row=mysqli_fetch_array($query);
	if(isset($_SESSION['login']['id']))
	{
		if($_FILES['logo_img']['name']!='')
		{
			$name_logo_img = $_FILES['logo_img']['name'];
			$source_logo_img = $_FILES['logo_img']['tmp_name'];
			$extend_logo_img = array("png","jpg","gif","jpeg");
			$extend_name_before_logo_img = explode(".",$name_logo_img);
			$extend_name_logo_img = end($extend_name_before_logo_img);
			if(in_array($extend_name_logo_img,$extend_logo_img))
			{
				$rename_logo_img=time();
				$logo_insert = $rename_logo_img.$name_logo_img;
				$path_logo_img = "../../images/" .$rename_logo_img. $name_logo_img;
				move_uploaded_file($source_logo_img, $path_logo_img);
				mysqli_query($conn,"UPDATE theme_index SET content='$logo_insert' WHERE id='TH001'");
			}
		}
		$name_web = addslashes($_POST['name_web']);
		mysqli_query($conn,"UPDATE theme_index SET content='$name_web' WHERE id='TH002'");
		$add_web = addslashes($_POST['add_web']);
		mysqli_query($conn,"UPDATE theme_index SET content='$add_web' WHERE id='TH003'");
		$hotline_web = addslashes($_POST['hotline_web']);
		mysqli_query($conn,"UPDATE theme_index SET content='$hotline_web' WHERE id='TH004'");
		
		$facebook = addslashes($_POST['facebook']);
		mysqli_query($conn,"UPDATE theme_index SET content='$facebook' WHERE id='TH005'");
		$youtube = addslashes($_POST['youtube']);
		mysqli_query($conn,"UPDATE theme_index SET content='$youtube' WHERE id='TH006'");
		$instagram = addslashes($_POST['instagram']);
		mysqli_query($conn,"UPDATE theme_index SET content='$instagram' WHERE id='TH007'");
		$description = addslashes($_POST['description']);
		mysqli_query($conn,"UPDATE theme_index SET content='$description' WHERE id='TH008'");
		if($_FILES['slide1_img']['name']!='')
		{
			$name_slide1_img = $_FILES['slide1_img']['name'];
			$source_slide1_img = $_FILES['slide1_img']['tmp_name'];
			$extend_slide1_img = array("png","jpg","gif","jpeg");
			$extend_name_before_slide1_img = explode(".",$name_slide1_img);
			$extend_name_slide1_img = end($extend_name_before_slide1_img);
			if(in_array($extend_name_slide1_img,$extend_slide1_img))
			{
				$rename_slide1_img=time();
				$slide1_img_insert = $rename_slide1_img.$name_slide1_img;
				$path_slide1_img = "../../images/" .$rename_slide1_img. $name_slide1_img;
				move_uploaded_file($source_slide1_img, $path_slide1_img);
				mysqli_query($conn,"UPDATE theme_index SET content='$slide1_img_insert' WHERE id='TH009'");
			}
		}
		$slide1_title = addslashes($_POST['slide1_title']);
		mysqli_query($conn,"UPDATE theme_index SET content='$slide1_title' WHERE id='TH010'");
		$slide1_content = addslashes($_POST['slide1_content']);
		mysqli_query($conn,"UPDATE theme_index SET content='$slide1_content' WHERE id='TH011'");
		$slide1_link = addslashes($_POST['slide1_link']);
		mysqli_query($conn,"UPDATE theme_index SET content='$slide1_link' WHERE id='TH039'");
		
		if($_FILES['slide2_img']['name']!='')
		{
			$name_slide2_img = $_FILES['slide2_img']['name'];
			$source_slide2_img = $_FILES['slide2_img']['tmp_name'];
			$extend_slide2_img = array("png","jpg","gif","jpeg");
			$extend_name_before_slide2_img = explode(".",$name_slide2_img);
			$extend_name_slide2_img = end($extend_name_before_slide2_img);
			if(in_array($extend_name_slide2_img,$extend_slide2_img))
			{
				$rename_slide2_img=time();
				$slide2_img_insert = $rename_slide2_img.$name_slide2_img;
				$path_slide2_img = "../../images/" .$rename_slide2_img. $name_slide2_img;
				move_uploaded_file($source_slide2_img, $path_slide2_img);
				mysqli_query($conn,"UPDATE theme_index SET content='$slide2_img_insert' WHERE id='TH012'");
			}
		}
		$slide2_title = addslashes($_POST['slide2_title']);
		mysqli_query($conn,"UPDATE theme_index SET content='$slide2_title' WHERE id='TH013'");
		$slide2_content = addslashes($_POST['slide2_content']);
		mysqli_query($conn,"UPDATE theme_index SET content='$slide2_content' WHERE id='TH014'");
		$slide2_link = addslashes($_POST['slide2_link']);
		mysqli_query($conn,"UPDATE theme_index SET content='$slide2_link' WHERE id='TH040'");
		
		if($_FILES['slide3_img']['name']!='')
		{
			$name_slide3_img = $_FILES['slide3_img']['name'];
			$source_slide3_img = $_FILES['slide3_img']['tmp_name'];
			$extend_slide3_img = array("png","jpg","gif","jpeg");
			$extend_name_before_slide3_img = explode(".",$name_slide3_img);
			$extend_name_slide3_img = end($extend_name_before_slide3_img);
			if(in_array($extend_name_slide3_img,$extend_slide3_img))
			{
				$rename_slide3_img=time();
				$slide3_img_insert = $rename_slide3_img.$name_slide3_img;
				$path_slide3_img = "../../images/" .$rename_slide3_img. $name_slide3_img;
				move_uploaded_file($source_slide3_img, $path_slide3_img);
				mysqli_query($conn,"UPDATE theme_index SET content='$slide3_img_insert' WHERE id='TH015'");
			}
		}
		$slide3_title = addslashes($_POST['slide3_title']);
		mysqli_query($conn,"UPDATE theme_index SET content='$slide3_title' WHERE id='TH016'");
		$slide3_content = addslashes($_POST['slide3_content']);
		mysqli_query($conn,"UPDATE theme_index SET content='$slide3_content' WHERE id='TH017'");
		$slide3_link = addslashes($_POST['slide3_link']);
		mysqli_query($conn,"UPDATE theme_index SET content='$slide3_link' WHERE id='TH041'");
		
		if($_FILES['cate1_img']['name']!='')
		{
			$name_cate1_img = $_FILES['cate1_img']['name'];
			$source_cate1_img = $_FILES['cate1_img']['tmp_name'];
			$extend_cate1_img = array("png","jpg","gif","jpeg");
			$extend_name_before_cate1_img = explode(".",$name_cate1_img);
			$extend_name_cate1_img = end($extend_name_before_cate1_img);
			if(in_array($extend_name_cate1_img,$extend_cate1_img))
			{
				$rename_cate1_img=time();
				$cate1_img_insert = $rename_cate1_img.$name_cate1_img;
				$path_cate1_img = "../../images/" .$rename_cate1_img. $name_cate1_img;
				move_uploaded_file($source_cate1_img, $path_cate1_img);
				mysqli_query($conn,"UPDATE theme_index SET content='$cate1_img_insert' WHERE id='TH018'");
			}
		}
		$cat1_id = addslashes($_POST['cat1']);
		mysqli_query($conn,"UPDATE theme_index SET content='$cat1_id' WHERE id='TH019'");
		
		if($_FILES['cate2_img']['name']!='')
		{
			$name_cate2_img = $_FILES['cate2_img']['name'];
			$source_cate2_img = $_FILES['cate2_img']['tmp_name'];
			$extend_cate2_img = array("png","jpg","gif","jpeg");
			$extend_name_before_cate2_img = explode(".",$name_cate2_img);
			$extend_name_cate2_img = end($extend_name_before_cate2_img);
			if(in_array($extend_name_cate2_img,$extend_cate2_img))
			{
				$rename_cate2_img=time();
				$cate2_img_insert = $rename_cate2_img.$name_cate2_img;
				$path_cate2_img = "../../images/" .$rename_cate2_img. $name_cate2_img;
				move_uploaded_file($source_cate2_img, $path_cate2_img);
				mysqli_query($conn,"UPDATE theme_index SET content='$cate2_img_insert' WHERE id='TH020'");
			}
		}
		$cat2_id = addslashes($_POST['cat2']);
		mysqli_query($conn,"UPDATE theme_index SET content='$cat2_id' WHERE id='TH021'");
		
		if($_FILES['cate3_img']['name']!='')
		{
			$name_cate3_img = $_FILES['cate3_img']['name'];
			$source_cate3_img = $_FILES['cate3_img']['tmp_name'];
			$extend_cate3_img = array("png","jpg","gif","jpeg");
			$extend_name_before_cate3_img = explode(".",$name_cate3_img);
			$extend_name_cate3_img = end($extend_name_before_cate3_img);
			if(in_array($extend_name_cate3_img,$extend_cate3_img))
			{
				$rename_cate3_img=time();
				$cate3_img_insert = $rename_cate3_img.$name_cate3_img;
				$path_cate3_img = "../../images/" .$rename_cate3_img. $name_cate3_img;
				move_uploaded_file($source_cate3_img, $path_cate3_img);
				mysqli_query($conn,"UPDATE theme_index SET content='$cate3_img_insert' WHERE id='TH022'");
			}
		}
		$cat3_id = addslashes($_POST['cat3']);
		mysqli_query($conn,"UPDATE theme_index SET content='$cat3_id' WHERE id='TH023'");
		
		if($_FILES['sale_img']['name']!='')
		{
			$name_sale_img = $_FILES['sale_img']['name'];
			$source_sale_img = $_FILES['sale_img']['tmp_name'];
			$extend_sale_img = array("png","jpg","gif","jpeg");
			$extend_name_before_sale_img = explode(".",$name_sale_img);
			$extend_name_sale_img = end($extend_name_before_sale_img);
			if(in_array($extend_name_sale_img,$extend_sale_img))
			{
				$rename_sale_img=time();
				$sale_img_insert = $rename_sale_img.$name_sale_img;
				$path_sale_img = "../../images/" .$rename_sale_img. $name_sale_img;
				move_uploaded_file($source_sale_img, $path_sale_img);
				mysqli_query($conn,"UPDATE theme_index SET content='$sale_img_insert' WHERE id='TH024'");
			}
		}
		$sale_id = addslashes($_POST['sale']);
		mysqli_query($conn,"UPDATE theme_index SET content='$sale_id' WHERE id='TH025'");
		
		if($_FILES['clip_img']['name']!='')
		{
			$name_clip_img = $_FILES['clip_img']['name'];
			$source_clip_img = $_FILES['clip_img']['tmp_name'];
			$extend_clip_img = array("png","jpg","gif","jpeg");
			$extend_name_before_clip_img = explode(".",$name_clip_img);
			$extend_name_clip_img = end($extend_name_before_clip_img);
			if(in_array($extend_name_clip_img,$extend_clip_img))
			{
				$rename_clip_img=time();
				$clip_img_insert = $rename_clip_img.$name_clip_img;
				$path_clip_img = "../../images/" .$rename_clip_img. $name_clip_img;
				move_uploaded_file($source_clip_img, $path_clip_img);
				mysqli_query($conn,"UPDATE theme_index SET content='$clip_img_insert' WHERE id='TH026'");
			}
		}
		$clip_link = $_POST['clip_link'];
		mysqli_query($conn,"UPDATE theme_index SET content='$clip_link' WHERE id='TH027'");
		
		$j = 28;
		if(count($_FILES['instagram_file'])!=0)
		{
			for($i=0;$i<5;$i++)
			{
				$name_instagram_file = $_FILES['instagram_file']['name'][$i];
				$source_instagram_file = $_FILES['instagram_file']['tmp_name'][$i];
				$extend_instagram_file = array("png","jpg","gif","jpeg");
				$extend_name_before_instagram_file = explode(".",$name_instagram_file);
				$extend_name_instagram_file = end($extend_name_before_instagram_file);
				if(in_array($extend_name_instagram_file,$extend_instagram_file))
				{
					$stt ="TH0".$j;
					$rename_instagram_file=time();
					$instagram_file_insert = $rename_instagram_file.$name_instagram_file;
					$path_instagram_file = "../../images/" .$rename_instagram_file. $name_instagram_file;
					move_uploaded_file($source_instagram_file, $path_instagram_file);
					mysqli_query($conn,"UPDATE theme_index SET content='$instagram_file_insert' WHERE id='$stt'");
					$j++;
				}
			}
		}
		$title_prior1 = addslashes($_POST['title_prior1']);
		mysqli_query($conn,"UPDATE theme_index SET content='$title_prior1' WHERE id='TH033'");
		$content_prior1 = addslashes($_POST['content_prior1']);
		mysqli_query($conn,"UPDATE theme_index SET content='$content_prior1' WHERE id='TH034'");
		$title_prior2 = addslashes($_POST['title_prior2']);
		mysqli_query($conn,"UPDATE theme_index SET content='$title_prior2' WHERE id='TH035'");
		$content_prior2 = addslashes($_POST['content_prior2']);
		mysqli_query($conn,"UPDATE theme_index SET content='$content_prior2' WHERE id='TH036'");
		$title_prior3 = addslashes($_POST['title_prior3']);
		mysqli_query($conn,"UPDATE theme_index SET content='$title_prior3' WHERE id='TH037'");
		$content_prior3 = addslashes($_POST['content_prior3']);
		mysqli_query($conn,"UPDATE theme_index SET content='$content_prior3' WHERE id='TH038'");
		
	}else{header("location:../login.php");}
	mysqli_close($conn);
	header("location:../theme_index.php");
?>
