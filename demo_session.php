<?php
	include("admin/conn.php");
	include("ip_address.php");
	mysqli_set_charset($conn, 'UTF8');
	
	if(empty($_SESSION['cart'][$ip]))
						{
							echo"<div class='header-cart-item-txt'>Giỏ hàng không có sản phẩm</div>";
						}
 unset($_SESSION['cart'][$ip]);
 
				
?>
