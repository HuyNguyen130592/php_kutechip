<?php
	include("admin/conn.php") ;
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
    <?php
		$id_pro = addslashes($_GET['id']);
		$query12_2 = mysqli_query($conn,"SELECT keyword,title,description FROM product_type WHERE ID_Product='$id_pro'");
		$row12_2 = mysqli_fetch_array($query12_2);
		$keyword = $row12_2['keyword'];
		$title = $row12_2['title'];
		$content = $row12_2['description'];
	?>
    <meta name="keywords" content="<?php echo $keyword; ?>" />
	<meta name="description" content="<?php echo $content;  ?>"/>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
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

	<!-- breadcrumb -->
	<div class="bread-crumb bgwhite flex-w p-l-52 p-r-15 p-t-30 p-l-15-sm">
		<a href="http://localhost:8080/www/web_1/home.html" class="s-text16">
			Trang chủ
			<i class="fa fa-angle-right m-l-8 m-r-9" aria-hidden="true"></i>
		</a>
		<?php
			
			$query3_1 = mysqli_query($conn,"SELECT product_category.id,product_kind.ID_Product_Kind, product_type.Name_Product,product_category.name,product_kind.Product_Kind_Name FROM product_category LEFT JOIN product_kind ON product_category.kind=product_kind.ID_Product_Kind LEFT JOIN product_type ON product_type.id_category=product_category.id WHERE product_type.ID_Product='$id_pro'");
			$row3_1 = mysqli_fetch_array($query3_1);
			$id_kind = $row3_1['ID_Product_Kind'];
			$name_kind = $row3_1['Product_Kind_Name'];
			$name_kind_unicode = unicode_convert($name_kind);
			$id_cate = $row3_1['id'];
			$name_cate = $row3_1['name'];
			$name_cate_unicode = unicode_convert($name_cate);
			$name_pro1 = $row3_1['Name_Product'];
		?>
		<a href="<?php echo"http://localhost:8080/www/web_1/chung-loai/$id_kind/$name_kind_unicode.html"; ?>" class="s-text16">
			<?php echo $name_kind;  ?>
			<i class="fa fa-angle-right m-l-8 m-r-9" aria-hidden="true"></i>
		</a>
		
		<a href="<?php echo"http://localhost:8080/www/web_1/nhom-san-pham/$id_cate/$name_cate_unicode.html"; ?>" class="s-text16">
			<?php echo $name_cate;  ?>
			<i class="fa fa-angle-right m-l-8 m-r-9" aria-hidden="true"></i>
		</a>

		<span class="s-text17">
			<?php echo $name_pro1;  ?>
		</span>
	</div>

	<!-- Product Detail -->
	<div class="container bgwhite p-t-35 p-b-80">
		<div class="flex-w flex-sb">
			<div class="w-size13 p-t-30 respon5">
				<div class="wrap-slick3 flex-sb flex-w">
					<div class="wrap-slick3-dots"></div>

					<div class="slick3">
                    <?php
						$query3_2 = mysqli_query($conn,"SELECT * FROM `image_product_detail` WHERE ID_Product='$id_pro'"); 
						while($row3_2 = mysqli_fetch_array($query3_2))
						{
							$img_pro_detail = "http://localhost:8080/www/web_1/admin/dist/img/".$row3_2['ID_Image'];
							echo"<div class='item-slick3' data-thumb='$img_pro_detail'>";
								echo"<div class='wrap-pic-w'>";
									echo"<img src='$img_pro_detail' alt='IMG-PRODUCT'>";
								echo"</div>";
							echo"</div>";
						}
					?>
						

						

						
                        
                        
                        
					</div>
				</div>
			</div>

			<div class="w-size14 p-t-30 respon5">
				<h4 class="product-detail-name m-text16 p-b-13">
					<?php echo $name_pro1;  ?>
				</h4>
			<?php
				$query3_4 = mysqli_query($conn,"SELECT product_sale_price.price,product_sale_price.sale_rate,product_type.Product_Type_Description,product_type.additional_description FROM product_type LEFT JOIN product_sale_price ON product_type.ID_Product=product_sale_price.id WHERE product_type.ID_Product='$id_pro'");
				$row3_4 = mysqli_fetch_array($query3_4);
				$price_pro = $row3_4['price'];
				$description = $row3_4['Product_Type_Description'];
				$additional = $row3_4['additional_description'];
				if($row3_4['sale_rate']!=0)
				{
					$price_after_pro = $price_pro*(1-$row3_4['sale_rate']/100);
					echo"<span class='block2-oldprice m-text7 p-r-5'>";
						echo number_format($price_pro) ;
					echo"</span>";
	
					echo"<span class='block2-newprice m-text8 p-r-5'>";
						echo number_format($price_after_pro);
					echo"</span>";
				}else
				{
					echo"<span class='m-text17'>";
						echo number_format($price_pro);
					echo"</span>";
				}
			?>
				

				
				<!--  -->
				<div class="p-t-33 p-b-60">
                
					<div class="flex-m flex-w p-b-10">
						<div class="s-text15 w-size15 t-center">
							Chọn Size
						</div>
						
						<div class="rs2-select2 rs3-select2 bo4 of-hidden w-size16">
                          	<small style="color:#F00; display:none" id="error_size">Vui lòng chọn size</small>
							<select class="selection-2" name="size" id="size">
								<option value="">Chọn Size</option>
                                <?php
									$query3_5 = mysqli_query($conn,"SELECT size.ID_Size,size.Size_Name FROM product_main LEFT JOIN color ON color.ID_Color=product_main.ID_Color LEFT JOIN size ON product_main.ID_Size=size.ID_Size WHERE product_main.ID_Product_Type='$id_pro' AND product_main.check_product_main=1 GROUP BY size.Size_Name");
									while($row3_5=mysqli_fetch_array($query3_5))
									{
										$id_size = $row3_5['ID_Size'];
										$name_color = $row3_5['Size_Name'];
										echo"<option value='$id_size'>$name_color</option>";
									}						
								?>
								
							</select>
						</div>
					</div>
					
					<div class="flex-m flex-w">
						<div class="s-text15 w-size15 t-center">
							Chọn màu						
                        </div>
						
						<div class="rs2-select2 rs3-select2 bo4 of-hidden w-size16">
                        <small style="color:#F00; display:none" id="error_color">Vui lòng chọn màu</small>
							<select class="form-control" name="color" id="color">
								<option value="">Chọn màu sản phẩm</option>
                                <?php
									$query3_6 = mysqli_query($conn,"SELECT color.Color_Name,color.ID_Color,color.id FROM product_main LEFT JOIN color ON color.ID_Color=product_main.ID_Color LEFT JOIN size ON product_main.ID_Size=size.ID_Size WHERE product_main.ID_Product_Type='$id_pro' AND product_main.check_product_main=1 GROUP BY color.Color_Name");
									while($row3_6=mysqli_fetch_array($query3_6))
									{
										$id_color = $row3_6['ID_Color'];
										$name_color = $row3_6['Color_Name'];
										$color ="#". $row3_6['id'];
										echo"<option value='$id_color' style='background-color:$color'>$name_color</option>";
									}						
								?>
								
                                
							</select>
						</div>
					</div>

					<div class="flex-r-m flex-w p-t-10">
						<div class="w-size16 flex-m flex-w">
							<div class="flex-w bo5 of-hidden m-r-22 m-t-10 m-b-10">
								<button class="btn-num-product-down1 color1 flex-c-m size7 bg8 eff2">
									<i class="fs-12 fa fa-minus" aria-hidden="true"></i>
								</button>

								<input class="size8 m-text18 t-center num-product" type="number" name="num-product" value="1" id="pro_quantity">

								<button class="btn-num-product-up1 color1 flex-c-m size7 bg8 eff2">
									<i class="fs-12 fa fa-plus" aria-hidden="true"></i>
								</button>
							</div>

							<div class="btn-addcart-product-detail size9 trans-0-4 m-t-10 m-b-10" data-id="<?php echo $id_pro;?>">
								<!-- Button -->
								<button class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
									Thêm vào giỏ hàng
								</button>
							</div>
						</div>
					</div>
				</div>

				

				<!--  -->
				<div class="wrap-dropdown-content bo6 p-t-15 p-b-14 active-dropdown-content">
					<h5 class="js-toggle-dropdown-content flex-sb-m cs-pointer m-text19 color0-hov trans-0-4">
						Mô tả về sản phẩm
						<i class="down-mark fs-12 color1 fa fa-minus dis-none" aria-hidden="true"></i>
						<i class="up-mark fs-12 color1 fa fa-plus" aria-hidden="true"></i>
					</h5>

					<div class="dropdown-content dis-none p-t-15 p-b-23">
						<p class="s-text8">
							<?php echo $description;?>
						</p>
					</div>
				</div>

				<div class="wrap-dropdown-content bo7 p-t-15 p-b-14">
					<h5 class="js-toggle-dropdown-content flex-sb-m cs-pointer m-text19 color0-hov trans-0-4">
						Thông tin bổ sung
						<i class="down-mark fs-12 color1 fa fa-minus dis-none" aria-hidden="true"></i>
						<i class="up-mark fs-12 color1 fa fa-plus" aria-hidden="true"></i>
					</h5>

					<div class="dropdown-content dis-none p-t-15 p-b-23">
						<p class="s-text8">
							<?php echo $additional; ?>
						</p>
					</div>
				</div>

				<div class="wrap-dropdown-content bo7 p-t-15 p-b-14">
					<h5 class="js-toggle-dropdown-content flex-sb-m cs-pointer m-text19 color0-hov trans-0-4">
						Nhận xét (0)
						<i class="down-mark fs-12 color1 fa fa-minus dis-none" aria-hidden="true"></i>
						<i class="up-mark fs-12 color1 fa fa-plus" aria-hidden="true"></i>
					</h5>

					<div class="dropdown-content dis-none p-t-15 p-b-23">
						<p class="s-text8">
							
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>


	<!-- Relate Product -->
	<section class="relateproduct bgwhite p-t-45 p-b-138">
		<div class="container">
			<div class="sec-title p-b-60">
				<h3 class="m-text5 t-center">
					SẢN PHẨM LIÊN QUAN
				</h3>
			</div>

			<!-- Slide2 -->
			<div class="wrap-slick2">
				<div class="slick2">
                <?php
					$query3_7 = mysqli_query($conn,"SELECT product_type.ID_Product,product_type.Name_Product,product_type.Product_Type_Image,product_sale_price.price,product_sale_price.sale_rate FROM product_type LEFT JOIN product_sale_price ON product_type.ID_Product=product_sale_price.id LEFT JOIN product_category ON product_type.id_category=product_category.id WHERE product_category.kind='$id_kind' AND product_type.product_type_check=1 LIMIT 0,8");
					while($row3_7 = mysqli_fetch_array($query3_7))
					{
						$id_pro_related = $row3_7['ID_Product'];
						$name_pro_related = $row3_7['Name_Product'];
						$img_pro_related = "http://localhost:8080/www/web_1/admin/dist/img/".$row3_7['Product_Type_Image'];
						$price_pro_related = $row3_7['price'];
						if($row3_7['sale_rate']!=null)
						{
							$price_after_pro_related = $price_pro_related*(1-$row3_7['sale_rate']/100);
						}
						echo"<div class='item-slick2 p-l-15 p-r-15'>";
						
						echo"<div class='block2'>";
							echo"<div class='block2-img wrap-pic-w of-hidden pos-relative'>";
								echo"<img src='$img_pro_related' alt='IMG-PRODUCT'>";

								echo"<div class='block2-overlay trans-0-4'>";
									echo"<a href='#' class='block2-btn-addwishlist hov-pointer trans-0-4'>";
										echo"<i class='icon-wishlist icon_heart_alt' aria-hidden='true'></i>";
										echo"<i class='icon-wishlist icon_heart dis-none' aria-hidden='true'></i>";
									echo"</a>";

									echo"<div class='block2-btn-addcart w-size1 trans-0-4' data-id='$id_pro_related'>";
										
										echo"<button class='flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4'>";
											echo"Chi tiết";
										echo"</button>";
									echo"</div>";
								echo"</div>";
							echo"</div>";

							echo"<div class='block2-txt p-t-20'>";
								echo"<a href='javascript:void(0)' class='block2-name dis-block s-text3 p-b-5' data-id='$id_pro_related'>";
									echo $name_pro_related ;
								echo"</a>";
								if($row3_7['sale_rate']==0)
								{
									echo"<span class='block2-price m-text6 p-r-5'>";
										echo number_format($price_pro_related);
									echo"</span>";
								}else
								{
									echo"<span class='block2-oldprice m-text7 p-r-5'>";
										echo number_format($price_pro_related) ;
									echo"</span>";
	
									echo"<span class='block2-newprice m-text8 p-r-5'>";
										echo number_format($price_after_pro_related);
									echo"</span>";
								}

								
							echo"</div>";
						echo"</div>";
					echo"</div>";
					}
				?>
					

					
				</div>
			</div>

		</div>
	</section>
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
<?php include("js_product_detail.php"); ?>

</body>
</html>
