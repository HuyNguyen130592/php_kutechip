<?php
	include("../admin/conn.php");
	include("../ip_address.php");
	mysqli_set_charset($conn, 'UTF8');
	$id = $_POST['id'];
	$sl = $_POST['sl'];
	
	$district = $_POST['district'];
	if(isset($_SESSION['coupon'][$ip]))
	{
		$value_coupon = $_SESSION['coupon'][$ip];
	}else
	{
		$value_coupon=0;
	}
	
	$_SESSION['cart'][$ip][$id]=$sl;
	$query1_0 = mysqli_query($conn,"SELECT product_sale_price.price,product_sale_price.sale_rate FROM product_type LEFT JOIN product_sale_price ON product_type.ID_Product=product_sale_price.id LEFT JOIN product_main ON product_type.ID_Product=product_main.ID_Product_Type WHERE product_main.ID_Product='$id'");
	$row1_0 = mysqli_fetch_array($query1_0);
	if($row1_0['sale_rate']==null)
	{
			$price = $row1_0['price'];
			
	}else
	{
		$price =$row1_0['price']*(1-$row1_0['sale_rate']/100);
	}
	$sum_pro = $price*$sl ;
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
		$ship_fee = 0;
		$total = $cart_sum*(1-$value_coupon/100);
		
	}else
	{
		if($district==null)
		{
			
			$ship_fee =null;
			$total = $cart_sum*(1-$value_coupon/100);
		}else
		{
			$query2_1 = mysqli_query($conn,"SELECT * FROM `ship_fee` WHERE id='$district'");
			$row2_1 = mysqli_fetch_array($query2_1);
			$ship_fee = $row2_1['fee'];
			$total = $cart_sum*(1-$value_coupon/100) + $ship_fee;
		}
	}
	
	if($ship_fee!==null)
	{
		
		$ket_qua = array("sum_pro"=>number_format($sum_pro),"sub_total"=>number_format($cart_sum),"ship_fee"=>number_format($ship_fee),"total"=>number_format($total));
	}else
	{
		$ket_qua = array("sum_pro"=>number_format($sum_pro),"sub_total"=>number_format($cart_sum),"ship_fee"=>null,"total"=>number_format($total));
	}
	echo json_encode($ket_qua);
	
?>