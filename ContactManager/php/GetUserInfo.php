<?php
	$inData = getRequestInfo();

	$id = $inData["id"];

	$conn = new mysqli("localhost", "UserDataBase", "43318Cop", "COP4331");
	if($conn->connect_error)
	{
		returnWithError($conn->connect_error);
	}
	else
	{
		$stmt = $conn->prepare("SELECT username, password, first_name, last_name, phone_num, email, address FROM user_info WHERE id = ?");
		$stmt->bind_param("i", $id);
		$stmt->execute();
		$result = $stmt->get_result();

		if( $row = $result->fetch_assoc() )
		{
			returnWithInfo($row['username'], $row['password'], $row['first_name'], $row['last_name'], $row['phone_num'], $row['email'], $row['address']);
		}
		else
		{
			returnWithError("No Records Found!");
		}

		$stmt->close();
		$conn->close();
	}

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
	
	function returnWithInfo( $username, $password, $first_name, $last_name, $phone_num, $email, $address )
	{
		$retValue = '{"username":"' . $username . '","password":"' . $password . '","first_name":"' . $first_name . '","last_name":"' . $last_name . '","phone_num":"' . $phone_num . '","email":"' . $email . '","address":"' . $address . '","error":""}';
		sendResultInfoAsJson( $retValue );
	}	
?>