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
			
			
			$query2 = mysqli_query($conn,"SELECT SUM(oder.Oder_ShipFee_Delivery) as tong_ship , SUM(Oder_Sum) as tong_tien,COUNT(ID_Oder) as tong_don FROM oder WHERE Oder_Date<='$date_end' AND Oder_Date>='$date_start'");
			$row2 = mysqli_fetch_array($query2);
			$tong_tien = $row2['tong_tien'];
			
			$tong_don = $row2['tong_don'];
			
			$tong_ship = $row2['tong_ship'];
			$ket_qua['doanh_thu'][0]['trang_thai']='Tổng số đơn hàng';
			$ket_qua['doanh_thu'][0]['so_luong']=number_format($tong_don);
			$ket_qua['doanh_thu'][0]['gia_tri']=number_format($tong_tien);
			$ket_qua['doanh_thu'][0]['tile_sl']=100;
			$ket_qua['doanh_thu'][0]['tile_gt']=100;
			
			$i=1;
			$query1 = mysqli_query($conn,"SELECT Oder_Status.Name as Oder_Status_name,SUM(oder.Oder_Sum) as tong_tien,COUNT(oder.ID_Oder) as tong_don FROM oder INNER JOIN Oder_Status ON oder.Oder_Status=oder_status.ID WHERE oder.Oder_Date<='$date_end' AND oder.Oder_Date >= '$date_start' GROUP BY Oder_Status.Name ORDER BY Oder_Status.Name");
			while($row1=mysqli_fetch_array($query1))
				{
					$trang_thai = $row1['Oder_Status_name'];
					if($row1['tong_tien']!=null){$gia_tri = $row1['tong_tien'];}else{$gia_tri =0;}
					if($row1['tong_don']!=null){$so_luong = $row1['tong_don'];}else{$so_luong =0;}
					$ti_le_gt = number_format($gia_tri/$tong_tien*100,2);
					
					$ti_le_sl = number_format($so_luong/$tong_don*100);
					
					$ket_qua['doanh_thu'][$i]['trang_thai']=$trang_thai;
					$ket_qua['doanh_thu'][$i]['so_luong']=number_format($so_luong);
					$ket_qua['doanh_thu'][$i]['gia_tri']=number_format($gia_tri);
					$ket_qua['doanh_thu'][$i]['tile_sl']=$ti_le_sl;
					$ket_qua['doanh_thu'][$i]['tile_gt']=$ti_le_gt;
					
					$i++;
				}
			$ket_qua['dich_vu_giao_hang'][0]['ten_gh']='Tổng số đơn hàng';
			$ket_qua['dich_vu_giao_hang'][0]['so_luong']=number_format($tong_don);
			$ket_qua['dich_vu_giao_hang'][0]['gia_tri']=number_format($tong_tien);
			$ket_qua['dich_vu_giao_hang'][0]['tile_sl']=100;
			$ket_qua['dich_vu_giao_hang'][0]['tile_gt']=100;
			$ket_qua['dich_vu_giao_hang'][0]['tien_ship']=number_format($tong_ship);
			
			
			$query3 = mysqli_query($conn,"SELECT delivery_information.name as delivery_information_name,SUM(oder.Oder_Sum) AS tong_tien,COUNT(oder.ID_Oder) AS tong_don,SUM(oder.Oder_ShipFee_Delivery) as Oder_ShipFee_Delivery FROM oder INNER JOIN delivery_information ON oder.ID_delivery_supply = delivery_information.id WHERE oder.Oder_Date<='$date_end' AND oder.Oder_Date>='$date_start' GROUP BY delivery_information.name ORDER BY delivery_information.name");
			$i=1;
			while($row3 = mysqli_fetch_array($query3))
				{
					$gh_ten = $row3['delivery_information_name'];
					if($row3['tong_tien']!=null){$sl_gh = $row3['tong_don'];}else{$sl_gh =0;}
					if($row3['tong_don']!=null){$gt_gh= $row3['tong_tien'];}else{$gt_gh=0;}
					if($row3['Oder_ShipFee_Delivery']!=null){$fee_gh = number_format($row3['Oder_ShipFee_Delivery']);}else{$fee_gh=0;}
					$tile_sl=number_format($sl_gh/$tong_don*100,2);
					
					$tile_gt=number_format($gt_gh/$tong_tien*100,2);
					
					$ket_qua['dich_vu_giao_hang'][$i]['ten_gh']=$gh_ten;
					$ket_qua['dich_vu_giao_hang'][$i]['so_luong']=number_format($sl_gh);
					$ket_qua['dich_vu_giao_hang'][$i]['gia_tri']=number_format($gt_gh);
					$ket_qua['dich_vu_giao_hang'][$i]['tile_sl']=$tile_sl;
					$ket_qua['dich_vu_giao_hang'][$i]['tile_gt']=$tile_gt;
					$ket_qua['dich_vu_giao_hang'][$i]['tien_ship']=$fee_gh;
					
					$i++;
					
				}
			$ket_qua['khu_vuc'][0]['khu_vuc']='Tổng số đơn hàng';
			$ket_qua['khu_vuc'][0]['so_luong']=number_format($tong_don);
			$ket_qua['khu_vuc'][0]['gia_tri']=number_format($tong_tien);
			$ket_qua['khu_vuc'][0]['tile_sl']=100;
			$ket_qua['khu_vuc'][0]['tile_gt']=100;
			$ket_qua['khu_vuc'][0]['tien_ship']=number_format($tong_ship);
			
			$query4 = mysqli_query($conn,"SELECT province.name as province_name,SUM(oder.Oder_Sum) AS tong_tien,COUNT(oder.ID_Oder) as tong_don,SUM(oder.Oder_ShipFee_Delivery) as phi_ship FROM customer_detail INNER JOIN oder ON customer_detail.ID_Customer=oder.ID_Customer INNER JOIN province ON province.id=customer_detail.ID_Province WHERE oder.Oder_Date<='$date_end' AND oder.Oder_Date>='$date_start' GROUP BY province.name ORDER BY province.name");
			$i=1;
			while($row4 = mysqli_fetch_array($query4))
				{
					$khu_vuc = $row4['province_name'];
					if($row4['tong_don']!=null){$sl_kv = $row4['tong_don'];}else{$sl_kv=0;}
					if($row4['tong_tien']!=null){$gt_kv = $row4['tong_tien'];}else{$gt_kv=0;}
					if($row4['phi_ship']!=null){$fee_kv = number_format($row4['phi_ship']);}else{$fee_kv=0;}
					$tile_sl_kv = number_format($sl_kv/$tong_don*100,2);
					$tile_gt_kv = number_format($gt_kv/$tong_tien*100,2);
					$ket_qua['khu_vuc'][$i]['khu_vuc']=$khu_vuc;
					$ket_qua['khu_vuc'][$i]['so_luong']=number_format($sl_kv);
					$ket_qua['khu_vuc'][$i]['gia_tri']=number_format($gt_kv);
					$ket_qua['khu_vuc'][$i]['tile_sl']=$tile_sl_kv;
					$ket_qua['khu_vuc'][$i]['tile_gt']=$tile_gt_kv;
					$ket_qua['khu_vuc'][$i]['tien_ship']=$fee_kv;
					
					$i++;
				}
			
			$query4_1 = mysqli_query($conn,"SELECT SUM(oder_detail.Oder_Quantity*oder_detail.Oder_Product_Price) AS tong_tien, SUM(oder_detail.Oder_Quantity) as tong_sl FROM oder_detail");
			$row4_1 = mysqli_fetch_array($query4_1);
			$tong_sl_don = $row4_1['tong_sl'];
			$tong_gt_don = $row4_1['tong_tien'];
			$ket_qua['chung_loai'][0]['chung_loai']='Tổng số đơn hàng';
			$ket_qua['chung_loai'][0]['so_luong']=number_format($tong_sl_don);
			$ket_qua['chung_loai'][0]['gia_tri']=number_format($tong_gt_don);
			$ket_qua['chung_loai'][0]['tile_sl']=100;
			$ket_qua['chung_loai'][0]['tile_gt']=100;
			
			
			$query5 = mysqli_query($conn,"SELECT * FROM `product_kind` ");
			$i=1;
			while($row5 = mysqli_fetch_array($query5))
				{
					$id_kind = $row5['ID_Product_Kind'];
					$name_kind = $row5['Product_Kind_Name'];
					$query6=mysqli_query($conn,"SELECT SUM(oder_detail.Oder_Quantity*oder_detail.Oder_Product_Price) AS tong_tien,SUM(oder_detail.Oder_Quantity) as tong_sl FROM oder_detail INNER JOIN oder ON oder_detail.ID_Oder=oder.ID_Oder  INNER JOIN product_main ON product_main.ID_Product=oder_detail.ID_Product WHERE oder.Oder_Date<='$date_end' AND oder.Oder_Date>='$date_start' AND product_main.ID_Product_Type IN (SELECT product_type.ID_Product FROM product_type INNER JOIN product_category ON product_category.id=product_type.id_category WHERE product_category.kind='$id_kind')");
					$row6 = mysqli_fetch_array($query6);
					$sl_kind = $row6['tong_sl'];
					$gt_knd = $row6['tong_tien'];
					$tile_sl_don = $sl_kind/$tong_sl_don*100;
					$tile_gt_don = $gt_knd/$tong_gt_don*100;
					$ket_qua['chung_loai'][$i]['chung_loai']=$name_kind;
					$ket_qua['chung_loai'][$i]['so_luong']=number_format($sl_kind);
					$ket_qua['chung_loai'][$i]['gia_tri']=number_format($gt_knd);
					$ket_qua['chung_loai'][$i]['tile_sl']=number_format($tile_sl_don,2);
					$ket_qua['chung_loai'][$i]['tile_gt']=number_format($tile_gt_don,2);
					
					
					$i++;
				}
			$ket_qua['nhom_san_pham'][0]['nhom_sp']='Tổng số đơn hàng';
			$ket_qua['nhom_san_pham'][0]['so_luong']=number_format($tong_sl_don);
			$ket_qua['nhom_san_pham'][0]['gia_tri']=number_format($tong_gt_don);
			$ket_qua['nhom_san_pham'][0]['tile_sl']=100;
			$ket_qua['nhom_san_pham'][0]['tile_gt']=100;
			
			
			$i=1;
			
			$query7 = mysqli_query($conn,"SELECT product_category.id,product_category.name FROM product_category");
			while($row7 = mysqli_fetch_array($query7))
				{
					$id_cat = $row7['id'];
					
					$name_cat = $row7['name'];
					$query8 = mysqli_query($conn,"SELECT SUM(oder_detail.Oder_Quantity*oder_detail.Oder_Product_Price) AS tong_tien,SUM(oder_detail.Oder_Quantity)AS tong_sl FROM oder_detail INNER JOIN oder ON oder_detail.ID_Oder=oder.ID_Oder INNER JOIN product_main ON oder_detail.ID_Product=product_main.ID_Product WHERE oder.Oder_Date<='$date_end' AND oder.Oder_Date>='$date_start' AND product_main.ID_Product_Type IN(SELECT product_type.ID_Product FROM product_type WHERE product_type.id_category='$id_cat')");
					$row8 = mysqli_fetch_array($query8);
					
					$sl_cat = $row8['tong_sl'];
					$gt_cat = $row8['tong_tien'];
					$tile_sl_cat = $sl_cat/$tong_sl_don*100;
					$tile_gt_cat = $gt_cat/$tong_gt_don*100;
					$ket_qua['nhom_san_pham'][$i]['nhom_sp']=$name_cat;
					$ket_qua['nhom_san_pham'][$i]['so_luong']=number_format($sl_cat);
					$ket_qua['nhom_san_pham'][$i]['gia_tri']=number_format($gt_cat);
					$ket_qua['nhom_san_pham'][$i]['tile_sl']=number_format($tile_sl_cat,2);
					$ket_qua['nhom_san_pham'][$i]['tile_gt']=number_format($tile_gt_cat,2);
					$i++;
					
				}
			$ket_qua['san_pham'][0]['san_pham']='Tổng số đơn hàng';
			$ket_qua['san_pham'][0]['so_luong']=number_format($tong_sl_don);
			$ket_qua['san_pham'][0]['gia_tri']=number_format($tong_gt_don);
			$ket_qua['san_pham'][0]['tile_sl']=100;
			$ket_qua['san_pham'][0]['tile_gt']=100;
			
			$query9 = mysqli_query($conn,"SELECT product_type.ID_Product,product_type.Name_Product FROM product_type");
			$i=1;
			while($row9 = mysqli_fetch_array($query9))
				{
					$ten_sp = $row9['Name_Product'];
					
					$ma_sp = $row9['ID_Product'];
					$query10 = mysqli_query($conn,"SELECT SUM(oder_detail.Oder_Quantity*oder_detail.Oder_Product_Price) AS tong_tien,SUM(oder_detail.Oder_Quantity) AS tong_sl FROM oder_detail INNER JOIN oder ON oder_detail.ID_Oder=oder.ID_Oder INNER JOIN product_main ON oder_detail.ID_Product=product_main.ID_Product WHERE oder.Oder_Date<='$date_end' AND oder.Oder_Date>='$date_start'AND product_main.ID_Product IN(SELECT product_main.ID_Product FROM product_main WHERE product_main.ID_Product_Type='$ma_sp') ");
					$row10 = mysqli_fetch_array($query10);
					$tong_tien_sp = $row10['tong_tien'];
					$tong_sl_sp = $row10['tong_sl'];
					$tile_sl_sp = number_format($tong_sl_sp/$tong_sl_don*100,2);
					$tile_gt_sp = number_format($tong_tien_sp/$tong_gt_don*100,2);
					if($row10['tong_tien']!=null)
						{
							$ket_qua['san_pham'][$i]['san_pham']=$ten_sp;
							$ket_qua['san_pham'][$i]['so_luong']=number_format($tong_sl_sp);
							$ket_qua['san_pham'][$i]['gia_tri']=number_format($tong_tien_sp);
							$ket_qua['san_pham'][$i]['tile_sl']=$tile_sl_sp;
							$ket_qua['san_pham'][$i]['tile_gt']=$tile_gt_sp;
							$i++;
						}
					
				}
			$ket_qua['mau_sac'][0]['mau_sac']='Tổng số đơn hàng';
			$ket_qua['mau_sac'][0]['so_luong']=number_format($tong_sl_don);
			$ket_qua['mau_sac'][0]['gia_tri']=number_format($tong_gt_don);
			$ket_qua['mau_sac'][0]['tile_sl']=100;
			$ket_qua['mau_sac'][0]['tile_gt']=100;
			
			$query11 = mysqli_query($conn,"SELECT color.ID_Color,color.Color_Name FROM color");
			$i=1;
			while($row11 = mysqli_fetch_array($query11))
				{
					$ten_mau = $row11['Color_Name'];
					$id_mau = $row11['ID_Color'];
					$query12 = mysqli_query($conn,"SELECT SUM(oder_detail.Oder_Quantity*oder_detail.Oder_Product_Price) AS tong_tien, SUM(oder_detail.Oder_Quantity) AS tong_sl FROM oder_detail INNER JOIN oder ON oder_detail.ID_Oder=oder.ID_Oder INNER JOIN product_main ON product_main.ID_Product=oder_detail.ID_Product WHERE oder.Oder_Date<='$date_end' AND oder.Oder_Date>='$date_start' AND product_main.ID_Color='$id_mau'");
					$row12 = mysqli_fetch_array($query12);
					$tong_sl_mau = $row12['tong_sl'];
					$tong_gt_mau = $row12['tong_tien'];
					$tile_sl_mau = number_format($tong_sl_mau/$tong_sl_don*100,2);
					$tile_gt_mau = number_format($tong_gt_mau/$tong_gt_don*100,2);
					if($row12['tong_sl']!=null)
						{
							$ket_qua['mau_sac'][$i]['mau_sac']=$ten_mau;
							$ket_qua['mau_sac'][$i]['so_luong']=number_format($tong_sl_mau);
							$ket_qua['mau_sac'][$i]['gia_tri']=number_format($tong_gt_mau);
							$ket_qua['mau_sac'][$i]['tile_sl']=$tile_sl_mau;
							$ket_qua['mau_sac'][$i]['tile_gt']=$tile_gt_mau;
							$i++;
						}
					
					
				}
			$ket_qua['size'][0]['size']='Tổng số đơn hàng';
			$ket_qua['size'][0]['so_luong']=number_format($tong_sl_don);
			$ket_qua['size'][0]['gia_tri']=number_format($tong_gt_don);
			$ket_qua['size'][0]['tile_sl']=100;
			$ket_qua['size'][0]['tile_gt']=100;
			
			$query13 = mysqli_query($conn,"SELECT * FROM `size`");
			$i=1;
			while($row13= mysqli_fetch_array($query13))
				{
					$ten_size = $row13['Size_Name'];
					
					$id_size = $row13['ID_Size'];
					$query14 = mysqli_query($conn,"SELECT SUM(oder_detail.Oder_Quantity*oder_detail.Oder_Product_Price) AS tong_tien, SUM(oder_detail.Oder_Quantity) AS tong_sl FROM oder_detail INNER JOIN oder ON oder_detail.ID_Oder=oder.ID_Oder INNER JOIN product_main ON oder_detail.ID_Product=product_main.ID_Product WHERE oder.Oder_Date<='$date_end' AND oder.Oder_Date>='$date_start' AND product_main.ID_Size='$id_size'");
					$row14 = mysqli_fetch_array($query14);
					$tong_sl_size = $row14['tong_sl'];
					$tong_gt_size = $row14['tong_tien'];
					$tile_sl_size = number_format($tong_sl_size/$tong_sl_don*100,2);
					$tile_gt_size = number_format($tong_gt_size/$tong_gt_don*100,2);
					if($row14['tong_sl']!=null)
						{
							$ket_qua['size'][$i]['size']=$ten_size;
							$ket_qua['size'][$i]['so_luong']=number_format($tong_sl_size);
							$ket_qua['size'][$i]['gia_tri']=number_format($tong_gt_size);
							$ket_qua['size'][$i]['tile_sl']=$tile_sl_size;
							$ket_qua['size'][$i]['tile_gt']=$tile_gt_size;
							$i++;
						}
					
				}
			$query15 = mysqli_query($conn,"SELECT MONTH(oder.Oder_Date) AS thang,sum(oder_detail.Oder_Quantity*oder_detail.Oder_Product_Price) AS tong_tien, SUM(oder_detail.Oder_Quantity) AS tong_sl,COUNT(oder_detail.ID_Oder) AS so_don FROM oder_detail INNER JOIN oder ON oder_detail.ID_Oder=oder.ID_Oder WHERE oder.Oder_Date<='$date_end' AND oder.Oder_Date>='$date_start' GROUP BY MONTH(oder.Oder_Date) ORDER BY MONTH(oder.Oder_Date)");
			
			
			$i=0;
			while($row15 = mysqli_fetch_array($query15))
				{
					$ket_qua['bieu_do_thang']['thang'][$i]=$row15['thang'];
					$ket_qua['bieu_do_thang']['sl_thang'][$i]=(int) $row15['tong_sl'];
					$ket_qua['bieu_do_thang']['sd_thang'][$i]=(int) $row15['so_don'];
					$ket_qua['bieu_do_thang']['gt_thang'][$i]=(int) $row15['tong_tien'];
					$i++;
				}
			
			$query16 = mysqli_query($conn,"SELECT WEEK(oder.Oder_Date) AS tuan,sum(oder_detail.Oder_Quantity*oder_detail.Oder_Product_Price) AS tong_tien, SUM(oder_detail.Oder_Quantity) AS tong_sl,COUNT(oder_detail.ID_Oder) AS so_don FROM oder_detail INNER JOIN oder ON oder_detail.ID_Oder=oder.ID_Oder WHERE oder.Oder_Date<='$date_end' AND oder.Oder_Date>='$date_start' GROUP BY WEEK(oder.Oder_Date) ORDER BY WEEK(oder.Oder_Date)");
			$i=0;
			while($row16 = mysqli_fetch_array($query16))
				{
					$tuan = $row16['tuan'];
					$sl_tuan = $row16['tong_sl'];
					$gt_tuan= $row16['tong_tien'];
					$so_don_tuan = $row16['so_don'];
					$ket_qua['bieu_do_tuan']['tuan'][$i]=$tuan;
					$ket_qua['bieu_do_tuan']['sl_tuan'][$i]=(int) $sl_tuan;
					$ket_qua['bieu_do_tuan']['sd_tuan'][$i]=(int) $so_don_tuan;
					$ket_qua['bieu_do_tuan']['gt_tuan'][$i]=(int) $gt_tuan;
					$i++;
					
				}
			
			$query17 = mysqli_query($conn,"SELECT oder.Oder_Date, SUM(oder_detail.Oder_Quantity*oder_detail.Oder_Product_Price) AS tong_tien,SUM(oder_detail.Oder_Quantity) AS tong_sl,COUNT(oder_detail.ID_Oder) AS tong_don FROM oder_detail INNER JOIN oder ON oder_detail.ID_Oder=oder.ID_Oder  WHERE oder.Oder_Date<='$date_end' AND oder.Oder_Date>='$date_start' GROUP BY oder.Oder_Date");
			$i=0;
			while($row17 = mysqli_fetch_array($query17))
				{
					
					$ngay = date('d/m/Y ',strtotime($row17['Oder_Date']));
					$sl_ngay = $row17['tong_sl'];
					$gt_ngay= $row17['tong_tien'];
					$so_don_ngay = $row17['tong_don'];
					$ket_qua['bieu_do_ngay']['ngay'][$i]=$ngay;
					$ket_qua['bieu_do_ngay']['sl_ngay'][$i]= (int)$sl_ngay;
					$ket_qua['bieu_do_ngay']['sd_ngay'][$i]=(int) $so_don_ngay;
					$ket_qua['bieu_do_ngay']['gt_ngay'][$i]=(int) $gt_ngay;
					$i++;
				}
			echo json_encode($ket_qua);
			
		}
	
	
	
mysqli_close($conn);	
?>
