<?php
	include("../admin/conn.php");
	include("../ip_address.php");
	mysqli_set_charset($conn, 'UTF8');
	include("../admin/library/id_create.php");
	$id_oder = id_create($conn,'oder_temporay','id','OT',10);
	$city = $_POST['a'];
	$district = $_POST['b'];
	$address = addslashes($_POST['c']);
	$mobile = addslashes($_POST['d']);
	$note = addslashes($_POST['e']);
	$name = addslashes($_POST['f']);
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
		$cart_price = $row7_0['price']*(1-$value_coupon/100);
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
		$query1_0 = mysqli_query($conn,"INSERT INTO oder_temporay_detail(id,id_pro,quantity,price) VALUES('$id_oder','$cart_ip_pro','$cart_quantity','$cart_price_after')");
	}
	if($cart_sum>80000)
	{
		if($cart_sum >=500000)
		{
			$ship_fee = 0;
		}else
		{
			$query8_0 = mysqli_query($conn,"SELECT * FROM `ship_fee` WHERE id='$district'");
			$row8_0 = mysqli_fetch_array($query8_0);
			$ship_fee = $row8_0['fee'];
		}
		$date_create =date("Y-m-d h:i:sa");
		mysqli_query($conn,"INSERT INTO oder_temporay(id,Cus_name,Cus_mobile,Cus_Note,ship_fee,total,Date_create,status,id_district,id_city,street) VALUES('$id_oder','$name','$mobile','$note','$ship_fee','$cart_sum','$date_create','OS08','$district','$city','$address')");
		
		mysqli_close($conn);
		unset($_SESSION['cart'][$ip]);
		unset($_SESSION['coupon'][$ip]);
		echo"1";
	}else
	{
		echo"0";
	}
	
?>