	<script src="plugins/jQuery/jQuery-2.1.3.min.js"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- InputMask -->
    <script src="plugins/input-mask/jquery.inputmask.js" type="text/javascript"></script>
    <script src="plugins/input-mask/jquery.inputmask.date.extensions.js" type="text/javascript"></script>
    <script src="plugins/input-mask/jquery.inputmask.extensions.js" type="text/javascript"></script>
    <!-- date-range-picker -->
    <script src="plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
    <!-- bootstrap color picker -->
    <script src="plugins/colorpicker/bootstrap-colorpicker.min.js" type="text/javascript"></script>
    <!-- bootstrap time picker -->
    <script src="plugins/timepicker/bootstrap-timepicker.min.js" type="text/javascript"></script>
    <!-- SlimScroll 1.3.0 -->
    <script src="plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <!-- iCheck 1.0.1 -->
    <script src="plugins/iCheck/icheck.min.js" type="text/javascript"></script>
    <!-- FastClick -->
    <script src='plugins/fastclick/fastclick.min.js'></script>
    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js" type="text/javascript"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js" type="text/javascript"></script>
    <!-- Page script -->
     <script type="text/javascript">
	 	 $(function () {
			 $('#daterange-btn').daterangepicker(
                {
                  ranges: {
                    'Hôm nay': [moment(), moment()],
                    'Hôm qua': [moment().subtract('days', 1), moment().subtract('days', 1)],
                    'Tuần trước': [moment().subtract('days', 6), moment()],
                    '30 ngày trước': [moment().subtract('days', 29), moment()],
                    'Tháng này': [moment().startOf('month'), moment().endOf('month')],
                    'Tháng trước': [moment().subtract('month', 1).startOf('month'), moment().subtract('month', 1).endOf('month')]
                  },
                  startDate: moment().subtract('days', 29),
                  endDate: moment()
                },
        function (start, end) {
          $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        }
        );
			 });
     </script>
     <script type="text/javascript">
	 		$(document).ready(function(e) {
				$('#report_click').click(function(){
					var m = $('#daterange-btn').val();
					
					$.ajax({
						url:'model/report_warehouse_create.php',
						type:'POST',
						dataType:"json",
						data:"date_send="+m,
						success: function(e){
							$('#pick_date').hide();
							$('#report_oder_general').show();
							
							var nha_cung_cap ="";
							nha_cung_cap +="<tbody>";
							for(var i=0;i<e.nha_cung_cap.length;i++)
								{
									nha_cung_cap +="<tr>";
									nha_cung_cap +="<td>"+e.nha_cung_cap[i].nha_cung_cap+"</td>";
									nha_cung_cap +="<td>"+e.nha_cung_cap[i].so_don+"</td>";
									nha_cung_cap +="<td>"+e.nha_cung_cap[i].so_luong+"</td>";
									nha_cung_cap +="<td>"+e.nha_cung_cap[i].gia_tri+"</td>";
									nha_cung_cap +="<td>"+e.nha_cung_cap[i].tile_sl+"</td>";
									nha_cung_cap +="<td>"+e.nha_cung_cap[i].tile_gt+"</td>";
									nha_cung_cap +="</tr>";
								}
							nha_cung_cap +="</tbody>";
							
							$('#nha_cung_cap').append(nha_cung_cap);
							var chung_loai ="";
							chung_loai +="<tbody>";
							for(var i=0;i<e.chung_loai.length;i++)
								{
									chung_loai +="<tr>";
									chung_loai +="<td>"+e.chung_loai[i].chung_loai+"</td>";
									
									chung_loai +="<td>"+e.chung_loai[i].so_luong+"</td>";
									chung_loai +="<td>"+e.chung_loai[i].gia_tri+"</td>";
									chung_loai +="<td>"+e.chung_loai[i].tile_sl+"</td>";
									chung_loai +="<td>"+e.chung_loai[i].tile_gt+"</td>";
									chung_loai +="</tr>";
								}
							chung_loai +="</tbody>";
							
							$('#chung_loai').append(chung_loai);
							
							var nhom_san_pham ="";
							nhom_san_pham +="<tbody>";
							for(var i=0;i<e.nhom_sp.length;i++)
								{
									nhom_san_pham +="<tr>";
									nhom_san_pham +="<td>"+e.nhom_sp[i].nhom_sp+"</td>";
									
									nhom_san_pham +="<td>"+e.nhom_sp[i].so_luong+"</td>";
									nhom_san_pham +="<td>"+e.nhom_sp[i].gia_tri+"</td>";
									nhom_san_pham +="<td>"+e.nhom_sp[i].tile_sl+"</td>";
									nhom_san_pham +="<td>"+e.nhom_sp[i].tile_gt+"</td>";
									nhom_san_pham +="</tr>";
								}
							nhom_san_pham +="</tbody>";
							
							$('#nhom_san_pham').append(nhom_san_pham);
							var san_pham ="";
							san_pham +="<tbody>";
							for(var i=0;i<e.sp.length;i++)
								{
									san_pham +="<tr>";
									san_pham +="<td>"+e.sp[i].sp+"</td>";
									
									san_pham +="<td>"+e.sp[i].so_luong+"</td>";
									san_pham +="<td>"+e.sp[i].gia_tri+"</td>";
									san_pham +="<td>"+e.sp[i].tile_sl+"</td>";
									san_pham +="<td>"+e.sp[i].tile_gt+"</td>";
									san_pham +="</tr>";
								}
							san_pham +="</tbody>";
							
							$('#san_pham').append(san_pham);
							
							var mau_sac ="";
							mau_sac +="<tbody>";
							for(var i=0;i<e.mau_sac.length;i++)
								{
									mau_sac +="<tr>";
									mau_sac +="<td>"+e.mau_sac[i].mau_sac+"</td>";
									
									mau_sac +="<td>"+e.mau_sac[i].so_luong+"</td>";
									mau_sac +="<td>"+e.mau_sac[i].gia_tri+"</td>";
									mau_sac +="<td>"+e.mau_sac[i].tile_sl+"</td>";
									mau_sac +="<td>"+e.mau_sac[i].tile_gt+"</td>";
									mau_sac +="</tr>";
								}
							mau_sac +="</tbody>";
							
							$('#mau_sac').append(mau_sac);
							var size ="";
							size +="<tbody>";
							for(var i=0;i<e.size.length;i++)
								{
									size +="<tr>";
									size +="<td>"+e.size[i].size+"</td>";
									
									size +="<td>"+e.size[i].so_luong+"</td>";
									size +="<td>"+e.size[i].gia_tri+"</td>";
									size +="<td>"+e.size[i].tile_sl+"</td>";
									size +="<td>"+e.size[i].tile_gt+"</td>";
									size +="</tr>";
								}
							size +="</tbody>";
							
							$('#size').append(size);
							}
						});
					});
				});
     </script>
   
  