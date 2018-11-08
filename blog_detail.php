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
				 $id_new = addslashes($_GET['id']);
				$query12_2 = mysqli_query($conn,"SELECT keyword,title,description FROM blog_news WHERE news_id='$id_new'");
				$row12_2 = mysqli_fetch_array($query12_2);
				$keyword = $row12_2['keyword'];
				$title = $row12_2['title'];
				$content = $row12_2['description'];
			?>
			<meta name="keywords" content="<?php echo $keyword; ?>" />
			<meta name="description" content="<?php echo $content;  ?>"/>
			<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
			<meta name="viewport" content="width=device-width, initial-scale=1">
            <?php 
				
				
				 $query6=mysqli_query($conn,"SELECT * FROM `blog_news` WHERE news_id='$id_new'");
				 $pdrow6=mysqli_fetch_array($query6);
				 $d2=$pdrow6['news_id'];
									$d3=$pdrow6['news_name'];
									$d4=$pdrow6['news_title'];
									$d5="http://kutechip.com/admin/dist/img/".$pdrow6['news_image'];
									$d6=$pdrow6['date_create'];	
									$d7=$pdrow6['news_content'];						
									$d8=$pdrow6['keyword'];
					
				
			?>
            <meta property="og:image" content="<?php echo $d5 ?>" />
            <meta property="og:title" content="<?php echo $d3 ?>" />
            
            <meta property="og:description" content="<?php echo $d4 ?>" />
		<!--===============================================================================================-->
			<?php
				$query1_1 = mysqli_query($conn,"SELECT * FROM `theme_index` WHERE id = 'TH001'");
				$row1_1 = mysqli_fetch_array($query1_1);
				$logo_img = "http://localhost:8080/www/web_1/images/".$row1_1['content']; 
			?>
			<link rel="icon" type="image/png" href="<?php echo $logo_img ?>"/>
			<?php include("css.php"); ?>
		<!--===============================================================================================-->
		<script type="text/javascript" src="http://localhost:8080/www/web_1/vendor/jquery/jquery-3.2.1.min.js"></script>

</head>
<body class="animsition">

	<!-- Header -->
