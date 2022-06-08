<?php
	$inData = getRequestInfo();
	
	$first_name = $inData["first_name"];
	$last_name = $inData["last_name"];
	$username = $inData["username"];
	$password = $inData["password"];
	$email = $inData["email"];
	$phone_num = $inData["phone_num"];
	$address = $inData["address"];
	
	$conn = new mysqli("localhost", "UserDataBase", "43318Cop", "COP4331");
	if($conn->connect_error)
	{
		returnWithError($conn->connect_error);
	}
	else
	{
		$sql = "INSERT into user_info (first_name, last_name, username, password, email, address, phone_num) VALUES('$first_name', '$last_name', '$username', '$password', '$email', '$phone_num', '$address')";
		if(!($conn->query($sql)))
		{
			returnWithError($conn->error);
		}
		$conn->close();
	}

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