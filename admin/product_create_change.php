<?php
	include("conn.php");
	mysqli_set_charset($conn, 'UTF8');
	include("session.php");
	 $fuserid=$_SESSION['login']['id'];
	$query=mysqli_query($conn,"SELECT * FROM `member`  INNER JOIN member_duty ON member.ID_Member_Duty=member_duty.ID_Member_Duty WHERE ID_Member='$fuserid'");
	$row=mysqli_fetch_array($query);
	$id_product_show = $_GET['id'];
	
	
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
            <small>Edit sản phẩm</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Edit sản phẩm</li>
          </ol>
        </section>
        <section class="content">
     <!-- Main content -->
     	<div class="row">
        	<div class="col-md-12">
            	<div class="box box-primary">
                <?php
					$query7= mysqli_query($conn,"SELECT * FROM `product_type` INNER JOIN product_category on product_type.id_category=product_category.id WHERE product_type.ID_Product='$id_product_show'");
					$row7=mysqli_fetch_array($query7);
					$name_product_show=$row7['Name_Product'];
					$id_category_show=$row7['id_category'];
					$img_show=$row7['Product_Type_Image'];
					$description_show=$row7['Product_Type_Description'];
					$product_check_show=$row7['product_type_check'];
					$product_additional_infomation = $row7['additional_description'];
				?>
                <!-- form start -->
                <form role="form" method="post" action="model/product_create_save _change.php?id=<?php echo $id_product_show ?>" enctype="multipart/form-data">
                  <div class="box-body">
                  <div class="row">
                  <div class="col-xs-3">
                  	 <img class="img-responsive img-thumbnail" src="dist/img/<?php echo $img_show?>" id="img_main">
                     <div class="form-group">
                      <label for="exampleInputFile">Thay đổi hình đại diện sản phẩm</label>
                      <input type="file" id="main_img" name="main_img" onchange="demo(event);" accept="image/*">
                      <div class="checkbox">
                      	<label style='margin-right:10px'>
                        <?php
                        if($product_check_show==1){echo"<input type='checkbox' name='product_show_web' value=1 checked> Sản phẩm trưng bày trên web";}else{echo"<input type='checkbox' name='product_show_web' value=1 > Sản phẩm trưng bày trên web";}
						?>
                        </label>
                      </div>
                      
					  	
					 
                    </div> 
                  </div>
                  <div class="col-xs-9">
                    <div class="form-group">
                    
                      <label for="exampleInputEmail1">Tên sản phẩm</label>
                      <input type="text" class="form-control" name="name" id="name" placeholder="Điền tên sản phẩm" value="<?php echo $name_product_show?>">
                    </div >
                    <div class="form-group">
                    
                      <label>Chọn nhóm sản phẩm</label>
                      <select class="form-control" name="category">
                      <?php
					   $query4 = mysqli_query($conn,"SELECT * FROM `product_category`");
					   while($row4=mysqli_fetch_array($query4))
					   {
						   $id_category=$row4['id'];
						   $name_category=$row4['name'];
						   if($id_category==$id_category_show)
						   	  {
								echo"<option value='$id_category' selected='selected'>$name_category</option>";  
							   }else{echo"<option value='$id_category'>$name_category</option>";}
                        
					   }
					?>
                      </select>
                    </div>
                    <div class="form-group">
                    <?php 
						$query1_1 = mysqli_query($conn,"SELECT * FROM product_sale_price WHERE id ='$id_product_show'");
						$row1_1 = mysqli_fetch_array($query1_1);
						$price = $row1_1['price'];
					?>
                      <label for="exampleInputEmail1">Giá bán</label>
                      <input type="text" class="form-control" name="price" id="price" placeholder="Điền giá bán" value="<?php echo number_format($price); ?>">
                    </div >
                    <div class="form-group">
                      <label>Mô tả về sản phẩm</label>
                      <textarea class="form-control"  id="editor" rows="10" placeholder="Điền vào mô tả sản phẩm" name="description"><?php echo $description_show?></textarea>
                    </div>
                    <div class="form-group">
                      <label>Thông tin bổ sung</label>
                      <textarea class="form-control"  id="editor2" rows="10" placeholder="Điền vào thông tin bổ sung" name="additional_infomation"><?php echo $product_additional_infomation; ?></textarea>
                    </div>                              
                  <div class="clearfix"></div>
                    </div>
                  </div>
                  <div class="row">
                  <div class="col-md-12">
                  	<div class="checkbox">
                    <fieldset>
                    	<legend> Tick chọn nếu sản phẩm có màu và size như bên dưới</legend>
                        <?php 
						 $query5= mysqli_query($conn,"SELECT * FROM `product_main` WHERE ID_Product_Type='$id_product_show'");
						 while($row5=mysqli_fetch_array($query5))
						 {
							 $id_product_main_show= $row5['ID_Product'];
							 $name_product_main_show = $row5['Product_Name'];
							 $check_product_main_show= $row5['check_product_main'];
                      echo"<label style='margin-right:20px'>";
					  if($check_product_main_show==1)
					  	 {
							  echo"<input type='checkbox' name='product_main_show[]' value='$id_product_main_show' checked> $name_product_main_show ";
						  }else{echo"<input type='checkbox' name='product_main_show[]' value='$id_product_main_show'> $name_product_main_show ";}
                        
                      echo"</label>";
						 }
                      ?>
                      </fieldset>
                    </div>
                  </div>
                  
                  </div> 
                  <div class="row" id="product_img_detail">
                  <label style="padding-left:10px">Hình ảnh chi tiết sản phẩm</label>
                      <div id="small-img" class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <ul>
                        <?php
							$query7=mysqli_query($conn,"SELECT * FROM `image_product_detail` WHERE ID_Product='$id_product_show'");
							while($row7=mysqli_fetch_array($query7))
							{
								$img_product_detail="dist/img/".$row7['ID_Image'];
							  echo"<li>";
								echo"<img src='$img_product_detail' class='img-responsive inline-block' style='height:100;width:150px'/>";
							  echo"</li>";
							}
                          ?>
                        </ul>
                      </div>
                    </div>
                    <div class="row">
                    	<div class="col-md-12">
                    	<div class="form-group">
                          <label for="exampleInputFile">Thay đổi hình ảnh chi tiết sản phẩm</label>
                          <input type="file" id="img_file" name="img_file[]" multiple="true" onchange="previewImg(event);">
                          
                        </div>
                        </div>
                    </div>
					<?php mysqli_close($conn); ?>
                  <div class="box-footer">
                  <div class="row">
                  	
                    <div class="col-xs-12">
                    <button type="submit" class="btn btn-primary pull-right">Edit</button>
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
    
<?php include("js_product_create.php"); ?>
</body>
</html>
