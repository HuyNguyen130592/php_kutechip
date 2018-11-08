<?php
	include("../conn.php");
	mysqli_set_charset($conn, 'UTF8');
	include("../session.php");
	 $fuserid=$_SESSION['login']['id'];
	$query=mysqli_query($conn,"SELECT * FROM `member`  INNER JOIN member_duty ON member.ID_Member_Duty=member_duty.ID_Member_Duty WHERE ID_Member='$fuserid'");
	$row=mysqli_fetch_array($query);
	if(isset($_SESSION['login']['id']))
		{
			$ket_qua = array();
			$date_send = $_POST['date_send'];
			
			$date_start = date('Y/m/d ',strtotime(substr($date_send,0,10)));
			
			$date_end = date('Y/m/d ',strtotime(substr($date_send,12,22)));
			$query1 = mysqli_query($conn,"SELECT SUM(Total) AS tong_tien, COUNT(ID_Product_Import) AS tong_don FROM product_import WHERE Date_Create<='$date_end' AND Date_Create >='$date_start'");
			$row1 = mysqli_fetch_array($query1);
			$tong_don = $row1['tong_don'];
			$tong_tien = $row1['tong_tien'];
			$query2 = mysqli_query($conn,"SELECT SUM(product_import_detail.Quantity_Import) AS tong_sl FROM product_import_detail INNER JOIN product_import ON product_import_detail.ID_Product_Import=product_import.ID_Product_Import WHERE product_import.Date_Create<='$date_end' AND product_import.Date_Create>='$date_start'");
			$row2 = mysqli_fetch_array($query2);
			$tong_sl = $row2['tong_sl'];
			$ket_qua['nha_cung_cap'][0]['nha_cung_cap']='Toàn bộ phiếu nhập';
			$ket_qua['nha_cung_cap'][0]['so_don']=number_format($tong_don);
			$ket_qua['nha_cung_cap'][0]['so_luong']=number_format($tong_sl);
			$ket_qua['nha_cung_cap'][0]['gia_tri']=number_format($tong_tien);
			$ket_qua['nha_cung_cap'][0]['tile_sl']=100;
			$ket_qua['nha_cung_cap'][0]['tile_gt']=100;
			$query3 = mysqli_query($conn,"SELECT product_import.ID_Supplier, supplier.Name AS ten_ncc,SUM(product_import.Total) AS tong_tien,COUNT(product_import.ID_Product_Import) AS tong_don FROM product_import INNER JOIN supplier ON product_import.ID_Supplier=supplier.ID WHERE product_import.Date_Create<='$date_end' AND product_import.Date_Create>='$date_start' GROUP BY supplier.Name ");
			$i=1;
			while($row3 = mysqli_fetch_array($query3))
				{
					$id_ncc = $row3['ID_Supplier'];
					$ten_ncc = $row3['ten_ncc'];
					$tong_tien_ncc = $row3['tong_tien'];
					$tong_don_ncc = $row3['tong_don'];
					$query4 = mysqli_query($conn,"SELECT SUM(product_import_detail.Quantity_Import) AS tong_sl FROM product_import_detail INNER JOIN product_import ON product_import.ID_Product_Import=product_import_detail.ID_Product_Import WHERE product_import.Date_Create<='$date_end' AND product_import.Date_Create>='$date_start' AND product_import.ID_Supplier='$id_ncc'");
					$row4 = mysqli_fetch_array($query4);
					$tong_sl_ncc = $row4['tong_sl'];
					$tile_sl_ncc = $tong_sl_ncc/$tong_sl*100;
					$tile_gt_ncc = $tong_tien_ncc/$tong_tien*100;
					$ket_qua['nha_cung_cap'][$i]['nha_cung_cap']=$ten_ncc;
					$ket_qua['nha_cung_cap'][$i]['so_don']=number_format($tong_don_ncc);
					$ket_qua['nha_cung_cap'][$i]['so_luong']=number_format($tong_sl_ncc);
					$ket_qua['nha_cung_cap'][$i]['gia_tri']=number_format($tong_tien_ncc);
					$ket_qua['nha_cung_cap'][$i]['tile_sl']=number_format($tile_sl_ncc,2);
					$ket_qua['nha_cung_cap'][$i]['tile_gt']=number_format($tile_gt_ncc,2);
					$i++;
				}
				
			$ket_qua['chung_loai'][0]['chung_loai']='Toàn bộ phiếu nhập';
			$ket_qua['chung_loai'][0]['so_luong']=number_format($tong_sl);
			$ket_qua['chung_loai'][0]['gia_tri']=number_format($tong_tien);
			$ket_qua['chung_loai'][0]['tile_sl']=100;
			$ket_qua['chung_loai'][0]['tile_gt']=100;
			$query5 = mysqli_query($conn,"SELECT * FROM `product_kind`");
			$i = 1;
			while($row5 = mysqli_fetch_array($query5))
				{
					$id_chung_loai = $row5['ID_Product_Kind'];
					$ten_chung_loai = $row5['Product_Kind_Name'];
					$query6 = mysqli_query($conn,"SELECT SUM(product_import_detail.Quantity_Import*product_import_detail.Price_Import) AS tong_tien,SUM(product_import_detail.Quantity_Import) AS tong_sl FROM product_import_detail INNER JOIN product_import ON product_import.ID_Product_Import=product_import_detail.ID_Product_Import INNER JOIN product_main ON product_main.ID_Product=product_import_detail.ID_Product WHERE product_import.Date_Create<='$date_end' AND product_import.Date_Create>='$date_start' AND product_main.ID_Product_Type IN(SELECT product_type.ID_Product FROM product_type INNER JOIN product_category ON product_type.id_category = product_category.id WHERE product_category.kind='$id_chung_loai')");
					$row6 = mysqli_fetch_array($query6);
					$gt_chung_loai = $row6['tong_tien'];
					$sl_chung_loai = $row6['tong_sl'];
					$tile_sl_chungloai = $sl_chung_loai/$tong_sl*100;
					$tile_gt_chungloai = $gt_chung_loai/$tong_tien*100;
					$ket_qua['chung_loai'][$i]['chung_loai']=$ten_chung_loai;
					$ket_qua['chung_loai'][$i]['so_luong']=number_format($sl_chung_loai);
					$ket_qua['chung_loai'][$i]['gia_tri']=number_format($gt_chung_loai);
					$ket_qua['chung_loai'][$i]['tile_sl']=number_format($tile_sl_chungloai,2);
					$ket_qua['chung_loai'][$i]['tile_gt']=number_format($tile_gt_chungloai,2);
					$i++;
				}
			$ket_qua['nhom_sp'][0]['nhom_sp']='Toàn bộ phiếu nhập';
			$ket_qua['nhom_sp'][0]['so_luong']=number_format($tong_sl);
			$ket_qua['nhom_sp'][0]['gia_tri']=number_format($tong_tien);
			$ket_qua['nhom_sp'][0]['tile_sl']=100;
			$ket_qua['nhom_sp'][0]['tile_gt']=100;
			$query7 = mysqli_query($conn,"SELECT * FROM `product_category`");
			$i = 1;
			while($row7 = mysqli_fetch_array($query7))
				{
					$id_nhomsp = $row7['id'];
					$ten_nhomsp = $row7['name'];
					$query8 = mysqli_query($conn,"SELECT SUM(product_import_detail.Quantity_Import*product_import_detail.Price_Import) AS tong_tien,SUM(product_import_detail.Quantity_Import) AS tong_sl FROM product_import_detail INNER JOIN product_import ON product_import.ID_Product_Import=product_import_detail.ID_Product_Import INNER JOIN product_main ON product_main.ID_Product=product_import_detail.ID_Product WHERE product_import.Date_Create<='$date_end' AND product_import.Date_Create>='$date_start' AND product_main.ID_Product_Type IN(SELECT product_type.ID_Product FROM product_type INNER JOIN product_category ON product_type.id_category = product_category.id WHERE product_category.id='$id_nhomsp')");
					$row8 = mysqli_fetch_array($query8);
					$gt_nhomsp = $row8['tong_tien'];
					$sl_nhomsp = $row8['tong_sl'];
					$tile_sl_nhomsp = $sl_nhomsp/$tong_sl*100;
					$tile_gt_nhomsp = $gt_nhomsp/$tong_tien*100;
					$ket_qua['nhom_sp'][$i]['nhom_sp']=$ten_nhomsp;
					$ket_qua['nhom_sp'][$i]['so_luong']=number_format($sl_nhomsp);
					$ket_qua['nhom_sp'][$i]['gia_tri']=number_format($gt_nhomsp);
					$ket_qua['nhom_sp'][$i]['tile_sl']=number_format($tile_sl_nhomsp,2);
					$ket_qua['nhom_sp'][$i]['tile_gt']=number_format($tile_gt_nhomsp,2);
					$i++;
				}
			$ket_qua['sp'][0]['sp']='Toàn bộ phiếu nhập';
			$ket_qua['sp'][0]['so_luong']=number_format($tong_sl);
			$ket_qua['sp'][0]['gia_tri']=number_format($tong_tien);
			$ket_qua['sp'][0]['tile_sl']=100;
			$ket_qua['sp'][0]['tile_gt']=100;
			$query8 = mysqli_query($conn,"SELECT * FROM `product_type`");
			$i = 1;
			while($row8 = mysqli_fetch_array($query8))
				{
					$id_sp = $row8['ID_Product'];
					$ten_sp = $row8['Name_Product'];
					$query9 = mysqli_query($conn,"SELECT SUM(product_import_detail.Quantity_Import*product_import_detail.Price_Import) AS tong_tien,SUM(product_import_detail.Quantity_Import) AS tong_sl FROM product_import_detail INNER JOIN product_import ON product_import.ID_Product_Import=product_import_detail.ID_Product_Import INNER JOIN product_main ON product_main.ID_Product=product_import_detail.ID_Product WHERE product_import.Date_Create<='$date_end' AND product_import.Date_Create>='$date_start' AND product_main.ID_Product_Type IN(SELECT product_type.ID_Product FROM product_type  WHERE product_type.ID_Product='$id_sp')");
					$row9 = mysqli_fetch_array($query9);
					$gt_sp = $row9['tong_tien'];
					$sl_sp = $row9['tong_sl'];
					$tile_sl_sp = $sl_sp/$tong_sl*100;
					$tile_gt_sp = $gt_sp/$tong_tien*100;
					if($row9['tong_tien']!=null)
						{
							$ket_qua['sp'][$i]['sp']=$ten_sp;
							$ket_qua['sp'][$i]['so_luong']=number_format($sl_sp);
							$ket_qua['sp'][$i]['gia_tri']=number_format($gt_sp);
							$ket_qua['sp'][$i]['tile_sl']=number_format($tile_sl_sp,2);
							$ket_qua['sp'][$i]['tile_gt']=number_format($tile_gt_sp,2);
							$i++;	
						}
					
				}
			$ket_qua['mau_sac'][0]['mau_sac']='Toàn bộ phiếu nhập';
			$ket_qua['mau_sac'][0]['so_luong']=number_format($tong_sl);
			$ket_qua['mau_sac'][0]['gia_tri']=number_format($tong_tien);
			$ket_qua['mau_sac'][0]['tile_sl']=100;
			$ket_qua['mau_sac'][0]['tile_gt']=100;
			$query10 = mysqli_query($conn,"SELECT * FROM `color`");
			$i = 1;
			while($row10 = mysqli_fetch_array($query10))
				{
					$id_mausac = $row10['ID_Color'];
					$ten_mausac = $row10['Color_Name'];
					$query11 = mysqli_query($conn,"SELECT SUM(product_import_detail.Quantity_Import*product_import_detail.Price_Import) AS tong_tien,SUM(product_import_detail.Quantity_Import) AS tong_sl FROM product_import_detail INNER JOIN product_import ON product_import.ID_Product_Import=product_import_detail.ID_Product_Import INNER JOIN product_main ON product_main.ID_Product=product_import_detail.ID_Product WHERE product_import.Date_Create<='$date_end' AND product_import.Date_Create>='$date_start' AND product_main.ID_Color='$id_mausac'");
					$row11 = mysqli_fetch_array($query11);
					$gt_mausac = $row11['tong_tien'];
					$sl_mausac = $row11['tong_sl'];
					$tile_sl_mausac = $sl_mausac/$tong_sl*100;
					$tile_gt_mausac = $gt_mausac/$tong_tien*100;
					if($row11['tong_tien']!=null)
						{
							$ket_qua['mau_sac'][$i]['mau_sac']=$ten_mausac;
							$ket_qua['mau_sac'][$i]['so_luong']=number_format($sl_mausac);
							$ket_qua['mau_sac'][$i]['gia_tri']=number_format($gt_mausac);
							$ket_qua['mau_sac'][$i]['tile_sl']=number_format($tile_sl_mausac,2);
							$ket_qua['mau_sac'][$i]['tile_gt']=number_format($tile_gt_mausac,2);
							$i++;	
						}
					
				}
			$ket_qua['size'][0]['size']='Toàn bộ phiếu nhập';
			$ket_qua['size'][0]['so_luong']=number_format($tong_sl);
			$ket_qua['size'][0]['gia_tri']=number_format($tong_tien);
			$ket_qua['size'][0]['tile_sl']=100;
			$ket_qua['size'][0]['tile_gt']=100;
			$query12 = mysqli_query($conn,"SELECT * FROM `size`");
			$i = 1;
			while($row12 = mysqli_fetch_array($query12))
				{
					$id_size = $row12['ID_Size'];
					$ten_size = $row12['Size_Name'];
					$query13 = mysqli_query($conn,"SELECT SUM(product_import_detail.Quantity_Import*product_import_detail.Price_Import) AS tong_tien,SUM(product_import_detail.Quantity_Import) AS tong_sl FROM product_import_detail INNER JOIN product_import ON product_import.ID_Product_Import=product_import_detail.ID_Product_Import INNER JOIN product_main ON product_main.ID_Product=product_import_detail.ID_Product WHERE product_import.Date_Create<='$date_end' AND product_import.Date_Create>='$date_start' AND product_main.ID_Size='$id_size'");
					$row13 = mysqli_fetch_array($query13);
					$gt_size = $row13['tong_tien'];
					$sl_size = $row13['tong_sl'];
					$tile_sl_size = $sl_size/$tong_sl*100;
					$tile_gt_size = $gt_size/$tong_tien*100;
					if($row13['tong_tien']!=null)
						{
							$ket_qua['size'][$i]['size']=$ten_size;
							$ket_qua['size'][$i]['so_luong']=number_format($sl_size);
							$ket_qua['size'][$i]['gia_tri']=number_format($gt_size);
							$ket_qua['size'][$i]['tile_sl']=number_format($tile_sl_size,2);
							$ket_qua['size'][$i]['tile_gt']=number_format($tile_gt_size,2);
							$i++;	
						}
					
				}
			echo json_encode($ket_qua);
		}
	mysqli_close($conn);
?>