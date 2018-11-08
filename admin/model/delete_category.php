<?php
	include("../conn.php");
	$id=addslashes($_GET['id']);
	
	mysqli_query($conn,"delete  from product_category where id='$id'");
	mysqli_close($conn);
	
?>
<script>
	alert("Xóa thành công!!");
	window.location="../category.php";
</script>