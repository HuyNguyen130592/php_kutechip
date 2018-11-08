<?php
	include("../conn.php");
	mysqli_set_charset($conn, 'UTF8');
	include("../session.php");
	include("../library/id_create.php");
	 if(isset($_SESSION['login']['id']))
	 	{
			$id_admin = $_SESSION['login']['id'];
			$id_oder = $_GET['id'];
			mysqli_query($conn,"UPDATE oder_temporay SET status='OS01' WHERE id='$id_oder'");
			$query1 = mysqli_query($conn,"SELECT * FROM `oder_temporay` WHERE id='$id_oder'");
			$row1 = mysqli_fetch_array($query1);
			$query2 = mysqli_query($conn,"SELECT * FROM `oder_temporay_detail` LEFT JOIN product_main ON oder_temporay_detail.id_pro=product_main.ID_Product  WHERE oder_temporay_detail.id='$id_oder'");
			while($row2 = mysqli_fetch_array($query2))
				{
					$id_pro = $row2['id_pro'];
					$name_pro = $row2['Product_Name'];
					$quantity = $row2['quantity'];
					$price = $row2['price'];
					$_SESSION['oder_web'][$id_admin][$id_pro]=array('name'=>$name_pro,'quantity'=>number_format($quantity),'price'=>number_format($price));
				}
			$cus_name = $row1['Cus_name'];
			$cus_mobile = $row1['Cus_mobile'];
			$cus_street = $row1['street'];
			$cus_ward = $row1['ward'];
			$cus_district = $row1['id_district'];
			$cus_province = $row1['id_city'];
			$query3=mysqli_query($conn,"SELECT * FROM `customer_detail` WHERE Customer_Mobile='$cus_mobile' AND ID_Province='$cus_province' AND ID_District='$cus_district' ");
			$row3 = mysqli_fetch_array($query3);
			if($row3=="")
				{
					$id_cus_new = id_create($conn,'customer_detail','ID_Customer','CM',10);
					mysqli_query($conn,"INSERT INTO customer_detail(ID_Customer,Customer_Name,Customer_Mobile,Customer_Street,ID_Province,ID_District,ID_Ward) VALUES('$id_cus_new','$cus_name','$cus_mobile','$cus_street','$cus_province','$cus_district','$cus_ward')");
					mysqli_close($conn);
					header("Location:../oder_web_addnew.php?id_cus=$id_cus_new&id_oder=$id_oder");
				}else
					{
						$id_cus=$row3['ID_Customer'];
						mysqli_close($conn);
						header("Location:../oder_web_addnew.php?id_cus=$id_cus&id_oder=$id_oder");
					}
		 }
	
?>