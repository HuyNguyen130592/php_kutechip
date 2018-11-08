<?php
	include("../conn.php");
	$id=addslashes($_GET['id']);
	
	mysqli_query($conn,"delete  from product_kind where ID_Product_Kind='$id'");
	mysqli_close($conn);
	
?>
<script>
	alert("Xóa thành công!!");
	window.location="../kind.php";
</script>