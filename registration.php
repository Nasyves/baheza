
<?php
	include('connection.php');
if (isset($_POST['submit'])) {
	$username = $_POST['uname'];
	$firstname = $_POST['fname'];
	$lastname = $_POST['lname'];
	$password =password_hash($_POST['pass'], PASSWORD_DEFAULT);
	$idnumber = $_POST['idnumber'];
	$rssb = $_POST['rssb'];
	$phone = $_POST['phone'];
	$usertype = $_POST['usertype'];

	$stmt = $con->prepare('insert into user (username,firstname,lastname,password,idnumber,rssbnumber,phone,usertype,status) values(?,?,?,?,?,?,?,?,1)');
	$stmt->bind_param("ssssisss",$username,$firstname,$lastname,$password,$idnumber,$rssb,$phone,$usertype);
	$stmt->execute();
	header('location:index.php');
}
	
?>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
	<title>Signup</title>
</head>
<style type="text/css">
	body {
		margin: 0;
		padding: 0;
		box-sizing: border-box;
		font-family: sans-serif;
		background-image: url(img/bg.jpg);
		background-size: cover;
		background-attachment: fixed;
	}
	.container {
		justify-content: center;
		align-items: center;
		margin: 0 auto;
		max-width: 800px;
		height: auto;
		background-color: #fbfbfb;
		display: flex;
		margin-top: 50px;
	}
	.section1 {
		width: 40%;
		margin-left: 30px;
	}
	.section2 {
		width:  50%;
	}
	.section2 > img {
		width: 80%;
	}
	h5 {
		margin-top: -12px;
		font-size: 1.4em;
		margin-left: 100px;
	}
	h1 {
		text-align: center;
	}
	label {
		text-transform: uppercase;
		font-size: 11px;
		color: gray;
	}
	input, select {
		border: none;
		border-bottom: 1px solid lightgray;
		width:  100%;
		background: #fbfbfb;
		position: relative;
		top: -12px;
		padding: 5px;
	}
	input:focus , select:focus {
		outline: none;
		border-bottom: 2px solid #1e2970;
	}
	#password:focus {
		color: #1e2970;
		font-size: 16px;
		font-weight: bolder;
	}
	#btn {
		border:  none;
		background-color: #1e2970;
		width: 120px;
		border-radius: 20px;
		padding: 10px;
		color: white;
	}
	p {
		font-size: small;
	}
	.line {
		border-bottom: 1px solid #1e2970;
		width: 100%;
		margin-top: 30px;
	}
	.socialicons {
		display: flex;
	}
	.icon {
		margin: 15px 12px;
		position: relative;
		left: 30px;
		width: 25px;
		height: 25px;
		border-radius: 50%;
		border: 2px solid black;
		line-height: 25px;
		font-size: 12px;
	}
	.fab {
		position: relative;
		left: 6px;
	}
	h6 {
		font-size: 12px;
	}
	.icon:hover {
		box-shadow: 0 0 10px black;
		background-color: brown;
	}
</style>
<body>
	<div class="container">
		<div class="section1"> <!--form section-->
			<h1>Register</h1>
			<form method="post">
			<div class="formGroup">
				<p><label for="username">User Name</label></p>
				<input type="text" name="uname" id="username" autocomplete="off">
			</div>
			<div class="formGroup">
				<p><label for="firstname">First Name</label></p>
				<input type="text" name="fname" id="firstname" autocomplete="off">
			</div>
			<div class="formGroup">
				<p><label for="lastname">Last Name</label></p>
				<input type="text" name="lname" id="lastname" autocomplete="off">
			</div>
			<div class="formGroup">
				<p><label for="password">Password</label></p>
				<input type="password" name="pass" id="password" autocomplete="off">
			</div>
			<div class="formGroup">
				<p><label for="idnumber">ID Number</label></p>
				<input type="number" name="idnumber" id="idnumber" autocomplete="off">
			</div>
			<div class="formGroup">
				<p><label for="rssb">RSSB Number</label></p>
				<input type="text" name="rssb" id="rssb" autocomplete="off">
			</div>
			<div class="formGroup">
				<p><label for="phone">Phone</label></p>
				<input type="text" name="phone" id="phone" autocomplete="off">
			</div>
			<div class="formGroup">
				<p><label for="usertype">Usertype</label></p>
				<select name="usertype" id="usertype">
					<option value="admin">Admin</option>
					<option value="comptable">Comptable</option>
					<option value="supervisor">Superviseur</option>
					<option value="receiver">Receiver</option>
					<option value="man power">Man Power</option>
					<option value="driver">Driver</option>
				</select>
			</div>
			<p><button type="submit" name="submit" id="btn"> Sign Up Now</button></p>
		</form>
			<p>Already have an account? <a href="index.php">Sign in</a></p>
			<div class="line"></div> <!--for horizontal line-->
			<!--let's add social media-->
			<div class="socialicons">
				<h6>or connect with - </h6>
				<div class="fb icon"><i class="fab fa-facebook-f"></i></div>
				<div class="twitter icon"><i class="fab fa-twitter"></i></div>
				<div class="google icon"><i class="fab fa-google"></i></div>
			</div>
		</div>

		<div class="section2"> <!--image section-->

			<h5>Welcome to Baheza</h5>
			<img src="img/bg2.jpg" alt="bin image">	
		</div>
	</div>
</body>
</html>