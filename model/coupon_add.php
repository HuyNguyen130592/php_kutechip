<?php
	include("../admin/conn.php");
	include("../ip_address.php");
	mysqli_set_charset($conn, 'UTF8');
	$id_coupon = addslashes($_POST['a']);
	$district = addslashes($_POST['b']);
	$query1_0 = mysqli_query($conn,"SELECT * FROM `coupon` WHERE id='$id_coupon'");
	$row1_0 = mysqli_fetch_array($query1_0);
	if($row1_0['value']==null)
	{
		$result = false;
		$ket_qua = array("result"=>$result);
		echo json_encode($ket_qua);
	}else
	{
		$result = true;
		$value_coupon = $row1_0['value'];
		$name_coupon = $row1_0['name'];
		$_SESSION['coupon'][$ip]=$value_coupon;
		
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
		if($district==null)
		{
			if($cart_sum*(1-$value_coupon/100)>=500000)
			{
				$ship_fee = 0;
				$total= $cart_sum *(1-$value_coupon/100)+$ship_fee;
			}else
			{
				$ship_fee="";
				$total= $cart_sum *(1-$value_coupon/100);
			}
		}else
		{
			if($cart_sum*(1-$value_coupon/100)>=500000)
			{
				$ship_fee = 0;
				$total= $cart_sum *(1-$value_coupon/100)+$ship_fee;
				
			}else
			{
				$query2_0 = mysqli_query($conn,"SELECT * FROM `ship_fee` WHERE id='$district'");
				$row2_0 = mysqli_fetch_array($query2_0);
				$ship_fee=$row2_0['fee'];
				$total= $cart_sum *(1-$value_coupon/100)+$ship_fee;
			}
			
		}
		if($ship_fee !=="")
		{
			$ket_qua=array("result"=>$result,"name_coupon"=>$name_coupon,"total"=>number_format($total),"ship_fee"=>number_format($ship_fee));
		}else
		{
			$ket_qua=array("result"=>$result,"name_coupon"=>$name_coupon,"total"=>number_format($total),"ship_fee"=>"");
		}
		
		echo json_encode($ket_qua);
	}
	
	
	
?>