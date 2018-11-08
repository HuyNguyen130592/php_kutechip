<?php
	include('conn.php');
	mysqli_set_charset($conn, 'UTF8');
	session_start();
	function check_input($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
	function left($str, $length) {
     return substr($str, 0, $length);
	}

	function right($str, $length) {
     return substr($str, -$length);
	}
	
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$username=check_input($_POST['username']);
		
		if (!preg_match("/^[a-zA-Z0-9_]*$/",$username)) {
			$_SESSION['msg'] = "Username should not contain space and special characters!"; 
			header('location:login.php');
		}
		else{
			
		$fusername=$username;
		
		$password = check_input($_POST["password"]);
		$fpassword=md5($password);
		
		$query=mysqli_query($conn,"select * from `member` where Member_Acc='$fusername' and Member_Pass='$fpassword'");
		
		if(mysqli_num_rows($query)==0){
			$_SESSION['login']['msg'] = "Login Failed, Invalid Input!";
			header('location:login.php');
		}
		else{
			
			$row=mysqli_fetch_array($query);
			if (left($row['ID_Member_Duty'],2)=="DT"){
				$_SESSION['login']['id']=$row['ID_Member'];
				$_SESSION['login']['name']=$row['Member_Name'];
				$_SESSION['login']['img']=$row['img'];
				?>
				<script>
					window.alert('Login Success, Welcome Boss!');
					window.location.href='index.php';
				</script>
				<?php
			}
			elseif (left($row['ID_Member_Duty'],2)=="MB"){
				$_SESSION['login']['id']=$row['ID_Member'];
				$_SESSION['login']['name']=$row['Member_Name'];
				$_SESSION['login']['img']=$row['img'];
				?>
				<script>
					window.alert('Login Success, Welcome User!');
					window.location.href='index.php';
				</script>
				<?php
			}
			else{
				$_SESSION['login']['id']=$row['ID_Member'];
				$_SESSION['login']['name']=$row['Member_Name'];
				$_SESSION['login']['img']=$row['img'];
				?>
				<script>
					window.alert('Login Success, Welcome Supplier!');
					window.location.href='index.html';
				</script>
				<?php
			}
		}
		
		}
	}
?>