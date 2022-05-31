<?php

	$inData = getRequestInfo();
	
	$userId = $inData["userId"];
	$contactId = $inData["contactId"];
	$status = $inData["status"];
	
	require('DB_connections.php');
	session_start();
	
	$sql = "DELETE FROM contact_list 
	WHERE user_id = :userId AND contact_id = :contactId";

	if ($con->query($sql) === TRUE) {
		echo "Record deleted successfully";
	}
	else {
		echo "Error deleting record: " . $con->error;
	}
?>