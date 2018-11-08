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
            <small>Tạo địa chỉ kho</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Tạo địa chỉ kho</li>
          </ol>
        </section>
        <section class="content">
     <!-- Main content -->
     	<form method="post" action="model/delivery_warehouse_addnew_create.php" enctype="multipart/form-data">
        <div class="row">
        	<div class="box-body">
            <fieldset>
            	<legend>Thông tin địa điểm lấy hàng</legend>
               
                
            	<div class="row">
                	<div class="col-md-5">
                    	<table class="table" style="border:none">
                        	
                            <tr>
                            	<td><label>Tên kho</label></td>
                                <td style="position:relative"><input type="text" class="form-control" name="name_warehouse" id="name_warehouse"/>
                                	 
                                </td>
                            </tr>
                            <tr>
                            	<td><label>Số điện thoại</label></td>
                                <td><input type="text" class="form-control" name="mobile_warehouse" id="mobile_warehouse"/></td>
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
                        	<td>Số nhà</td>
                            <td>
                            	<input type="text" name="street" placeholder="Điền số nhà/tên ấp" class="form-control" id="street"/>
                            </td>
                        </tr>
                        
                    </table>
                   		
                    	
                   </div>     
                    </div>
            </fieldset>
           
             
             <input type="submit" value="Save" class="btn btn-lg btn-success " />       
             </div>  
            </div>
           
            
          
        </form>
     
     <!-- end main content -->
     </section>
     
    </div>
 <!--end content-->
 	
 
    </div>
<?php mysqli_close($conn);?>   
<?php include("js_oder_create.php"); ?>
</body>
</html>
