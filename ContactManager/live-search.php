<?php

include("DB_connections.php");

if (isset($_POST['input'])) {
    $input = $_POST['input'];
    $query = "SELECT * FROM `contact_list` WHERE `username` LIKE '{$input}%' AND `user_id` = $_COOKIE['userId'] LIMIT 10";

    $result = mysqli_query($con, $query);
    if (mysqli_num_rows($result) > 0) { ?>


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
            <!-- table of contacts -->
            <table id="contacts">
                <thead>
                    <tr>
                        <th>Profile Picture</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Address</th>
                    </tr>
                </thead>
                <?php
                $result = mysqli_query($con, $query);

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {

                        $username = $row['username'];
                        $password = $row['password'];
                        $firstName = $row['first_name'];
                        $lastName = $row['last_name'];
                        $email = $row['email'];
                        $address = $row['address'];
                ?>

                <tbody>
                    <tr>
                        <td><img style="width: 100px" src="https://64.media.tumblr.com/f6f345984b07c36fad0d98a149fcf547/fb078ec2c942b531-79/s2048x3072/d31315a0c864dbae0d5ce108db5aeecea0b2a8d7.pnj"></td>
                        <td><?php echo $firstName; ?></td>
                        <td><?php echo $lastName; ?></td>
                        <td><?php echo $email; ?></td>
                        <td><?php echo $address; ?></td>
                        <td style="font-family: 'Noto Emoji', sans-serif; font-weight: bold; font-size: 25px">⟲</td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
            <?php
                }
                } else {
                    echo "<h6 class = 'text-danger'>No results found...</h6>";
                }
    }
?>
    </body>

</html>