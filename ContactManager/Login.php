<?php
	require('DB_connections..php');
	$inData = getRequestInfo();
	
	$id = 0;
	$firstName = "";
	$lastName = "";
	
	$stmt = $con->prepare("SELECT id, first_name, last_name FROM user_info WHERE username=? AND password =?");
	$stmt->bind_param("ss", $inData["username"], $inData["password"]);
	$stmt->execute();
	$result = $stmt->get_result();

	if( $row = $result->fetch_assoc() )
	{
		returnWithInfo($row['id'], $row['first_name'], $row['last_name']);
	}
	else
	{
		returnWithError("No Records Found");
	}

	$stmt->close();
	$con->close();

	function getRequestInfo()
	{
		return json_decode(file_get_contents('php://input'), true);
	}

	function sendResultInfoAsJson( $obj )
	{
		header('Content-type: application/json');
		echo $obj;
	}
	
	function returnWithError( $err )
	{
		$retValue = '{"id":0,"firstName":"","lastName":"","error":"' . $err . '"}';
		sendResultInfoAsJson( $retValue );
	}
	
	function returnWithInfo( $firstName, $lastName, $id )
	{
		$retValue = '{"id":' . $id . ',"firstName":"' . $first_name . '","lastName":"' . $last_name . '","error":""}';
		sendResultInfoAsJson( $retValue );
	}	
?>