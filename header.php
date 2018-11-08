	<!-- header fixed -->
	<div class="wrap_header fixed-header2 trans-0-4">
		<!-- Logo -->
		<a href="http://localhost:8080/www/web_1/home.html" class="logo">
			<img src="<?php echo $logo_img ?>" alt="IMG-LOGO" style="height:auto; width:70px">
		</a>

		<!-- Menu -->
		<div class="wrap_menu">
			<nav class="menu">
				<ul class="main_menu">
					<li>
						<a href="http://localhost:8080/www/web_1/home.html">Trang chủ</a>
						
					</li>

					<li class="sale-noti">
						<a href="javascript:void(0)">Sản phẩm</a>
                        <ul class="sub_menu">
                        <?php 
							$query2_1 = mysqli_query($conn,"SELECT * FROM `product_kind`");
							while($row2_1 = mysqli_fetch_array($query2_1))
							{
								$id_pro_kind = $row2_1['ID_Product_Kind'];
								$name_pro_kind = $row2_1['Product_Kind_Name'];
								$name_unicode = unicode_convert($name_pro_kind);
								
								echo"<li><a href='http://localhost:8080/www/web_1/chung-loai/$id_pro_kind/$name_unicode.html'>$name_pro_kind</a></li>";
							}
							
						?>	
                        </ul>
					</li>

					

					<li>
						<a href="http://localhost:8080/www/web_1/blog.html">Tin tức</a>
					</li>

					<li>
						<a href="javascript:void(0)">Giới thiệu</a>
					</li>

					<li>
						<a href="javascript:void(0)">Liên hệ</a>
					</li>
				</ul>
			</nav>
		</div>

		<!-- Header Icon -->
		<div class="header-icons">
			<a href="http://localhost:8080/www/web_1/login.html" class="header-wrapicon1 dis-block">
				<img src="http://localhost:8080/www/web_1/images/icons/icon-header-01.png" class="header-icon1" alt="ICON">
			</a>

			<span class="linedivide1"></span>
		<div class="header-wrapicon2">
        	<img src="http://localhost:8080/www/web_1/images/icons/icon-header-02.png" class="header-icon1 js-show-header-dropdown" alt="ICON">
			<?php include('shopcart_index.php'); ?>
        </div>
		</div>
	</div>

	<!-- top noti -->
	<!--<div class="flex-c-m size22 bg0 s-text21 pos-relative">
		20% off everything!
		<a href="product.html" class="s-text22 hov6 p-l-5">
			Shop Now
		</a>

		<button class="flex-c-m pos2 size23 colorwhite eff3 trans-0-4 btn-romove-top-noti">
			<i class="fa fa-remove fs-13" aria-hidden="true"></i>
		</button>
	</div>-->

	<!-- Header -->
