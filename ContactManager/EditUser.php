<?php
	$inData = getRequestInfo();

	$id = $inData["id"];
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
		$sql = "UPDATE user_info SET username = '$username', password = '$password', first_name = '$firstName', last_name = '$last_name', phone_num = '$phone_num', email = '$email', address = '$address' WHERE id = '$id'";
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