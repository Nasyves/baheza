<?php 
	$con = mysqli_connect('localhost','root','','baheza');

	if(!$con){
		die('Please check your connection'.mysqli_error());
	}
?>