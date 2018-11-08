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
	 	$(document).ready(function() {
          
        
			
            $.ajax({
				url:'model/report_index.php',
				type:'POST',
				dataType:"json",
				data:{data:'success'},
				success: function(e){
					console.log(e);
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
										Highcharts.chart('container', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Doanh số bán hàng'
    },
    subtitle: {
        
    },
    xAxis: {
        type: 'category',
        labels: {
            rotation: -45,
            style: {
                fontSize: '13px',
                fontFamily: 'Verdana, sans-serif'
            }
        }
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Doanh số (vnd)'
        }
    },
    legend: {
        enabled: false
    },
    tooltip: {
        pointFormat: 'Doanh số: <b>{point.y} vnd</b>'
    },
    series: [{
        name: 'doanh số',
        data: e,
        dataLabels: {
            enabled: true,
            rotation: -90,
            color: '#FFFFFF',
            align: 'right',
            format: '{point.y}', // one decimal
            y: 10, // 10 pixels down from the top
            style: {
                fontSize: '13px',
                fontFamily: 'Verdana, sans-serif'
            }
        }
    }]
});
					
					
					}
				
				});
        });
     </script>