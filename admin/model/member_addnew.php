<?php
	include("../conn.php");
	mysqli_set_charset($conn, 'UTF8');
	include("../library/id_create.php");
	include("../session.php");
	 $fuserid=$_SESSION['login']['id'];
	
	if(isset($_SESSION['login']['id']))
	{
		$acc=addslashes($_POST['acc']);
		$pass= md5(addslashes($_POST['pass']));
		$duty=addslashes($_POST['duty']);
		
		$id=id_create($conn,'member','ID_Member','MB',10);
		
		$date = date("Y-m-d");
		mysqli_query($conn,"INSERT INTO member(ID_Member,Member_Acc,Member_Pass,Date_Create,ID_Member_Duty)VALUES('$id','$acc','$pass','$date','$duty')");
	}
	mysqli_close($conn);
	header("location:../member.php");
	?>