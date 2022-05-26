<?php 

    require('DB_connections.php');
    session_start();

    $userQuery = "SELECT * FROM `user_info` WHERE `username` = 'zacEbaugh'";
    $userResult = mysqli_query($con, $userQuery);
    $userUni = mysqli_fetch_assoc($userResult);
    $uni = $userUni['last_name'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>Testing</h1>
    <h2><?php echo $uni ?></h2>
</body>
</html>