<?php
	include("../conn.php");
	mysqli_set_charset($conn, 'UTF8');
	include("../session.php");
	if(isset($_SESSION['login']['id']))
		{
			$id_oder = addslashes($_GET['id']);
			mysqli_query($conn,"DELETE FROM oder_detail WHERE ID_Oder ='$id_oder'");
			mysqli_query($conn,"DELETE FROM oder WHERE ID_Oder='$id_oder'");
			mysqli_close($conn);
		}
?>
<script>
			window.alert('Đã xóa đơn hàng!');
			window.location="../oder_addnew.php";
</script>