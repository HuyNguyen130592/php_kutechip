<?php
include("../conn.php");
mysqli_set_charset($conn, 'UTF8');
$id_oder = $_GET['id_oder'];
$id_warehouse = $_GET['id_warehouse'];
$id_service = $_GET['id_service'];
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
			$cus_id_district = $row13['ID_District'];
			$cus_id_city = $row13['ID_Province'];
			$query14 = mysqli_query($conn,"SELECT district.name as district_name, district.type as district_type, province.name as province_name, province.type as province_type  FROM `customer_detail` LEFT JOIN district ON customer_detail.ID_District=district.ID LEFT JOIN province ON province.id = customer_detail.ID_Province WHERE customer_detail.ID_Customer='$id_cus'");
			$row14 = mysqli_fetch_array($query14);
			$cus_dis =$row14['district_name'];
			$cus_city = $row14['province_name'];
			$cus_add = $cus_street.", ".$cus_ward;
			$query15 = mysqli_query($conn,"SELECT delivery_warehouse_information.id,delivery_warehouse_information.name as warehouse_name,delivery_warehouse_information.street,delivery_warehouse_information.mobile,district.name AS district_name, province.name AS province_name,delivery_warehouse_information.id_district,delivery_warehouse_information.id_province FROM delivery_warehouse_information LEFT JOIN district ON delivery_warehouse_information.id_district = district.ID LEFT JOIN province on delivery_warehouse_information.id_province = province.id WHERE delivery_warehouse_information.id='$id_warehouse'");
			$row15 = mysqli_fetch_array($query15);
			$name_warehouse = $row15['warehouse_name'];
			$mobile_warehouse= $row15['mobile'];
			$street_warehouse = $row15['street'];
			$district_warehouse = $row15['district_name'];
			$province_warehouse = $row15['province_name'];
			$warehouse_id_district = $row15['id_district'];
			$warehouse_id_province = $row15['id_province'];
			$query16 = mysqli_query($conn,"SELECT * FROM `delivery_information` WHERE id='DL02'");
			$row16 = mysqli_fetch_array($query16);
			$token = $row16['token'];
$abc = array(
				"token"=>$token,
				"PaymentTypeID"=> 1,
				"FromDistrictID"=>(int)$warehouse_id_district ,
				"FromWardCode"=>"0",
				"ToDistrictID"=>(int)$cus_id_district,
				"ToWardCode"=> "",
				"Note"=> $shop_note,
				"SealCode"=> "tem niêm phong",
				"ExternalCode"=> "",
				"ClientContactName"=>$name_warehouse ,
				"ClientContactPhone"=> $mobile_warehouse,
				"ClientAddress"=> $street_warehouse,
				"CustomerName"=> $cus_name,
				"CustomerPhone"=> $cus_mobile,
				"ShippingAddress"=> $cus_add,
				"CoDAmount"=>(int) $oder_sum,
				"NoteCode"=> "CHOXEMHANGKHONGTHU",
				"InsuranceFee"=> (int)$oder_sum,
				"ClientHubID"=> 0,
				"ServiceID"=> (int)$id_service,
				"ToLatitude"=> 0,
				"ToLongitude"=> 0,
				"FromLat"=>0,
				"FromLng"=>0,
				"Content"=> "",
				"CouponCode"=> "",
				"Weight"=> 200,
				"Length"=> 20,
				"Width"=> 10,
				"Height"=> 10,
				"CheckMainBankAccount"=> false,
				
				"ReturnContactName"=> "",
				"ReturnContactPhone"=> "",
				"ReturnAddress"=> "",
				"ReturnDistrictCode"=> "",
				"ExternalReturnCode"=> "",
				"IsCreditCreate"=> false
				);

$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => "http://api.serverapi.host/api/v1/apiv3/CreateOrder",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS => json_encode($abc),
    CURLOPT_HTTPHEADER => array(
        "Content-Type: application/json",
       
        "Content-Length: " . strlen(json_encode($abc)),
    ),
));

$response = curl_exec($curl);
curl_close($curl);

$result = json_decode($response,true);
if($result['code']==1)
	{
		$fee_result = $result['data']['TotalServiceFee'];
		$id_result = $result['data']['OrderCode'];
		$date_create=date('y-m-d');
		mysqli_query($conn,"UPDATE oder SET Oder_ShipFee_Delivery='$fee_result',Oder_Status='OS03',ID_delivery_supply='DL02',id_delivery='$id_result',date_delivery_create='$date_create' WHERE ID_Oder='$id_oder'");
		mysqli_close($conn);
		header("location:../delivery_status.php");
	}else{header("location:../delivery_send.php");}
mysqli_close($conn);

?>