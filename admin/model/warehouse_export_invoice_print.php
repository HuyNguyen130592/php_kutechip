<?php
	include("../conn.php");
	mysqli_set_charset($conn, 'UTF8');
	include("../session.php");
	$fuserid=$_SESSION['login']['id'];
	 if(isset($_SESSION['login']['id']))
	 	{
			$id_oder = $_GET['id'];
			mysqli_query($conn,"UPDATE oder SET Oder_Status='OS02' WHERE ID_Oder='$id_oder'");
			$date_create =date("Y-m-d");
			$query = mysqli_query($conn,"SELECT * FROM `oder_detail` WHERE ID_Oder='$id_oder' AND Oder_Quantity>0");
			while($row = mysqli_fetch_array($query))
				{
					$id_product = $row['ID_Product'];
					$quantity = $row['Oder_Quantity'];
					$query3_3 = mysqli_query($conn,"SELECT * FROM `price_export_calculation` WHERE id='$id_product' ORDER BY stt DESC");
					$row3_3 = mysqli_fetch_array($query3_3);
					$price = $row3_3['price'];
					mysqli_query($conn,"INSERT INTO product_export(ID_Oder,ID_Manager,Date_Create,ID_Product,Product_Quantity,price) VALUES('$id_oder','$fuserid','$date_create','$id_product','$quantity','$price')");
				}
			mysqli_close($conn);
			header("location:../invoice_print.php?id=".$id_oder);
		 }
	
?>
