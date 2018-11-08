<?php
	include("../conn.php");
	mysqli_set_charset($conn, 'UTF8');
	include("../session.php");
	 $fuserid=$_SESSION['login']['id'];
	$query=mysqli_query($conn,"SELECT * FROM `member`  INNER JOIN member_duty ON member.ID_Member_Duty=member_duty.ID_Member_Duty WHERE ID_Member='$fuserid'");
	$row=mysqli_fetch_array($query);
	$id_oder= $_POST['id_oder'];
	$id_delivery=$_POST['id_delivery'];
	$id_warehouse=$_POST['id_warehouse'];
	if(isset($_SESSION['login']['id']))
		{
			
			if($id_delivery=="DL01")
				{
					header("location:ghtk_create_oder.php?id=".$id_oder."&id_warehouse=".$id_warehouse);	
				}elseif($id_delivery=="DL02")
				{
					header("location:../delivery_send_ghn_choose_service.php?id=".$id_oder."&id_warehouse=".$id_warehouse);	
				}elseif($id_delivery=='DL03')
				{
					$date_create = date('y/m/d');
					$query3 = mysqli_query($conn,"UPDATE oder SET oder_status='OS03',ID_delivery_supply='DL03',date_delivery_create='$date_create' WHERE ID_Oder='$id_oder'");
					header("location:../delivery_send.php");	
				}
		
		}
mysqli_close($conn);
?>