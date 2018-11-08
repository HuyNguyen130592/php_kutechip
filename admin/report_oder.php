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
            <small>Báo cáo doanh số</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Báo cáo</li>
          </ol>
        </section>
        <section class="content">
     <!-- Main content -->
     		<div class="row">
            	<div class="col-md-12" id="pick_date">
                	
                    	<div class="form-group .form-inline col-md-5 col-lg-5 col-sm-5">
                            <label>Chọn thời gian:</label>
                            <div class="input-group">
                              <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                              </div>
                              <input type="text" class="form-control pull-right" id="daterange-btn"/>
                              
                            </div><!-- /.input group -->
                            <input type="button" class=" form-control btn btn-success" value="Xem báo cáo" id="report_click"/>
                          </div>
                   
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="row" id="report_oder_general">
            	<div class="col-xs-12">
                	  <div class="box">
                      	<div class="box-header">
                          <h3 class="box-title">Doanh thu</h3>
                        </div>
                        <div class="box-body">
                        	<table id="doanh_thu" class="table table-bordered table-hover">
                            <thead>
                              <tr>
                                <th>Trạng thái</th>
                                <th>Số lượng (đơn)</th>
                                <th>Giá trị (VNĐ)</th>
                                <th>Tỉ lệ theo số lượng(%)</th>
                                <th>Tỉ lệ theo giá trị(%)</th>
                              </tr>
                            </thead>
                            
                          </table>
                        </div>
                      </div>
                      <div class="box">
                      	<div class="box-header">
                          <h3 class="box-title">Dịch vụ giao hàng</h3>
                        </div>
                        <div class="box-body">
                        	<table id="dich_vu_giao_hang" class="table table-bordered table-hover">
                                <thead>
                                  <tr>
                                    <th>Dịch vụ giao hàng</th>
                                    <th>Số lượng(đơn)</th>
                                    <th>Giá trị(VNĐ)</th>
                                    <th>Tỉ lệ theo số lượng(%)</th>
                                    <th>Tỉ lệ theo giá trị(%)</th>
                                   
                                    <th>Chi phí giao hàng(VNĐ)</th>
                                  </tr>
                                </thead>
                                
                              </table>
                        </div>
                      </div>
                      <div class="box">
                      	<div class="box-header">
                          <h3 class="box-title">Khu vực đặt hàng</h3>
                        </div>
                        <div class="box-body">
                        	<table id="khu_vuc_dat_hang_1" class="table table-bordered table-hover">
                                <thead>
                                  <tr>
                                    <th>Tỉnh/thành phố</th>
                                    <th>Số lượng(đơn)</th>
                                    <th>Giá trị(VNĐ)</th>
                                    <th>Tỉ lệ theo số lượng(%)</th>
                                    <th>Tỉ lệ theo giá trị (%)</th>
                                    <th>Tiền ship(VNĐ)</th>
                                  </tr>
                                </thead>
                                
                              </table>
                        </div>
                      </div>
                      <div class="box">
                      	<div class="box-header">
                          <h3 class="box-title">Thông kê theo chủng loại sản phẩm</h3>
                        </div>
                        <div class="box-body">
                        	<table id="chung_loai_1" class="table table-bordered table-hover">
                                <thead>
                                  <tr>
                                    <th>Chủng loại sản phẩm</th>
                                    <th>Số lượng(cái)</th>
                                    <th>Giá trị(VNĐ)</th>
                                    <th>Tỉ lệ theo số lượng(%)</th>
                                    <th>Tỉ lệ theo giá trị(%)</th>
                                  </tr>
                                </thead>
                                
                              </table>
                        </div>
                      </div>
                      <div class="box">
                      	<div class="box-header">
                          <h3 class="box-title">Thống kê theo nhóm sản phẩm</h3>
                        </div>
                        <div class="box-body">
                        	<table id="nhom_sp" class="table table-bordered table-hover">
                                <thead>
                                  <tr>
                                    <th>Nhóm sản phẩm</th>
                                    <th>Số lượng(cái)</th>
                                    <th>Giá trị(VNĐ)</th>
                                    <th>Tỉ lệ theo số lượng(%)</th>
                                    <th>Tỉ lệ theo giá trị(%)</th>
                                  </tr>
                                </thead>
                                
                              </table>
                        </div>
                      </div>
                      <div class="box">
                      	<div class="box-header">
                          <h3 class="box-title">Thống kê theo sản phẩm</h3>
                        </div>
                        <div class="box-body">
                        	<table id="san_pham" class="table table-bordered table-hover">
                                <thead>
                                  <tr>
                                    <th>Tên sản phẩm</th>
                                    <th>Số lượng(cái)</th>
                                    <th>Giá trị(VNĐ)</th>
                                    <th>Tỉ lệ theo số lượng(%)</th>
                                    <th>Tỉ lệ theo giá trị(%)</th>
                                  </tr>
                                </thead>
                                
                              </table>
                        </div>
                      </div>
                      <div class="box">
                      	<div class="box-header">
                          <h3 class="box-title">Thống kê theo màu sắc</h3>
                        </div>
                        <div class="box-body">
                        	<table id="mau_sac" class="table table-bordered table-hover">
                                <thead>
                                  <tr>
                                    <th>Tên mau</th>
                                    <th>Số lượng(cái)</th>
                                    <th>Giá trị(VNĐ)</th>
                                    <th>Tỉ lệ theo số lượng(%)</th>
                                    <th>Tỉ lệ theo giá trị(%)</th>
                                  </tr>
                                </thead>
                                
                              </table>
                        </div>
                      </div>
                      <div class="box">
                      	<div class="box-header">
                          <h3 class="box-title">Thống kê theo size</h3>
                        </div>
                        <div class="box-body">
                        	<table id="size" class="table table-bordered table-hover">
                                <thead>
                                  <tr>
                                    <th>Tên size</th>
                                    <th>Số lượng(cái)</th>
                                    <th>Giá trị(VNĐ)</th>
                                    <th>Tỉ lệ theo số lượng(%)</th>
                                    <th>Tỉ lệ theo giá trị(%)</th>
                                  </tr>
                                </thead>
                                
                              </table>
                        </div>
                      </div>
                      <div class="box">
                      	<div class="box-header">
                          <h3 class="box-title">Biểu đồ doanh số bán hàng theo tháng</h3>
                        </div>
                        <div class="box-body">
                        <div class="row">
                        	<div class="col-lg-12">
                            	<div id="doanh_so_thang" ></div>
                            </div>
                         </div>
                        </div>
                      </div>
                      <div class="box">
                      	<div class="box-header">
                          <h3 class="box-title">Biểu đồ doanh số bán hàng theo tuần</h3>
                        </div>
                        <div class="box-body">
                        <div class="row">
                        	<div class="col-lg-12">
                            	<div id="doanh_so_tuan" ></div>
                            </div>
                         </div>
                        </div>
                      </div>
                      <div class="box">
                      	<div class="box-header">
                          <h3 class="box-title">Biểu đồ doanh số bán hàng theo ngày</h3>
                        </div>
                        <div class="box-body">
                        <div class="row">
                        	<div class="col-lg-12">
                            	<div id="doanh_so_ngay" ></div>
                            </div>
                         </div>
                        </div>
                      </div>
                </div>
            </div>
            </div>
            	
            </div>
     <!-- end main content -->
     </section>
    </div>
 <!--end content-->
    </div>
<?php include("js_report_oder.php"); ?>
</body>
</html>
