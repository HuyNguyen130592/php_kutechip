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
            <small>Tạo đơn hàng</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Đơn hàng mới</li>
          </ol>
        </section>
        <section class="content">
     <!-- Main content -->
     	<form method="post" action="model/oder_return_addnew_create.php" enctype="multipart/form-data">
        <div class="row">
        	<div class="box-body">
            <fieldset>
            	<legend>Thông tin khách hàng</legend>
                <input type="text" name="id_cus"  id="cus_id" style="display:none"/>
                
            	<div class="row">
                	<div class="col-md-5">
                    	<table class="table" style="border:none">
                        	
                            <tr>
                            	<td><label>Tên khách hàng</label></td>
                                <td style="position:relative"><input type="text" class="form-control" name="name_customer" id="name_customer"/>
                                	 <div class="panel panel-default" style="position:absolute" >
                                      <div class="panel-body" id="customer_name">
                                      </div>
                       			 </div>
                                </td>
                            </tr>
                            <tr>
                            	<td><label>Số điện thoại</label></td>
                                <td><input type="text" class="form-control" name="mobile" id="mobile"/></td>
                            </tr>
                            <tr>
                            	<td><label>Ghi chú của Khách hàng</label></td>
                                <td><textarea class="form-control" cols="50" rows="13" name="cus_note"></textarea></td>
                            </tr>
                            <tr>
                            	<td><label>Ghi chú của shop</label></td>
                                <td><textarea class="form-control" cols="50" rows="13" name="shop_note">Giao một phần nhận một phần</textarea></td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-4">
                    <h4>Địa chỉ</h4>
                    <table class="table">
                    	<tr>
                        	<td>Tỉnh/Thành phố</td>
                            <td>
                            	<select name="city" class="form-control" id="city" name="city">
                                	<option value="">Chọn Thành phố/tỉnh</option>
                            <?php
							$query10 = mysqli_query($conn,"SELECT * FROM `province`");
							while($row10 = mysqli_fetch_array($query10))
								{
									$id_province = $row10['id'];
									$name_province = $row10['name'];
                            	
                                    echo"<option value='$id_province'>$name_province</option>";
                                    
                                
								}
							?>
                            
                            	</select>
                            </td>
                        </tr>
                        <tr>
                        	<td>Quận/Huyện</td>
                            <td id="district_add">
                            	<select name="distric" class="form-control" id="district" name="district">
                                    <option>Chọn quận/huyện</option>
                                    
                                </select>
                            </td>
                        </tr>
                        <tr>
                        	<td>Phường/Xã</td>
                            <td>
                            	<input type="text" name="ward" placeholder="Điền tên Phường/xã" class="form-control" id="ward"/>
                            </td>
                        </tr>
                        <tr>
                        	<td>Số nhà/tên ấp</td>
                            <td>
                            	<input type="text" name="street" placeholder="Điền số nhà/tên ấp" class="form-control" id="street"/>
                            </td>
                        </tr>
                        <tr id="ship_fee">
                        	<td>Phí ship đề nghị</td>
                            <td><input type="text" name="ship_fee" class="form-control" id="ship" /></td>
                        </tr>
                    </table>
                   		
                    	
                   </div>     
                    </div>
            </fieldset>
           
            <fieldset>
            	<legend>Chi tiết sản phẩm bán</legend>
                <div class="row" >
                	<div class="col-md-10" style="margin-bottom:50px">
                	<table class="table" style="background-color:#CCC" id="product_tbl">
                    	
                    	<tr>
                        	<th>Tên sản phẩm</th>
                            <th>Đơn giá</th>
                            <th>Số lượng</th>
                            <th></th>
                        </tr>
                        <tr style="margin-bottom:500px">
                        	<td style="position:relative;">
                            	<input type="text" id="pro_id_input" style="display:none"/>
                                <input type="text" id="pro_name_input"  style="border:0px; background-color:#CCC" class="form-control"/>
                                
                            </td>
                            <td>
                            	
                                <input type="text" id="pro_price_input" style="border:0px; background-color:#CCC" class="form-control"/>
                            </td>
                            <td>
                            	
                                <input type="text" id="pro_quantity_input" style="border:0px; background-color:#CCC" class="form-control"/>
                            </td>
                            <td>
                            	<input type="button" value="Thêm" class="btn btn-success"  id="pro_add_butt"/>
                            </td>
                        </tr>
                        
                    	
                    </table>
                	<div class="panel panel-default" style="margin-top:-20px"  >
                                      <div class="panel-body" id="pro_name">
                                        
                                      </div>
                       			 </div>
                  </div>  
                </div>
            </fieldset> 
            
            <fieldset>
            	<legend>Chi tiết sản phẩm thu hồi</legend>
                <div class="row" >
                	<div class="col-md-10" style="margin-bottom:50px">
                	<table class="table" style="background-color:#CCC" id="product_tbl_return">
                    	
                    	<tr>
                        	<th>Tên sản phẩm</th>
                            <th>Đơn giá</th>
                            <th>Số lượng</th>
                            <th></th>
                        </tr>
                        <tr style="margin-bottom:500px">
                        	<td style="position:relative;">
                            	<input type="text" id="pro_id_input_return" style="display:none"/>
                                <input type="text" id="pro_name_input_return"  style="border:0px; background-color:#CCC" class="form-control"/>
                                
                            </td>
                            <td>
                            	
                                <input type="text" id="pro_price_input_return" style="border:0px; background-color:#CCC" class="form-control"/>
                            </td>
                            <td>
                            	
                                <input type="text" id="pro_quantity_input_return" style="border:0px; background-color:#CCC" class="form-control"/>
                            </td>
                            <td>
                            	<input type="button" value="Thêm" class="btn btn-success"  id="pro_add_butt_return"/>
                            </td>
                        </tr>
                        
                    	
                    </table>
                	<div class="panel panel-default" style="margin-top:-20px"  >
                                      <div class="panel-body" id="pro_name_return">
                                        
                                      </div>
                       			 </div>
                  </div>  
                </div>
            </fieldset> 
             <input type="submit" value="Save" class="btn btn-lg btn-success pull-right" />       
             </div>  
            </div>
           
            
          
        </form>
     
     <!-- end main content -->
     </section>
     
    </div>
 <!--end content-->
 	
 
    </div>
<?php mysqli_close($conn);?>   
<?php include("js_oder_returned.php"); ?>
</body>
</html>
