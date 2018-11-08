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
		$id_cat = addslashes($_GET['id']);
		$query12_2 = mysqli_query($conn,"SELECT keyword,title,description FROM product_category WHERE id='$id_cat'");
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
		$query1_1 = mysqli_query($conn,"SELECT * FROM `theme_index` WHERE id = 'TH001'");
		$row1_1 = mysqli_fetch_array($query1_1);
		$logo_img = "http://localhost:8080/www/web_1/images/".$row1_1['content']; 
	?>
	<link rel="icon" type="image/png" href="<?php echo $logo_img ?>"/>
	<?php include("css.php"); ?>
    <script type="text/javascript" src="http://localhost:8080/www/web_1/vendor/jquery/jquery-3.2.1.min.js"></script>
</head>
<body class="animsition">

	<!-- Header -->
	<?php include("header.php");?>
	<!-- Title Page -->
	


	<!-- Content page -->
	<section class="bgwhite p-t-55 p-b-65">
		<div class="container">
			<div class="row">

				<div class="col-sm-12 col-md-12 col-lg-12 p-b-50">
					<!--  -->
					<div class="flex-sb-m flex-w p-b-35">
						

						<span class="s-text8 p-t-5 p-b-5">
							Showing 1–12 of 16 results
						</span>
					</div>

					<!-- Product -->
					<div class="row">
                    <?php
						
						$display=12;
						if(isset($_GET['begin']))
						{
							$position=addslashes($_GET['begin']);
						}else
						{
							$position=0;
						}
						$query4_0 = mysqli_query($conn,"SELECT * FROM product_type LEFT JOIN product_sale_price on product_type.ID_Product=product_sale_price.id WHERE product_type.id_category ='$id_cat' AND product_type.product_type_check=1 ORDER BY product_type.Date_Create DESC LIMIT $position,$display ");
						while($row4_0 = mysqli_fetch_array($query4_0))
						{
							$id_pro_detail = $row4_0['ID_Product'];
							$name_pro_detail = $row4_0['Name_Product'];
							$img_pro_detail = "http://localhost:8080/www/web_1/admin/dist/img/".$row4_0['Product_Type_Image'];
							$price_pro_detail = $row4_0['price'];
							if($row4_0['sale_rate']!=null)
							{$price_after_pro_detail = $price_pro_detail*(1-$row4_0['sale_rate']/100); }
							
							echo"<div class='col-sm-6 col-md-4 col-lg-3 p-b-50'>";
							
							echo"<div class='block2'>";
								echo"<div class='block2-img wrap-pic-w of-hidden pos-relative'>";
									echo"<img src='$img_pro_detail' alt='IMG-PRODUCT'>";

									echo"<div class='block2-overlay trans-0-4'>";
										echo"<a href='#' class='block2-btn-addwishlist hov-pointer trans-0-4'>";
											echo"<i class='icon-wishlist icon_heart_alt' aria-hidden='true'></i>";
											echo"<i class='icon-wishlist icon_heart dis-none' aria-hidden='true'></i>";
										echo"</a>";

										echo"<div class='block2-btn-addcart w-size1 trans-0-4' data-id='$id_pro_detail' data-id='$id_pro_detail'>";
											
											echo"<button class='flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4'>";
												echo"Chi tiết";
											echo"</button>";
										echo"</div>";
									echo"</div>";
								echo"</div>";

								echo"<div class='block2-txt p-t-20'>";
									echo"<a href='javascript:void(0)' class='block2-name dis-block s-text3 p-b-5' data-id='$id_pro_detail'>";
										echo $name_pro_detail;
									echo"</a>";
									if($row4_0['sale_rate']==0)
									{
										echo"<span class='block2-price m-text6 p-r-5'>";
											echo number_format($price_pro_detail);
										echo"</span>";
									}else
									{
										echo"<span class='block2-oldprice m-text7 p-r-5'>";
												echo number_format($price_pro_detail) ;
											echo"</span>";
	
											echo"<span class='block2-newprice m-text8 p-r-5'>";
												echo number_format($price_after_pro_detail);
											echo"</span>";
									}

									
								echo"</div>";
							echo"</div>";
						echo"</div>";
						}
						
					?>
                    
						
                        
                        
                        
                      
                        
					</div>

					<!-- Pagination -->
                    <?php
						$query4_1 = mysqli_query($conn,"SELECT COUNT(ID_Product) as tong FROM product_type WHERE id_category='$id_cat' AND product_type_check=1");
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
						$query4_5 = mysqli_query($conn,"SELECT * FROM product_category WHERE id='$id_cat'");
						$row4_5 = mysqli_fetch_array($query4_5);
						$name_kind = $row4_5['name'];
						$name_kind_unicode = unicode_convert($name_kind);
					?>
					<div class="pagination flex-m flex-w p-t-26">
                    <?php
						for($page=1;$page<=$sum_page;$page++)
						{
							$begin=($page-1)*$display;
							if($current==$page)
							{
								echo"<a href='http://localhost:8080/www/web_1/nhom-san-pham/$id_cat/$name_kind_unicode.html/$begin' class='item-pagination flex-c-m trans-0-4 active-pagination'>$page</a>";
							}else
							{
								echo"<a href='http://localhost:8080/www/web_1/nhom-san-pham/$id_cat/$name_kind_unicode.html/$begin' class='item-pagination flex-c-m trans-0-4'>$page</a>";
							}
						}
					?>
						
					</div>
				</div>
			</div>
		</div>
	</section>


	<!-- Footer -->
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
<?php include('js_product_main.php'); ?>
</body>
</html>
