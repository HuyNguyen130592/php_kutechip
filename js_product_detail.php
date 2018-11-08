<!--===============================================================================================-->
	
<!--===============================================================================================-->
	<script type="text/javascript" src="http://localhost:8080/www/web_1/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="http://localhost:8080/www/web_1/vendor/bootstrap/js/popper.js"></script>
	<script type="text/javascript" src="http://localhost:8080/www/web_1/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="http://localhost:8080/www/web_1/vendor/select2/select2.min.js"></script>
	<script type="text/javascript">
		$(".selection-1").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $('#dropDownSelect1')
		});

		$(".selection-2").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $('#dropDownSelect2')
		});
	</script>
<!--===============================================================================================-->
	<script type="text/javascript" src="http://localhost:8080/www/web_1/vendor/slick/slick.min.js"></script>
	<script type="text/javascript" src="http://localhost:8080/www/web_1/js/slick-custom.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="http://localhost:8080/www/web_1/vendor/sweetalert/sweetalert.min.js"></script>
	<script type="text/javascript">
		
		
		$('#color').change(function(){
			$('#error_color').hide();
			});
		$('#size').change(function(){
			$('#error_size').hide();
			});
			
			$('.btn-addcart-product-detail').on('click', function(){
				var nameProduct = $('.product-detail-name').html();
				var a = $('#color').val();
				var b = $('#size').val();
				var c = $(this).attr('data-id');
				var d = $('#pro_quantity').val();
				
				
				if(a=="" || b == "")
				{
					if(a==""){$('#error_color').show();}
					if(b==""){$('#error_size').show();}
				}else
				{
					
					swal({
							  title: nameProduct,
							  text: "được thêm vào giỏ hàng !",
							  icon: "success",
							  buttons: ["Close", "Xem giỏ hàng"],
							  dangerMode: true,
							})
							.then((willDelete) => {
							  if (willDelete) {
								window.location.href='http://localhost:8080/www/web_1/gio-hang.html';
							  } 
							});
					var e = c+a+b;
					$.ajax({
						type:"POST",
						url:"http://localhost:8080/www/web_1/model/product_add.php",
						dataType:"json",
						data:{id:e,quantity:d},
						success: function(e){
							$('.header-icons-noti').html(e.sl_cart);
							if( e.sl_cart > 1)
							{	var html = "";
								html+="<li class='header-cart-item "+e.id_pro+"' data-id='$cart_ip_pro'>";
								html+="<div class='header-cart-item-img'>";
								html+="<img src='http://localhost:8080/www/web_1/"+e.img_pro+"' alt='IMG'>";
								html+="</div>";
								html+="<div class='header-cart-item-txt'>";
								html+="<a href='#' class='header-cart-item-name'>";
								html+=e.name_pro;
								html+="</a>";
								html+="<span class='header-cart-item-info'>";
								html+=e.sl_sp+" x "+e.price_pro+" = "+e.sum_pro;
								html+="</span>";
								html+="</div>";
								html+="</li>";
								$('.header-cart-wrapitem').append(html);
								var sub_sum_pro = "Total :"+e.sub_sum_pro;
								$('.header-cart-total').html(sub_sum_pro);
							}else
							{
								$('.header-cart-item-txt').hide();
								var html = "";
								html+="<li class='header-cart-item "+e.id_pro+"' data-id='$cart_ip_pro'>";
								html+="<div class='header-cart-item-img'>";
								html+="<img src='http://localhost:8080/www/web_1/"+e.img_pro+"' alt='IMG'>";
								html+="</div>";
								html+="<div class='header-cart-item-txt'>";
								html+="<a href='#' class='header-cart-item-name'>";
								html+=e.name_pro;
								html+="</a>";
								html+="<span class='header-cart-item-info'>";
								html+=e.sl_sp+" x "+e.price_pro+" = "+e.sum_pro;
								html+="</span>";
								html+="</div>";
								html+="</li>";
								$('.header-cart-wrapitem').append(html);
								var html2 ="";
								html2 +="<div class='header-cart-total'>";
								html2 +="Total: "+e.sub_sum_pro;
								html2 +="</div>";
								html2 +="<div class='header-cart-buttons'>";
								html2 +="<div class='header-cart-wrapbtn'>";
								html2 +="<a href='http://localhost:8080/www/web_1/gio-hang.html' class='flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4'>";
								html2 +="Xem giỏ hàng";
								html2 +="</a>";
								html2 +="</div>";
								html2 +="<div class='header-cart-wrapbtn'>";
								html2 +="<a href='http://localhost:8080/www/web_1/gio-hang.html' class='flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4'>";
								html2 +="Thanh toán";
								html2 +="</a>";
								html2 +="</div>";
								html2 +="</div>";
								$('.header-cart').append(html2);
							}
							}
						});
					
				}
				
			});
		
	</script>

<!--===============================================================================================-->
	<script src="http://localhost:8080/www/web_1/js/main.js"></script>

