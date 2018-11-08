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
		$('.block2-btn-addcart').each(function(){
			var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
			$(this).on('click', function(){
				swal(nameProduct, "được thêm vào giỏ hàng !", "success");
			});
		});

		$('.block2-btn-addwishlist').each(function(){
			var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to wishlist !", "success");
			});
		});
		
		$('.btn-addcart-product-detail').each(function(){
			var nameProduct = $('.product-detail-name').html();
			$(this).on('click', function(){
				swal(nameProduct, "được thêm vào giỏ hàng !", "success");
				 
			});
		});
		
		
		$('#address').keyup(function(){
			$('#error_address').hide()
			});
		$('#mobile').keyup(function(){
			$('#error_mobile').hide()
			});	
		
		$('#coupon_but').click(function(){
			
			var a = $('#coupon_code').val();
			var b = $('#district').val();
			
			if( a !== "")
			{
				$.ajax({
					type:"POST",
					url:"http://localhost:8080/www/web_1/model/coupon_add.php",
					dataType:"json",
					data:{a:a,b:b},
					success: function(e){
						if(e.result==false)
						{
							swal("Sử dụng mã giảm giá thất bại", "Mã giảm giá của bạn bị sai xin vui lòng kiểm tra lại !", "error");
						}else
						{
							swal(e.name_coupon, "Mã giảm giá của bạn được kích hoạt!", "success");
							$('#coupon_area').hide();
							$('#total').html(e.total);
							if(e.ship_fee != "")
							{
								$('#ship_fee').html(e.ship_fee);
								$('#ship_notice').hide();
							}
						}
						
						}
					});
			}else
			{
				swal("Sử dụng mã giảm giá thất bại", "Mã giảm giá của bạn bị sai xin vui lòng kiểm tra lại !", "error");
			}
			});	
			
				$('#thanh_toan').on('click', function(){
					var a = $('#city').val();
					var b = $('#district').val();
					var c = $('#address').val();
					var d = $('#mobile').val();
					var e = $('#note').val();
					var f = $('#name_cus').val();
					if( c == ""|| d ==""||a==""||b=="")
					{
						if(a == ""){$('#error_city').show();}
						if(b == ""){$('#error_district').show();}
					 	if(c == ""){$('#error_address').show();}
						if(d == ""){$('#error_mobile').show();}
						
					}else
					{
						$.ajax({
							type:"POST",
							url:"http://localhost:8080/www/web_1/model/oder_create.php",
							dataType:"html",
							data:{a:a,b:b,c:c,d:d,e:e,f:f},
							async:false,
							success: function(e){
							if(e==1)
							{
								swal("Mua hàng thành công", "Cảm ơn bạn đã mua hàng, nhân viên của shop sẽ liên hệ bạn sớm !", "success").then(function(){window.location.href='http://localhost:8080/www/web_1/home.html';})
							}else{swal("Mua hàng thất bại", "Tổng tiền sản phẩm tối thiểu 80k, bạn vui lòng chọn thêm sản phẩm !", "error")}
								
							}
							
						});
						
					}
				});
				
	</script>

<!--===============================================================================================-->
	<script src="http://localhost:8080/www/web_1/js/main.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$('#city').change(function(){
				$('#error_city').hide();
				var a = $('#city').val();
				$.ajax({
				    type:"POST",
					url:"http://localhost:8080/www/web_1/model/district_find.php",
					dataType:"json",
					data:"city="+a,
					success: function(e){
						
						var district = "<select name='distric' class='form-control' id='district'>";
						district+="<option>Chọn quận/huyện</option>";
						 $.each (e, function (key, item){
							
							 district+="<option value="+item['id']+">"+item['name']+"</option>";
							 });
						 district+="</select>"; 
						  $('#district').html(district);
						}
					});
				});
			
			
			
	
				
			$('#district').change(function(){
				$('#error_district').hide();
				var district = $('#district').val();
				$('#ship_fee').show();
				$.ajax({
					type:"POST",
					url:"http://localhost:8080/www/web_1/model/ship_fee_find.php",
					dataType:"json",
					data:"id="+district,
					success: function(e){
					
						$('#ship_fee').html(e.ship_fee);
						$('#total').html(e.total);
						$('#ship_notice').hide();
						
						}
					});
				});
		
		$('.column-1').click(function(){
			var a = $(this).attr('data-id');
			$(this).parents('tr').hide();
			var district = $('#district').val();
			 $.ajax({
				url:'http://localhost:8080/www/web_1/model/cart_del_pro.php',
				type:'POST',
				dataType:"json",
				data:{id:a,district:district},
				success: function(e)
				{
					
					$(".header-icons-noti").html(e.so_sp);
					$('#sub_total').html(e.sub_total);
					$('#ship_fee').html(e.ship_fee);
					$('#total').html(e.total);
					if(e.ship_fee !="")
					{
						$('#ship_notice').hide();
					}
					
					
				}
			 });
			 return false;
			});
		
		});
    </script>
