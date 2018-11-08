<?php
	include("../conn.php");
	mysqli_set_charset($conn, 'UTF8');
	include("../session.php");
	$month = date('m');
	$year = date('Y');
	$query = mysqli_query($conn,"SELECT Oder_Date,SUM(Oder_Sum) AS tong_tien FROM oder WHERE MONTH(Oder_Date)='$month' AND YEAR(Oder_Date)='$year' GROUP BY Oder_Date");
	$ketqua=array();
	$i=0;
	while($row = mysqli_fetch_array($query))
		{
			$ketqua[$i]=array(date('d/m/Y ',strtotime($row['Oder_Date'])),(int)$row['tong_tien']);
			
			$i++;
		}
	echo json_encode($ketqua);
 ?>