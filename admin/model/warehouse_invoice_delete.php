<?php
	include("../conn.php");
	mysqli_set_charset($conn, 'UTF8');
	include("../session.php");
	if(isset($_SESSION['login']['id']))
		{
			$id_oder = addslashes($_GET['id']);
			mysqli_query($conn,"DELETE FROM product_import WHERE ID_Product_Import='$id_oder'");
			mysqli_query($conn,"DELETE FROM product_import_detail WHERE ID_Product_Import='$id_oder'");
			mysqli_query($conn,"DELETE FROM price_export_calculation WHERE id_product_import='$id_oder'");
			mysqli_close($conn);
		}
?>
<script>
			window.alert('Đã xóa phiếu nhập kho!');
			window.location="../warehouse_import_addnew.php";
</script>