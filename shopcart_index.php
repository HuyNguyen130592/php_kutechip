
				
				<span class="header-icons-noti"><?php if(isset($_SESSION['cart'][$ip])){echo count($_SESSION['cart'][$ip]);}else{echo"0";} ?></span>

				<!-- Header cart noti -->
				<div class="header-cart header-dropdown">
					<ul class="header-cart-wrapitem">
                 	<?php
						if(isset($_SESSION['coupon'][$ip]))
						{
							$value_coupon = $_SESSION['coupon'][$ip];
						}else
						{
							$value_coupon=0;
						}
						if(empty($_SESSION['cart'][$ip]))
						{
							echo"<div class='header-cart-item-txt'>Giỏ hàng không có sản phẩm</div>";
						}else
						{
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
								echo"<li class='header-cart-item ".$cart_ip_pro."' data-id='$cart_ip_pro'>";
									echo"<div class='header-cart-item-img'>";
										echo"<img src='$cart_img_pro' alt='IMG'>";
									echo"</div>";
		
									echo"<div class='header-cart-item-txt'>";
										echo"<a href='#' class='header-cart-item-name'>";
											echo $cart_name_pro;
										echo"</a>";
		
										echo"<span class='header-cart-item-info'>";
											echo $cart_quantity." x ".number_format($cart_price_after)." = ".number_format($cart_sub_sum);
										echo"</span>";
									echo"</div>";
								echo"</li>";
							}
						}
					?>
						


					</ul>
					<?php
					if(!empty($_SESSION['cart'][$ip]))
					{
					echo"<div class='header-cart-total'>";
						echo"Total: ".number_format($cart_sum*(1-$value_coupon/100));
					echo"</div>";

					echo"<div class='header-cart-buttons'>";
						echo"<div class='header-cart-wrapbtn'>";
							
							echo"<a href='http://localhost:8080/www/web_1/gio-hang.html' class='flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4'>";
								echo"Xem giỏ hàng";
							echo"</a>";
						echo"</div>";

						echo"<div class='header-cart-wrapbtn'>";
							
							echo"<a href='http://localhost:8080/www/web_1/gio-hang.html' class='flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4'>";
								echo"Thanh toán";
							echo"</a>";
						echo"</div>";
					echo"</div>";
					}
                    ?>
				</div>
<!----------------------------------------------------------------------->
<script>
	$(document).ready(function(){
		$('.header-cart-item').click(function(){
		var a = $(this).attr('data-id');
		var district ="";
		 $("."+a).hide();
		 $.ajax({
		 	url:'http://localhost:8080/www/web_1/model/cart_del_pro.php',
			type:'POST',
			dataType:'json',
			data:{id:a,district:district},
			success:function(e)
			{
				
				if(e.so_sp != 0)
				{
					 $(".header-icons-noti").html(e.so_sp);
					 var  f= "Total: "+e.sub_sum_pro;
					 $('.header-cart-total').html(f);
				}else
				{
					 $(".header-icons-noti").html("0");
					 var b ="<div class='header-cart-item-txt'>Giỏ hàng không có sản phẩm</div>";
					 $('.header-cart').html(b);
				}
			}
		 });
		 return false;
		 
		});
	});
</script>			