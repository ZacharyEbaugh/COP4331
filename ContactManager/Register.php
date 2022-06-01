<?php
	$inData = getRequestInfo();

	$firstName = $inData["firstName"];
	$lastName = $inData["lastName"];
	$userID = $inData["userID"];
	$password = $inData["password"];
	$email = $inData["email"];
	$phone = $inData["phone"];

	$conn = new mysqli("", "", "", "");
	if($conn->connect_error)
	{
		returnWithError($conn->connect_error);
	}
	else
	{
		$stmt = $conn->prepare("INSERT into Users (FirstName, LastName, UserID, Password, Email, Phone) VALUES(?,?,?,?,?,?)");
		$stmt->bind_param("ssssss", $firstName, $lastName, $userID, $password, $email, $phone);
		$stmt->execute();
		$stmt->close();
		$conn->close();
		returnWithError("");
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
		$retValue = '{"error":"' . $err . '"}';
		sendResultInfoAsJson( $retValue );
	}
?>
