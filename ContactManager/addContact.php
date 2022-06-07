<?php

	$inData = getRequestInfo();
	
	$userId = $inData["userId"];
	$user = $inData["username"];
	$first = $inData["first_name"];
	$last = $inData["last_name"];
	$num = $inData["phone_num"];
	$email = $inData["email"];
	$addr = $inData["address"];

	$conn = new mysqli("localhost", "UserDataBase", "43318Cop", "COP4331");
	if($conn->connect_error){
		returnWithError($conn->connect_error);
	}
	
	$sql = "INSERT INFO contact_list (user_id, username, first_name, last_name, phone_num, email, address) 
	VALUES (:userId, :user, :first, :last, :num, :email, :addr)";
	
	if ($conn->query($sql) === TRUE){
		echo "New record created successfully";
	} 
	else{
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
?>
