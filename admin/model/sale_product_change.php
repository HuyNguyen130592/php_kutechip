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
			$string_price =$_POST['price'];
			$price =str_replace(",","",$string_price);
			
			$price_after = str_replace(",","",$_POST['price_after']);
			if($price!=0)
				{
					
					  $sale_rate = ($price -$price_after)/$price*100;
					   mysqli_query($conn,"DELETE FROM product_sale_price WHERE id='$id'");
					   mysqli_query($conn,"INSERT INTO product_sale_price(id,price,sale_rate) VALUES('$id','$price','$sale_rate')");
					
				}
			header("location:../sale_product.php");
		}else{header("location:..login.php");}
	
?>