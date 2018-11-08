<?php
	include("admin/conn.php");
	mysqli_set_charset($conn, 'UTF8');
	include("admin/library/unicode_convert.php");
	include("ip_address.php");
	
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php
		$query1_2 = mysqli_query($conn,"SELECT * FROM `theme_index` WHERE id='TH002'");
		$row1_2=mysqli_fetch_array($query1_2);
		$content1_2 = $row1_2['content'];
	?>
	<title><?php echo $content1_2;  ?></title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
<?php
		$query1_1 = mysqli_query($conn,"SELECT * FROM `theme_index` WHERE id = 'TH001'");
		$row1_1 = mysqli_fetch_array($query1_1);
		$logo_img = "http://localhost:8080/www/web_1/images/".$row1_1['content']; 
	?>
	<link rel="icon" type="image/png" href="<?php echo $logo_img ?>"/>
	<?php include("css.php"); ?>
    <script type="text/javascript" src="http://localhost:8080/www/web_1/vendor/jquery/jquery-3.2.1.min.js"></script>
</head>
<body class="animsition">

<?php include("header.php");?>
	<!-- Title Page -->
    <div class="bread-crumb bgwhite flex-w p-l-52 p-r-15 p-t-30 p-l-15-sm">
		<a href="index.html" class="s-text16">
			Home
			<i class="fa fa-angle-right m-l-8 m-r-9" aria-hidden="true"></i>
		</a>


		<span class="s-text17">
			Giỏ hàng
		</span>
	</div>
	
	<!-- Cart -->
    <?php
		if(empty($_SESSION['cart'][$ip]))
		{
			echo" <div class='col-sm-12'><p class='centered'>Không có sản phẩm trong giỏ hàng</p></div>";
		}else
		{
			echo"<section class='cart bgwhite p-t-70 p-b-100'>";
				echo"<div class='container'>";
					echo"<div class='container-table-cart pos-relative'>";
						echo"<div class='wrap-table-shopping-cart bgwhite'>";
							echo"<table class='table-shopping-cart'>";
								echo"<tr class='table-head'>";
								 echo"<th class='column-1'></th>";
								 echo"<th class='column-2'>Sản phẩm</th>";
								 echo"<th class='column-3'>Giá tiền</th>";
								 echo"<th class='column-4 p-l-70'>Số lượng</th>";
								  echo"<th class='column-5'>Thành tiền</th>";
							echo"</tr>";
								
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
					$cart_img_pro ="http://localhost:8080/www/web_1/admin/dist/img/". $row7_0['Product_Image'];
					$cart_price = $row7_0['price'];
					$cart_quantity = $_SESSION['cart'][$ip][$cart_ip_pro];
					if($row7_0['sale_rate']==0)
					{
						$cart_price_after =$cart_price;
					}else
					{
						$cart_price_after =$cart_price*(1-$row7_0['sale_rate']/100);
					}
					$cart_sub_sum = $cart_quantity*$cart_price_after;
					$cart_sum=$cart_sum+$cart_sub_sum;
					
					echo"<tr class='table-row'>";
							echo"<td class='column-1' data-id='$cart_ip_pro'>";
								echo"<div class='cart-img-product b-rad-4 o-f-hidden' data-id='$cart_ip_pro'>";
									echo"<img src='$cart_img_pro' alt='IMG-PRODUCT'>";
								echo"</div>";
							echo"</td>";
							echo"<td class='column-2'>$cart_name_pro</td>";
							echo"<td class='column-3'>".number_format($cart_price_after)."</td>";
							echo"<td class='column-4'>";
								echo"<div class='flex-w bo5 of-hidden w-size17'>";
									echo"<button class='btn-num-product-down color1 flex-c-m size7 bg8 eff2'  data-id='$cart_ip_pro'>";
										echo"<i class='fs-12 fa fa-minus' aria-hidden='true'></i>";
									echo"</button>";

									echo"<input class='size8 m-text18 t-center num-product' type='number' name='num-product1' value='$cart_quantity' >";

									echo"<button class='btn-num-product-up color1 flex-c-m size7 bg8 eff2'  data-id='$cart_ip_pro'>";
										echo"<i class='fs-12 fa fa-plus' aria-hidden='true'></i>";
									echo"</button>";
								echo"</div>";
							echo"</td>";
							echo"<td class='column-5' id='$cart_ip_pro'>".number_format($cart_sub_sum)."</td>";
						echo"</tr>";	
						
						
				}
				echo"</table>";
			echo"</div>";
		echo"</div>";
		
		} 
	?>

			<div class="flex-w flex-sb-m p-t-25 p-b-25 bo8 p-l-35 p-r-60 p-lr-15-sm" <?php if(empty($_SESSION['cart'][$ip])){echo"style='display:none'";} ?> id="coupon_area">
				<div class="flex-w flex-m w-full-sm">
					<div class="size11 bo4 m-r-10">
						<input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="coupon-code" placeholder="Coupon Code" id="coupon_code">
					</div>

					<div class="size12 trans-0-4 m-t-10 m-b-10 m-r-10">
						<!-- Button -->
						<button class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4" id="coupon_but">
							Sử dụng mã giảm giá
						</button>
					</div>
				</div>

				
			</div>

			<!-- Total -->
			<div class="bo9 w-size18 p-l-40 p-r-40 p-t-30 p-b-38 m-t-30 m-r-0 m-l-auto p-lr-15-sm" <?php if(empty($_SESSION['cart'][$ip])){echo"style='display:none'";} ?>>
				<h5 class="m-text20 p-b-24">
					Hóa đơn
				</h5>

				<!--  -->
				<div class="flex-w flex-sb-m p-b-12">
					<span class="s-text18 w-size19 w-full-sm">
						Tổng tiền sản Phẩm:
					</span>

					<span class="m-text21 w-size20 w-full-sm" id="sub_total" >
						<?php echo number_format($cart_sum); ?>
					</span>
				</div>

				<!--  -->
				<div class="flex-w flex-sb bo10 p-t-15 p-b-20">
					<span class="s-text18 w-size19 w-full-sm">
						Phí giao hàng:
					</span>

					<div class="w-size20 w-full-sm">
						<p class="s-text8 p-b-23" id="ship_notice">
							Vui lòng nhập địa chỉ để tính phí giao hàng.
						</p>
						<p class="s-text8 p-b-23" id="ship_fee"></p>
						<small style="color:#FF0000; display:none"  id="error_city">Vui lòng chọn thành phố/tỉnh</small>
						<div class="rs2-select2 rs3-select2 rs4-select2 bo4 of-hidden w-size21 m-t-8 m-b-12">
							<select class="selection-2" name="city" id="city">
								<option value="">Chọn tỉnh/thành phố</option>
                                <?php
									$query9_0 = mysqli_query($conn,"SELECT * FROM `province`");
									while($row9_0 = mysqli_fetch_array($query9_0))
									{
										$id_city =$row9_0['id'];
										$name_city = $row9_0['name'];
										echo"<option value='$id_city'>$name_city</option>";
									}
								?>
								
							</select>
						</div>
                        <small style="color:#FF0000; display:none"  id="error_district">Vui lòng chọn quận/huyện</small>
						<div class="rs2-select2 rs3-select2 rs4-select2 bo4 of-hidden w-size21 m-t-8 m-b-12">
							<select class="selection-2" name="district" id="district">
								<option value="">Chọn Quận/Huyện</option>
								
							</select>
						</div>
                        <small style="color:#FF0000; display:none" id="error_address">Vui lòng điền thông tin</small>
						<div class="size13 bo4 m-b-12">
                        
						<input class="sizefull s-text7 p-l-15 p-r-15" type="text" name="address" placeholder="Địa chỉ " id="address">
						</div>
						<small style="color:#FF0000; display:none" id="error_mobile">Vui lòng điền thông tin</small>
						<div class="size13 bo4 m-b-22">
							<input class="sizefull s-text7 p-l-15 p-r-15" type="text" name="mobile" placeholder="Số điện thoại" id="mobile">
						</div>
                        <div class="size13 bo4 m-b-22">
							<input class="sizefull s-text7 p-l-15 p-r-15" type="text" name="name_cus" placeholder="Tên liên lạc" id="name_cus">
						</div>
                        <div class="size13 bo4 m-b-22">
                        	<textarea class="sizefull s-text7 p-l-15 p-r-15" cols="5" rows="6" placeholder="Ghi chú..." name="note" id="note"></textarea>
							
						</div>

						
					</div>
				</div>

				<!--  -->
				<div class="flex-w flex-sb-m p-t-26 p-b-30" <?php if(empty($_SESSION['cart'][$ip])){echo"style='display:none'";} ?>>
					<span class="m-text22 w-size19 w-full-sm">
						Tổng tiền:
					</span>

					<span class="m-text21 w-size20 w-full-sm" id="total">
						<?php number_format($cart_sum); ?>
					</span>
				</div>

				<div class="size15 trans-0-4" <?php if(empty($_SESSION['cart'][$ip])){echo"style='display:none'";} ?>>
					<!-- Button -->
					<button class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4" id="thanh_toan">
						Thanh toán
					</button>
				</div>
         <?php 
		    if(isset($_SESSION['cart'][$ip]))
			{   	
			echo"</div>";
		echo"</div>";
	echo"</section>";
			}
		?>


<?php include("footer.php");?>


	<!-- Back to top -->
	<div class="btn-back-to-top bg0-hov" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="fa fa-angle-double-up" aria-hidden="true"></i>
		</span>
	</div>

	<!-- Container Selection -->
	<div id="dropDownSelect1"></div>
	<div id="dropDownSelect2"></div>




	
<?php mysqli_close($conn); ?>
<?php include('js_cart.php'); ?>

</body>
</html>
