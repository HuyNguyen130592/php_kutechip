<?php 
	include("../conn.php");
	mysqli_set_charset($conn, 'UTF8');
	$id = addslashes($_POST['city']);
	$query = mysqli_query($conn,"SELECT * FROM `district` WHERE ID_province ='$id'");
	$a = array();
	while($row = mysqli_fetch_array($query))
		{
			$a[]=array(
				'id'=>$row['ID'],
				'name'=>$row['name']
				
			);
		}
	echo json_encode($a);
	mysqli_close($conn);
?>