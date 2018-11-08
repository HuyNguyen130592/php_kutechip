<?php
	include('../conn.php');
	include('../session.php');
	mysqli_set_charset($conn, 'UTF8');
	$id = $_SESSION['login']['id'];
	$query = mysqli_query($conn,"SELECT * FROM `member` WHERE ID_Member='$id'");
	$row = mysqli_fetch_array($query);
	$name = addslashes($_POST['name']);
	$mobile=addslashes($_POST['mobile']);
	if(isset($_POST['password'])){$pass=md5($_POST['password']);}
	if($_POST['password']!=''){mysqli_query($conn,"UPDATE member SET Member_Name='$name',Member_Mobile='$mobile',Member_Pass='$pass' WHERE ID_Member='$id'");}else{mysqli_query($conn,"UPDATE member SET Member_Name='$name',Member_Mobile='$mobile' WHERE ID_Member='$id'"); }
	if($_FILES['img']['name']!='')
	{
		$name_img=$_FILES['img']['name'];
		$source_img = $_FILES['img']['tmp_name'];
		$path = "../dist/img/" . $name_img;
		move_uploaded_file($source_img,$path);
		mysqli_query($conn,"UPDATE member SET img='$name_img' WHERE ID_Member='$id'");
		}
	mysqli_close($conn);
	if($pass!=$row['Member_Pass']&&$_POST['password']!=''){header('location:../login.php');}else{header('location:../user_information.php');}
?>
				