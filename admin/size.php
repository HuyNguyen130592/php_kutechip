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
            Dashboard
            <small>Danh mục size</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
          </ol>
        </section>
     <!-- Main content -->
     	<div class="box">
                <div class="box-header">
                  <h3 class="box-title">Danh sách size</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Tên size</th>
                        
                        <th>Tùy chỉnh</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
						$query3=mysqli_query($conn,"SELECT * FROM `size`");
						while($row3 = mysqli_fetch_array($query3))
						{
							$Size_id = $row3['ID_Size'];
							$name_color = $row3['Size_Name'];
							
                      echo"<tr>";
                        echo"<td>$name_color</td>";
                        
                          
                        echo"<td><div class='btn'><a href='#'data-toggle='modal' data-target='#size_edit".$Size_id."'><i class='fa fa-edit'></i> Edit</a></div></td>";
                        include("modal/size_edit.php"); 
                      echo"</tr>";
						}
                    ?>  
                    </tbody>
                    
                  </table>
                </div><!-- /.box-body -->
                
              </div>
              
     <!-- end main content -->  
    </div>
 <!--end content-->
    </div>
    <?php mysqli_close($conn)?>
<?php include("js_table.php"); ?>
</body>
</html>
