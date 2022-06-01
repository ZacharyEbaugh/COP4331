<?php

include("DB_connections.php");

if (isset($_POST['input'])) {
    $input = $_POST['input'];
    echo $input;
    $query = "SELECT * FROM `contact_list` WHERE `username` LIKE '{$input}%' AND `user_id` = '1' LIMIT 10";
    // $query = "SELECT * FROM `contact_list` WHERE `user_id` = '1' LIMIT 10";

    $result = mysqli_query($con, $query);
    if (mysqli_num_rows($result) > 0) {?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="live-search.css" />
    <title>search</title>
</head>
<body>
    
</body>
</html>
        <table class="resultTable">
            <thead>
                <tr>
                    <th>Username</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Address</th>
                </tr>
            </thead>

            <tbody>
                <?php
                    while($row = mysqli_fetch_assoc($result)) {

                        $username = $row['username'];
                        $password = $row['password'];
                        $firstName = $row['first_name'];
                        $lastName = $row['last_name'];
                        $email = $row['email'];
                        $address = $row['address'];

                    ?>

                    <tr>
                        <td><?php echo $username;?></td>
                        <td><?php echo $firstName;?></td>
                        <td><?php echo $lastName;?></td>
                        <td><?php echo $email;?></td>
                        <td><?php echo $address;?></td>
                    </tr>
                <?php } ?>
            </tbody>

        </table>
                    <?php
    } else {
        echo "<h6 class = 'text-danger'>No data found</h6>";
    }
}
?>