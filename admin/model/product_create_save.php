<?php
	include("../conn.php");
	mysqli_set_charset($conn, 'UTF8');
	include("../library/id_create.php");
	$id=id_create($conn,"product_type","ID_Product","PD",4);
	$name =stripslashes($_POST['name']);
	$category = $_POST['category'];
	$price = str_replace(",","",$_POST['price']);
	mysqli_query($conn,"INSERT INTO product_sale_price(id,price,sale_rate) VALUES('$id','$price',0)");
	$additional_infomation = $_POST['additional_infomation'];
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
				$img_insert ="download.png";
			}
	$date = date('d/m/y');
	$description = $_POST['description'];
	$check = 1;
	mysqli_query($conn,"INSERT INTO product_type(ID_Product,Name_Product,id_category,Product_Type_Image,Date_Create,Product_Type_Description,product_type_check,additional_description) VALUES('$id','$name','$category','$img_insert','$date','$description','$check','$additional_infomation')");
	if(count($_FILES['img_file'])!=0)
		{
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
					
				}
				
				
				
			}
		}
	$color = array();
	if( isset($_POST['color']))
		{
			$color=$_POST['color'];
			$size = array();
	if(isset($_POST['size']))
		{
			$size=$_POST['size'];
			for($i=0;$i<count($color);$i++)
				{
					$query1=mysqli_query($conn,"SELECT * FROM `color` WHERE ID_Color='$color[$i]'");
					$row1 = mysqli_fetch_array($query1);
					$color_name = $row1['Color_Name'];
					for($j=0;$j<count($size);$j++)
						{
							$query2= mysqli_query($conn,"SELECT * FROM `size` WHERE ID_Size='$size[$j]'");
							$row2 = mysqli_fetch_array($query2);
							$size_name=$row2['Size_Name'];
							$id_product_main = $id.$color[$i].$size[$j];
							$name_product_main = $name."  ".$color_name." size ".$size_name;
							$check_product_main=1;
							mysqli_query($conn,"INSERT INTO product_main(ID_Product,Product_Name,Product_Image,ID_Color,ID_Size,ID_Product_Type,check_product_main) VALUES('$id_product_main','$name_product_main','$img_insert','$color[$i]','$size[$j]','$id','$check_product_main')");
							
							
							
						}
				}
		}
		}
	
		
mysqli_close($conn);
header("location:../product_create_change.php?id=$id");		
?>