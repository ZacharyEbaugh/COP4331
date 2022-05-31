<?php

	$inData = getRequestInfo();
	
	$user = $inData["username"];
	$pass = $inData["password"];
	$first = $inData["first_name"];
	$last = $inData["last_name"];
	$ema = $inData["email"];
	$addr = $inData["address"];

	require('DB_connections.php');
	session_start();
	
	$sql = "INSERT INFO user_info (username, password, first_name, last_name, email, address) 
	VALUES (:user, :pass, :first, :last, :ema, :addr)";
	
	if ($con->query($sql) === TRUE) {
		echo "New record created successfully";
	} else {
		echo "Error: " . $sql . "<br>" . $con->error;
	}
?>