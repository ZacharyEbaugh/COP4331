<?php

	$inData = getRequestInfo();
	
	$userId = $inData["userId"];
	$contactId = $inData["contactId"];
	$status = $inData["status"];

	require('DB_connections.php');
	session_start();
	
	$sql = "INSERT INFO contact_list (user_id, contact_id, status) 
	VALUES (:userId, :contactId, :status)";
	
	if ($con->query($sql) === TRUE) {
		echo "New record created successfully";
	} 
	else {
		echo "Error: " . $sql . "<br>" . $con->error;
	}
?>

basic html + xampp to host -> testing