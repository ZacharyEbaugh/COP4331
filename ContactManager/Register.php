<?php
	$inData = getRequestInfo();
	
	$username = $inData["username"];
	$password = $inData["password"];
	$first_name = $inData["first_name"];
	$last_name = $inData["last_name"];
	$phone_num = $inData["phone_num"];
	$email = $inData["email"];
	$address = $inData["address"];
	
	$conn = new mysqli("localhost", "UserDataBase", "43318Cop", "COP4331");
	if($conn->connect_error)
	{
		returnWithError($conn->connect_error);
	}
	else
	{
		$sql = "INSERT into user_info (username, password, first_name, last_name, phone_num,email, address) VALUES('$username', '$password', '$first_name', '$last_name', '$phone_num', '$email', '$address')";
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