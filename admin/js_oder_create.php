<!-- jQuery 2.1.3 -->
    <script src="plugins/jQuery/jQuery-2.1.3.min.js"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- DATA TABES SCRIPT -->
    <script src="plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
    <script src="plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
    <!-- SlimScroll -->
    <script src="plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <!-- FastClick -->
    <script src='plugins/fastclick/fastclick.min.js'></script>
    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js" type="text/javascript"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js" type="text/javascript"></script>
    <!-- page script -->
    <script src="plugins/Number_format/jquery.masknumber.js"></script>
    <script type="text/javascript">
		$(document).ready(function(e) {
			$('#ship').maskNumber({integer: true,});
			$('#pro_price_input').maskNumber({integer: true,});
			
            $('#city').change(function(){
				var a = $('#city').val();
				
				$.ajax({
				    type:"POST",
					url:"model/district_find.php",
					dataType:"json",
					data:"city="+a,
					success: function(e){
						
						var district = "<select name='distric' class='form-control' id='district'>";
						district+="<option>Chọn quận/huyện</option>";
						 $.each (e, function (key, item){
							
							 district+="<option value="+item['id']+">"+item['name']+"</option>";
							 });
						 district+="</select>"; 
						  $('#district_add').html(district);
						}
					});
				});
			$('#name_customer').keyup(function(){
				var b = $('#name_customer').val();
				
				
						
						$.ajax({
							type:"POST",
							url:"model/customer_find.php",
							dataType:"json",
							data:"cus="+b,
							success: function(e){
								
								var html = "";
								html+="<table class='table table-condensed' >";
								html+="<thead>";
								html+="<tr>";
								html+="<th>Tên</th>";
								html+="<th>Số điện thoại</th>";
								html+="<th>Địa chỉ</th>";
								html+="</tr>";
								html+="</thead>";
								html+="<tbody>";
								$.each (e, function (key, item){
									var name = item['name'];
									html+="<tr>";
									html+="<td><a href='javascript:void(0)' class='cus_name_find' data-namestreet='"+item['name_street']+"' data-nameward='"+item['name_ward']+"' data-namedistrict='"+item['name_district']+"' data-nameprovince='"+item['name_province']+"' data-iddistrict='"+item['id_district']+"' data-idprovince='"+item['id_province']+"' data-mobile='"+item['mobile']+"' data-name='"+item['name']+"'"+" data-id='"+item['id_cus']+"'>"+item['name']+"</a></td>";
									html+="<td class='tbl_pro'><a href='javascript:void(0)'  class='cus_name_find'data-namestreet='"+item['name_street']+"' data-nameward='"+item['name_ward']+"' data-namedistrict='"+item['name_district']+"' data-nameprovince='"+item['name_province']+"' data-iddistrict='"+item['id_district']+"' data-idprovince='"+item['id_province']+"' data-mobile='"+item['mobile']+"' data-name='"+item['name']+"'"+" data-id='"+item['id_cus']+"'>"+item['mobile']+"</a></td>";
									html+="<td><a href='javascript:void(0)' class='cus_name_find'data-namestreet='"+item['name_street']+"' data-nameward='"+item['name_ward']+"' data-namedistrict='"+item['name_district']+"' data-nameprovince='"+item['name_province']+"' data-iddistrict='"+item['id_district']+"' data-idprovince='"+item['id_province']+"' data-mobile='"+item['mobile']+"' data-name='"+item['name']+"'"+" data-id='"+item['id_cus']+"'>"+item['address']+"</a></td>";
									html+="</tr>";
									});
								html+="</tbody>";
								html+="</table>";
								$('#customer_name').show();
								$('#customer_name').html(html);
								if(Object.keys(e).length==0){$('#customer_name').hide();}
								if(b==""||b==" "){$('#customer_name').hide();}
								}
								
							});
					
				});
			$('#pro_name_input').keyup(function(){
				var c = $('#pro_name_input').val();
				
				$.ajax({
					type:"POST",
					url:"model/product_name_find.php",
					dataType:"json",
					data:"pro_name="+c,
					success: function(e){
						
						var html = "";
						html+="<table class='table table-condensed'>";
						html+="<thead>";
						html+="<tr>";
						html+="<th> Mã sản phẩm</th>";
						html+="<th>Tên sản phẩm</th>";
						html+="<th>Đơn giá</th>";
						html+="<th>Giá khuyến mãi</th>";
						html+="</tr>";
						html+=" </thead>";
						html+="<tbody>";
						$.each (e, function (key, item){
							html+="<tr>";
							html+="<td><a href='javascript:void(0)' data-price='"+item['price_after']+"' data-name='"+item['name']+"' data-id='"+item['id']+"' class='pro_name_find'>"+item['id']+"</a></td>";
							html+="<td><a href='javascript:void(0)' data-price='"+item['price_after']+"' data-name='"+item['name']+"' data-id='"+item['id']+"'  class='pro_name_find'>"+item['name']+"</a></td>";
							html+="<td><a href='javascript:void(0)' data-price='"+item['price_after']+"' data-name='"+item['name']+"' data-id='"+item['id']+"' class='pro_name_find'>"+item['price']+"</a></td>";
							html+="<td><a href='javascript:void(0)' data-price='"+item['price_after']+"' data-name='"+item['name']+"' data-id='"+item['id']+"' class='pro_name_find'>"+item['price_after']+"</a></td>";
							html+="</tr>";
							});
						html+="</tbody>";
						html+="</table>";
						$('#pro_name').show();
						$('#pro_name').html(html);
						if(Object.keys(e).length==0){$('#pro_name').hide();}
						if(c==""||c==" "){$('#pro_name').hide();}
						}
					});
					
				});
			$('#customer_name').delegate('.cus_name_find','click',function(){
				var id_cus = $(this).attr('data-id');
				var name = $(this).attr('data-name');
				var mobile = $(this).attr('data-mobile');
				var id_province = $(this).attr('data-idprovince');
				var id_district = $(this).attr('data-iddistrict');
				var name_province = $(this).attr('data-nameprovince');
				var name_district = $(this).attr('data-namedistrict');
				var name_ward = $(this).attr('data-nameward');
				var name_street = $(this).attr('data-namestreet');
				$('#customer_name').hide();
				$('#cus_id').val(id_cus);
				$('#name_customer').val(name);
				$('#mobile').val(mobile);
				var html_city = "<option selected='selected' value='"+id_province+"''>"+name_province+"</option>";
				$('#city').append(html_city);
				var html_district = "<option selected='selected' value='"+id_district+"''>"+name_district+"</option>";
				$('#district').html(html_district);
				$('#ward').val(name_ward);
				$('#street').val(name_street);
				$('#ship_fee').show();
				$.ajax({
					type:"POST",
					url:"model/ship_fee_find.php",
					dataType:"html",
					data:"id="+id_district,
					success: function(e){
						$('#ship').val(e);
						}
					});
				
				
				})
			$('#pro_name').delegate('.pro_name_find','click',function(){
				var id_pro= $(this).attr('data-id');
				var name_pro = $(this).attr('data-name');
				var pro_price = $(this).attr('data-price');
				$('#pro_id_input').val(id_pro);
				$('#pro_name_input').val(name_pro);
				$('#pro_price_input').val(pro_price);
				$('#pro_name').hide();
				});
			$('#pro_add_butt').click(function(){
				
				var id_pro=$('#pro_id_input').val();
				var name_pro=$('#pro_name_input').val();
				var pro_price=$('#pro_price_input').val();
				var pro_quantity = $('#pro_quantity_input').val();
				if (pro_quantity == ""){pro_quantity=1}
				$('#pro_id_input').val("");
				$('#pro_name_input').val("");
				$('#pro_price_input').val("");
				$('#pro_quantity_input').val("");
				$.ajax({
					type:"POST",
					url:"model/oder_add_pro.php",
					dataType:"json",
					data:{id:id_pro,price:pro_price,quantity:pro_quantity,name:name_pro},
					success: function(e){
						var html ="";
						$.each (e, function (key, item){
							
							html+="<tr>";
							html+="<td>"+item['name']+"</td>";
							html+="<td>"+item['price']+"</td>";
							html+="<td>"+item['quantity']+"</td>";
							html+="<td><input type='button' data-id='"+item['id']+"' class='btn btn-danger pro_delete' value='Xóa' /></td>";
							html+="</tr>";
							
							});
							
						$('#product_tbl').append(html);
						}
					
					});
				});
			$('#product_tbl').delegate('.pro_delete','click',function(){
				var id = $(this).attr('data-id');
				$(this).parentsUntil('tbody').hide();
				$.ajax({
					type:"POST",
					url:"model/oder_product_del_find.php",
					dataType:"html",
					data:{id:id},
					success: function(e){}
					});
				});
			$('#district_add').delegate('#district','change',function(){
				var district = $('#district').val();
				$('#ship_fee').show();
				$.ajax({
					type:"POST",
					url:"model/ship_fee_find.php",
					dataType:"html",
					data:"id="+district,
					success: function(e){
						$('#ship').val(e);
						
						}
					});
				});
        });
    </script>