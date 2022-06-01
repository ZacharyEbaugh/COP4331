<?php
	require('DB_connections.php');

	$inData = getRequestInfo();
	
	$id = 0;
	$firstName = "";
	$lastName = "";
	
	$stmt = $conn->prepare("SELECT id, first_name, last_name FROM user_info WHERE Login=? AND Password =?");
	$stmt->bind_param("ss", $inData["username"], $inData["password"]);
	$stmt->execute();
	$result = $stmt->get_result();

	if( $row = $result->fetch_assoc()  )
	{
		returnWithInfo( $row['first_name'], $row['last_name'], $row['id'] );
	}
	else
	{
		returnWithError("No Records Found");
	}

	$stmt->close();
	$conn->close();
	
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
		$retValue = '{"id":' . $id . ',"firstName":"' . $firstName . '","lastName":"' . $lastName . '","error":""}';
		sendResultInfoAsJson( $retValue );
	}
	
?>
