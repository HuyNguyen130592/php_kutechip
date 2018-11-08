<?php
include("../conn.php");
mysqli_set_charset($conn, 'UTF8');
			
			$id_oder = addslashes($_GET['id']);
			
			$id_warehouse = addslashes($_GET['id_warehouse']);
			
			$query13 = mysqli_query($conn,"SELECT * FROM `oder` LEFT JOIN customer_detail ON oder.ID_Customer = customer_detail.ID_Customer WHERE oder.ID_Oder='$id_oder'");
			$row13 = mysqli_fetch_array($query13);
			if($row13['Oder_Notice_Shop']==null)
			{
				$shop_note ="Được xem hàng";
			}else
			{
				$shop_note = $row13['Oder_Notice_Shop'];
			}
			
			$id_cus = $row13['ID_Customer'];
			$oder_sum = $row13['Oder_Sum'];
			$cus_mobile = $row13['Customer_Mobile'];
			$cus_name = $row13['Customer_Name'];
			$cus_street = $row13['Customer_Street'];
			$cus_ward = $row13['ID_Ward'];
			$query14 = mysqli_query($conn,"SELECT district.name as district_name, district.type as district_type, province.name as province_name, province.type as province_type  FROM `customer_detail` LEFT JOIN district ON customer_detail.ID_District=district.ID LEFT JOIN province ON province.id = customer_detail.ID_Province WHERE customer_detail.ID_Customer='$id_cus'");
			$row14 = mysqli_fetch_array($query14);
			$cus_dis =$row14['district_name'];
			$cus_city = $row14['province_name'];
			$cus_add = $cus_street.", ".$cus_ward;
			$query15 = mysqli_query($conn,"SELECT delivery_warehouse_information.id,delivery_warehouse_information.name as warehouse_name,delivery_warehouse_information.street,delivery_warehouse_information.mobile,district.name AS district_name, district.type AS district_type, province.name AS province_name, province.type as province_type FROM delivery_warehouse_information LEFT JOIN district ON delivery_warehouse_information.id_district = district.ID LEFT JOIN province on delivery_warehouse_information.id_province = province.id WHERE delivery_warehouse_information.id='$id_warehouse'");
			$row15 = mysqli_fetch_array($query15);
			$name_warehouse = $row15['warehouse_name'];
			$mobile_warehouse= $row15['mobile'];
			$street_warehouse = $row15['street'];
			$district_warehouse = $row15['district_name'];
			$province_warehouse = $row15['province_name'];
			$query16 = mysqli_query($conn,"SELECT * FROM `delivery_information` WHERE id='DL01'");
			$row16 = mysqli_fetch_array($query16);
			$token = $row16['token'];
$abc = array(
				"products"=>array("name"=>"quần áo","weight"=> 0.2, "quantity"=> 1), 
				"order"=>array("id"=>$id_oder,"pick_name"=> $name_warehouse,"pick_address"=>  $street_warehouse, "pick_province"=>  $province_warehouse, "pick_district"=> $district_warehouse, "pick_tel"=> $mobile_warehouse,"tel"=>   $cus_mobile,"name"=> $cus_name,"address"=>$cus_add,"province"=> $cus_city,"district"=>  $cus_dis,"is_freeship"=>"1", "pick_date"=> "2016-09-30", "pick_date"=> "2016-09-30","pick_money"=> $oder_sum,"note"=>$shop_note,"value"=> $oder_sum)
				
			);

$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => "https://dev.ghtk.vn/services/shipment/order",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS =>json_encode($abc),
    CURLOPT_HTTPHEADER => array(
        "Content-Type: application/json",
        "Token:".$token,
        "Content-Length: " . strlen(json_encode($abc)),
    ),
));

$response = curl_exec($curl);
curl_close($curl);

echo 'Response: ' . $response;
$a = array();
$a=json_decode($response,true);
if($a['success']==true)
	{
		if($shop_note =="Giao một phần nhận một phần")
		{
			$fee = $a['order']['fee']*1.5;
		}else
		{
			$fee = $a['order']['fee'];
		}
		$id_ship=$a['order']['label'];
		
		$date_create=date('y-m-d');
		mysqli_query($conn,"UPDATE oder SET Oder_ShipFee_Delivery='$fee',Oder_Status='OS03',ID_delivery_supply='DL01',id_delivery='$id_ship',date_delivery_create='$date_create' WHERE ID_Oder='$id_oder'");
	}
mysqli_close($conn);
header("location:../delivery_status.php");
?>
