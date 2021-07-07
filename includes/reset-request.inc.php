<?php

if (isset($_POST['reset-request-submit'])) {
	
	$selector = bin2hex(random_bytes(8));
	$token = random_bytes(32);

	$url = "www.baheza.com/create-new-password.php?selector=".$selector."&validator".bin2hex($token);

	$expires = date("U") + 1800;

	require '../connection.php';

	$userEmail = $_POST['email'];

	$sql = "DELETE FROM pwdReset WHERE pwdResetEmail=?";
	$stmt = mysqli_stmt_init($con);
	if(!mysqli_stmt_prepare($stmt, $sql)) {
		echo "there was an error!";
		exit();
	} else {
		mysqli_stmt_bind_param($stmt, "s", $userEmail);
		mysqli_stmt_execute($stmt);
	}

	$sql = "INSERT INTO pwdReset (pwdResetEmail, pwdResetSelector, pwdResetToken,pwdResetExpires) value(?,?,?,?)";
	$stmt = mysqli_stmt_init($con);
	if(!mysqli_stmt_prepare($stmt, $sql)) {
		echo "there was an error!";
		exit();
	} else {
		$hashedToken = password_hash($token, PASSWORD_DEFAULT);
		mysqli_stmt_bind_param($stmt, "ssss", $userEmail, $selector, $hashedToken, $expires);
		mysqli_stmt_execute($stmt);
	}

	mysqli_stmt_close($stmt);
	mysqli_close($con);

	$to = $userEmail;

	$subject = 'Reset your Password for Baheza';

	$message = '<p>We have received a password reset request. the link to reset your password is bellow if not make this request, you can ignore this email.</p>';
	$message .= '<p>Here is your password reset link: </br>';
	$message .= '<a href="' .$url. '">' .$url. '</a></p>';

	$headers = "From: Baheza <info@baheza.com>\r\n";
	$headers .= "Reply-To: info@baheza.com\r\n";
	$header .= "Content-type: text/html\r\n";

	mail($to, $subject, $message, $headers);

	header("Location: ../reset_password.php?reset=success");
} else {
	
	header('location:../reset_password.php');
}