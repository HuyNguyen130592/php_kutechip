<?php
	include("../conn.php");
	$id=$_GET['id'];
	
	mysqli_query($conn,"delete  from size where ID_Size='$id'");
	mysqli_close($conn);
	
?>
<script>
	alert("Xóa thành công!!");
	window.location="../size.php";
</script>