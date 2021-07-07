
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Baheza</title>
</head>
<style type="text/css">
	/*$desktop: 1200px;
	$laptop: 992px;
	$tablet: 768px;
	$phone: 480px;*/
	body {
		margin: 0;
		padding: 0;
		background: url(img/bg.jpg);
		background-size: cover;
		/*background-position: center;*/
		font-family: sans-serif;
		background-attachment: fixed;
	}
	.loginbox {
		width: 320px;
		height: auto;
		background: #000;
		opacity: 0.85;
		color:#fff;
		top: 50%;
		left: 50%;
		position: absolute;
		transform: translate(-50%,-50%);
		box-sizing: border-box;
		padding: 70px 30px;
	}
	.avatar {
		width:100px;
		height:100px;
		border-radius: 50%;
		position: absolute;
		top: -50px;
		left: calc(50% - 50px);
	}
	h1 {
		margin: 0;
		padding: 0 0 20px;
		text-align: center;
	}
	.loginbox p {
		margin: 0;
		padding: 0;
		font-weight: bold;
	}
	.loginbox input {
		width: 100%;
		margin-bottom: 20px;
	}
	.loginbox input[type="text"], input[type="password"] {
		border: none;
		border-bottom: 1px solid #fff;
		background: transparent;
		outline: none;
		height: 40px;
		color: #fff;
		font-size: 16px;
	}
	.loginbox input[type="submit"] {
		border: none;
		outline: none;
		height: 40px;
		background: #1e2970;
		color: #fff;
		font-size: 18px;
		border-radius: 20px;
	}
	.loginbox input[type="submit"]:hover {
		cursor: pointer;
		background: #fff;
		color: #000;
	}
	.loginbox a {
		text-decoration: none;
		font-size: 12px;
		line-height: 20px;
		color: darkgrey;
	}
	.loginbox a:hover {
		color: #ffc107;
	}
	@media all and (max-width: 768px) {
		body{
			background: white;
		}
		.loginbox {
		top: 30%;
		left: 50%;
		transform: translate(-50%,-50%);
		padding: 70px 30px;
	}
		}
	@media all and (max-width: 480px) {
		body{
			background: white;
		}
		.loginbox {
		width: 300px;
		height: 400px;
		top: 40%;
		left: 50%;
		transform: translate(-50%,-50%);
		padding: 70px 30px;
	}
		}
</style>
<body>
	<div class="loginbox">
		<img src="img/icon/avatar.png" class="avatar">
		<h1>Login Here</h1>
		<form action="process.php" method="post">
			<p>Username</p>
			<input type="text" name="Uname" placeholder="Enter Username">
			<p>Password</p>
			<input type="password" name="password" placeholder="Enter password">
			<input type="submit" name="login" value="Login">
			<?php
				if(@$_GET['Empty']==true){
			?>
				<div style="color: red; text-align: center; background: white; padding: 10px; margin-bottom: 15px"><?php echo $_GET['Empty']; ?></div>
			<?php
				}
			?>

			<?php
				if(@$_GET['Invalid']==true){
			?>
				<div style="color: red; text-align: center; background: white; padding: 10px 0; margin-bottom: 15px"><?php echo $_GET['Invalid']; ?></div>
			<?php
				}
			?>

			<?php
				if(@$_GET['newpwd']==true){
			?>
				<div style="color: red; text-align: center; background: white; padding: 10px 0; margin-bottom: 15px"><?php echo $_GET['newpwd']; ?></div>
			<?php
				}
			?>
			<a href="reset_password.php">Lost your password?</a><br>
			<a href="registration.php">Don't have an account?</a>
		</form>
	</div>
</body>
</html>