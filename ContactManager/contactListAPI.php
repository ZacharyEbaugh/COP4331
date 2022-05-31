<?php

require('DB_connections.php');
session_start();
function searchQuery(&$searchName)
{
    $userQuery = "SELECT * FROM `user_info` WHERE `username` = $searchName";
    $userResult = mysqli_query($con, $userQuery);
    $user = mysqli_fetch_assoc($userResult);
    $userName = $user['username'];
    $id = $user['id'];

    $query = "SELECT * FROM `contact_list` WHERE `user_id` = $id";
    $result = mysqli_query($con, $query);
    $num_rows = mysqli_num_rows($result);

    $contact_names = array();
    $contact_first_names = array();
    $contact_last_names = array();
    $contact_emails = array();
    $contact_addresses = array();


    $num_rows = mysqli_num_rows($result);

    for ($x = 0; $x < $num_rows; $x++) {
        $result_fetch = mysqli_fetch_assoc($result);
        $contact_ID = $result_fetch['contact_id'];

        $contactQuery = "SELECT * FROM `user_info` WHERE `id` = $contact_ID";
        $contactResult = mysqli_query($con, $contactQuery);
        $contacts = mysqli_fetch_assoc($contactResult);

        $contactUserName = $contacts['username'];
        $contactFirstName = $contacts['first_name'];
        $contactLastName = $contacts['last_name'];
        $contactEmail = $contacts['email'];
        $contactAddress = $contacts['address'];

        array_push($contact_names, $contactUserName);
        array_push($contact_first_names, $contactFirstName);
        array_push($contact_last_names, $contactLastName);
        array_push($contact_emails, $contactEmail);
        array_push($contact_addresses, $contactAddress);
    }

}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css" />
    <title>Login</title>
</head>

<body>
    <h1>User: <?php echo $userName ?></h1>
    <h2>Contacts:<br></h2>
    <div class="searchBar">
        <input type="text" name="search">
        <input type="submit" value="search">
    </div>
    <h3><?php
        if(isset($_POST["search"]))
        {
            $searchName = "%" . $_POST["search"] . "%";
        }



        for ($i = 0; $i < $num_rows; $i++) {
            echo $contact_names[$i] . ": " . 
            $contact_first_names[$i] . ": " . 
            $contact_last_names[$i] . ": " . 
            $contact_emails[$i] . ": " . 
            $contact_addresses[$i] . "<br>";
        }
        ?></h3>
</body>

</html>