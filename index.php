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
    <?php
	 	$query12_1 = mysqli_query($conn,"SELECT * FROM `seo_main_page`");
		$row12_1 = mysqli_fetch_array($query12_1);
		$keyword = $row12_1['keyword'];
		$title = $row12_1['title'];
		$content = $row12_1['description'];
	?>
    <meta name="keywords" content="<?php echo $keyword; ?>" />
	<meta name="description" content="<?php echo $content;  ?>"/>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<?php
		$query1_1 = mysqli_query($conn,"SELECT * FROM `theme_index` WHERE id = 'TH001'");
		$row1_1 = mysqli_fetch_array($query1_1);
		$logo_img = "images/".$row1_1['content']; 
	?>
	<link rel="icon" type="image/png" href="<?php echo $logo_img ?>"/>
	<?php include("css.php"); ?>
<!--===============================================================================================-->
<script type="text/javascript" src="vendor/jquery/jquery-3.2.1.min.js"></script>
</head>
<body class="animsition">

<?php include("header.php");?>
	<!-- Slide1 -->
	<section class="slide1">
		<div class="wrap-slick1">
			<div class="slick1">
            <?php
				$query1_9 = mysqli_query($conn,"SELECT * FROM `theme_index` WHERE id='TH009'");
				$row1_9=mysqli_fetch_array($query1_9);
				
				$content1_9 = $row1_9['content'];
				$img1_9="images/".$content1_9;
				
			?>
				<div class="item-slick1 item1-slick1" style="background-image: url('<?php echo $img1_9; ?>');">
					<div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170">
                    <?php
						$query1_10 = mysqli_query($conn,"SELECT * FROM `theme_index` WHERE id='TH010'");
						$row1_10=mysqli_fetch_array($query1_10);
						
						$content1_10 = $row1_10['content'];
						
						
					?>
						<h2 class="caption1-slide1 xl-text2 t-center bo14 p-b-6 animated visible-false m-b-22" data-appear="fadeInUp">
							<?php echo $content1_10; ?>
						</h2>
					<?php
						$query1_11 = mysqli_query($conn,"SELECT * FROM `theme_index` WHERE id='TH011'");
						$row1_11=mysqli_fetch_array($query1_11);
						
						$content1_11 = $row1_11['content'];
						
						
					?>
						<span class="caption2-slide1 m-text1 t-center animated visible-false m-b-33" data-appear="fadeInDown">
							<?php echo $content1_11; ?>
						</span>

						<div class="wrap-btn-slide1 w-size1 animated visible-false" data-appear="zoomIn">
							<!-- Button -->
                     <?php
						$query1_39 = mysqli_query($conn,"SELECT * FROM `theme_index` WHERE id='TH039'");
						$row1_39=mysqli_fetch_array($query1_39);
						
						$content1_39 = $row1_39['content'];
						
						
					?>
							<a href="<?php echo $content1_39; ?>" class="flex-c-m size2 bo-rad-23 s-text2 bgwhite hov1 trans-0-4">
								Shop Now
							</a>
						</div>
					</div>
				</div>
                 <?php
						$query1_12 = mysqli_query($conn,"SELECT * FROM `theme_index` WHERE id='TH012'");
						$row1_12=mysqli_fetch_array($query1_12);
						
						$content1_12 = $row1_12['content'];
						$img1_12="images/".$content1_12;
						
					?>

				<div class="item-slick1 item2-slick1" style="background-image: url('<?php echo $img1_12;  ?>');">
					<div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170">
                  <?php
						$query1_13 = mysqli_query($conn,"SELECT * FROM `theme_index` WHERE id='TH013'");
						$row1_13=mysqli_fetch_array($query1_13);
						
						$content1_13 = $row1_13['content'];
						
						
					?>
						<h2 class="caption1-slide1 xl-text2 t-center bo14 p-b-6 animated visible-false m-b-22" data-appear="rollIn">
							<?php echo $content1_13;?>
						</h2>
					 <?php
						$query1_14 = mysqli_query($conn,"SELECT * FROM `theme_index` WHERE id='TH014'");
						$row1_14=mysqli_fetch_array($query1_14);
						
						$content1_14 = $row1_14['content'];
						
						
					?>
						<span class="caption2-slide1 m-text1 t-center animated visible-false m-b-33" data-appear="lightSpeedIn">
							<?php echo $content1_14;?>
						</span>

						<div class="wrap-btn-slide1 w-size1 animated visible-false" data-appear="slideInUp">
							<!-- Button -->
                      <?php
						$query1_40 = mysqli_query($conn,"SELECT * FROM `theme_index` WHERE id='TH040'");
						$row1_40=mysqli_fetch_array($query1_40);
						
						$content1_40 = $row1_40['content'];
						
						
					?>
							<a href="<?php echo $content1_40;?>" class="flex-c-m size2 bo-rad-23 s-text2 bgwhite hov1 trans-0-4">
								Shop Now
							</a>
						</div>
					</div>
				</div>
 					<?php
						$query1_15 = mysqli_query($conn,"SELECT * FROM `theme_index` WHERE id='TH015'");
						$row1_15=mysqli_fetch_array($query1_15);
						
						$content1_15 = $row1_15['content'];
						$img1_15="images/".$content1_15;
						
					?>				
				<div class="item-slick1 item3-slick1" style="background-image: url('<?php echo $img1_15;  ?>');">
					<div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170">
                   <?php
						$query1_16 = mysqli_query($conn,"SELECT * FROM `theme_index` WHERE id='TH016'");
						$row1_16=mysqli_fetch_array($query1_16);
						
						$content1_16 = $row1_16['content'];
						
						
					?>
						<h2 class="caption1-slide1 xl-text2 t-center bo14 p-b-6 animated visible-false m-b-22" data-appear="rotateInDownLeft">
							<?php echo $content1_16; ?>
						</h2>
					 <?php
						$query1_17 = mysqli_query($conn,"SELECT * FROM `theme_index` WHERE id='TH017'");
						$row1_17=mysqli_fetch_array($query1_17);
						
						$content1_17 = $row1_17['content'];
						
						
					?>
						<span class="caption2-slide1 m-text1 t-center animated visible-false m-b-33" data-appear="rotateInUpRight">
							<?php echo $content1_17; ?>
						</span>

						<div class="wrap-btn-slide1 w-size1 animated visible-false" data-appear="rotateIn">
                     <?php
						$query1_41 = mysqli_query($conn,"SELECT * FROM `theme_index` WHERE id='TH041'");
						$row1_41=mysqli_fetch_array($query1_41);
						
						$content1_41 = $row1_41['content'];
						
						
					?>
							<!-- Button -->
							<a href="<?php echo $content1_41; ?>" class="flex-c-m size2 bo-rad-23 s-text2 bgwhite hov1 trans-0-4">
								Shop Now
							</a>
						</div>
					</div>
				</div>

			</div>
		</div>
	</section>

	<!-- Banner -->
	<div class="banner bgwhite p-t-40 p-b-40">
		<div class="container">
			<div class="row">
				<div class="col-sm-10 col-md-8 col-lg-4 m-l-r-auto">
					<!-- block1 -->
                     <?php
						$query1_18 = mysqli_query($conn,"SELECT * FROM `theme_index` WHERE id='TH018'");
						$row1_18=mysqli_fetch_array($query1_18);
						
						$content1_18 = $row1_18['content'];
						$img1_18="images/".$content1_18;
						
					?>
					<div class="block1 hov-img-zoom pos-relative m-b-30">
						<img src="<?php echo $img1_18;  ?>" alt="IMG-BENNER">

						<div class="block1-wrapbtn w-size2">
							<!-- Button -->
                       <?php
						$query1_19 = mysqli_query($conn,"SELECT * FROM `theme_index` WHERE id='TH019'");
						$row1_19=mysqli_fetch_array($query1_19);
						
						$content1_19 = $row1_19['content'];
						$query3_1 = mysqli_query($conn,"SELECT * FROM `product_category` WHERE id='$content1_19'");
						$row3_1 = mysqli_fetch_array($query3_1);
						$name_pro_cat1 = $row3_1['name'];
						$id_pro_cat1 = $row3_1['id'];
						$name_pro_cat1_unicode = unicode_convert($name_pro_cat1);
						
					?>
							<a href="<?php echo "http://localhost:8080/www/web_1/nhom-san-pham/$content1_19/$name_pro_cat1_unicode.html"; ?>" class="flex-c-m size2 m-text2 bg3 hov1 trans-0-4">
								<?php echo $name_pro_cat1; ?>
							</a>
						</div>
					</div>
				</div>

				<div class="col-sm-10 col-md-8 col-lg-4 m-l-r-auto">
					<!-- block1 -->
                  <?php
						$query1_20 = mysqli_query($conn,"SELECT * FROM `theme_index` WHERE id='TH020'");
						$row1_20=mysqli_fetch_array($query1_20);
						
						$content1_20 = $row1_20['content'];
						$img1_20 = "images/".$content1_20;
						
					?>
					<div class="block1 hov-img-zoom pos-relative m-b-30">
						<img src="<?php echo $img1_20;  ?>" alt="IMG-BENNER">

						<div class="block1-wrapbtn w-size2">
							<!-- Button -->
                     <?php
						$query1_21 = mysqli_query($conn,"SELECT * FROM `theme_index` WHERE id='TH021'");
						$row1_21=mysqli_fetch_array($query1_21);
						
						$content1_21 = $row1_21['content'];
						$query3_2 = mysqli_query($conn,"SELECT * FROM `product_category` WHERE id='$content1_21'");
						$row3_2 = mysqli_fetch_array($query3_2);
						$name_pro_cat2 = $row3_2['name'];
						$id_pro_cat2 = $row3_2['id'];
						$name_pro_cat2_unicode = unicode_convert($name_pro_cat2);
						
					?>
							<a href="<?php echo "http://localhost:8080/www/web_1/nhom-san-pham/$content1_21/$name_pro_cat2_unicode.html"; ?>" class="flex-c-m size2 m-text2 bg3 hov1 trans-0-4">
								<?php echo $name_pro_cat2; ?>
							</a>
						</div>
					</div>
				</div>

				<div class="col-sm-10 col-md-8 col-lg-4 m-l-r-auto">
					<!-- block1 -->
					<div class="block1 hov-img-zoom pos-relative m-b-30">
                   <?php
						$query1_22 = mysqli_query($conn,"SELECT * FROM `theme_index` WHERE id='TH022'");
						$row1_22=mysqli_fetch_array($query1_22);
						
						$content1_22 = $row1_22['content'];
						$img1_22 = "images/".$content1_22;
						
					?>
						<img src="<?php echo $img1_22;  ?>" alt="IMG-BENNER">

						<div class="block1-wrapbtn w-size2">
							<!-- Button -->
                      <?php
						$query1_23 = mysqli_query($conn,"SELECT * FROM `theme_index` WHERE id='TH023'");
						$row1_23=mysqli_fetch_array($query1_23);
						
						$content1_23 = $row1_23['content'];
						$query3_3 = mysqli_query($conn,"SELECT * FROM `product_category` WHERE id='$content1_23'");
						$row3_3 = mysqli_fetch_array($query3_3);
						$name_pro_cat3 = $row3_3['name'];
						$id_pro_cat3 = $row3_3['id'];
						$name_pro_cat3_unicode = unicode_convert($name_pro_cat3);
						
					?>
							<a href="<?php echo "http://localhost:8080/www/web_1/nhom-san-pham/$content1_23/$name_pro_cat3_unicode.html"; ?>" class="flex-c-m size2 m-text2 bg3 hov1 trans-0-4">
								<?php echo $name_pro_cat3; ?>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


	<!-- Our product -->
	<section class="bgwhite p-t-45 p-b-58">
		<div class="container">
			<div class="sec-title p-b-22">
				<h3 class="m-text5 t-center">
					Sản phẩm
				</h3>
			</div>

			<!-- Tab01 -->
			<div class="tab01">
				<!-- Nav tabs -->
				<ul class="nav nav-tabs" role="tablist">
					<li class="nav-item">
						<a class="nav-link active" data-toggle="tab" href="#best-seller" role="tab">Best Seller</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" data-toggle="tab" href="#featured" role="tab">New</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" data-toggle="tab" href="#sale" role="tab">Sale</a>
					</li>
					
				</ul>

				<!-- Tab panes -->
				<div class="tab-content p-t-35">
					<!-- - -->
					<div class="tab-pane fade show active" id="best-seller" role="tabpanel">
						<div class="row">
                        <?php
							$query4_1 = mysqli_query($conn,"SELECT SUM(product_export.Product_Quantity) AS tong_xuat, product_main.ID_Product_Type FROM product_export INNER JOIN product_main ON product_main.ID_Product=product_export.ID_Product WHERE product_main.check_product_main=1 GROUP BY product_main.ID_Product_Type  ORDER BY SUM(product_export.Product_Quantity) DESC LIMIT 0,12");
							while($row4_1 = mysqli_fetch_array($query4_1))
							{
								$id_pro_best = $row4_1['ID_Product_Type'];
								$query4_1_1 = mysqli_query($conn,"SELECT product_type.Product_Type_Image, product_type.ID_Product,product_type.Name_Product,product_sale_price.price,product_sale_price.sale_rate FROM product_type LEFT JOIN product_sale_price ON product_type.ID_Product=product_sale_price.id WHERE product_type.ID_Product='$id_pro_best'");
								$row4_1_1 = mysqli_fetch_array($query4_1_1);
								$name_pro_best=$row4_1_1['Name_Product'];
								$pro_best_price = $row4_1_1['price'];
								$pro_best_img = "admin/dist/img/".$row4_1_1['Product_Type_Image'];
								if($row4_1_1['sale_rate']==null)
								{
									$pro_best_price_after = "";
								}else
								{
									$pro_best_price_after=$pro_best_price*(1-$row4_1_1['sale_rate']/100);
								}
								echo"<div class='col-sm-6 col-md-4 col-lg-3 p-b-50'>";
								
								echo"<div class='block2'>";
									echo"<div class='block2-img wrap-pic-w of-hidden pos-relative'>";
										echo"<img src='$pro_best_img' alt='IMG-PRODUCT'>";

										echo"<div class='block2-overlay trans-0-4'>";
											echo"<a href='#' class='block2-btn-addwishlist hov-pointer trans-0-4'>";
												echo"<i class='icon-wishlist icon_heart_alt' aria-hidden='true'></i>";
												echo"<i class='icon-wishlist icon_heart dis-none' aria-hidden='true'></i>";
											echo"</a>";

											echo"<div class='block2-btn-addcart w-size1 trans-0-4' data-id='$id_pro_best'>";
												
												echo"<button class='flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4'>";
													echo"Chi tiết";
												echo"</button>";
											echo"</div>";
										echo"</div>";
									echo"</div>";

									echo"<div class='block2-txt p-t-20'>";
										echo"<a href='javascript:void(0)' class='block2-name dis-block s-text3 p-b-5' data-id='$id_pro_best'>";
											echo $name_pro_best ;
										echo"</a>";
										if($row4_1_1['sale_rate']!=0)
										{
											echo"<span class='block2-oldprice m-text7 p-r-5'>";
												echo number_format($pro_best_price) ;
											echo"</span>";
	
											echo"<span class='block2-newprice m-text8 p-r-5'>";
												echo number_format($pro_best_price_after);
											echo"</span>";
											
										}else
										{
											echo"<span class='block2-price m-text6 p-r-5'>";
												echo number_format($pro_best_price) ;
											echo"</span>";
										}

										
									echo"</div>";
								echo"</div>";
							echo"</div>";
							}
						?>
							
						</div>
					</div>
					<!-- - -->
					<div class="tab-pane fade" id="featured" role="tabpanel">
						<div class="row">
                        <?php 
							$query4_2 = mysqli_query($conn,"SELECT product_type.Product_Type_Image, product_type.ID_Product,product_type.Name_Product,product_type.Date_Create,product_sale_price.price,product_sale_price.sale_rate FROM product_type LEFT JOIN product_sale_price ON product_type.ID_Product=product_sale_price.id WHERE product_type.product_type_check=1 ORDER BY Date_Create DESC LIMIT 0,12");
							while($row4_2=mysqli_fetch_array($query4_2))
							{
								$id_pro_new = $row4_2['ID_Product'];
								$name_pro_new = $row4_2['Name_Product'];
								$price_pro_new = $row4_2['price'];
								$img_pro_new = "admin/dist/img/".$row4_2['Product_Type_Image'];
								if($row4_2['sale_rate']!=null)
								{
									$price_after_pro_new = $price_pro_new*(1-$row4_2['sale_rate']/100);
								}
								
								echo"<div class='col-sm-6 col-md-4 col-lg-3 p-b-50'>";
								
								echo"<div class='block2'>";
									echo"<div class='block2-img wrap-pic-w of-hidden pos-relative'>";
										echo"<img src='$img_pro_new' alt='IMG-PRODUCT'>";

										echo"<div class='block2-overlay trans-0-4'>";
											echo"<a href='#' class='block2-btn-addwishlist hov-pointer trans-0-4'>";
												echo"<i class='icon-wishlist icon_heart_alt' aria-hidden='true'></i>";
												echo"<i class='icon-wishlist icon_heart dis-none' aria-hidden='true'></i>";
											echo"</a>";

											echo"<div class='block2-btn-addcart w-size1 trans-0-4' data-id='$id_pro_new'>";
												
												echo"<button class='flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4'>";
													echo"Chi tiết";
												echo"</button>";
											echo"</div>";
										echo"</div>";
									echo"</div>";

									echo"<div class='block2-txt p-t-20'>";
										echo"<a href='javascript:void(0)' class='block2-name dis-block s-text3 p-b-5' data-id='$id_pro_new'>";
											echo $name_pro_new ;
										echo"</a>";
										if($row4_2['sale_rate']==0)
										{
											echo"<span class='block2-price m-text6 p-r-5'>";
												echo number_format($price_pro_new);
											echo"</span>";
											
										}else
										{
											echo"<span class='block2-oldprice m-text7 p-r-5'>";
												echo number_format($price_pro_new) ;
											echo"</span>";
	
											echo"<span class='block2-newprice m-text8 p-r-5'>";
												echo number_format($price_after_pro_new);
											echo"</span>";
										}
										
									echo"</div>";
								echo"</div>";
							echo"</div>";
							}
						?>
							
						</div>
					</div>
					<!--  -->
					<div class="tab-pane fade" id="sale" role="tabpanel">
						<div class="row">
                        <?php
							$query4_3 = mysqli_query($conn,"SELECT product_sale_price.id,product_sale_price.price,product_sale_price.sale_rate,product_type.Name_Product,product_type.Product_Type_Image FROM product_sale_price INNER JOIN product_type ON product_type.ID_Product=product_sale_price.id WHERE product_type.product_type_check=1 AND product_sale_price.sale_rate >0");
							while($row4_3 = mysqli_fetch_array($query4_3))
							{
								$id_pro_sale = $row4_3['id'];
								$name_pro_sale = $row4_3['Name_Product'];
								$img_pro_sale = "admin/dist/img/". $row4_3['Product_Type_Image'];
								$price_pro_sale = $row4_3['price'];
								if($row4_3['sale_rate']!=null)
								{
									$price_after_pro_sale = $price_pro_sale*(1-$row4_3['sale_rate']/100);
								}
								echo"<div class='col-sm-6 col-md-4 col-lg-3 p-b-50'>";
								
								echo"<div class='block2'>";
									echo"<div class='block2-img wrap-pic-w of-hidden pos-relative'>";
										echo"<img src='$img_pro_sale' alt='IMG-PRODUCT'>";

										echo"<div class='block2-overlay trans-0-4'>";
											echo"<a href='#' class='block2-btn-addwishlist hov-pointer trans-0-4'>";
												echo"<i class='icon-wishlist icon_heart_alt' aria-hidden='true'></i>";
												echo"<i class='icon-wishlist icon_heart dis-none' aria-hidden='true'></i>";
											echo"</a>";

											echo"<div class='block2-btn-addcart w-size1 trans-0-4' data-id='$id_pro_sale'>";
												
												echo"<button class='flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4'>";
													echo"Chi tiết";
												echo"</button>";
											echo"</div>";
										echo"</div>";
									echo"</div>";

									echo"<div class='block2-txt p-t-20'>";
										echo"<a href='javascript:void(0)' class='block2-name dis-block s-text3 p-b-5' data-id='$id_pro_sale'>";
											echo $name_pro_sale ;
										echo"</a>";
										if($row4_3['sale_rate']==0)
										{
											echo"<span class='block2-price m-text6 p-r-5'>";
												echo number_format($price_pro_sale);
											echo"</span>";
											
										}else
										{
											echo"<span class='block2-oldprice m-text7 p-r-5'>";
												echo number_format($price_pro_sale) ;
											echo"</span>";
	
											echo"<span class='block2-newprice m-text8 p-r-5'>";
												echo number_format($price_after_pro_sale);
											echo"</span>";
										}
										
									echo"</div>";
								echo"</div>";
							echo"</div>";
							}
						?>
							
						</div>
					</div>

					<!--  -->
			
				</div>
			</div>
		</div>
	</section>


	<!-- Banner video -->
  					 <?php
						$query1_26 = mysqli_query($conn,"SELECT * FROM `theme_index` WHERE id='TH026'");
						$row1_26=mysqli_fetch_array($query1_26);
						
						$content1_26 = $row1_26['content'];
						$img1_26="images/".$content1_26;
						
					?>
	<section class="parallax0 parallax100" style="background-image: url('<?php echo $img1_26; ?>');">
		<div class="overlay0 p-t-190 p-b-200">
			<div class="flex-col-c-m p-l-15 p-r-15">
				<span class="m-text9 p-t-45 fs-20-sm">
					The Beauty 
				</span>

				<h3 class="l-text1 fs-35-sm">
					Lookbook
				</h3>

				<span class="btn-play s-text4 hov5 cs-pointer p-t-25" data-toggle="modal" data-target="#modal-video-01">
					<i class="fa fa-play" aria-hidden="true"></i>
					Play Video
				</span>
			</div>
		</div>
	</section>

	<!-- Blog -->
	<section class="blog bgwhite p-t-94 p-b-65">
		<div class="container">
			<div class="sec-title p-b-52">
				<h3 class="m-text5 t-center">
					Tin Tức
				</h3>
			</div>

			<div class="row">
            <?php
				$query5_1 = mysqli_query($conn,"SELECT * FROM `blog_news` ORDER BY news_id DESC LIMIT 0,3");
				while($row5_1 = mysqli_fetch_array($query5_1))
				{
					$id_blog = $row5_1['news_id'];
					$img_blog ="admin/dist/img/". $row5_1['news_image'];
					$name_blog = $row5_1['news_name'];
					$title_blog = $row5_1['news_title'];
					$name_news_unicode = unicode_convert($name_blog);
					echo"<div class='col-sm-10 col-md-4 p-b-30 m-l-r-auto'>";
						echo"<div class='block3'>";
							echo"<a href='http://localhost:8080/www/web_1/bai-viet/$id_blog/$name_news_unicode.html' class='block3-img dis-block hov-img-zoom'>";
								echo"<img src='$img_blog' alt='IMG-BLOG'>";
							echo"</a>";
	
							echo"<div class='block3-txt p-t-14'>";
								echo"<h4 class='p-b-7'>";
									echo"<a href='http://localhost:8080/www/web_1/bai-viet/$id_blog/$name_news_unicode.html' class='m-text11'>";
										echo $name_blog;
									echo"</a>";
								echo"</h4>";
	
								
	
								echo"<p class='s-text8 p-t-16'>";
									echo $title_blog;
								echo"</p>";
							echo"</div>";
						echo"</div>";
					echo"</div>";
				}
			?>
				

				

			</div>
		</div>
	</section>
    <!-- Banner2 -->
	<div class="banner2 bg5 p-t-55 p-b-55 bg-img1" style="background-image: url('images/1534738318sunset-images-28.jpg');">
		<div class="container">
			<div class="flex-w flex-r-m flex-c-xl">
				<div class="p-t-15 p-b-15 w-size28">
					<div class="bgwhite hov-img-zoom pos-relative p-b-20per-ssm">
                    <?php
							$query1_24 = mysqli_query($conn,"SELECT * FROM `theme_index` WHERE id='TH024'");
							$row1_24=mysqli_fetch_array($query1_24);
							
							$content1_24 = $row1_24['content'];
							$img1_24="images/".$content1_24;
							
						?>
						<img src="<?php echo $img1_24;  ?>" alt="IMG-BANNER">
						<?php
							$query1_25 = mysqli_query($conn,"SELECT * FROM `theme_index` WHERE id='TH025'");
							$row1_25=mysqli_fetch_array($query1_25);
							
							$content1_25 = $row1_25['content'];
							$query6_1 = mysqli_query($conn,"SELECT product_type.ID_Product,product_type.Name_Product,product_sale_price.price,product_sale_price.sale_rate FROM product_type LEFT JOIN product_sale_price ON product_type.ID_Product=product_sale_price.id WHERE product_type.ID_Product='$content1_25'");
							$row6_1 =mysqli_fetch_array($query6_1);
							$name_pro_sale = $row6_1['Name_Product'];
							$name_pro_sale_unicode = unicode_convert($name_pro_sale);
							$price_pro_sale   = $row6_1['price'];
							$sale_rate_pro_sale = $row6_1['sale_rate'];
							$price_after_pro_sale = $price_pro_sale*(1-$sale_rate_pro_sale/100);
							
						?>
						<div class="ab-t-l sizefull flex-col-c-b p-l-15 p-r-15 p-b-20">
							<div class="t-center">
								<a href="<?php echo"http://localhost:8080/www/web_1/san-pham/$content1_25/$name_pro_sale_unicode.html"; ?>" class="dis-block s-text3 p-b-5">
									<?php echo  $name_pro_sale; ?>
								</a>

								<span class="block2-oldprice m-text7 p-r-5">
									<?php echo number_format($price_pro_sale); ?>
								</span>

								<span class="block2-newprice m-text8">
									<?php echo number_format($price_after_pro_sale); ?>
								</span>
							</div>

							<div class="flex-c-m p-t-44 p-t-30-xl">
								<div class="flex-col-c-m size3 bo1 m-l-5 m-r-5">
									<span class="m-text10 p-b-1 days">
										2
									</span>

									<span class="s-text5">
										days
									</span>
								</div>

								<div class="flex-col-c-m size3 bo1 m-l-5 m-r-5">
									<span class="m-text10 p-b-1 hours">
										04
									</span>

									<span class="s-text5">
										hrs
									</span>
								</div>

								<div class="flex-col-c-m size3 bo1 m-l-5 m-r-5">
									<span class="m-text10 p-b-1 minutes">
										32
									</span>

									<span class="s-text5">
										mins
									</span>
								</div>

								<div class="flex-col-c-m size3 bo1 m-l-5 m-r-5">
									<span class="m-text10 p-b-1 seconds">
										05
									</span>

									<span class="s-text5">
										secs
									</span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Instagram -->
	<section class="instagram p-t-20">
		<div class="sec-title p-b-52 p-l-15 p-r-15">
			<h3 class="m-text5 t-center">
				@ follow us on Instagram
			</h3>
		</div>

		<div class="flex-w">
			<!-- Block4 -->
			<div class="block4 wrap-pic-w">
           		 <?php
						$query1_28 = mysqli_query($conn,"SELECT * FROM `theme_index` WHERE id='TH028'");
						$row1_28=mysqli_fetch_array($query1_28);
						
						$content1_28 = $row1_28['content'];
						$img_1_28="images/".$content1_28;
						
					?>
				<img src="<?php echo $img_1_28;?>" alt="IMG-INSTAGRAM">

				<a href="<?php echo $content1_7;  ?>" class="block4-overlay sizefull ab-t-l trans-0-4">
					<span class="block4-overlay-heart s-text9 flex-m trans-0-4 p-l-40 p-t-25">
						<i class="icon_heart_alt fs-20 p-r-12" aria-hidden="true"></i>
						<span class="p-t-2"></span>
					</span>

					<div class="block4-overlay-txt trans-0-4 p-l-40 p-r-25 p-b-30">
						<p class="s-text10 m-b-15 h-size1 of-hidden">
							
						</p>

						<span class="s-text9">
							Photo by @<?php echo $content1_2; ?>
						</span>
					</div>
				</a>
			</div>

			<!-- Block4 -->
			<div class="block4 wrap-pic-w">
            <?php
						$query1_29 = mysqli_query($conn,"SELECT * FROM `theme_index` WHERE id='TH029'");
						$row1_29=mysqli_fetch_array($query1_29);
						
						$content1_29 = $row1_29['content'];
						$img_1_29="images/".$content1_29;
						
					?>
				<img src="<?php echo $img_1_29;?>" alt="IMG-INSTAGRAM">

				<a href="<?php echo $content1_7;  ?>" class="block4-overlay sizefull ab-t-l trans-0-4">
					<span class="block4-overlay-heart s-text9 flex-m trans-0-4 p-l-40 p-t-25">
						<i class="icon_heart_alt fs-20 p-r-12" aria-hidden="true"></i>
						<span class="p-t-2"></span>
					</span>

					<div class="block4-overlay-txt trans-0-4 p-l-40 p-r-25 p-b-30">
						<p class="s-text10 m-b-15 h-size1 of-hidden">
							
						</p>

						<span class="s-text9">
							Photo by <?php echo $content1_2; ?>
						</span>
					</div>
				</a>
			</div>

			<!-- Block4 -->
			<div class="block4 wrap-pic-w">
            <?php
						$query1_30 = mysqli_query($conn,"SELECT * FROM `theme_index` WHERE id='TH030'");
						$row1_30=mysqli_fetch_array($query1_30);
						
						$content1_30 = $row1_30['content'];
						$img_1_30="images/".$content1_30;
						
					?>
				<img src="<?php echo $img_1_30;?>" alt="IMG-INSTAGRAM">

				<a href="<?php echo $content1_7;  ?>" class="block4-overlay sizefull ab-t-l trans-0-4">
					<span class="block4-overlay-heart s-text9 flex-m trans-0-4 p-l-40 p-t-25">
						<i class="icon_heart_alt fs-20 p-r-12" aria-hidden="true"></i>
						<span class="p-t-2"></span>
					</span>

					<div class="block4-overlay-txt trans-0-4 p-l-40 p-r-25 p-b-30">
						<p class="s-text10 m-b-15 h-size1 of-hidden">
							
						</p>

						<span class="s-text9">
							Photo by @<?php echo $content1_2; ?>
						</span>
					</div>
				</a>
			</div>

			<!-- Block4 -->
			<div class="block4 wrap-pic-w">
            <?php
						$query1_31 = mysqli_query($conn,"SELECT * FROM `theme_index` WHERE id='TH031'");
						$row1_31=mysqli_fetch_array($query1_31);
						
						$content1_31 = $row1_31['content'];
						$img_1_31="images/".$content1_31;
						
					?>
				<img src="<?php echo $img_1_31;?>" alt="IMG-INSTAGRAM">

				<a href="<?php echo $content1_7;  ?>" class="block4-overlay sizefull ab-t-l trans-0-4">
					<span class="block4-overlay-heart s-text9 flex-m trans-0-4 p-l-40 p-t-25">
						<i class="icon_heart_alt fs-20 p-r-12" aria-hidden="true"></i>
						<span class="p-t-2"></span>
					</span>

					<div class="block4-overlay-txt trans-0-4 p-l-40 p-r-25 p-b-30">
						<p class="s-text10 m-b-15 h-size1 of-hidden">
							
						</p>

						<span class="s-text9">
							Photo by @<?php echo $content1_2; ?>
						</span>
					</div>
				</a>
			</div>

			<!-- Block4 -->
			<div class="block4 wrap-pic-w">
            <?php
						$query1_32 = mysqli_query($conn,"SELECT * FROM `theme_index` WHERE id='TH032'");
						$row1_32=mysqli_fetch_array($query1_32);
						
						$content1_32 = $row1_32['content'];
						$img_1_32="images/".$content1_32;
						
					?>
				<img src="<?php echo $img_1_32;?>" alt="IMG-INSTAGRAM">

				<a href="<?php echo $content1_7;  ?>" class="block4-overlay sizefull ab-t-l trans-0-4">
					<span class="block4-overlay-heart s-text9 flex-m trans-0-4 p-l-40 p-t-25">
						<i class="icon_heart_alt fs-20 p-r-12" aria-hidden="true"></i>
						<span class="p-t-2"></span>
					</span>

					<div class="block4-overlay-txt trans-0-4 p-l-40 p-r-25 p-b-30">
						<p class="s-text10 m-b-15 h-size1 of-hidden">
							
						</p>

						<span class="s-text9">
							Photo by @<?php echo $content1_2; ?>
						</span>
					</div>
				</a>
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

	<!-- Container Selection1 -->
	<div id="dropDownSelect1"></div>

	<!-- Modal Video 01-->
	<div class="modal fade" id="modal-video-01" tabindex="-1" role="dialog" aria-hidden="true">

		<div class="modal-dialog" role="document" data-dismiss="modal">
			<div class="close-mo-video-01 trans-0-4" data-dismiss="modal" aria-label="Close">&times;</div>

			<div class="wrap-video-mo-01">
				<div class="w-full wrap-pic-w op-0-0"><img src="images/icons/video-16-9.jpg" alt="IMG"></div>
                 <?php
						$query1_27 = mysqli_query($conn,"SELECT * FROM `theme_index` WHERE id='TH027'");
						$row1_27=mysqli_fetch_array($query1_27);
						
						$content1_27 = $row1_27['content'];
						
						
					?>
				<div class="video-mo-01">
					<?php echo $content1_27;  ?>
				</div>
			</div>
		</div>
	</div>
<?php mysqli_close($conn); ?>
<?php include("js.php");?>

</body>
</html>
