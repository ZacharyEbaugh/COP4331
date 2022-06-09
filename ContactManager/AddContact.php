<?php
<<<<<<< HEAD
=======

	require('DB_connections.php');
	session_start();

	$inData = getRequestInfo();
>>>>>>> d3223cf3755bf90943d9cec96bd615eee2ff8a0d
	
	$user_id = $_POST["user_id"]; 
	$first_name = $_POST["first_name"];
	$last_name = $_POST["last_name"];
	$username = $_POST["username"];
	$email = $_POST["email"];
	$phone_num = $_POST["phone_num"];
	$address = $_POST["address"];
	
	$conn = new mysqli("localhost", "UserDataBase", "43318Cop", "COP4331");
	if($conn->connect_error)
	{
		returnWithError($conn->connect_error);
	}
	else
	{
		$sql = "INSERT into contact_list (user_id, first_name, last_name, username, email, address, phone_num) VALUES('$user_id', '$first_name', '$last_name', '$username', '$email', '$phone_num', '$address')";
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
