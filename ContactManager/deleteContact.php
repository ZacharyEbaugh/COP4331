<?php

	$inData = getRequestInfo();
	
	$userId = $inData["userId"];
	$user = $inData["username"];
	$first = $inData["first_name"];
	$last = $inData["last_name"];
	$num = $inData["phone_num"];
	$email = $inData["email"];
	$addr = $inData["address"];
	
	require('DB_connections.php');
	session_start();
	
	$sql = "DELETE FROM contact_list 
	WHERE user_id = :userId AND username = :user AND first_name = :first AND last_name = :last
	AND phone_num = :num AND email = :email AND address = :addr";

	if ($con->query($sql) === TRUE) {
		echo "Record deleted successfully";
	}
	else {
		echo "Error deleting record: " . $con->error;
	}
?>