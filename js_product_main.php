
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
	<script type="text/javascript" src="http://localhost:8080/www/web_1/vendor/daterangepicker/moment.min.js"></script>
	<script type="text/javascript" src="http://localhost:8080/www/web_1/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="http://localhost:8080/www/web_1/vendor/slick/slick.min.js"></script>
	<script type="text/javascript" src="http://localhost:8080/www/web_1/js/slick-custom.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="http://localhost:8080/www/web_1/vendor/sweetalert/sweetalert.min.js"></script>
	

<!--===============================================================================================-->
	<script type="text/javascript" src="http://localhost:8080/www/web_1/vendor/noui/nouislider.min.js"></script>
	<script type="text/javascript">
		/*[ No ui ]
	    ===========================================================*/
	    var filterBar = document.getElementById('filter-bar');

	    noUiSlider.create(filterBar, {
	        start: [ 50, 200 ],
	        connect: true,
	        range: {
	            'min': 50,
	            'max': 200
	        }
	    });

	    var skipValues = [
	    document.getElementById('value-lower'),
	    document.getElementById('value-upper')
	    ];

	    filterBar.noUiSlider.on('update', function( values, handle ) {
	        skipValues[handle].innerHTML = Math.round(values[handle]) ;
	    });
	</script>
<!--===============================================================================================-->
	<script src="http://localhost:8080/www/web_1/js/main.js"></script>
