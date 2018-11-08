<?php
	include("conn.php");
	mysqli_set_charset($conn, 'UTF8');
	include("session.php");
	
	
	?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<title>Untitled Document</title>
</head>

<body>
	<select name="city" class="form-control" id="city" name="city">
     	<option value="">Chọn Thành phố/tỉnh</option>
        <?php
			$query10 = mysqli_query($conn,"SELECT * FROM `province`");
			while($row10 = mysqli_fetch_array($query10))
				{
					$id_province = $row10['id'];
					$name_province = $row10['name'];
                    $city_type =  $row10['type'];       	
                    echo"<option value='$id_province' data-typecity='$city_type'>$name_province</option>";
                                    
                                
				}
		?>
                            
    </select>
   <div id="district_add">
    <select name="distric" class="form-control" id="district" name="district">
    <option>Chọn quận/huyện</option>
     </select>
    </div>
    <input type="text" name="ward" placeholder="Điền tên Phường/xã" class="form-control" id="ward"/>
    <input type="text" id="city_demo" />
    <input type="text" id="district_demo"/>
   
    <input type="button" value="Gửi" id="send"/>
<?php mysqli_close($conn);?>     

<script>
	$(document).ready(function(e) {
        $('#send').click(function(){
			var a = $('#city_demo').val();
			var b = $('#district_demo').val();
			var c = $('#ward').val();
			axios({
				method: 'post',
				url: ' https://dev.ghtk.vn/services/shipment/order/?ver=1.5 HTTP/1.1',
				headers: {'Content-Type': 'application/json;charset=UTF-8','Token':'F328363DF249841c24989cac3DC75A9635B40907',"Access-Control-Allow-Origin": "*",'Access-Control-Allow-Credentials': true,},
				
				proxy: {
						host: '127.0.0.1',
						port: 9000,
						auth: {
						  username: 'mikeymike',
						  password: 'rapunz3l'
						}
					  },
				data: {
							 "products": [{
												"name": "bút",
												"weight": 0.1,
												"quantity": 1
											}, {
												"name": "tẩy",
												"weight": 0.2,
												"quantity": 1
											}],
											"order": {
												"id": "a4",
												"pick_name": "HCM-nội thành",
												"pick_address": "590 CMT8 P.11",
												"pick_province": "TP. Hồ Chí Minh",
												"pick_district": "Quận 3",
												"pick_tel": "0911222333",
												"tel": "0911222333",
												"name": "GHTK - HCM - Noi Thanh",
												"address": "123 nguyễn chí thanh",
												"province": "TP. Hồ Chí Minh",
												"district": "Quận 1",
												"is_freeship": "1",
												"pick_date": "2016-09-30",
												"pick_money": 47000,
												"note": "Khối lượng tính cước tối đa: 1.00 kg",
												"value": 3000000
											}						}
				
				}).then(function (response) {console.log(response);});
			});
    });
</script>  
</body>
</html>