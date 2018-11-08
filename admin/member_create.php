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
            <small>Tạo tài khoản mới </small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Tài khoản mới </li>
          </ol>
        </section>
        <section class="content">
     <!-- Main content -->
     	<form method="post" action="model/member_addnew.php" enctype="multipart/form-data">
        <div class="row">
        	<div class="box-body">
            <fieldset>
            	<legend>Thông tin tài khoản </legend>
                <input type="text" name="id_cus"  id="cus_id" style="display:none"/>
                
            	<div class="row">
                	<div class="col-md-5">
                    	<table class="table" style="border:none">
                        	
                            <tr>
                            	<td><label>Account </label></td>
                                <td style="position:relative"><input type="text" class="form-control" name="acc" id="acc"/></td>
                                	 
                                
                            </tr>
                            <tr>
                            	<td><label>Password</label></td>
                                <td><input type="password" class="form-control" name="pass" id="pass"/></td>
                            </tr>
                            
                            <tr>
                            	<td><label>Chọn vai trò</label></td>
                            	<td>
                            		<select name="duty" id="duty">
                            			<option value="DT00">Chọn vai trò</option>
                            			<?php
                            				$query2=mysqli_query($conn,"SELECT * FROM `member_duty`");
                            				while($row2=mysqli_fetch_array($query2))
                            				{
                            					$ten_duty = $row2['Member_Duty_Name'];
                            					$id_duty = $row2['ID_Member_Duty'];
                            					echo"<option value='$id_duty'>$ten_duty</option>";
                            				}
                            			?>
                            		</select>
                            	</td>
                            </tr>
                            
                        </table>
                    </div>
                   
                    </div>
            </fieldset>
           
            
             <input type="submit" value="Save" class="btn btn-lg btn-success" />       
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
