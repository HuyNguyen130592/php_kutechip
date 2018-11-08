<?php
	include("conn.php");
	mysqli_set_charset($conn, 'UTF8');
	include("session.php");
	 $fuserid=$_SESSION['login']['id'];
	$query=mysqli_query($conn,"SELECT * FROM `member`  INNER JOIN member_duty ON member.ID_Member_Duty=member_duty.ID_Member_Duty WHERE ID_Member='$fuserid'");
	$row=mysqli_fetch_array($query);
	?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Trang quản trị</title>
    <?php include("head.php"); ?>
<style>
		.row li {
	 margin-left : 10px;
	 margin-right:10px;
	 margin-top:10px;
	 margin-bottom:10px;
	  float: left;
	  list-style-type:none;
	}
	
	img {
	  border: 0 none;
	  display: inline-block;
	  height: auto;
	  max-width: 100%;
	  vertical-align: middle;
	}
		
	
</style>
</head>

<body class="skin-blue">
	<div class="wrapper">
 <!-- header+ sidemenu-->
    <?php include("sidemenu.php"); ?>
 <!--end header+side menu-->
 <!--content-->
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            DASHBOARD
            <small>Giao diện trang chủ</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Giao diện</li>
          </ol>
        </section>
        <section class="content">
     <!-- Main content -->
     	<div class="row">
        	<div class="col-md-12">
            	<div class="box box-primary">
                <?php
					$query6_1 = mysqli_query($conn,"SELECT * FROM `theme_index` WHERE id='TH001'");
					$row6_1 = mysqli_fetch_array($query6_1);
					$content6_1=$row6_1['content'];
					$logo_img = "../images/".$content6_1;
				?>
                
                <!-- form start -->
                <form role="form" method="post" action="model/theme_index_create.php" enctype="multipart/form-data">
                  <div class="box-body">
                 <fieldset>
                 	<legend>Thông tin chung của trang web</legend>
                  <div class="row">
                  <div class="col-xs-3">
                  	 <img class="img-responsive img-thumbnail" src="<?php if($content6_1!=null){echo $logo_img;}else{ echo"dist/img/download.png";} ?>" id="logo_main">
                     <div class="form-group">
                      <label for="exampleInputFile">Thay đổi logo của web</label>
                      <input type="file" id="logo_img" name="logo_img" onchange="demo_logo(event);" accept="image/*">
                      
                    </div> 
                  </div>
                  <div class="col-xs-9">
                    <div class="form-group">
                     <?php
					$query6_2 = mysqli_query($conn,"SELECT * FROM `theme_index` WHERE id='TH002'");
					$row6_2 = mysqli_fetch_array($query6_2);
					$content6_2=$row6_2['content'];
					
					?>
                      <label for="exampleInputEmail1">Tên trang web</label>
                      <input type="text" class="form-control" name="name_web" id="name_web" placeholder="Điền tên của web" value="<?php echo $content6_2;  ?>">
                    </div >
                     <div class="form-group">
                      <?php
					$query6_3 = mysqli_query($conn,"SELECT * FROM `theme_index` WHERE id='TH003'");
					$row6_3 = mysqli_fetch_array($query6_3);
					$content6_3=$row6_3['content'];
					
					?>
                      <label for="exampleInputEmail1">Địa chỉ</label>
                      <input type="text" class="form-control" name="add_web" id="add_web" placeholder="Điền địa chỉ" value="<?php echo $content6_3;  ?>">
                    </div >
                     <div class="form-group">
                     <?php
					$query6_4 = mysqli_query($conn,"SELECT * FROM `theme_index` WHERE id='TH004'");
					$row6_4 = mysqli_fetch_array($query6_4);
					$content6_4=$row6_4['content'];
					
					?>
                      <label for="exampleInputEmail1">Hotline</label>
                      <input type="text" class="form-control" name="hotline_web" id="hotline_web" placeholder="Điền số điện thoại hotline" value="<?php echo $content6_4; ?>">
                    </div >
                    <div class="form-group">
                    <?php
					$query6_5 = mysqli_query($conn,"SELECT * FROM `theme_index` WHERE id='TH005'");
					$row6_5 = mysqli_fetch_array($query6_5);
					$content6_5=$row6_5['content'];
					
					?>
                      <label for="exampleInputEmail1">Đường link facebook</label>
                      <input type="text" class="form-control" name="facebook" id="facebook" placeholder="Điền đường link facebook" value="<?php echo $content6_5; ?>">
                    </div >
                    <div class="form-group">
                    <?php
					$query6_6 = mysqli_query($conn,"SELECT * FROM `theme_index` WHERE id='TH006'");
					$row6_6 = mysqli_fetch_array($query6_6);
					$content6_6=$row6_6['content'];
					
					?>
                      <label for="exampleInputEmail1">Đường link youtube</label>
                      <input type="text" class="form-control" name="youtube" id="youtube" placeholder="Điền đường link youtube" value="<?php echo $content6_6; ?>">
                    </div >
                    <div class="form-group">
                     <?php
					$query6_7 = mysqli_query($conn,"SELECT * FROM `theme_index` WHERE id='TH007'");
					$row6_7 = mysqli_fetch_array($query6_7);
					$content6_7=$row6_7['content'];
					
					?>
                      <label for="exampleInputEmail1">Đường link instagram</label>
                      <input type="text" class="form-control" name="instagram" id="instagram" placeholder="Điền ường link instagram" value="<?php echo $content6_7; ?>">
                    </div >
                    <div class="form-group">
                     <?php
					$query6_8 = mysqli_query($conn,"SELECT * FROM `theme_index` WHERE id='TH008'");
					$row6_8 = mysqli_fetch_array($query6_8);
					$content6_8=$row6_8['content'];
					
					?>
                      <label>Giới thiệu về trang web</label>
                      <textarea class="form-control"  id="editor" rows="10" placeholder="About Us" name="description"><?php echo $content6_8; ?></textarea>
                    </div>                              
                  <div class="clearfix"></div>
                    </div>
                  </div>
                 </fieldset>
         <!--end_index_infomation-->
         <!--slide-->
         		<fieldset>
                 	<legend>Giao diện slide số 1</legend>
                  <div class="row">
                  <div class="col-xs-3">
                  <?php
					$query6_9 = mysqli_query($conn,"SELECT * FROM `theme_index` WHERE id='TH009'");
					$row6_9 = mysqli_fetch_array($query6_9);
					$content6_9=$row6_9['content'];
					$logo9_img = "../images/".$content6_9;
				?>
                  	 <img class="img-responsive img-thumbnail" src="<?php if($content6_9!=null){echo $logo9_img;}else{ echo"dist/img/download.png";} ?>" id="slide1_main">
                     <div class="form-group">
                      <label for="exampleInputFile">Thay đổi hình ảnh slide số 1</label>
                      <input type="file" id="slide1_img" name="slide1_img" onchange="demo_slide1(event);" accept="image/*">
                      
                    </div> 
                  </div>
                  <div class="col-xs-9">
                  	<div class="form-group">
                    <?php
					$query6_10 = mysqli_query($conn,"SELECT * FROM `theme_index` WHERE id='TH010'");
					$row6_10 = mysqli_fetch_array($query6_10);
					$content6_10=$row6_10['content'];
					
				?>
                      <label for="exampleInputEmail1">Tiêu đề</label>
                      <input type="text" class="form-control" name="slide1_title" id="slide1_title" placeholder="Điền tiêu đề" value="<?php echo $content6_10; ?>">
                    </div >
                    <div class="form-group">
                    <?php
					$query6_11 = mysqli_query($conn,"SELECT * FROM `theme_index` WHERE id='TH011'");
					$row6_11 = mysqli_fetch_array($query6_11);
					$content6_11=$row6_11['content'];
					
				?>
                      <label for="exampleInputEmail1">Nội dung</label>
                      <input type="text" class="form-control" name="slide1_content" id="slide1_content" placeholder="Điền nội dung" value="<?php echo $content6_11; ?>">
                    </div >
                     <div class="form-group">
                     <?php
					$query6_39 = mysqli_query($conn,"SELECT * FROM `theme_index` WHERE id='TH039'");
					$row6_39 = mysqli_fetch_array($query6_39);
					$content6_39=$row6_39['content'];
					
				?>
                      <label for="exampleInputEmail1">Đường link trang web</label>
                      <input type="text" class="form-control" name="slide1_link" id="slide1_link" placeholder="Điền đường link" value="<?php echo $content6_39; ?>">
                    </div >
                                                  
                  <div class="clearfix"></div>
                    </div>
                  </div>
                 </fieldset>
         <!--enslide-->
         <!--slide-->
         		<fieldset>
                 	<legend>Giao diện slide số 2</legend>
                  <div class="row">
                  <div class="col-xs-3">
                  <?php
					$query6_12 = mysqli_query($conn,"SELECT * FROM `theme_index` WHERE id='TH012'");
					$row6_12 = mysqli_fetch_array($query6_12);
					$content6_12=$row6_12['content'];
					$logo12_img = "../images/".$content6_12;
				?>
                  	 <img class="img-responsive img-thumbnail" src="<?php if($content6_12!=null){echo $logo12_img;}else{ echo"dist/img/download.png";} ?>" id="slide2_main">
                     <div class="form-group">
                      <label for="exampleInputFile">Thay đổi hình ảnh slide số 2</label>
                      <input type="file" id="slide2_img" name="slide2_img" onchange="demo_slide2(event);" accept="image/*">
                      
                    </div> 
                  </div>
                  <div class="col-xs-9">
                  <div class="form-group">
                  <?php
					$query6_13 = mysqli_query($conn,"SELECT * FROM `theme_index` WHERE id='TH013'");
					$row6_13 = mysqli_fetch_array($query6_13);
					$content6_13=$row6_13['content'];
					
				?>
                      <label for="exampleInputEmail1">Tiêu đề</label>
                      <input type="text" class="form-control" name="slide2_title" id="slide2_title" placeholder="Điền tiêu đề" value="<?php echo $content6_13; ?>">
                    </div >
                    <div class="form-group">
                    <?php
					$query6_14 = mysqli_query($conn,"SELECT * FROM `theme_index` WHERE id='TH014'");
					$row6_14 = mysqli_fetch_array($query6_14);
					$content6_14=$row6_14['content'];
					
				?>
                      <label for="exampleInputEmail1">Nội dung</label>
                      <input type="text" class="form-control" name="slide2_content" id="slide2_content" placeholder="Điền nội dung" value="<?php echo $content6_14; ?>">
                    </div >
                     <div class="form-group">
                     <?php
					$query6_40 = mysqli_query($conn,"SELECT * FROM `theme_index` WHERE id='TH040'");
					$row6_40 = mysqli_fetch_array($query6_40);
					$content6_40=$row6_40['content'];
					
				?>
                      <label for="exampleInputEmail1">Đường link trang web</label>
                      <input type="text" class="form-control" name="slide2_link" id="slide2_link" placeholder="Điền đường link" value="<?php echo $content6_40; ?>">
                    </div >
                                                  
                  <div class="clearfix"></div>
                    </div>
                  </div>
                 </fieldset>
         <!--enslide-->
         <!--slide-->
         		<fieldset>
                 	<legend>Giao diện slide số 3</legend>
                  <div class="row">
                  <div class="col-xs-3">
                  <?php
					$query6_15 = mysqli_query($conn,"SELECT * FROM `theme_index` WHERE id='TH015'");
					$row6_15 = mysqli_fetch_array($query6_15);
					$content6_15=$row6_15['content'];
					$logo15_img = "../images/".$content6_15;
				?>
                  	 <img class="img-responsive img-thumbnail" src="<?php if($content6_15!=null){echo $logo15_img;}else{ echo"dist/img/download.png";} ?>" id="slide3_main">
                     <div class="form-group">
                      <label for="exampleInputFile">Thay đổi hình ảnh slide số 3</label>
                      <input type="file" id="slide3_img" name="slide3_img" onchange="demo_slide3(event);" accept="image/*">
                      
                    </div> 
                  </div>
                  <div class="col-xs-9">
                  <div class="form-group">
                  <?php
					$query6_16 = mysqli_query($conn,"SELECT * FROM `theme_index` WHERE id='TH016'");
					$row6_16 = mysqli_fetch_array($query6_16);
					$content6_16=$row6_16['content'];
					
				?>
                      <label for="exampleInputEmail1">Tiêu đề</label>
                      <input type="text" class="form-control" name="slide3_title" id="slide3_title" placeholder="Điền tiêu đề" value="<?php echo $content6_16; ?>">
                    </div >
                    <div class="form-group">
                    <?php
					$query6_17 = mysqli_query($conn,"SELECT * FROM `theme_index` WHERE id='TH017'");
					$row6_17 = mysqli_fetch_array($query6_17);
					$content6_17=$row6_17['content'];
					
				?>
                      <label for="exampleInputEmail1">Nội dung</label>
                      <input type="text" class="form-control" name="slide3_content" id="slide3_content" placeholder="Điền nội dung" value="<?php echo $content6_17; ?>">
                    </div >
                     <div class="form-group">
                     <?php
					$query6_41 = mysqli_query($conn,"SELECT * FROM `theme_index` WHERE id='TH041'");
					$row6_41 = mysqli_fetch_array($query6_41);
					$content6_41=$row6_41['content'];
					
				?>
                      <label for="exampleInputEmail1">Đường link trang web</label>
                      <input type="text" class="form-control" name="slide3_link" id="slide3_link" placeholder="Điền đường link" value="<?php echo $content6_41; ?>">
                    </div >
                                                  
                  <div class="clearfix"></div>
                    </div>
                  </div>
                 </fieldset>
         <!--enslide-->
          <!--nhom sp 1-->
 				<fieldset>
                 	<legend>Nhóm sản phẩm 1</legend>
                  <div class="row">
                  <div class="col-xs-3">
                  <?php
					$query6_18 = mysqli_query($conn,"SELECT * FROM `theme_index` WHERE id='TH018'");
					$row6_18 = mysqli_fetch_array($query6_18);
					$content6_18=$row6_18['content'];
					$logo18_img = "../images/".$content6_18;
				?>
                  	 <img class="img-responsive img-thumbnail" src="<?php if($content6_18!=null){echo $logo18_img;}else{ echo"dist/img/download.png";} ?>" id="cate1_main">
                     <div class="form-group">
                      <label for="exampleInputFile">Thay đổi hình đại diện</label>
                      <input type="file" id="cate_img" name="cate1_img" onchange="demo_cate1(event);" accept="image/*">
                      
                    </div> 
                  </div>
                  <div class="col-xs-9">
                    
                     <div class="form-group">
                     <?php
					$query6_19 = mysqli_query($conn,"SELECT * FROM `theme_index` WHERE id='TH019'");
					$row6_19 = mysqli_fetch_array($query6_19);
					$content6_19=$row6_19['content'];
					
				?>
                    
                      <label>Chọn sản phẩm</label>
                      <select class="form-control" name="cat1">
                      <option >Chọn nhón sản phẩm</option>
                      <?php
					
					   $query4 = mysqli_query($conn,"SELECT * FROM `product_category`");
					   while($row4=mysqli_fetch_array($query4))
					   {
						   $id_category=$row4['id'];
						   $name_category=$row4['name'];
						   if($content6_19==$id_category)
						   {echo"<option value='$id_category' selected='selected'>$name_category</option>";}else{echo"<option value='$id_category'>$name_category</option>";}
                        
					   }
					?>
                      </select>
                    </div>
                                                  
                  <div class="clearfix"></div>
                    </div>
                  </div>
                 </fieldset>        	
       
        <!--end nhom sp1-->
          <!--nhom sp 2-->
 				<fieldset>
                 	<legend>Nhóm sản phẩm 2</legend>
                  <div class="row">
                  <div class="col-xs-3">
                  <?php
					$query6_20 = mysqli_query($conn,"SELECT * FROM `theme_index` WHERE id='TH020'");
					$row6_20 = mysqli_fetch_array($query6_20);
					$content6_20=$row6_20['content'];
					$logo20_img = "../images/".$content6_20;
				?>
                  	 <img class="img-responsive img-thumbnail" src="<?php if($content6_20!=null){echo $logo20_img;}else{ echo"dist/img/download.png";} ?>" id="cate2_main">
                     <div class="form-group">
                      <label for="exampleInputFile">Thay đổi hình đại diện</label>
                      <input type="file" id="cate2_img" name="cate2_img" onchange="demo_cate2(event);" accept="image/*">
                      
                    </div> 
                  </div>
                  <div class="col-xs-9">
                    
                     <div class="form-group">
                     <?php
					$query6_21 = mysqli_query($conn,"SELECT * FROM `theme_index` WHERE id='TH021'");
					$row6_21 = mysqli_fetch_array($query6_21);
					$content6_21=$row6_21['content'];
					
				?>
                    
                      <label>Chọn sản phẩm</label>
                      <select class="form-control" name="cat2">
                      <option>Chọn nhón sản phẩm</option>
                      <?php
					   $query4_2 = mysqli_query($conn,"SELECT * FROM `product_category`");
					   while($row4_2=mysqli_fetch_array($query4_2))
					   {
						   $id_category_2=$row4_2['id'];
						   $name_category_2=$row4_2['name'];
						    if($content6_21==$id_category_2)
						   {echo"<option value='$id_category_2' selected='selected'>$name_category_2</option>";}else{echo"<option value='$id_category_2'>$name_category_2</option>";}
                       
					   }
					?>
                      </select>
                    </div>
                                                  
                  <div class="clearfix"></div>
                    </div>
                  </div>
                 </fieldset>        	
       
        <!--end nhom sp2-->
          <!--nhom sp 3-->
 				<fieldset>
                 	<legend>Nhóm sản phẩm 3</legend>
                  <div class="row">
                  <div class="col-xs-3">
                  <?php
					$query6_22 = mysqli_query($conn,"SELECT * FROM `theme_index` WHERE id='TH022'");
					$row6_22 = mysqli_fetch_array($query6_22);
					$content6_22=$row6_22['content'];
					$logo22_img = "../images/".$content6_22;
				?>
                  	 <img class="img-responsive img-thumbnail" src="<?php if($content6_22!=null){echo $logo22_img;}else{ echo"dist/img/download.png";} ?>" id="cate3_main">
                     <div class="form-group">
                      <label for="exampleInputFile">Thay đổi hình đại diện</label>
                      <input type="file" id="cate3_img" name="cate3_img" onchange="demo_cate3(event);" accept="image/*">
                      
                    </div> 
                  </div>
                  <div class="col-xs-9">
                    
                     <div class="form-group">
                     <?php
					$query6_23 = mysqli_query($conn,"SELECT * FROM `theme_index` WHERE id='TH023'");
					$row6_23 = mysqli_fetch_array($query6_23);
					$content6_23=$row6_23['content'];
					
				?>
                    
                      <label>Chọn sản phẩm</label>
                      <select class="form-control" name="cat3">
                      <option>Chọn nhón sản phẩm</option>
                      <?php
					   $query4_3 = mysqli_query($conn,"SELECT * FROM `product_category`");
					   while($row4_3=mysqli_fetch_array($query4_3))
					   {
						   $id_category_3=$row4_3['id'];
						   $name_category_3=$row4_3['name'];
						   if($content6_23==$id_category_3)
						   {echo"<option value='$id_category_3' selected='selected'>$name_category_3</option>";}else{echo"<option value='$id_category_3'>$name_category_3</option>";}
                      
					   }
					?>
                      </select>
                    </div>
                                                  
                  <div class="clearfix"></div>
                    </div>
                  </div>
                 </fieldset>        	
       
        <!--end nhom sp1-->
        
        <!--san pham khuyen mai-->
 				<fieldset>
                 	<legend>Sản phẩm khuyến mãi</legend>
                  <div class="row">
                  <div class="col-xs-3">
                  <?php
					$query6_24 = mysqli_query($conn,"SELECT * FROM `theme_index` WHERE id='TH024'");
					$row6_24 = mysqli_fetch_array($query6_24);
					$content6_24=$row6_24['content'];
					$logo24_img = "../images/".$content6_24;
				?>
                  	 <img class="img-responsive img-thumbnail" src="<?php if($content6_24!=null){echo $logo24_img;}else{ echo"dist/img/download.png";} ?>" id="sale_main">
                     <div class="form-group">
                      <label for="exampleInputFile">Thay đổi hình đại diện sản phẩm</label>
                      <input type="file" id="sale_img" name="sale_img" onchange="demo_sale(event);" accept="image/*">
                      
                    </div> 
                  </div>
                  <div class="col-xs-9">
                    
                     <div class="form-group">
                     <?php
					$query6_25 = mysqli_query($conn,"SELECT * FROM `theme_index` WHERE id='TH025'");
					$row6_25 = mysqli_fetch_array($query6_25);
					$content6_25=$row6_25['content'];
					
				?>
                    
                      <label>Chọn sản phẩm</label>
                      <select class="form-control" name="sale">
                      <option>Chọn sản phẩm khuyến mãi</option>
                      <?php
					   $query4_4 = mysqli_query($conn,"SELECT * FROM `product_type`");
					   while($row4_4=mysqli_fetch_array($query4_4))
					   {
						   $id_category_4=$row4_4['ID_Product'];
						   $name_category_4=$row4_4['Name_Product'];
						    if($content6_25==$id_category_4)
						   {echo"<option value='$id_category_4' selected='selected'>$name_category_4</option>";}else{echo"<option value='$id_category_4'>$name_category_4</option>";}
                        
					   }
					?>
                      </select>
                    </div>
                                                  
                  <div class="clearfix"></div>
                    </div>
                  </div>
                 </fieldset>        	
       
        <!--end san pham khuyen mai-->

		<!--video-->
          		<fieldset>
                 	<legend>Giao diện Clip</legend>
                  <div class="row">
                  <div class="col-xs-3">
                  <?php
					$query6_26 = mysqli_query($conn,"SELECT * FROM `theme_index` WHERE id='TH026'");
					$row6_26 = mysqli_fetch_array($query6_26);
					$content6_26=$row6_26['content'];
					$logo26_img = "../images/".$content6_26;
				?>
                  	 <img class="img-responsive img-thumbnail" src="<?php if($content6_26!=null){echo $logo26_img;}else{ echo"dist/img/download.png";} ?>" id="clip_main">
                     <div class="form-group">
                      <label for="exampleInputFile">Thay đổi hình bìa clip</label>
                      <input type="file" id="clip_img" name="clip_img" onchange="demo_clip(event);" accept="image/*">
                      
                    </div> 
                  </div>
                  <div class="col-xs-9">
                    
                     <div class="form-group">
                     <?php
					$query6_27 = mysqli_query($conn,"SELECT * FROM `theme_index` WHERE id='TH027'");
					$row6_27 = mysqli_fetch_array($query6_27);
					$content6_27=$row6_27['content'];
					
				?>
                      <label for="exampleInputEmail1">Đường link trang youtube</label>
                      <input type="text" class="form-control" name="clip_link" id="clip_link" placeholder="Điền đường link" value="  <?php echo addslashes($content6_27); ?>">
                    
                    </div >
                                                  
                  <div class="clearfix"></div>
                    </div>
                  </div>
                 </fieldset>
       
        <!--end video-->
		<!--instagram-->
        	<fieldset>
            	<legend>Hình ảnh Instagram</legend>
                  <div class="row" id="product_img_detail">
                  
                      <div id="small-img" class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <ul>
                       
                          <li>
                          <?php
					$query6_28 = mysqli_query($conn,"SELECT * FROM `theme_index` WHERE id='TH028'");
					$row6_28 = mysqli_fetch_array($query6_28);
					$content6_28=$row6_28['content'];
					$logo28_img = "../images/".$content6_28;
				?>
                            <img src="<?php if($content6_28!=null){echo $logo28_img;}else{ echo"http://placehold.it/150x100";} ?>" class="img-responsive inline-block" alt="Responsive image"  />
                          </li>
                          <li>
                          <?php
					$query6_29 = mysqli_query($conn,"SELECT * FROM `theme_index` WHERE id='TH029'");
					$row6_29 = mysqli_fetch_array($query6_29);
					$content6_29=$row6_29['content'];
					$logo29_img = "../images/".$content6_29;
				?>
                            <img src="<?php if($content6_29!=null){echo $logo29_img;}else{ echo"http://placehold.it/150x100";} ?>" class="img-responsive inline-block" alt="Responsive image" />
                          </li>
                          <li>
                          <?php
					$query6_30 = mysqli_query($conn,"SELECT * FROM `theme_index` WHERE id='TH030'");
					$row6_30 = mysqli_fetch_array($query6_30);
					$content6_30=$row6_30['content'];
					$logo30_img = "../images/".$content6_30;
				?>
                            <img src="<?php if($content6_30!=null){echo $logo30_img;}else{ echo"http://placehold.it/150x100";} ?>" class="img-responsive inline-block" alt="Responsive image" />
                          </li>
                          <li>
                          <?php
					$query6_31 = mysqli_query($conn,"SELECT * FROM `theme_index` WHERE id='TH031'");
					$row6_31 = mysqli_fetch_array($query6_31);
					$content6_31=$row6_31['content'];
					$logo31_img = "../images/".$content6_31;
				?>
                            <img src="<?php if($content6_31!=null){echo $logo31_img;}else{ echo"http://placehold.it/150x100";} ?>" class="img-responsive inline-block" alt="Responsive image" />
                          </li>
                          <li>
                          <?php
					$query6_32 = mysqli_query($conn,"SELECT * FROM `theme_index` WHERE id='TH032'");
					$row6_32 = mysqli_fetch_array($query6_32);
					$content6_32=$row6_32['content'];
					$logo32_img = "../images/".$content6_32;
				?>
                            <img src="<?php if($content6_32!=null){echo $logo32_img;}else{ echo"http://placehold.it/150x100";} ?>" class="img-responsive inline-block" alt="Responsive image" />
                          </li>
                        </ul>
                      </div>
                    </div>
                    <div class="row">
                    	<div class="col-md-12">
                    	<div class="form-group">
                          <label for="exampleInputFile">Thay đổi hình ảnh instagram</label>
                          <input type="file" id="img_file" name="instagram_file[]" multiple="true" onchange="previewImg(event);">
                          
                        </div>
                        </div>
                  </fieldset>
                <!---end instagram-->
               <!--Ưu đãi hoặc chính sách giao hàng-->
               <fieldset>
               <legend>Ưu đãi hoặc chính sách giao hàng</legend>
               	<div class="row">
                	<div class="col-xs-12">
                    	<div class="form-group">
                        <?php
					$query6_33 = mysqli_query($conn,"SELECT * FROM `theme_index` WHERE id='TH033'");
					$row6_33 = mysqli_fetch_array($query6_33);
					$content6_33=$row6_33['content'];
					
				?>
                          <label for="exampleInputEmail1">Têu đề số 1</label>
                          <input type="text" class="form-control" name="title_prior1" id="title_prior1" placeholder="Điền tiêu đề" value="<?php echo $content6_33; ?>">
                   		 </div >
                    	
                        <div class="form-group">
                        <?php
					$query6_34 = mysqli_query($conn,"SELECT * FROM `theme_index` WHERE id='TH034'");
					$row6_34 = mysqli_fetch_array($query6_34);
					$content6_34=$row6_34['content'];
					
				?>
                          <label for="exampleInputEmail1">Nội dung số 1</label>
                          <input type="text" class="form-control" name="content_prior1" id="content_prior1" placeholder="Điền tiêu đề" value="<?php echo $content6_34; ?>">
                   		 </div >
                       <div class="form-group">
                       <?php
					$query6_35 = mysqli_query($conn,"SELECT * FROM `theme_index` WHERE id='TH035'");
					$row6_35 = mysqli_fetch_array($query6_35);
					$content6_35=$row6_35['content'];
					
				?>
                          <label for="exampleInputEmail1">Têu đề số 2</label>
                          <input type="text" class="form-control" name="title_prior2" id="title_prior2" placeholder="Điền tiêu đề" value="<?php echo $content6_35; ?>">
                   		 </div >
                    	
                        <div class="form-group">
                        <?php
					$query6_36 = mysqli_query($conn,"SELECT * FROM `theme_index` WHERE id='TH036'");
					$row6_36 = mysqli_fetch_array($query6_36);
					$content6_36=$row6_36['content'];
					
				?>
                          <label for="exampleInputEmail1">Nội dung số 2</label>
                          <input type="text" class="form-control" name="content_prior2" id="content_prior2" placeholder="Điền tiêu đề" value="<?php echo $content6_36; ?>">
                   		 </div >
                       <div class="form-group">
                       <?php
					$query6_37 = mysqli_query($conn,"SELECT * FROM `theme_index` WHERE id='TH037'");
					$row6_37 = mysqli_fetch_array($query6_37);
					$content6_37=$row6_37['content'];
					
				?>
                          <label for="exampleInputEmail1">Têu đề số 3</label>
                          <input type="text" class="form-control" name="title_prior3" id="title_prior3" placeholder="Điền tiêu đề" value="<?php echo $content6_37; ?>">
                   		 </div >
                    	
                        <div class="form-group">
                        <?php
					$query6_38 = mysqli_query($conn,"SELECT * FROM `theme_index` WHERE id='TH038'");
					$row6_38 = mysqli_fetch_array($query6_38);
					$content6_38=$row6_38['content'];
					
				?>
                          <label for="exampleInputEmail1">Nội dung số 3</label>
                          <input type="text" class="form-control" name="content_prior3" id="content_prior3" placeholder="Điền tiêu đề" value="<?php echo $content6_38; ?>">
                   		 </div >

                    </div>	
                </div>
                </fieldset>
               <!--end chính sách-->
                    </div>
					<?php mysqli_close($conn); ?>
                  <div class="box-footer">
                  <div class="row">
                  	
                    <div class="col-xs-12">
                    <button type="submit" class="btn btn-primary pull-right">Tạo</button>
                    </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
        </div>
     <!-- end main content -->
     </section>
     
    </div>
 <!--end content-->
 	
 
    </div>
    
<?php include("js_theme_index.php"); ?>
</body>
</html>
