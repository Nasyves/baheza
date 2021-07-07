<?php

require_once('connection.php');
session_start();

	if (isset($_POST['login'])) {
		if (empty($_POST['Uname']) || empty($_POST['password'])) {
			header('location: index.php?Empty= Please Fill in the Blanks');
		}
		else {
			$query = "select * from user where username='".$_POST['Uname']."' and password='".$_POST['password']."' ";
			$result = mysqli_query($con, $query);

			if(mysqli_fetch_assoc($result)) {
				$_SESSION['user'] = $_POST['Uname'];
				header('location: welcome.php');
			}
			else {
				header('location: index.php?Invalid= Please enter correct credentials');
			}
		}
	}
	else {
		
	}
?>