<header class="header2">
		<!-- Header desktop -->
		<div class="container-menu-header-v2 p-t-26">
			<div class="topbar2">
				<div class="topbar-social">
                	<?php
						$query1_5 = mysqli_query($conn,"SELECT * FROM `theme_index` WHERE id='TH005'");
						$row1_5=mysqli_fetch_array($query1_5);
						$content1_5 = $row1_5['content'];
					?>
					<a href="<?php echo $content1_5;  ?>" class="topbar-social-item fa fa-facebook"></a>
                    <?php
						$query1_7 = mysqli_query($conn,"SELECT * FROM `theme_index` WHERE id='TH007'");
						$row1_7=mysqli_fetch_array($query1_7);
						$content1_7 = $row1_7['content'];
					?>
					<a href="<?php echo $content1_7;  ?>" class="topbar-social-item fa fa-instagram"></a>
					<?php
						$query1_6 = mysqli_query($conn,"SELECT * FROM `theme_index` WHERE id='TH006'");
						$row1_6=mysqli_fetch_array($query1_6);
						$content1_6 = $row1_6['content'];
					?>
					
					<a href="<?php echo $content1_6;  ?>" class="topbar-social-item fa fa-youtube-play"></a>
				</div>

				<!-- Logo2 -->
				<a href="http://localhost:8080/www/web_1/home.html" class="logo2">
					<img src="<?php echo $logo_img ?>" alt="IMG-LOGO" style="width:80px; height:80px">
				</a>

				<div class="topbar-child2">
                	<?php
						$query1_4 = mysqli_query($conn,"SELECT * FROM `theme_index` WHERE id='TH004'");
						$row1_4=mysqli_fetch_array($query1_4);
						$content1_4 = $row1_4['content'];
					?>
					<span class="topbar-email">
						Hotline: <?php echo $content1_4;  ?>
					</span>

					
					<!--  -->
					<a href="http://localhost:8080/www/web_1/login.html" class="header-wrapicon1 dis-block m-l-30">
						<img src="http://localhost:8080/www/web_1/images/icons/icon-header-01.png" class="header-icon1" alt="ICON">
					</a>

					<span class="linedivide1"></span>

					<div class="header-wrapicon2 m-r-13">
						<img src="http://localhost:8080/www/web_1/images/icons/icon-header-02.png" class="header-icon1 js-show-header-dropdown" alt="ICON">
                        <?php include('shopcart_index.php'); ?>
					</div>
				</div>
			</div>

			<div class="wrap_header">

				<!-- Menu -->
				<div class="wrap_menu">
					<nav class="menu">
						<ul class="main_menu">
							<li>
								<a href="http://localhost:8080/www/web_1/home.html">Trang chủ</a>
							</li>

							<li class="sale-noti">
								<a href="javascript:void(0)">Sản phẩm</a>
                                <ul class="sub_menu">
                                	<?php 
										$query2_2 = mysqli_query($conn,"SELECT * FROM `product_kind`");
										while($row2_2 = mysqli_fetch_array($query2_2))
										{
											$id_pro_kind2 = $row2_2['ID_Product_Kind'];
											$name_pro_kind2 = $row2_2['Product_Kind_Name'];
											$name_unicode2 = unicode_convert($name_pro_kind2);
											echo"<li><a href='http://localhost:8080/www/web_1/chung-loai/$id_pro_kind2/$name_unicode2.html'>$name_pro_kind2</a></li>";
										}
										
									?>	
									
								</ul>
							</li>
							<li>
								<a href="http://localhost:8080/www/web_1/blog.html">Tin Tức</a>
							</li>

							<li>
								<a href="javascript:void(0)">Giới thiệu</a>
							</li>

							<li>
								<a href="javascript:void(0)">Liên hệ</a>
							</li>
						</ul>
					</nav>
				</div>

				<!-- Header Icon -->
				<div class="header-icons">

				</div>
			</div>
		</div>

		<!-- Header Mobile -->
		<div class="wrap_header_mobile">
			<!-- Logo moblie -->
			<a href="http://localhost:8080/www/web_1/home.html" class="logo-mobile">
				<img src="<?php echo $logo_img ?>" alt="IMG-LOGO" style="width:50px; height:auto">
			</a>

			<!-- Button show menu -->
			<div class="btn-show-menu">
				<!-- Header Icon mobile -->
				<div class="header-icons-mobile">
					<a href="http://localhost:8080/www/web_1/login.html" class="header-wrapicon1 dis-block">
						<img src="http://localhost:8080/www/web_1/images/icons/icon-header-01.png" class="header-icon1" alt="ICON">
					</a>

					<span class="linedivide2"></span>

					<div class="header-wrapicon2">
						<img src="http://localhost:8080/www/web_1/images/icons/icon-header-02.png" class="header-icon1 js-show-header-dropdown" alt="ICON">
						<?php include('shopcart_index.php'); ?>
					</div>
				</div>

				<div class="btn-show-menu-mobile hamburger hamburger--squeeze">
					<span class="hamburger-box">
						<span class="hamburger-inner"></span>
					</span>
				</div>
			</div>
		</div>

		<!-- Menu Mobile -->
		<div class="wrap-side-menu" >
			<nav class="side-menu">
				<ul class="main-menu">

			  <li class="item-topbar-mobile p-l-20 p-t-8 p-b-8">
						<div class="topbar-child2-mobile">
							<span class="topbar-email">
								Hotline : <?php echo $content1_4;  ?>
                             </span>

						</div>
					</li>

			  <li class="item-topbar-mobile p-l-10">
						<div class="topbar-social-mobile">
							<a href="<?php echo $content1_5;  ?>" class="topbar-social-item fa fa-facebook"></a>
							<a href="<?php echo $content1_7;  ?>" class="topbar-social-item fa fa-instagram"></a>
							<a href="<?php echo $content1_6;  ?>" class="topbar-social-item fa fa-youtube-play"></a>
                        </div>						
					</li>
			<li class="item-menu-mobile"><a href="localhost:8080/www/web_1/home.html">Trang chủ</a>  </li>
			  <li class="item-menu-mobile">
						<a href="javascript:void(0)">Sản phẩm</a>
						<ul class="sub-menu">
                        <?php 
							$query2_3 = mysqli_query($conn,"SELECT * FROM `product_kind`");
							while($row2_3 = mysqli_fetch_array($query2_3))
							{
								$id_pro_kind3 = $row2_3['ID_Product_Kind'];
								$name_pro_kind3 = $row2_3['Product_Kind_Name'];
								$name_unicode3 = unicode_convert($name_pro_kind3);
								echo"<li><a href='http://localhost:8080/www/web_1/chung-loai/$id_pro_kind3/$name_unicode3.html'>$name_pro_kind3</a></li>";
								
							}
										
						?>	
							
						</ul>
						<i class="arrow-main-menu fa fa-angle-right" aria-hidden="true"></i>
                         
						
              </li>

			  
						
                         
                        
            


			  <li class="item-menu-mobile"><a href="http://localhost:8080/www/web_1/blog.html">Tin tức</a> </li>
						
             

			  <li class="item-menu-mobile"><a href="javascript:void(0)">Giới thiệu</a> </li>
						
             

			  <li class="item-menu-mobile"><a href="javascript:void(0)">Liên hệ</a> </li>
						
             
			  </ul>
			</nav>
		</div>
	</header>