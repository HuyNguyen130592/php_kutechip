<?php
	include("../admin/conn.php");
	include("../ip_address.php");
	mysqli_set_charset($conn, 'UTF8');
	$id = $_POST['id'];
	$query = mysqli_query($conn,"SELECT * FROM `ship_fee` WHERE id='$id'");
	$row = mysqli_fetch_array($query);
	if(isset($_SESSION['coupon'][$ip]))
		{
			$value_coupon = $_SESSION['coupon'][$ip];
		}else
		{
			$value_coupon=0;
		}
	$ket_qua = array();
	foreach($_SESSION['cart'][$ip] as $ma_sp=>$so_luong)
	{
		$arr[]="'".$ma_sp."'";
	}
	$string=implode(",",$arr);
	$query7_0 = mysqli_query($conn,"SELECT product_main.ID_Product,product_main.Product_Name,product_main.Product_Image,product_sale_price.price,product_sale_price.sale_rate FROM product_main LEFT JOIN product_sale_price ON product_main.ID_Product_Type=product_sale_price.id WHERE product_main.ID_Product IN ($string)");
	$cart_sum = 0;
	while($row7_0=mysqli_fetch_array($query7_0))
	{
		$cart_ip_pro = $row7_0['ID_Product'];
		$cart_name_pro = $row7_0['Product_Name'];
		$cart_img_pro ="admin/dist/img/". $row7_0['Product_Image'];
		$cart_price = $row7_0['price'];
		$cart_quantity = $_SESSION['cart'][$ip][$cart_ip_pro];
		if($row7_0['sale_rate']==null)
		{
			$cart_price_after =$cart_price;
		}else
		{
			$cart_price_after =$cart_price*(1-$row7_0['sale_rate']/100);
		}
		$cart_sub_sum = $cart_quantity*$cart_price_after;
		$cart_sum=$cart_sum+$cart_sub_sum;
	}
	if($cart_sum*(1-$value_coupon/100)>=500000)
	{
		$ship_fee =0;
	}else
	{
		$ship_fee = $row['fee'];
	}
	$tong_tien = $ship_fee+$cart_sum*(1-$value_coupon/100);
	$ket_qua = array("ship_fee"=>number_format($ship_fee),"total"=>number_format($tong_tien));
	echo json_encode($ket_qua);
	mysqli_close($conn);
?>