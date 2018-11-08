<?php
	include("../conn.php");
	$id=addslashes($_POST['id']);
	$token = addslashes($_POST['token']);
	mysqli_query($conn,"UPDATE delivery_information SET token='$token' WHERE id='$id'");
	mysqli_close($conn);
	
?>
<script>
	
			window.alert('Thay đổi Token thành công!');
			window.history.back();
		
</script>