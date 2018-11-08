
<header class="main-header">
        <!-- Logo -->
        <a href="index.php" class="logo"><b>Admin</b></a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
             <?php
			 	if(empty($_SESSION['login']['id'])){header('Location:login.php');}
			 	$id = $_SESSION['login']['id'];
				$query = mysqli_query($conn,"SELECT * FROM `member` INNER JOIN member_duty ON member.ID_Member_Duty=member_duty.ID_Member_Duty WHERE ID_Member='$id'");
				$row=mysqli_fetch_array($query);
			 ?>
            
              
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="<?php if($row['img']==''){ echo'dist/img/2.jpg';}else{echo 'dist/img/'.$row['img'];}?>" class="user-image" alt="User Image">
                  <span class="hidden-xs"><?php echo $_SESSION['login']['name']?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="<?php if($row['img']==''){ echo'dist/img/2.jpg';}else{echo 'dist/img/'.$row['img'];}?>" class="img-circle" alt="User Image">
                    <p>
                      <?php echo $row['Member_Name']?> 
                      <small><?php echo $row['Member_Duty_Name']; ?></small>
                    </p>
                  </li>
                  <!-- Menu Body -->
                  <!--<li class="user-body">
                    <div class="col-xs-4 text-center">
                      <a href="#">Followers</a>
                    </div>
                    <div class="col-xs-4 text-center">
                      <a href="#">Sales</a>
                    </div>
                    <div class="col-xs-4 text-center">
                      <a href="#">Friends</a>
                    </div>
                  </li>-->
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="user_information.php" class="btn btn-default btn-flat">Thông tin cá nhân</a>
                    </div>
                    <div class="pull-right">
                      <a href="logout.php" class="btn btn-default btn-flat">Log out</a>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>
      </header>
 <!-- Left side column. contains the logo and sidebar -->
 <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar" style="height: auto;">
          
          <ul class="sidebar-menu">
            <li class="header">MAIN MENU</li>
            
            
            <?php
			$query1=mysqli_query($conn,"SELECT * FROM `admin_mainmenu`");
			while($row1=mysqli_fetch_array($query1))
			{
				$id_main = $row1['id'];
				$name_main= $row1['name'];
				$icon_main=$row1['icon'];
            echo"<li class='treeview'>";
              echo"<a href='#'>";
                echo"<i class='$icon_main'></i>";
                echo"<span>$name_main</span>";
                echo"<i class='fa fa-angle-left pull-right'></i>";
			 echo"</a>";
             $query2 = mysqli_query($conn,"SELECT * FROM `admin_submenu` WHERE id_main='$id_main'");
			 while($row2= mysqli_fetch_array($query2))
			 {
				 $id_sub = $row2['id_sub'];
				 $name_sub=$row2['name'];
				 $href = $row2['href'];
              echo"<ul class='treeview-menu'>";
                echo"<li><a href='$href'><i class='fa fa-circle-o'></i>$name_sub</a></li>";
                
              echo"</ul>";
			 }
            echo"</li>";
			}
            ?>
            
            
            
            
            
            
            
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>