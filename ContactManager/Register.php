<?php
	require('DB_connections..php');
	$inData = getRequestInfo();
	
	$first_name = $inData["first_name"];
	$last_name = $inData["last_name"];
	$username = $inData["username"];
	$password = $inData["password"];
	$email = $inData["email"];
	$phone_num = $inData["phone_num"];
	$address = $inData["address"];
	
	$stmt = "INSERT into user_info (first_name, last_name, username, password, email, address, phone_num) VALUES('$first_name', '$last_name', '$username', '$password', '$email', '$phone_num', '$address')";
	$con->query($stmt);
	$con->close();

	function getRequestInfo()
	{
		return json_decode(file_get_contents('php://input'), true);
	}

	function returnWithError( $err )
	{
		$retValue = '{"error":"' . $err . '"}';
		sendResultInfoAsJson( $retValue );
	}
?>