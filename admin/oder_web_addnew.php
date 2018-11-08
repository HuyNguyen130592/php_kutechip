<?php
	include("conn.php");
	mysqli_set_charset($conn, 'UTF8');
	include("session.php");
	 $fuserid=$_SESSION['login']['id'];
	$query=mysqli_query($conn,"SELECT * FROM `member`  INNER JOIN member_duty ON member.ID_Member_Duty=member_duty.ID_Member_Duty WHERE ID_Member='$fuserid'");
	$row=mysqli_fetch_array($query);
	$id_cus_oder =$_GET['id_cus'];
	$query11 = mysqli_query($conn,"SELECT customer_detail.ID_Customer,customer_detail.Customer_Name,customer_detail.Customer_Mobile,customer_detail.Customer_Street,customer_detail.ID_Ward,district.name AS district_name,province.name AS province_name,customer_detail.ID_Province,customer_detail.ID_District FROM customer_detail LEFT JOIN district ON customer_detail.ID_District = district.ID LEFT JOIN province ON customer_detail.ID_Province = province.id WHERE customer_detail.ID_Customer='$id_cus_oder'");
	$row11 = mysqli_fetch_array($query11);
	
	$id_oder_create=$_GET['id_oder']; 
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
     	<form method="post" action="model/oder_web_addnew_create.php" enctype="multipart/form-data">
        <div class="row">
        	<div class="box-body">
            <fieldset>
            	<legend>Thông tin khách hàng</legend>
                <input type="text" name="id_cus"  id="cus_id" style="display:none" value="<?php echo $id_cus_oder;?>"/>
                
            	<div class="row">
                	<div class="col-md-5">
                    	<table class="table" style="border:none">
                        	
                            <tr>
                            	<td><label>Tên khách hàng</label></td>
                                <td style="position:relative"><input type="text" class="form-control" name="name_customer" id="name_customer" value="<?php echo $row11['Customer_Name'] ?>" disabled="disabled"/>
                                	 <div class="panel panel-default" style="position:absolute" >
                                      <div class="panel-body" id="customer_name">
                                      </div>
                       			 </div>
                                </td>
                            </tr>
                            <tr>
                            	<td><label>Số điện thoại</label></td>
                                <td><input type="text" class="form-control" name="mobile" id="mobile" value="<?php echo $row11['Customer_Mobile']; ?>" disabled="disabled"/></td>
                            </tr>
                            <tr>
                            	<td><label>Ghi chú của Khách hàng</label></td>
                                <?php
									$query12 = mysqli_query($conn,"SELECT * FROM `oder_temporay` WHERE id = '$id_oder_create'");
									$row12 = mysqli_fetch_array($query12); 
								?>
                                <td><textarea class="form-control" cols="50" rows="13" name="cus_note" disabled="disabled"><?php $row12['Cus_Note']; ?></textarea></td>
                            </tr>
                            <tr>
                            	<td><label>Ghi chú của shop</label></td>
                                <td><textarea class="form-control" cols="50" rows="13" name="shop_note"></textarea></td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-4">
                    <h4>Địa chỉ</h4>
                    <table class="table">
                    	<tr>
                        	<td>Tỉnh/Thành phố</td>
                            <td>
                            	<select name="city" class="form-control" id="city" name="city" disabled="disabled">
                                	<option value="<?php echo $row11['ID_Province']; ?>"><?php echo $row11['province_name'];?></option>
                            	</select>
                            </td>
                        </tr>
                        <tr>
                        	<td>Quận/Huyện</td>
                            <td id="district_add">
                            	<select name="distric" class="form-control" id="district" name="district" disabled="disabled">
                                    <option value="<?php echo $row11['ID_District']; ?>"><?php echo $row11['district_name']; ?></option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                        	<td>Phường/Xã</td>
                            <td>
                            	<input type="text" name="ward" placeholder="Điền tên Phường/xã" class="form-control" id="ward" value="<?php echo $row11['ID_Ward'];?>" disabled="disabled"/>
                            </td>
                        </tr>
                        <tr>
                        	<td>Số nhà/tên ấp</td>
                            <td>
                            	<input type="text" name="street" placeholder="Điền số nhà/tên ấp" class="form-control" id="street" value="<?php echo $row11['Customer_Street']; ?>" disabled="disabled"/>
                            </td>
                        </tr>
                        <tr >
                        	<td>Phí ship đề nghị</td>
                            <?php 
								$id_district = $row11['ID_District'];
								$query13 = mysqli_query($conn,"SELECT * FROM `ship_fee` WHERE id='$id_district'");
								$row13 = mysqli_fetch_array($query13);
							?>
                            <td><input type="text" name="ship_fee" class="form-control" id="ship" value="<?php echo $row13['fee']; ?>" /></td>
                        </tr>
                    </table>
                   		
                    	
                   </div>     
                    </div>
            </fieldset>
           
            <fieldset>
            	<legend>Chi tiết đơn hàng</legend>
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
                        <?php
						if(empty($_SESSION['oder_web'][$fuserid]))
						{
							
						}else
						{
							foreach($_SESSION['oder_web'][$fuserid] as $key => $value1)
								{
									$id_pro_oderweb=$key;
									$name_pro_oderweb = $value1['name'];
									$quantity_pro_oderweb = $value1['quantity'];
									$price = $value1['price'];
									echo"<tr>";
										echo"<td>$name_pro_oderweb</td>";
										echo"<td>$price</td>";
										echo"<td>$quantity_pro_oderweb</td>";
										echo"<td><input type='button' data-id='$id_pro_oderweb' class='btn btn-danger pro_delete' value='Xóa' /></td>";
									echo"</tr>";
								} 
							}
						?>
                        
                        
                    	
                    </table>
                	<div class="panel panel-default" style="margin-top:-20px"  >
                                      <div class="panel-body" id="pro_name">
                                        
                                      </div>
                       			 </div>
                  </div>  
                </div>
            </fieldset>
            <a href="model/oder_web_cancel.php?id=<?php echo $id_oder_create; ?>"><input type="button" value="Hủy đơn" class="btn btn-lg btn-danger"/></a>
             <input type="submit" value="Tạo" class="btn btn-lg btn-success pull-right" />       
             </div>  
            </div>
           
            
          
        </form>
     
     <!-- end main content -->
     </section>
     
    </div>
 <!--end content-->
 	
 
    </div>
<?php mysqli_close($conn);?>  
<?php include("js_oder_web_create.php"); ?>
</body>
</html>