<?php include("header.php");?>
	<!-- breadcrumb -->
    <?php
		
		$query2_3 = mysqli_query($conn,"SELECT blog_news.id_cat,blog_category.name_cat,blog_news.news_title,blog_news.news_name,blog_news.news_image,blog_news.news_content,blog_news.date_create FROM blog_news LEFT JOIN blog_category ON blog_news.id_cat=blog_category.id_cat WHERE blog_news.news_id='$id_new'"); 
		$row2_3 = mysqli_fetch_array($query2_3);
		$id_cat = $row2_3['id_cat'];
		$name_cat = $row2_3['name_cat'];
		$name_news = $row2_3['news_name'];
		$img_news ="http://localhost:8080/www/web_1/admin/dist/img/". $row2_3['news_image'];
		$title_news = $row2_3['news_title'];
		$content_news = $row2_3['news_content'];
		$date_news = date('d M,Y ',strtotime($row2_3['date_create']));
		$name_cat_unicode = unicode_convert($name_cat);
	?>
	<div class="bread-crumb bgwhite flex-w p-l-52 p-r-15 p-t-30 p-l-15-sm">
		<a href="index.html" class="s-text16">
			Home
			<i class="fa fa-angle-right m-l-8 m-r-9" aria-hidden="true"></i>
		</a>

		<a href="http://localhost:8080/www/web_1/blog.html" class="s-text16">
			Blog
			<i class="fa fa-angle-right m-l-8 m-r-9" aria-hidden="true"></i>
		</a>
        
        <a href="<?php echo "http://localhost:8080/www/web_1/chuyen-muc/$id_cat/$name_cat_unicode.html" ?>" class="s-text16">
			<?php echo $name_cat; ?>
			<i class="fa fa-angle-right m-l-8 m-r-9" aria-hidden="true"></i>
		</a>

		<span class="s-text17">
			<?php echo $name_news;  ?>
		</span>
	</div>

	<!-- content page -->
	<section class="bgwhite p-t-60 p-b-25">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-lg-9 p-b-80">
					<div class="p-r-50 p-r-0-lg">
						<div class="p-b-40">
							<div class="blog-detail-img wrap-pic-w">
								<img src="<?php echo $img_news; ?>" alt="IMG-BLOG">
							</div>

							<div class="blog-detail-txt p-t-33">
								<h4 class="p-b-11 m-text24">
									<?php echo $name_news;  ?>
								</h4>

								<div class="s-text8 flex-w flex-m p-b-21">
									<span>
										By Admin
										<span class="m-l-3 m-r-6">|</span>
									</span>

									<span>
										<?php echo $date_news ?>
										<span class="m-l-3 m-r-6">|</span>
									</span>

									<span>
										<?php echo $name_cat  ?>
										<span class="m-l-3 m-r-6">|</span>
									</span>

									
								</div>
                                <div class="blog-detail-img wrap-pic-w">
								<div class="blog-detail-img wrap-pic-w">
								<?php echo $content_news; ?>
                                </div>
                               </div>
							</div>

							<div class="flex-m flex-w p-t-20">
								<span class="s-text20 p-r-20">
									Tags
								</span>

								<div class="wrap-tags flex-w">
									<a href="#" class="tag-item">
										Streetstyle
									</a>

									<a href="#" class="tag-item">
										Crafts
									</a>
								</div>
							</div>
						</div>

						<!-- Leave a comment -->
						<form class="leave-comment">
							<h4 class="m-text25 p-b-14">
								Leave a Comment
							</h4>

							<p class="s-text8 p-b-40">
								Your email address will not be published. Required fields are marked *
							</p>

							<textarea class="dis-block s-text7 size18 bo12 p-l-18 p-r-18 p-t-13 m-b-20" name="comment" placeholder="Comment..."></textarea>

							<div class="bo12 of-hidden size19 m-b-20">
								<input class="sizefull s-text7 p-l-18 p-r-18" type="text" name="name" placeholder="Name *">
							</div>

							<div class="bo12 of-hidden size19 m-b-20">
								<input class="sizefull s-text7 p-l-18 p-r-18" type="text" name="email" placeholder="Email *">
							</div>

							

							<div class="w-size24">
								<!-- Button -->
								<button class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
									Post Comment
								</button>
							</div>
						</form>
					</div>
				</div>

				<div class="col-md-4 col-lg-3 p-b-80">
					<div class="rightbar">
						<!-- Search -->
						<div class="pos-relative bo11 of-hidden">
							<input class="s-text7 size16 p-l-23 p-r-50" type="text" name="search-product" placeholder="Search">

							<button class="flex-c-m size5 ab-r-m color1 color0-hov trans-0-4">
								<i class="fs-13 fa fa-search" aria-hidden="true"></i>
							</button>
						</div>

						<!-- Categories -->
						<h4 class="m-text23 p-t-56 p-b-34">
							Chuyên mục
						</h4>

						<ul>
                        	 <?php
							$query3_0 = mysqli_query($conn,"SELECT * FROM `blog_category`");
							while($row3_0 = mysqli_fetch_array($query3_0))
							{
								$id_blog_cat = $row3_0['id_cat'];
								$name_blog_cat = $row3_0['name_cat'];
								$name_blog_cat_unicode = unicode_convert($name_blog_cat);
								echo"<li class='p-t-6 p-b-8 bo6'>";
									echo"<a href='http://localhost:8080/www/web_1/chuyen-muc/$id_blog_cat/$name_blog_cat_unicode.html' class='s-text13 p-t-5 p-b-5'>";
										echo $name_blog_cat;
									echo"</a>";
								echo"</li>";
								
							}
						?>
							

							
						</ul>

						<!-- Featured Products -->
						<h4 class="m-text23 p-t-65 p-b-34">
							Sản phẩm bán chạy
						</h4>

						<ul class="bgwhite">
							<?php
								$query4_1 = mysqli_query($conn,"SELECT SUM(product_export.Product_Quantity) AS tong_xuat, product_main.ID_Product_Type FROM product_export INNER JOIN product_main ON product_main.ID_Product=product_export.ID_Product GROUP BY product_main.ID_Product_Type ORDER BY SUM(product_export.Product_Quantity) DESC LIMIT 0,4");
								while($row4_1 = mysqli_fetch_array($query4_1))
								{
									$id_pro_best = $row4_1['ID_Product_Type'];
									$query4_1_1 = mysqli_query($conn,"SELECT product_type.Product_Type_Image, product_type.ID_Product,product_type.Name_Product,product_sale_price.price,product_sale_price.sale_rate FROM product_type LEFT JOIN product_sale_price ON product_type.ID_Product=product_sale_price.id WHERE product_type.ID_Product='$id_pro_best'");
									$row4_1_1 = mysqli_fetch_array($query4_1_1);
									$name_pro_best=$row4_1_1['Name_Product'];
									$pro_best_price = $row4_1_1['price'];
									$pro_best_img = "http://localhost:8080/www/web_1/admin/dist/img/".$row4_1_1['Product_Type_Image'];
									$name_pro_unicode = unicode_convert($name_pro_best);
									if($row4_1_1['sale_rate']==0)
									{
										$pro_best_price_after = $pro_best_price;
									}else
									{
										$pro_best_price_after=$pro_best_price*(1-$row4_1_1['sale_rate']/100);
									}
									echo"<li class='flex-w p-b-20'>";
										echo"<a href='http://localhost:8080/www/web_1/san-pham/$id_pro_best/$name_pro_unicode.html' class='dis-block wrap-pic-w w-size22 m-r-20 trans-0-4 hov4'>";
											echo"<img src='$pro_best_img' alt='IMG-PRODUCT'>";
										echo"</a>";
		
										echo"<div class='w-size23 p-t-5'>";
											echo"<a href='http://localhost:8080/www/web_1/san-pham/$id_pro_best/$name_pro_unicode.html' class='s-text20'>";
												echo  $name_pro_best;
											echo"</a>";
		
											echo"<span class='dis-block s-text17 p-t-6'>";
												echo number_format($pro_best_price_after);
											echo"</span>";
										echo"</div>";
									echo"</li>";
									
								}
							?>
						</ul>


						<!-- Tags -->
						<h4 class="m-text23 p-t-50 p-b-25">
							Tags
						</h4>

						<div class="wrap-tags flex-w">
							<a href="#" class="tag-item">
								Fashion
							</a>

							<a href="#" class="tag-item">
								Lifestyle
							</a>

							<a href="#" class="tag-item">
								Denim
							</a>

							<a href="#" class="tag-item">
								Streetstyle
							</a>

							<a href="#" class="tag-item">
								Crafts
							</a>
						</div>
					</div>
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
<?php include("js_blog.php");?>

</body>
</html>
