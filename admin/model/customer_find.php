<?php
	include("../conn.php");
	mysqli_set_charset($conn, 'UTF8');
	$cus = $_POST['cus'];
	$query = mysqli_query($conn,"SELECT customer_detail.ID_Customer,customer_detail.Customer_Name,customer_detail.Customer_Mobile,customer_detail.Customer_Street,customer_detail.ID_Province,customer_detail.ID_District,customer_detail.ID_Ward,province.name AS province_name,district.name AS district_name FROM customer_detail INNER JOIN province ON customer_detail.ID_Province = province.id INNER JOIN district ON customer_detail.ID_District = district.ID WHERE customer_detail.Customer_Name LIKE '%$cus%' or customer_detail.Customer_Mobile LIKE '%$cus%'");
	$a = array();
	while($row = mysqli_fetch_array($query))
		{
			$a[]=array(
						'id_cus'=>$row['ID_Customer'],
						'name'=>$row['Customer_Name'],
						'mobile'=>$row['Customer_Mobile'],
						'address'=>$row['Customer_Street'].",".$row['ID_Ward'].",".$row['district_name'].",".$row['province_name'],
						'id_province'=>$row['ID_Province'],
						'id_district'=>$row['ID_District'],
						'name_province'=>$row['province_name'],
						'name_district'=>$row['district_name'],
						'name_ward'=>$row['ID_Ward'],
						'name_street'=>$row['Customer_Street']
			);
		}
	echo json_encode($a);
	mysqli_close($conn);
?>