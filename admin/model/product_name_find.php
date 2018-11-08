<?php
	include("../conn.php");
	mysqli_set_charset($conn, 'UTF8');
	$pro_name = $_POST['pro_name'];
	$query = mysqli_query($conn,"SELECT * FROM `product_main` LEFT JOIN product_sale_price ON product_main.ID_Product_Type=product_sale_price.id WHERE product_main.ID_Product LIKE '%$pro_name%' or product_main.Product_Name like '%$pro_name%'");
	$a = array();
	while($row = mysqli_fetch_array($query))
		{
			$price_after=number_format($row['price']*(1-$row['sale_rate']/100));
			$a[]=array(
						'id'=>$row['ID_Product'],
						'name'=>$row['Product_Name'],
						'price'=>number_format($row['price']),
						'price_after'=>$price_after
						
			);
		}
	echo json_encode($a);
	mysqli_close($conn);
?>