	<!-- Shipping -->
	<section class="shipping bgwhite p-t-62 p-b-46">
		<div class="flex-w p-l-15 p-r-15">
        <?php
			$query1_33 = mysqli_query($conn,"SELECT * FROM `theme_index` WHERE id='TH033'");
			$row1_33=mysqli_fetch_array($query1_33);
			$content1_33 = $row1_33['content'];
		?>
			<div class="flex-col-c w-size5 p-l-15 p-r-15 p-t-16 p-b-15 respon1">
				<h4 class="m-text12 t-center">
					<?php echo $content1_33 ?>
				</h4>
				<?php
					$query1_34 = mysqli_query($conn,"SELECT * FROM `theme_index` WHERE id='TH034'");
					$row1_34=mysqli_fetch_array($query1_34);
					$content1_34 = $row1_34['content'];
				?>
				<a href="#" class="s-text11 t-center">
					<?php echo $content1_34 ?>
				</a>
			</div>

			<div class="flex-col-c w-size5 p-l-15 p-r-15 p-t-16 p-b-15 bo2 respon2">
            <?php
				$query1_35 = mysqli_query($conn,"SELECT * FROM `theme_index` WHERE id='TH035'");
				$row1_35=mysqli_fetch_array($query1_35);
				$content1_35 = $row1_35['content'];
			?>
				<h4 class="m-text12 t-center">
					<?php echo $content1_35 ?>
				</h4>
				<?php
					$query1_36 = mysqli_query($conn,"SELECT * FROM `theme_index` WHERE id='TH036'");
					$row1_36=mysqli_fetch_array($query1_36);
					$content1_36 = $row1_36['content'];
				?>
				<span class="s-text11 t-center">
					<?php echo $content1_36 ?>
				</span>
			</div>

			<div class="flex-col-c w-size5 p-l-15 p-r-15 p-t-16 p-b-15 respon1">
            <?php
				$query1_37 = mysqli_query($conn,"SELECT * FROM `theme_index` WHERE id='TH037'");
				$row1_37=mysqli_fetch_array($query1_37);
				$content1_37 = $row1_37['content'];
			?>
				<h4 class="m-text12 t-center">
					<?php echo $content1_37 ?>
				</h4>
                <?php
					$query1_38 = mysqli_query($conn,"SELECT * FROM `theme_index` WHERE id='TH038'");
					$row1_38=mysqli_fetch_array($query1_38);
					$content1_38 = $row1_38['content'];
				?>

				<span class="s-text11 t-center">
					<?php echo $content1_38 ?>
				</span>
			</div>
		</div>
	</section>


	<!-- Footer -->
	<footer class="bg6 p-t-45 p-b-43 p-l-45 p-r-45">
		<div class="flex-w p-b-90">
			<div class="w-size6 p-t-30 p-l-15 p-r-15 respon3">
				<h4 class="s-text12 p-b-30">
					Liên hệ 
				</h4>

				<div>
                <?php
					$query1_3 = mysqli_query($conn,"SELECT * FROM `theme_index` WHERE id='TH003'");
					$row1_3=mysqli_fetch_array($query1_3);
					$content1_3 = $row1_3['content'];
				?>
					<p class="s-text7 w-size27">
						Liên hệ với chúng tôi qua địa chỉ <?php echo $content1_3; ?> hoặc liên hệ qua số điện thoại <?php echo $content1_4;  ?>
					</p>

					<div class="flex-m p-t-30">
						<a href="<?php echo $content1_5;  ?>" class="fs-18 color1 p-r-20 fa fa-facebook"></a>
						<a href="<?php echo $content1_7;  ?>" class="fs-18 color1 p-r-20 fa fa-instagram"></a>
						
						
						<a href="<?php echo $content1_6;  ?>" class="fs-18 color1 p-r-20 fa fa-youtube-play"></a>
					</div>
				</div>
			</div>

			<div class="w-size7 p-t-30 p-l-15 p-r-15 respon4">
				<h4 class="s-text12 p-b-30">
					Categories
				</h4>
				
				<ul>
                <?php
					$query7_1 = mysqli_query($conn,"SELECT * FROM `product_category`"); 
					while($row7_1 = mysqli_fetch_array($query7_1))
					{
						$id_cat = $row7_1['id'];
						$name_cat = $row7_1['name'];
						$name_cat_unicode = unicode_convert($name_cat);
						echo"<li class='p-b-9'>";
						echo"<a href='http://localhost:8080/www/web_1/nhom-san-pham/$id_cat/$name_cat_unicode.html' class='s-text7'>";
							echo $name_cat;
						echo"</a>";
					echo"</li>";
					}
				?>
					
				</ul>
			</div>

			<div class="w-size7 p-t-30 p-l-15 p-r-15 respon4">
				<h4 class="s-text12 p-b-30">
					Links
				</h4>

				<ul>
					<li class="p-b-9">
						<a href="#" class="s-text7">
							Search
						</a>
					</li>

					<li class="p-b-9">
						<a href="#" class="s-text7">
							About Us
						</a>
					</li>

					<li class="p-b-9">
						<a href="#" class="s-text7">
							Contact Us
						</a>
					</li>

					<li class="p-b-9">
						<a href="#" class="s-text7">
							Returns
						</a>
					</li>
				</ul>
			</div>

			<div class="w-size7 p-t-30 p-l-15 p-r-15 respon4">
				<h4 class="s-text12 p-b-30">
					Help
				</h4>

				<ul>
					<li class="p-b-9">
						<a href="#" class="s-text7">
							Track Order
						</a>
					</li>

					<li class="p-b-9">
						<a href="#" class="s-text7">
							Returns
						</a>
					</li>

					<li class="p-b-9">
						<a href="#" class="s-text7">
							Shipping
						</a>
					</li>

					<li class="p-b-9">
						<a href="#" class="s-text7">
							FAQs
						</a>
					</li>
				</ul>
			</div>

			<div class="w-size8 p-t-30 p-l-15 p-r-15 respon3">
				<h4 class="s-text12 p-b-30">
					Newsletter
				</h4>

				<form>
					<div class="effect1 w-size9">
						<input class="s-text7 bg6 w-full p-b-5" type="text" name="email" placeholder="email@example.com">
						<span class="effect1-line"></span>
					</div>

					<div class="w-size2 p-t-20">
						<!-- Button -->
						<button class="flex-c-m size2 bg4 bo-rad-23 hov1 m-text3 trans-0-4">
							Subscribe
						</button>
					</div>

				</form>
			</div>
		</div>

		<div class="t-center p-l-15 p-r-15">
			<a href="#">
				<img class="h-size2" src="http://localhost:8080/www/web_1/images/icons/paypal.png" alt="IMG-PAYPAL">
			</a>

			<a href="#">
				<img class="h-size2" src="http://localhost:8080/www/web_1/images/icons/visa.png" alt="IMG-VISA">
			</a>

			<a href="#">
				<img class="h-size2" src="http://localhost:8080/www/web_1/images/icons/mastercard.png" alt="IMG-MASTERCARD">
			</a>

			<a href="#">
				<img class="h-size2" src="http://localhost:8080/www/web_1/images/icons/express.png" alt="IMG-EXPRESS">
			</a>

			<a href="#">
				<img class="h-size2" src="http://localhost:8080/www/web_1/images/icons/discover.png" alt="IMG-DISCOVER">
			</a>

			<div class="t-center s-text8 p-t-20">
				Copyright © 2018 All rights reserved. | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
			</div>
		</div>
	</footer>
<!--Start of Tawk.to Script-->
    <script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
    var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
    s1.async=true;
    s1.src='https://embed.tawk.to/5b2a4aa9d0b5a5479681feb7/default';
    s1.charset='UTF-8';
    s1.setAttribute('crossorigin','*');
    s0.parentNode.insertBefore(s1,s0);
    })();
    </script>
<!--End of Tawk.to Script-->
