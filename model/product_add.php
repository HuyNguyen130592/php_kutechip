<?php
	include("../admin/conn.php");
	include("../ip_address.php");
	mysqli_set_charset($conn, 'UTF8');
	$id_pro = $_POST['id'];
	$quantity = $_POST['quantity'];
	$_SESSION['cart'][$ip][$id_pro]=$quantity;
	$sl_cart = count($_SESSION['cart'][$ip]);
	if(isset($_SESSION['coupon'][$ip]))
		{
			$value_coupon = $_SESSION['coupon'][$ip];
		}else
		{
			$value_coupon=0;
		}
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
	$query7_1 = mysqli_query($conn,"SELECT product_main.ID_Product,product_main.Product_Name,product_main.Product_Image,product_sale_price.price,product_sale_price.sale_rate FROM product_main LEFT JOIN product_sale_price ON product_main.ID_Product_Type=product_sale_price.id WHERE product_main.ID_Product = '$id_pro'");
	$row7_1=mysqli_fetch_array($query7_1);
	$cart_ip_pro2 = $row7_1['ID_Product'];
	$cart_name_pro2 = $row7_1['Product_Name'];
	$cart_img_pro2 ="admin/dist/img/". $row7_1['Product_Image'];
	$cart_price2 = $row7_1['price'];
	
	if($row7_1['sale_rate']==null)
	{
		$cart_price_after2 =$cart_price2;
	}else
	{
		$cart_price_after2 =$cart_price2*(1-$row7_1['sale_rate']/100);
	}
	$sum_pro = $quantity*$cart_price_after2;
	$ket_qua = array(
						"sl_cart"=>$sl_cart,
						"sl_sp"=>$quantity,
						"sub_sum_pro"=>number_format($cart_sum*(1-$value_coupon/100)),
						"id_pro"=>$cart_ip_pro2,
						"name_pro"=>$cart_name_pro2,
						"price_pro"=>number_format($cart_price_after2),
						"sum_pro"=>number_format($sum_pro),
						"img_pro"=>$cart_img_pro2
	
					);
	echo json_encode($ket_qua);
?>
