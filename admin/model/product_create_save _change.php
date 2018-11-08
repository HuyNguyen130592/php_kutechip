<?php
	include("../conn.php");
	mysqli_set_charset($conn, 'UTF8');
	include("../library/id_create.php");
	$id=addslashes($_GET['id']);
	$name =addslashes($_POST['name']);
	$category = addslashes($_POST['category']);
	$price = str_replace(",","",$_POST['price']);
	mysqli_query($conn,"UPDATE product_sale_price SET price='$price' WHERE id='$id'");
	if($_FILES['main_img']['name']!="")
		{
			$name_img = stripslashes($_FILES['main_img']['name']);
			$source_img = $_FILES['main_img']['tmp_name'];
			$extend_img = array("png","jpg","gif","jpeg","JPG","PNG","GIF","JPEG");
			$extend_name_before_img = explode(".",$name_img);
			$extend_name_img = end($extend_name_before_img);
			if(in_array($extend_name_img,$extend_img))
			{
				$rename_img=time();
				$img_insert = $rename_img.$name_img;
				$path_img ="../dist/img/".$rename_img. $name_img;
				move_uploaded_file($source_img, $path_img);
			}
		}else
			{
				$query8=mysqli_query($conn,"SELECT * FROM `product_type` WHERE ID_Product='$id'");
				$row8 = mysqli_fetch_array($query8);
				$img_insert =$row8['Product_Type_Image'];
			}
	
	$description = addslashes($_POST['description']);
	if(isset($_POST['product_show_web']))
		{
			$check = 1;
		}else{$check = 0;}
	
	mysqli_query($conn,"UPDATE product_type SET Name_Product='$name',id_category='$category',Product_Type_Image='$img_insert',Product_Type_Description='$description',product_type_check='$check' WHERE ID_Product='$id'");
	$a = array();
	$a=$_FILES['img_file']['name'];
	if($a[0]!="")
		{
			mysqli_query($conn,"DELETE FROM image_product_detail WHERE ID_Product='$id'");
			foreach($_FILES['img_file']['name'] as $names => $value)
			{
				$name_img_detail = stripslashes($_FILES['img_file']['name'][$names]);
				$source_img_detail = $_FILES['img_file']['tmp_name'][$names];
				$extend_img_detail = array("png","jpg","gif","jpeg","JPG","PNG","GIF","JPEG");
				$extend_name_before_img_detail = explode(".",$name_img_detail);
				$extend_name_img_detail= end($extend_name_before_img_detail);
				if(in_array($extend_name_img_detail,$extend_img_detail))
				{
					$rename_img_detail=time();
					$img_insert_detail = $rename_img_detail.$name_img_detail;
					$path_img_detail = "../dist/img/".$rename_img_detail.$name_img_detail;
					move_uploaded_file($source_img_detail, $path_img_detail);
					mysqli_query($conn,"INSERT INTO image_product_detail(ID_Product,ID_Image) VALUES('$id','$img_insert_detail')");
					echo $img_insert_detail."</br>";
				}
				
				
			}
		}
	$query9= mysqli_query($conn,"SELECT * FROM `product_main` WHERE ID_Product_Type='$id'");
	while($row9=mysqli_fetch_array($query9))
		{
			$id_product_main_change=$row9['ID_Product'];
			$id_color_change=$row9['ID_Color'];
			$query10 = mysqli_query($conn,"SELECT * FROM `color` WHERE ID_Color='$id_color_change'");
			$row10=mysqli_fetch_array($query10);
			$name_color_change=$row10['Color_Name'];
			$size_change=$row9['ID_Size'];
			$query11 = mysqli_query($conn,"SELECT * FROM `size` WHERE ID_Size='$size_change'");
			$row11= mysqli_fetch_array($query11);
			$name_size_change=$row11['Size_Name'];
			$name_product_main_change = $name." ".$name_color_change." size ".$name_size_change;
			mysqli_query($conn,"UPDATE product_main SET Product_Name='$name_product_main_change',check_product_main=0,Product_Image='$img_insert' WHERE ID_Product='$id_product_main_change'");
		}
		$product_main_list_active = array();
		if(isset($_POST['product_main_show']))
			{
				$product_main_list_active =$_POST['product_main_show'];
				for($k=0;$k<count($product_main_list_active);$k++)
					{
						$id_product_main_list_active=$product_main_list_active[$k];
						mysqli_query($conn,"UPDATE product_main SET check_product_main=1 WHERE ID_Product='$id_product_main_list_active'");
					}
			}
	
	
		
mysqli_close($conn);
header("location:../product_create_change.php?id=$id");		
?>