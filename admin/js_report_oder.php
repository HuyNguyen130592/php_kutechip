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
					url:'model/report_oder_create.php',
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
								doanh_thu +="<td>"+e.doanh_thu[i].gia_tri+"</td>";
								doanh_thu +="<td>"+e.doanh_thu[i].tile_sl+"</td>";
								doanh_thu +="<td>"+e.doanh_thu[i].tile_gt+"</td>";
								doanh_thu +="</tr>";
							}
						doanh_thu +="</tbody>";
						
						$('#doanh_thu').append(doanh_thu);
						
						var dich_vu_giao_hang ="";
						dich_vu_giao_hang +="<tbody>";
						for(var i=0;i<e.dich_vu_giao_hang.length;i++)
							{
								dich_vu_giao_hang +="<tr>";
								dich_vu_giao_hang +="<td>"+e.dich_vu_giao_hang[i].ten_gh+"</td>";
								dich_vu_giao_hang +="<td>"+e.dich_vu_giao_hang[i].so_luong+"</td>";
								dich_vu_giao_hang +="<td>"+e.dich_vu_giao_hang[i].gia_tri+"</td>";
								dich_vu_giao_hang +="<td>"+e.dich_vu_giao_hang[i].tile_sl+"</td>";
								dich_vu_giao_hang +="<td>"+e.dich_vu_giao_hang[i].tile_gt+"</td>";
								dich_vu_giao_hang +="<td>"+e.dich_vu_giao_hang[i].tien_ship+"</td>";
								
								dich_vu_giao_hang +="</tr>";
							}
						dich_vu_giao_hang +="</tbody>";
						
						$('#dich_vu_giao_hang').append(dich_vu_giao_hang);
						
						var khu_vuc ="";
						khu_vuc +="<tbody>";
						for(var i=0;i<e.khu_vuc.length;i++)
							{
								khu_vuc +="<tr>";
								khu_vuc +="<td>"+e.khu_vuc[i].khu_vuc+"</td>";
								khu_vuc +="<td>"+e.khu_vuc[i].so_luong+"</td>";
								khu_vuc +="<td>"+e.khu_vuc[i].gia_tri+"</td>";
								khu_vuc +="<td>"+e.khu_vuc[i].tile_sl+"</td>";
								khu_vuc +="<td>"+e.khu_vuc[i].tile_gt+"</td>";
								khu_vuc +="<td>"+e.khu_vuc[i].tien_ship+"</td>";
								
								khu_vuc +="</tr>";
							}
						khu_vuc +="</tbody>";
						
						$('#khu_vuc_dat_hang_1').append(khu_vuc);
						
						var chung_loai ="";
						khu_vuc +="<tbody>";
						for(var i=0;i<e.chung_loai.length;i++)
							{
								chung_loai +="<tr>";
								chung_loai +="<td>"+e.chung_loai[i].chung_loai+"</td>";
								chung_loai +="<td>"+e.chung_loai[i].so_luong+"</td>";
								chung_loai +="<td>"+e.chung_loai[i].gia_tri+"</td>";
								chung_loai +="<td>"+e.chung_loai[i].tile_sl+"</td>";
								chung_loai +="<td>"+e.chung_loai[i].tile_gt+"</td>";
								
								
								khu_vuc +="</tr>";
							}
						khu_vuc +="</tbody>";
						
						$('#chung_loai_1').append(chung_loai);
						
						var nhom_san_pham ="";
						khu_vuc +="<tbody>";
						for(var i=0;i<e.nhom_san_pham.length;i++)
							{
								nhom_san_pham +="<tr>";
								nhom_san_pham +="<td>"+e.nhom_san_pham[i].nhom_sp+"</td>";
								nhom_san_pham +="<td>"+e.nhom_san_pham[i].so_luong+"</td>";
								nhom_san_pham +="<td>"+e.nhom_san_pham[i].gia_tri+"</td>";
								nhom_san_pham +="<td>"+e.nhom_san_pham[i].tile_sl+"</td>";
								nhom_san_pham +="<td>"+e.nhom_san_pham[i].tile_gt+"</td>";
								
								
								nhom_san_pham +="</tr>";
							}
						nhom_san_pham +="</tbody>";
						
						$('#nhom_sp').append(nhom_san_pham);
						
						var san_pham ="";
						khu_vuc +="<tbody>";
						for(var i=0;i<e.san_pham.length;i++)
							{
								san_pham +="<tr>";
								san_pham +="<td>"+e.san_pham[i].san_pham+"</td>";
								san_pham +="<td>"+e.san_pham[i].so_luong+"</td>";
								san_pham +="<td>"+e.san_pham[i].gia_tri+"</td>";
								san_pham +="<td>"+e.san_pham[i].tile_sl+"</td>";
								san_pham +="<td>"+e.san_pham[i].tile_gt+"</td>";
								
								
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
						
						
						Highcharts.theme = {
											colors: ['#2b908f', '#90ee7e', '#f45b5b', '#7798BF', '#aaeeee', '#ff0066',
												'#eeaaee', '#55BF3B', '#DF5353', '#7798BF', '#aaeeee'],
											chart: {
												backgroundColor: {
													linearGradient: { x1: 0, y1: 0, x2: 1, y2: 1 },
													stops: [
														[0, '#2a2a2b'],
														[1, '#3e3e40']
													]
												},
												style: {
													fontFamily: '\'Unica One\', sans-serif'
												},
												plotBorderColor: '#606063'
											},
											title: {
												style: {
													color: '#E0E0E3',
													textTransform: 'uppercase',
													fontSize: '20px'
												}
											},
											subtitle: {
												style: {
													color: '#E0E0E3',
													textTransform: 'uppercase'
												}
											},
											xAxis: {
												gridLineColor: '#707073',
												labels: {
													style: {
														color: '#E0E0E3'
													}
												},
												lineColor: '#707073',
												minorGridLineColor: '#505053',
												tickColor: '#707073',
												title: {
													style: {
														color: '#A0A0A3'
										
													}
												}
											},
											yAxis: {
												gridLineColor: '#707073',
												labels: {
													style: {
														color: '#E0E0E3'
													}
												},
												lineColor: '#707073',
												minorGridLineColor: '#505053',
												tickColor: '#707073',
												tickWidth: 1,
												title: {
													style: {
														color: '#A0A0A3'
													}
												}
											},
											tooltip: {
												backgroundColor: 'rgba(0, 0, 0, 0.85)',
												style: {
													color: '#F0F0F0'
												}
											},
											plotOptions: {
												series: {
													dataLabels: {
														color: '#B0B0B3'
													},
													marker: {
														lineColor: '#333'
													}
												},
												boxplot: {
													fillColor: '#505053'
												},
												candlestick: {
													lineColor: 'white'
												},
												errorbar: {
													color: 'white'
												}
											},
											legend: {
												itemStyle: {
													color: '#E0E0E3'
												},
												itemHoverStyle: {
													color: '#FFF'
												},
												itemHiddenStyle: {
													color: '#606063'
												}
											},
											credits: {
												style: {
													color: '#666'
												}
											},
											labels: {
												style: {
													color: '#707073'
												}
											},
										
											drilldown: {
												activeAxisLabelStyle: {
													color: '#F0F0F3'
												},
												activeDataLabelStyle: {
													color: '#F0F0F3'
												}
											},
										
											navigation: {
												buttonOptions: {
													symbolStroke: '#DDDDDD',
													theme: {
														fill: '#505053'
													}
												}
											},
										
											// scroll charts
											rangeSelector: {
												buttonTheme: {
													fill: '#505053',
													stroke: '#000000',
													style: {
														color: '#CCC'
													},
													states: {
														hover: {
															fill: '#707073',
															stroke: '#000000',
															style: {
																color: 'white'
															}
														},
														select: {
															fill: '#000003',
															stroke: '#000000',
															style: {
																color: 'white'
															}
														}
													}
												},
												inputBoxBorderColor: '#505053',
												inputStyle: {
													backgroundColor: '#333',
													color: 'silver'
												},
												labelStyle: {
													color: 'silver'
												}
											},
										
											navigator: {
												handles: {
													backgroundColor: '#666',
													borderColor: '#AAA'
												},
												outlineColor: '#CCC',
												maskFill: 'rgba(255,255,255,0.1)',
												series: {
													color: '#7798BF',
													lineColor: '#A6C7ED'
												},
												xAxis: {
													gridLineColor: '#505053'
												}
											},
										
											scrollbar: {
												barBackgroundColor: '#808083',
												barBorderColor: '#808083',
												buttonArrowColor: '#CCC',
												buttonBackgroundColor: '#606063',
												buttonBorderColor: '#606063',
												rifleColor: '#FFF',
												trackBackgroundColor: '#404043',
												trackBorderColor: '#404043'
											},
										
											// special colors for some of the
											legendBackgroundColor: 'rgba(0, 0, 0, 0.5)',
											background2: '#505053',
											dataLabelsColor: '#B0B0B3',
											textColor: '#C0C0C0',
											contrastTextColor: '#F0F0F3',
											maskColor: 'rgba(255,255,255,0.3)'
										};
										Highcharts.setOptions(Highcharts.theme);
						
						Highcharts.chart('doanh_so_thang', {
																chart: {
																	zoomType: 'xy'
																},
																title: {
																	text: 'Doanh số bán hàng theo tháng'
																},
																subtitle: {
																	text: 'Doanh số - Số đơn - Số sản phẩm'
																},
																xAxis: [{
																	categories: e.bieu_do_thang.thang,
																	crosshair: true
																}],
																yAxis: [{ // Primary yAxis
																	labels: {
																		format: '{value}',
																		style: {
																			color: Highcharts.getOptions().colors[2]
																		}
																	},
																	title: {
																		text: 'Số đơn',
																		style: {
																			color: Highcharts.getOptions().colors[2]
																		}
																	},
																	opposite: true
															
																}, { // Secondary yAxis
																	gridLineWidth: 0,
																	title: {
																		text: 'Doanh số',
																		style: {
																			color: Highcharts.getOptions().colors[0]
																		}
																	},
																	labels: {
																		format: '{value}',
																		style: {
																			color: Highcharts.getOptions().colors[0]
																		}
																	}
															
																}, { // Tertiary yAxis
																	gridLineWidth: 0,
																	title: {
																		text: 'Số sản phẩm',
																		style: {
																			color: Highcharts.getOptions().colors[1]
																		}
																	},
																	labels: {
																		format: '{value} ',
																		style: {
																			color: Highcharts.getOptions().colors[1]
																		}
																	},
																	opposite: true
																}],
																tooltip: {
																	shared: true
																},
																legend: {
																	layout: 'vertical',
																	align: 'left',
																	x: 80,
																	verticalAlign: 'top',
																	y: 55,
																	floating: true,
																	backgroundColor: (Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'
																},
																series: [{
																	name: 'Doanh số',
																	type: 'column',
																	yAxis: 1,
																	data: e.bieu_do_thang.gt_thang,
																	tooltip: {
																		valueSuffix: ' VND'
																	}
															
																}, {
																	name: 'Số sản phẩm',
																	type: 'spline',
																	yAxis: 2,
																	data: e.bieu_do_thang.sl_thang,
																	marker: {
																		enabled: false
																	},
																	dashStyle: 'shortdot',
																	tooltip: {
																		valueSuffix: ' cái'
																	}
															
																}, {
																	name: 'Số đơn',
																	type: 'spline',
																	data: e.bieu_do_thang.sd_thang,
																	tooltip: {
																		valueSuffix: ' đơn'
																	}
																}]
															});
										
						Highcharts.chart('doanh_so_tuan', {
																chart: {
																	zoomType: 'xy'
																},
																title: {
																	text: 'Doanh số bán hàng theo tuần'
																},
																subtitle: {
																	text: 'Doanh số - Số đơn - Số sản phẩm'
																},
																xAxis: [{
																	categories: e.bieu_do_tuan.tuan,
																	crosshair: true
																}],
																yAxis: [{ // Primary yAxis
																	labels: {
																		format: '{value}',
																		style: {
																			color: Highcharts.getOptions().colors[2]
																		}
																	},
																	title: {
																		text: 'Số đơn',
																		style: {
																			color: Highcharts.getOptions().colors[2]
																		}
																	},
																	opposite: true
															
																}, { // Secondary yAxis
																	gridLineWidth: 0,
																	title: {
																		text: 'Doanh số',
																		style: {
																			color: Highcharts.getOptions().colors[0]
																		}
																	},
																	labels: {
																		format: '{value}',
																		style: {
																			color: Highcharts.getOptions().colors[0]
																		}
																	}
															
																}, { // Tertiary yAxis
																	gridLineWidth: 0,
																	title: {
																		text: 'Số sản phẩm',
																		style: {
																			color: Highcharts.getOptions().colors[1]
																		}
																	},
																	labels: {
																		format: '{value} ',
																		style: {
																			color: Highcharts.getOptions().colors[1]
																		}
																	},
																	opposite: true
																}],
																tooltip: {
																	shared: true
																},
																legend: {
																	layout: 'vertical',
																	align: 'left',
																	x: 80,
																	verticalAlign: 'top',
																	y: 55,
																	floating: true,
																	backgroundColor: (Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'
																},
																series: [{
																	name: 'Doanh số',
																	type: 'column',
																	yAxis: 1,
																	data: e.bieu_do_tuan.gt_tuan,
																	tooltip: {
																		valueSuffix: ' VND'
																	}
															
																}, {
																	name: 'Số sản phẩm',
																	type: 'spline',
																	yAxis: 2,
																	data: e.bieu_do_tuan.sl_tuan,
																	marker: {
																		enabled: false
																	},
																	dashStyle: 'shortdot',
																	tooltip: {
																		valueSuffix: ' cái'
																	}
															
																}, {
																	name: 'Số đơn',
																	type: 'spline',
																	data: e.bieu_do_tuan.sd_tuan,
																	tooltip: {
																		valueSuffix: ' đơn'
																	}
																}]
															});
						
						Highcharts.chart('doanh_so_ngay', {
																chart: {
																	zoomType: 'xy'
																},
																title: {
																	text: 'Doanh số bán hàng theo ngày'
																},
																subtitle: {
																	text: 'Doanh số - Số đơn - Số sản phẩm'
																},
																xAxis: [{
																	categories: e.bieu_do_ngay.ngay,
																	crosshair: true
																}],
																yAxis: [{ // Primary yAxis
																	labels: {
																		format: '{value}',
																		style: {
																			color: Highcharts.getOptions().colors[2]
																		}
																	},
																	title: {
																		text: 'Số đơn',
																		style: {
																			color: Highcharts.getOptions().colors[2]
																		}
																	},
																	opposite: true
															
																}, { // Secondary yAxis
																	gridLineWidth: 0,
																	title: {
																		text: 'Doanh số',
																		style: {
																			color: Highcharts.getOptions().colors[0]
																		}
																	},
																	labels: {
																		format: '{value}',
																		style: {
																			color: Highcharts.getOptions().colors[0]
																		}
																	}
															
																}, { // Tertiary yAxis
																	gridLineWidth: 0,
																	title: {
																		text: 'Số sản phẩm',
																		style: {
																			color: Highcharts.getOptions().colors[1]
																		}
																	},
																	labels: {
																		format: '{value} ',
																		style: {
																			color: Highcharts.getOptions().colors[1]
																		}
																	},
																	opposite: true
																}],
																tooltip: {
																	shared: true
																},
																legend: {
																	layout: 'vertical',
																	align: 'left',
																	x: 80,
																	verticalAlign: 'top',
																	y: 55,
																	floating: true,
																	backgroundColor: (Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'
																},
																series: [{
																	name: 'Doanh số',
																	type: 'column',
																	yAxis: 1,
																	data: e.bieu_do_ngay.gt_ngay,
																	tooltip: {
																		valueSuffix: ' VND'
																	}
															
																}, {
																	name: 'Số sản phẩm',
																	type: 'spline',
																	yAxis: 2,
																	data: e.bieu_do_ngay.sl_ngay,
																	marker: {
																		enabled: false
																	},
																	dashStyle: 'shortdot',
																	tooltip: {
																		valueSuffix: ' cái'
																	}
															
																}, {
																	name: 'Số đơn',
																	type: 'spline',
																	data: e.bieu_do_ngay.sd_ngay,
																	tooltip: {
																		valueSuffix: ' đơn'
																	}
																}]
															});
							
						}
					
					});
				});
        });
    </script>