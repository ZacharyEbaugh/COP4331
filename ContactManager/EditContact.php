<?php
	$inData = getRequestInfo();

	#Ask if we need to edit username in contact and if we need it in contact_list database.
	$user_id = $_SESSION['id'];
	$id = $inData["id"];
	$first_name = $inData["first_name"];
	$last_name = $inData["last_name"];
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
		$sql = "UPDATE contact_list SET first_name = '$firstName', last_name = '$last_name', user_id = '$user_id', email = '$email', phone_num = '$phone_num', address = '$address' WHERE id = '$id'";
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