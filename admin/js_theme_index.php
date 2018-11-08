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
    <script>
      CKEDITOR.replace( 'editor', {
    filebrowserBrowseUrl: 'http://localhost:8080/www/AdminLTE-master/plugins/ckfinder/ckfinder.html',
    filebrowserImageBrowseUrl: 'http://localhost:8080/www/AdminLTE-master/plugins/ckfinder/ckfinder.html?Type=Images',
    filebrowserUploadUrl: 'http://localhost:8080/www/AdminLTE-master/plugins/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
    filebrowserImageUploadUrl: 'http://localhost:8080/www/AdminLTE-master/plugins/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
    filebrowserWindowWidth : '1000',
    filebrowserWindowHeight : '700'
} );
      
      
	</script>
    <script type="text/javascript">
		function previewImg(event) {
	// Gán giá trị các file vào biến files
	alert("Hình ảnh nên chọn kích thước 720x720");
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

function demo_logo(event){
	alert("logo nên chọn kích thước 400x400");
	var files = document.getElementById('logo_img').files;
	var a = URL.createObjectURL(event.target.files[0]);
	
	 $('#logo_main').attr('src', URL.createObjectURL(event.target.files[0]));
	
	};
function demo_slide1(event){
	alert("Hình ảnh nên chọn kích thước 1920x570");
	var files = document.getElementById('slide1_img').files;
	var a = URL.createObjectURL(event.target.files[0]);
	
	 $('#slide1_main').attr('src', URL.createObjectURL(event.target.files[0]));
	
	};
function demo_slide2(event){
	alert("Hình ảnh nên chọn kích thước 1920x570");
	var files = document.getElementById('slide2_img').files;
	var a = URL.createObjectURL(event.target.files[0]);
	
	 $('#slide2_main').attr('src', URL.createObjectURL(event.target.files[0]));
	
	};
function demo_slide3(event){
	alert("Hình ảnh nên chọn kích thước 1920x570");
	var files = document.getElementById('slide3_img').files;
	var a = URL.createObjectURL(event.target.files[0]);
	
	 $('#slide3_main').attr('src', URL.createObjectURL(event.target.files[0]));
	
	};
function demo_clip(event){
	alert("Hình ảnh nên chọn kích thước 1921x998");
	var files = document.getElementById('clip_img').files;
	var a = URL.createObjectURL(event.target.files[0]);
	
	 $('#clip_main').attr('src', URL.createObjectURL(event.target.files[0]));
	
	};
function demo_sale(event){
	alert("Hình ảnh nên chọn kích thước 720x539");
	var files = document.getElementById('sale_img').files;
	var a = URL.createObjectURL(event.target.files[0]);
	
	 $('#sale_main').attr('src', URL.createObjectURL(event.target.files[0]));
	
	};
function demo_cate1(event){
	alert("Hình ảnh nên chọn kích thước 720x660");
	
	
	 $('#cate1_main').attr('src', URL.createObjectURL(event.target.files[0]));
	
	};
function demo_cate2(event){
	alert("Hình ảnh nên chọn kích thước 720x660");
	
	
	 $('#cate2_main').attr('src', URL.createObjectURL(event.target.files[0]));
	
	};
function demo_cate3(event){
	alert("Hình ảnh nên chọn kích thước 720x660");
	
	
	 $('#cate3_main').attr('src', URL.createObjectURL(event.target.files[0]));
	
	};
    </script>
   <script>
   $(document).ready(function(){
   	$('#demo_img').change(function(event){
	
	
	
	 $('#demo').attr('src', URL.createObjectURL(event.target.files[0]));
	});
   });
   </script>