<?php
	include("../conn.php");
	mysqli_set_charset($conn, 'UTF8');
	include("../session.php");
	 $fuserid=$_SESSION['login']['id'];
	 if(isset($_SESSION['login']['id']))
	 	{
			$id_oder = addslashes($_GET['id']);
			
			mysqli_query($conn,"UPDATE oder_temporay SET status='OS06' WHERE id='$id_oder'");
			mysqli_close($conn);
			header("location:../oder_web.php");
		 }else{header("location:../login.php");}
	
?>