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
            <small>SEO bài viết</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">SEO</li>
          </ol>
        </section>
     <!-- Main content -->
     	<div class="box">
                <div class="box-header">
                  <h3 class="box-title">Danh sách bài viết</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Tên bài viết</th>
                        
                        <th>Từ khóa</th>
                        <th>Mô tả từ khóa</th>
                        <th>Nội dung</th>
                        <th>Tùy chỉnh</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
						$query3=mysqli_query($conn,"SELECT * FROM `blog_news`");
						while($row3 = mysqli_fetch_array($query3))
						{
							$id_blog = $row3['news_id'];
							$name_blog= $row3['news_name'];
							
							$keyword = $row3['keyword'];
							$title = $row3['title'];
							$content = $row3['description'];
                      echo"<tr>";
					  	
						
                        echo"<td>$name_blog</td>";
                        
                         
						 echo"<td>$keyword</td>";
						  echo"<td>$title</td>";
						   echo"<td>$content</td>";
                        echo"<td><div class='btn'><a href='seo_blog_create.php?id=$id_blog'><i class='fa fa-edit'></i> Edit</a></div></td>";
                        
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
