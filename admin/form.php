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
            <small>Control panel</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
          </ol>
        </section>
        <section class="content">
     <!-- Main content -->
     	<div class="row">
        	<div class="col-md-12">
            	<div class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title">Quick Example</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form">
                  <div class="box-body">
                  <div class="col-md-12"
                    <div class="form-group">
                      <label for="exampleInputEmail1">Email address</label>
                      <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                        <div class="panel panel-default">
                          <div class="panel-body">
                          	<table class="table table-condensed">
                                <thead>
                                  <tr>
                                    <th>Firstname</th>
                                    <th>Lastname</th>
                                    <th>Email</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <td>John</td>
                                    <td>Doe</td>
                                    <td>john@example.com</td>
                                  </tr>
                                  <tr>
                                    <td>Mary</td>
                                    <td>Moe</td>
                                    <td>mary@example.com</td>
                                  </tr>
                                  <tr>
                                    <td>July</td>
                                    <td>Dooley</td>
                                    <td>july@example.com</td>
                                  </tr>
                                </tbody>
                          </table>
                          </div>
                        </div>
                    </div >
                   </div>
                   
                    <div class="clearfix"></div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Password</label>
                      <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputFile">File input</label>
                      <input type="file" id="exampleInputFile">
                      <p class="help-block">Example block-level help text here.</p>
                    </div>
                    <div class="form-group">
                      <label>Textarea</label>
                      <textarea class="form-control"  id="editor" rows="6" placeholder="Enter ..."></textarea>
                    </div>
                    <div class="form-group col-md-4">
                      <label>Select</label>
                      <select class="form-control">
                        <option>option 1</option>
                        <option>option 2</option>
                        <option>option 3</option>
                        <option>option 4</option>
                        <option>option 5</option>
                      </select>
                    </div>
                    <div class="clearfix"></div>
                    <div class="form-group">
                      <div class="radio">
                        <label>
                          <input name="optionsRadios" id="optionsRadios1" value="option1" checked="" type="radio">
                          Option one is this and that—be sure to include why it's great
                        </label>
                      </div>
                      <div class="radio">
                        <label>
                          <input name="optionsRadios" id="optionsRadios2" value="option2" type="radio">
                          Option two can be something else and selecting it will deselect option one
                        </label>
                      </div>
                      <div class="radio">
                        <label>
                          <input name="optionsRadios" id="optionsRadios3" value="option3" disabled="" type="radio">
                          Option three is disabled
                        </label>
                      </div>
                    </div>
                    <div class="checkbox">
                      <label>
                        <input type="checkbox"> Check me out
                      </label>
                    </div>
                  </div><!-- /.box-body -->
					
                  <div class="box-footer">
                  <div class="row">
                  	<div class="col-xs-8">
                    <button type="submit" class="btn btn-primary ">Submit</button>
                    </div>
                    <div class="col-xs-3">
                    <button type="submit" class="btn btn-primary pull-right">Submit</button>
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
<?php include("js_ckeditor.php"); ?>
</body>
</html>
