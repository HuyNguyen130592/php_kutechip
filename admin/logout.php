<?php
	include("session.php");
	unset($_SESSION['login']);
	
 ?>
	 				<script>
                        window.alert('Logout Success, Goodbye Boss!');
                        window.location.href='login.php';
                    </script>