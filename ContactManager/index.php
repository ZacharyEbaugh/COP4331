<?php

require('DB_connections.php');
session_start();

$query = "SELECT * FROM `contact_list` WHERE `user_id` = '1' LIMIT 10";

$result = mysqli_query($con, $query);
if (mysqli_num_rows($result) > 0) {?>

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
        <input type="text" class="form-control" id="live-search" autocomplete="off" placeholder="Search...">

    </div>
    <div class="displayResult">
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
?>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


    <script>
        $(document).ready(function(){
            $("#live-search").keyup(function(){
                var input = $(this).val();
                    // alert(input);
                    if(input != " "){
                        $.ajax({
                            url: "live-search.php",
                            method: "POST",
                            data:{input:input},

                            success:function(data){
                                $(".displayResult").html(data);
                            }
                        });
                    }
                    else {
                        // $(".displayResult").css("display", "none");
                    }
            })
        })
    </script>


</body>

</html>