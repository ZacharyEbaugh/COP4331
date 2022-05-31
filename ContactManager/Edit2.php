<?php
	require('DB_connections.php');	

	session_start();

	$inData = getRequestInfo();
	
	$id = $_SESSION['id'];
	$firstName = $inData["first_name"];
	$lastName = $inData["last_name"];
	$username = $inData["username"];
	$password = $inData["password"];
	$email = $inData["email"];
	$address = $inData["address"];

	$sql = "UPDATE user_info SET first_name = '$firstName', last_name = '$lastName', username = '$userID', password = '$password', email = '$email', address = '$address' WHERE id = '$id'";
	$con->query($sql);

	$con->close();
?>