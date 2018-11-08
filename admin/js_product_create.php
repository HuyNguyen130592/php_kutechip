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
    <script src="plugins/ckeditor/ckeditor.js"></script>
    <script src="plugins/Number_format/jquery.masknumber.js"></script>
    <script>
		$('#price').maskNumber({integer: true,});
    </script>
    <script>
      CKEDITOR.replace( 'editor', {
			filebrowserBrowseUrl: 'http://localhost:8080/www/web_1/admin/plugins/ckfinder/ckfinder.html',
			filebrowserImageBrowseUrl: 'http://localhost:8080/www/web_1/admin/plugins/ckfinder/ckfinder.html?Type=Images',
			filebrowserUploadUrl: 'http://localhost:8080/www/web_1/admin/plugins/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
			filebrowserImageUploadUrl: 'http://localhost:8080/www/web_1/admin/plugins/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
			filebrowserWindowWidth : '1000',
			filebrowserWindowHeight : '700'
		} );
		 CKEDITOR.replace( 'editor2', {
			filebrowserBrowseUrl: 'http://localhost:8080/www/web_1/admin/plugins/ckfinder/ckfinder.html',
			filebrowserImageBrowseUrl: 'http://localhost:8080/www/web_1/admin/plugins/ckfinder/ckfinder.html?Type=Images',
			filebrowserUploadUrl: 'http://localhost:8080/www/web_1/admin/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
			filebrowserImageUploadUrl: 'http://localhost:8080/www/web_1/admin/plugins/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
			filebrowserWindowWidth : '1000',
			filebrowserWindowHeight : '700'
		} );
      
      
	</script>
    <script type="text/javascript">
		function previewImg(event) {
	// Gán giá trị các file vào biến files
	
    var files = document.getElementById('img_file').files; 

    // Show khung chứa ảnh xem trước
   $('#small-img ul li').hide();

 
   

    // Dùng vòng lặp for để thêm các thẻ img vào khung chứa ảnh xem trước
    for (i = 0; i < files.length; i++)
    {
		var a = URL.createObjectURL(event.target.files[i]);
    	// Thêm thẻ img theo i
        $('#small-img ul').append('<li><img src="'+a+'" id="'+i+'" style="height:100;width:150px"/></li>');

        
    }   
};

function demo(event){
	
	var files = document.getElementById('main_img').files;
	var a = URL.createObjectURL(event.target.files[0]);
	
	 $('#img_main').attr('src', URL.createObjectURL(event.target.files[0]));
	
	};
    </script>