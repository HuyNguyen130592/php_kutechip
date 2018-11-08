<?php
	include("../conn.php");
	mysqli_set_charset($conn, 'UTF8');
	$cus = $_POST['cus'];
	$query = mysqli_query($conn,"SELECT supplier.ID AS id_supplier,supplier.Name AS name_supplier,supplier.address,supplier.mobile,supplier.note,supplier.ward,supplier.id_district AS id_district,supplier.id_city AS id_city,supplier.date_create,district.name AS name_district,province.name AS name_province FROM supplier LEFT JOIN district ON supplier.id_district=district.ID LEFT JOIN province ON province.id=supplier.id_city WHERE supplier.Name LIKE '%$cus%' OR supplier.mobile LIKE '%$cus%'");
	$a = array();
	while($row = mysqli_fetch_array($query))
		{
			$a[]=array(
						'id_cus'=>$row['id_supplier'],
						'name'=>$row['name_supplier'],
						'mobile'=>$row['mobile'],
						'address'=>$row['address'].",".$row['ward'].",".$row['name_district'].",".$row['name_province'],
						'id_province'=>$row['id_city'],
						'id_district'=>$row['id_district'],
						'name_province'=>$row['name_province'],
						'name_district'=>$row['name_district'],
						'name_ward'=>$row['ward'],
						'name_street'=>$row['address']
			);
		}
	echo json_encode($a);
	mysqli_close($conn);
?>