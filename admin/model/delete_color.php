<?php
	include("../conn.php");
	$id=$_GET['id'];
	
	mysqli_query($conn,"delete  from color where ID_Color='$id'");
	mysqli_close($conn);
	
?>
<script>
	alert("Xóa thành công!!");
	window.location="../color.php";
</script>