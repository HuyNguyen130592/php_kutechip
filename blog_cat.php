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
			$logo_img = "http://localhost:8080/www/web_1/images/".$row1_1['content']; 
		?>
		<link rel="icon" type="image/png" href="<?php echo $logo_img ?>"/>
		<?php include("css.php"); ?>
	<!--===============================================================================================-->
	<script type="text/javascript" src="http://localhost:8080/www/web_1/vendor/jquery/jquery-3.2.1.min.js"></script>

</head>
<?php include("header.php");?>
	<!-- Title Page -->
	<section class="bg-title-page p-t-40 p-b-50 flex-col-c-m" style="background-image: url('http://localhost:8080/www/web_1/images/190x239.jpg');">
		<h2 class="l-text2 t-center">
			Blog
		</h2>
	</section>

	<!-- content page -->
	<section class="bgwhite p-t-60">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-lg-9 p-b-75">
					<div class="p-r-50 p-r-0-lg">
                    <?php
						$display=6;
						$id_cat = addslashes($_GET['id']);
						if(isset($_GET['begin']))
						{
							$position=addslashes($_GET['begin']);
						}else
						{
							$position=0;
						}
						$query5_0 = mysqli_query($conn,"SELECT blog_news.news_id,blog_news.news_name,blog_news.news_title,blog_news.news_image,blog_news.date_create,blog_category.name_cat FROM blog_news LEFT JOIN blog_category ON blog_news.id_cat=blog_category.id_cat WHERE blog_news.id_cat='$id_cat' ORDER BY blog_news.news_id DESC LIMIT $position,6");
						while($row5_0 = mysqli_fetch_array($query5_0))
						{
							$id_news = $row5_0['news_id'];
							$name_news = $row5_0['news_name'];
							$img_news = "http://localhost:8080/www/web_1/admin/dist/img/".$row5_0['news_image'];
							$news_title = $row5_0['news_title'];
							$date_news = date('d M,Y ',strtotime($row5_0['date_create']));
							$name_cat = $row5_0['name_cat'];
							$name_news_unicode = unicode_convert($name_news);
							echo"<div class='item-blog p-b-80'>";
								echo"<a href='http://localhost:8080/www/web_1/bai-viet/$id_news/$name_news_unicode.html' class='item-blog-img pos-relative dis-block hov-img-zoom'>";
									echo"<img src='$img_news' alt='IMG-BLOG'>";
	
									echo"<span class='item-blog-date dis-block flex-c-m pos1 size17 bg4 s-text1'>";
										echo $date_news;
									echo"</span>";
								echo"</a>";
	
								echo"<div class='item-blog-txt p-t-33'>";
									echo"<h4 class='p-b-11'>";
										echo"<a href='http://localhost:8080/www/web_1/bai-viet/$id_news/$name_news_unicode.html' class='m-text24'>";
											echo $name_news;
										echo"</a>";
									echo"</h4>";
	
									echo"<div class='s-text8 flex-w flex-m p-b-21'>";
										echo"<span>";
											echo"By Admin";
											echo"<span class='m-l-3 m-r-6'>|</span>";
										echo"</span>";
	
										echo"<span>";
											echo $name_cat;
											echo"<span class='m-l-3 m-r-6'>|</span>";
										echo"</span>";
	
										
									echo"</div>";
	
									echo"<p class='p-b-12'>";
										echo $news_title;
									echo"</p>";
	
									echo"<a href='http://localhost:8080/www/web_1/bai-viet/$id_news/$name_news_unicode.html' class='s-text20'>";
										echo"Đọc tiếp .....";
										echo"<i class='fa fa-long-arrow-right m-l-8' aria-hidden='true'></i>";
									echo"</a>";
								echo"</div>";
							echo"</div>";
							
						}
					?>
						
						


					
						
					</div>
                    <?php
						$query4_1 = mysqli_query($conn,"SELECT COUNT(news_id) AS tong FROM blog_news WHERE id_cat='$id_cat'");
						$row4_1 = mysqli_fetch_array($query4_1);
						$result=$row4_1['tong'];
			   			$sum_page=ceil($result/$display);
						if($position==0)
						{
							$current=1;
						}else
						{
							$current=($position/$display)+1;
						}
					?>

					<!-- Pagination -->
					<div class="pagination flex-m flex-w p-r-50">
						 <?php
						 	$query4_6 = mysqli_query($conn,"SELECT * FROM `blog_category` WHERE id_cat='$id_cat'");
							$row4_6 = mysqli_fetch_array($query4_6);
							$name_cat6 = $row4_6['name_cat'];
							$name_cat6_unicode = unicode_convert($name_cat6);
							for($page=1;$page<=$sum_page;$page++)
							{
								$begin=($page-1)*$display;
								if($current==$page)
								{
									echo"<a href='http://localhost:8080/www/web_1/chuyen-muc/$id_cat/$name_cat6_unicode.html/$begin' class='item-pagination flex-c-m trans-0-4 active-pagination'>$page</a>";
								}else
								{
									echo"<a href='http://localhost:8080/www/web_1/chuyen-muc/$id_cat/$name_cat6_unicode.html/$begin' class='item-pagination flex-c-m trans-0-4'>$page</a>";
								}
							}
						?>
						
					</div>
				</div>

				<div class="col-md-4 col-lg-3 p-b-75">
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
