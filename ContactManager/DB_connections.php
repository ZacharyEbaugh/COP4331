<?php

$con = mysqli_connect("zacharyebaugh.com", "zachasv9_team", "COP4331", "zachasv9_ContactManagerDB");

if (mysqli_connect_error()) {

    echo "<script>alert('Cannot Establish Connection With The Database')</script>";
    exit();
}

$contactListQuery = "SELECT * FROM `contact_list` WHERE `user_id` = '1'";
$contactResult =  mysqli_query($con, $contactListQuery);
$contacts = mysqli_fetch_assoc($contactResult);

$contactArray = array();

$contactArray = $contacts['contact_id'];

// $num_rows = mysqli_num_rows($contactResult);

// for ($x = 0; $x < $num_rows; $x++) 
// {
//     $newContact = $contacts[$x]['contact_id'];
//     array_push($contactArray, $newContact);

// }



// foreach (mysqli_fetch_assoc($contactResult) as $row)
// {
//     $newContact = $row['contact_id'];
//     array_push($contactArray, $newContact);
// }

// $contactIDArray = array();
// $contactID = $contacts['contact_id'];


