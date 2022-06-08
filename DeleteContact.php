<?php
	$inData = getRequestInfo();
	
	$user_id = readCookie();
	$id = $inData["id"];

	$conn = new mysqli("localhost", "UserDataBase", "43318Cop", "COP4331");
	if($conn->connect_error)
	{
		returnWithError($conn->connect_error);
	}
	else
	{
		$sql = "DELETE FROM contact_list WHERE id = '$id'";
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