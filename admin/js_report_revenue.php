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
     <script src="plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
    <script src="plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
    <script src="https://code.highcharts.com/highcharts.src.js"></script>
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
					url:'model/report_revenue_create.php',
					type:'POST',
					dataType:"json",
					data:"date_send="+m,
					success: function(e){
						$('#pick_date').hide();
						$('#report_oder_general').show();
						
						
						
						var doanh_thu ="";
						doanh_thu +="<tbody>";
						for(var i=0;i<e.doanh_thu.length;i++)
							{
								doanh_thu +="<tr>";
								doanh_thu +="<td>"+e.doanh_thu[i].trang_thai+"</td>";
								doanh_thu +="<td>"+e.doanh_thu[i].so_luong+"</td>";
								
								doanh_thu +="</tr>";
							}
						doanh_thu +="</tbody>";
						$('#doanh_thu').append(doanh_thu);
						
							
						}
					
					});
				});
        });
    </script>