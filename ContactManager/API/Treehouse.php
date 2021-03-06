<?php

require('DB_connections.php');
session_start();

?>
<!DOCTYPE html>
<html>

<head>
  <title>Treehouse</title>
  <link rel="icon" type="image/x-icon" href="https://i.imgur.com/tssrPdc.png">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Noto+Emoji:wght@700&display=swap" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@500&family=Noto+Emoji:wght@500;700&family=Noto+Sans+Symbols+2&family=Pacifico&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Noto+Emoji:wght@500;700&family=Noto+Sans+Symbols+2&family=Pacifico&display=swap" rel="stylesheet">

  <style>
    * {
      box-sizing: border-box;
      width: 100%;

    }

    .bigMain {
      display: none;
      animation-name: trans;
    }

    .mainNav {
      z-index: 5;
    }

    body {
      overflow: auto;
      background-color: #eee;
      overflow: auto;
      background-size: contain;
      background-position: bottom right;
      background-attachment: fixed;
      background-repeat: no-repeat;
      background: linear-gradient(#f2eade, #e7d4b3);

    }

    img {
      border-radius: 100px;
      border: 3px solid white;
      background: linear-gradient(to right, #74b9c8, #4c98ab);
      box-shadow: 3px 3px 0px 0px rgba(239, 134, 55, 1);
    }

    .icons {
      font-family: 'Noto Emoji', sans-serif;
    }

    .sidenav {
      height: 100vh;
      width: 20%;
      position: fixed;
      z-index: 1;
      top: 0;
      left: 0;
      background-color: transparent;
      overflow-x: hidden;
      padding-top: 20px;

      border: 1px solid #f4b45b;
      border-left: 0px;
      border-top: 0px;
      border-bottom: 0px;
      background-image: url('https://imgur.com/K5MdBsc.png');
      background-size: contain;
      background-repeat: no-repeat;
      background-position: bottom;


    }

    .sidenav a {
      padding: 6px 8px 6px 16px;
      text-decoration: none;
      font-size: 25px;
      color: #818181;
      display: block;
      z-index: 12;
    }

    .sidenav a:hover {
      color: #f1f1f1;
    }

    .sidenav1 {
      height: 100%;
      width: 40%;
      position: fixed;
      z-index: 1;
      top: 0;
      left: 0;
      background-color: transparent;
      overflow-x: hidden;
      padding-top: 20px;

      border-left: 0px;
      border-top: 0px;
      border-bottom: 0px;
      z-index: 2;
      background-image: url('https://imgur.com/cAeu9Fm.png');
      background-size: contain;
      background-repeat: no-repeat;
      background-position: bottom;

    }

    .sidenavA {
      display: none;
      height: 100%;
      width: 40%;
      position: fixed;
      z-index: 1;
      top: 0;
      left: 0;
      background-color: transparent;
      overflow-x: hidden;
      padding-top: 20px;

      border-left: 0px;
      border-top: 0px;
      border-bottom: 0px;
      z-index: 2;
      background-image: url('https://imgur.com/cAeu9Fm.png');
      background-size: contain;
      background-repeat: no-repeat;
      background-position: bottom;
      overflow: auto;

    }

    .sidenav2 {
      height: 100vh;
      width: 20%;
      position: fixed;
      z-index: 0;
      top: 0;
      left: 0;
      background-color: transparent;
      overflow-x: hidden;
      padding-top: 20px;

      border: 0px solid black;
      border-left: 0px;
      border-top: 0px;
      border-bottom: 0px;
      background: linear-gradient(#f2eade, #e7d4b3);
      background-size: contain;
      background-repeat: no-repeat;
      background-position: bottom;


    }


    .addContainer {}

    .searchContainer {}

    .contactsContainer {}

    .column1 {
      float: left;
      width: 25%;
      padding: 20px;
      height: 100vh;
      background-color: transparent;
    }

    .column2 {
      float: left;
      width: 70%;
      padding: 10px;
      height: 100vh;

    }

    .column3 {
      float: left;
      width: 5%;
      padding: 10px;
      height: 100vh;
      background-color: transparent;
    }

    .column4 {
      float: left;
      width: 6%;
      padding: 10px;
      height: 100vh;
      background-color: transparent;
    }

    .row:after {
      content: "";
      display: table;
      clear: both;
    }

    /*table to hold the contacts */
    #contacts {
      font-family: Arial, Helvetica, sans-serif;
      border-collapse: collapse;
      width: 100%;
      table-layout: fixed;

    }

    #contacts td,
    #contacts th {
      column-width: 100%;
      border: .5px solid #f5b85f;
      padding: 8px;
      overflow: hidden;
      white-space: nowrap;
      text-overflow: ellipsis;
    }

    #contacts th {
      padding-top: 12px;
      padding-bottom: 12px;
      text-align: left;
      background-color: #04AA6D;
      color: white;
      height: 10px;
      text-align: center;
    }

    #contacts td {
      padding-top: 12px;
      padding-bottom: 12px;
      text-align: left;
      text-align: center;
    }

    #contacts td:first-child td {
      width: 100px;
      border-top: 0;
    }

    #contacts tr td:first-child {
      border-left: 0;
    }

    #contacts tr:last-child td {
      border-bottom: 0;
    }

    #contacts tr td:last-child {
      border-right: 0;
    }

    .searchBar {
      width: 20vw;
    }

    ::placeholder {
      color: black;
      font-weight: bold;
      font-size: 17px;
      text-align: center;
    }

    .form-control {
      background-color: transparent;
      border: hidden;
      color: #f1f1f1;
      font-size: 25px;
      font-family: 'Noto Emoji', sans-serif;
      text-align: center;
    }

    .form-control:focus {
      color: #f1f1f1;
      background-color: #f4b45b;
      border-color: transparent;
      transition: 1s ease;
    }

    .text-danger {
      font-family: 'Noto Emoji', sans-serif;
      font-size: 3vw;
    }

    .button {
      background-color: transparent;
      /* Green */
      border: none;
      font-weight: bold;
      color: black;
      height: 25px;
      padding: 15px 32px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 16px;
      border: 1px solid;
      border-image-slice: 1;
      border-right: 0;
      z-index: 12;
      border-left: 0;
      border-image: linear-gradient(to right bottom, #260B3C, #a053df);
    }

    .button:hover {
      background: linear-gradient(to right, #f09f42, #f5b85f);
      color: white;
    }

    /*end table to hold contacts*/

    input[type=text],
    select {
      width: 100%;
      padding: 12px 20px;
      margin: 8px 0;
      display: inline-block;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
    }

    input[type=tel],
    select {
      width: 100%;
      padding: 12px 20px;
      margin: 8px 0;
      display: inline-block;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
    }

    input[type=email],
    select {
      width: 100%;
      padding: 12px 20px;
      margin: 8px 0;
      display: inline-block;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
    }

    input[type=submit] {
      width: 100%;
      background: linear-gradient(to right, #74b9c8, #4c98ab);
      color: white;
      padding: 14px 20px;
      margin: 8px 0;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }

    input[type=submit]:hover {
      background-color: #45a049;
    }

    .formCon {
      border-radius: 5px;
      background-color: #fff;
      padding: 20px;
      width: 50%;

    }

    .intro,
    .intro a {
      color: #fff;
      font-family: 'Noto Emoji', sans-serif;
      font-family: 'Noto Sans Symbols 2', sans-serif;
    }

    /* customizable snowflake styling */
    .snowflake {
      color: #fff;
      font-size: 2em;
      font-family: 'Noto Emoji', sans-serif;
      font-family: 'Noto Sans Symbols 2', sans-serif;

    }

    @-webkit-keyframes snowflakes-fall {
      0% {
        top: -10%
      }

      100% {
        top: 100%
      }
    }

    @-webkit-keyframes snowflakes-shake {
      0% {
        -webkit-transform: translateX(0px);
        transform: translateX(0px)
      }

      50% {
        -webkit-transform: translateX(80px);
        transform: translateX(80px)
      }

      100% {
        -webkit-transform: translateX(0px);
        transform: translateX(0px)
      }
    }

    @keyframes snowflakes-fall {
      0% {
        top: -10%
      }

      100% {
        top: 100%
      }
    }

    @keyframes snowflakes-shake {
      0% {
        transform: translateX(0px)
      }

      50% {
        transform: translateX(80px)
      }

      100% {
        transform: translateX(0px)
      }
    }

    .snowflake {
      position: fixed;
      top: -10%;
      z-index: 9999;
      -webkit-user-select: none;
      -moz-user-select: none;
      -ms-user-select: none;
      user-select: none;
      cursor: default;
      -webkit-animation-name: snowflakes-fall, snowflakes-shake;
      -webkit-animation-duration: 10s, 3s;
      -webkit-animation-timing-function: linear, ease-in-out;
      -webkit-animation-iteration-count: infinite, infinite;
      -webkit-animation-play-state: running, running;
      animation-name: snowflakes-fall, snowflakes-shake;
      animation-duration: 10s, 3s;
      animation-timing-function: linear, ease-in-out;
      animation-iteration-count: infinite, infinite;
      animation-play-state: running, running
    }

    .snowflake:nth-of-type(0) {
      left: 1%;
      -webkit-animation-delay: 0s, 0s;
      animation-delay: 0s, 0s
    }

    .snowflake:nth-of-type(1) {
      left: 10%;
      -webkit-animation-delay: 1s, 1s;
      animation-delay: 1s, 1s
    }

    .snowflake:nth-of-type(2) {
      left: 20%;
      -webkit-animation-delay: 6s, .5s;
      animation-delay: 6s, .5s
    }

    .snowflake:nth-of-type(3) {
      left: 30%;
      -webkit-animation-delay: 4s, 2s;
      animation-delay: 4s, 2s
    }

    .snowflake:nth-of-type(4) {
      left: 40%;
      -webkit-animation-delay: 2s, 2s;
      animation-delay: 2s, 2s
    }

    .snowflake:nth-of-type(5) {
      left: 50%;
      -webkit-animation-delay: 8s, 3s;
      animation-delay: 8s, 3s
    }

    .snowflake:nth-of-type(6) {
      left: 60%;
      -webkit-animation-delay: 6s, 2s;
      animation-delay: 6s, 2s
    }

    .snowflake:nth-of-type(7) {
      left: 70%;
      -webkit-animation-delay: 2.5s, 1s;
      animation-delay: 2.5s, 1s
    }

    .snowflake:nth-of-type(8) {
      left: 80%;
      -webkit-animation-delay: 1s, 0s;
      animation-delay: 1s, 0s
    }

    .snowflake:nth-of-type(9) {
      left: 90%;
      -webkit-animation-delay: 3s, 1.5s;
      animation-delay: 3s, 1.5s
    }

    /* Demo Purpose Only*/
    .demo {
      font-family: 'Raleway', sans-serif;
      color: #fff;
      display: block;
      margin: 0 auto;
      padding: 15px 0;
      text-align: center;
    }

    .demo a {
      font-family: 'Raleway', sans-serif;
      color: #000;
    }

    .sideLog {
      height: 100%;
      width: 100%;
      position: fixed;
      z-index: 5;
      top: 0;
      left: 0;
      background: linear-gradient(#f2eade, #e7d4b3);
      background-size: 100%;
      background-repeat: no-repeat;
      background-position: bottom;
      overflow-x: hidden;
      transition: 0.5s;
      padding-top: 60px;
    }

    .sideLog a {
      padding: 8px 8px 8px 32px;
      text-decoration: none;
      font-size: 25px;
      color: #818181;
      display: block;
      transition: 0.3s;
    }

    .sideLog a:hover {
      color: #f1f1f1;
    }

    .sideLog .closebtn {
      position: absolute;
      top: 0;
      right: 25px;
      font-size: 36px;
      margin-left: 50px;
    }

    #log {
      height: 100%;
      text-align: center;
      background-color: transparent;
      margin-top: 20px;
    }

    #sign {
      display: none;
      height: 100%;
      text-align: center;
      background-color: transparent;
      margin-top: 20px;
    }

    @media screen and (max-height: 450px) {
      .sidenLog {
        padding-top: 15px;
      }

      .sideLog a {
        font-size: 18px;
      }
    }

    @-webkit-keyframes trans {
      from {
        opacity: 0%
      }

      to {
        opacity: 100%
      }
    }

    @-webkit-keyframes transOut {
      from {
        opacity: 100%
      }

      to {
        opacity: 0%
      }
    }

    /* width */
    ::-webkit-scrollbar {
      display: none;
    }

    /* Track */
    ::-webkit-scrollbar-track {
      background: transparent;
    }

    /* Handle */
    ::-webkit-scrollbar-thumb {
      background: transparent;
    }

    /* Handle on hover */
    ::-webkit-scrollbar-thumb:hover {
      background: transparent;
    }
  </style>
</head>

<body>
  <div class="bigMain" id="mainDoc">
    <div class="row">

      <div class="column0">
      </div>

      <div class="column1">

        <div class="sidenav">
        </div>

        <div class="sidenav2">
        </div>

        <div class="sidenav1" id="sidenav1">
          <left>
            <h style="font-family: 'Pacifico', cursive; text-align: center; font-size: 4vw; width: 50%"> &nbspTreehouse</h>
            <bR>
            <div class="searchBar">
              <input type="text" class="form-control" id="live-search" autocomplete="off" placeholder="Search Contacts" style="border: 0 none">
            </div>
            <br>
            <button class="button" onclick="getForm()" style="width: 50%">Add New Contact</button>
            <br>
            <button class="button" onclick="openNav()" style="width: 50%">Logout</button>
          </left>
        </div>

        <div class="sidenavA" id="sidenavA">
          <left>
            <h style="font-family: 'Pacifico', cursive; text-align: center; font-size: 4vw; width: 50%"> &nbspTreehouse</h>
            <div class="formCon">
              <br>
              <center><img style="width: 100px" src="https://64.media.tumblr.com/508b7edacc0a950d1273f0466499accf/88f42c71fa566fc3-fa/s2048x3072/897db133d51bc7617aa9cb909650cbb6fd11b3f6.pnj"> </center>

              <form action="/AddContact.php">
                <label for="fname">First Name</label>
                <input type="text" id="first_name" name="firstname" placeholder="Your first name..">

                <label for="lname">Last Name</label>
                <input type="text" id="last_name" name="lastname" placeholder="Your last name..">

                <label for="phone">Phone number</label>
                <input type="tel" id="phone_num" name="lastname" placeholder="Your phone number..">

                <label for="e-mail">E-mail</label>
                <input type="email" id="email" name="lastname" placeholder="Your email..">

                <center> <input type="submit" value="????" style="width: 100%; font-family: 'Noto Emoji', sans-serif;">

                </center>
              </form>
              <center>
                <button onclick="getNav()" style="width: 100%; font-size: 20px; background: linear-gradient(to right,#e9344a, #f97c71); border: 0px; color: white; border-radius: 5px"> ??? </button>
              </center>
          </left>
        </div>
      </div>

    </div>

    <div class="column2">

      <?php

      $query = "SELECT * FROM `contact_list` WHERE `user_id` = '1' LIMIT 10";

      $result = mysqli_query($con, $query);
      if (mysqli_num_rows($result) > 0) { ?>
        <!-- table of contacts -->
        <div class="displayResult">
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
                        <td style="font-family: 'Noto Emoji', sans-serif; font-weight: bold; font-size: 25px">???</td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
            <?php
                }
                } else {
                    echo "<h6 class = 'text-danger'>No results found...</h6>";
                }
            ?>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script>
          $(document).ready(function() {
            $("#live-search").keyup(function() {
              var input = $(this).val();
              // alert(input);
              if (input != " ") {
                $.ajax({
                  url: "live-search.php",
                  method: "POST",
                  data: {
                    input: input
                  },

                  success: function(data) {
                    $(".displayResult").html(data);
                  }
                });
              } else {
                // $(".displayResult").css("display", "none");
              }
            })
          })
        </script>
            </tbody>
          </table>
        <!-- end table of contacts -->
        </div>
    </div>
    <div class="column3">
    </div>
  </div>
  </div>

  <div class="mainNav">
    <div id="mySidenav" class="sideLog">
      <center>
        <div class="snowflakes" aria-hidden="true">
          <div class="snowflake" style="font-family: 'Noto Emoji', sans-serif;">
            <img style="border-radius: 0px; border: 0px; box-shadow: 0; background: transparent;box-shadow: 0px 0px 0px 0px rgba(239, 134, 55,1); width: 2%" src="https://imgur.com/qmOn1dT.png">
          </div>
          <div class="snowflake">
            <img style="border-radius: 0px; border: 0px; box-shadow: 0; background: transparent;box-shadow: 0px 0px 0px 0px rgba(239, 134, 55,1); width: 2%" src="https://imgur.com/l6JPg4g.png">
          </div>
          <div class="snowflake" style="font-family: 'Noto Emoji', sans-serif;">
            <img style="border-radius: 0px; border: 0px; box-shadow: 0; background: transparent;box-shadow: 0px 0px 0px 0px rgba(239, 134, 55,1); width: 2%" src="https://imgur.com/WfjYz9e.png">
          </div>
          <div class="snowflake">
            <img style="border-radius: 0px; border: 0px; box-shadow: 0; background: transparent;box-shadow: 0px 0px 0px 0px rgba(239, 134, 55,1); width: 2%" src="https://imgur.com/PudNcRw.png">
          </div>
          <div class="snowflake">
            <img style="border-radius: 0px; border: 0px; box-shadow: 0; background: transparent;box-shadow: 0px 0px 0px 0px rgba(239, 134, 55,1); width: 2%" src="https://imgur.com/l6JPg4g.png">
          </div>
          <div class="snowflake">
            <img style="border-radius: 0px; border: 0px; box-shadow: 0; background: transparent;box-shadow: 0px 0px 0px 0px rgba(239, 134, 55,1); width: 2%" src="https://imgur.com/l6JPg4g.png">
          </div>
          <div class="snowflake">
            <img style="border-radius: 0px; border: 0px; box-shadow: 0; background: transparent;box-shadow: 0px 0px 0px 0px rgba(239, 134, 55,1); width: 2%" src="https://imgur.com/PudNcRw.png">
          </div>
          <div class="snowflake">
            <img style="border-radius: 0px; border: 0px; box-shadow: 0; background: transparent;box-shadow: 0px 0px 0px 0px rgba(239, 134, 55,1); width: 2%" src="https://imgur.com/PudNcRw.png">
          </div>
          <div class="snowflake">
            <img style="border-radius: 0px; border: 0px; box-shadow: 0; background: transparent;box-shadow: 0px 0px 0px 0px rgba(239, 134, 55,1); width: 2%" src="https://imgur.com/qmOn1dT.png">
          </div>
          <div class="snowflake">

          </div>
        </div>
        <h style="font-family: 'Pacifico', cursive; text-align: center; font-size: 4vw; width: 50%"> &nbspTreehouse</h>
        <br>
        <label style="font-size: 10px; font-family: 'Josefin Sans', sans-serif;">???contact management application???</label>
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

        <div id="log">
          <form action="/Login.php" style="top:50%;">
            <label for="first_name" style="font-family: 'Josefin Sans', sans-serif;">Username</label><br>
            <input type="text" id="first_name" name="first_name" palceholder="" style="border: 0px;width: 40%"><br>
            <label for="password" style="font-family: 'Josefin Sans', sans-serif;">Password</label><br>
            <input type="text" id="password" name="password" placeholder="" style="border: 0px;width: 40%">
            <br>
            <br>
            <input type="submit" onclick="closeNav()" style="background: linear-gradient(to right,#6fc80f,#86d72f); color: white; border: 0px; height: 2%; width: 5%; padding: 5px 0;" value="log-in">
            <br>
          </form>
          <label style="font-size: 12px; font-family: 'Josefin Sans', sans-serif;">need an account?</label><button style="font-size: 12px; background-color: transparent; border: 0px; color:#62be00;font-family: 'Josefin Sans', sans-serif;  " onclick="signFunction()">sign-up!</button>
        </div>

        <div id="sign">
          <form action="/Register.php">
            <label for="first_name" style="font-family: 'Josefin Sans', sans-serif;">Username</label><br>
            <input type="text" id="first_name" name="first_name" palceholder="" style="border: 0px; width: 40%"><br>
            <label for="lpassword" style="font-family: 'Josefin Sans', sans-serif;">Password</label><br>
            <input type="text" id="password" name="password" placeholder="" style="border: 0px;width: 40%">
            <br>
            <br>
            <input type="submit" style="background: linear-gradient(to right,#de1a18,#f8312f); color: white; border: 0px; height: 2%; width: 6%; padding: 5px 0;" value="sign-up">
            <br>
          </form>
          <label style="font-size: 12px; font-family: 'Josefin Sans', sans-serif;">already have an account?</label><button style="font-size: 12px; background-color: transparent; border: 0px; color:#f8312f; font-family: 'Josefin Sans', sans-serif; " onclick="logFunction()">log-in!</button>
        </div>

      </center>
    </div>

  </div>



  <script>
    function openNav() {
      document.getElementById("mySidenav").style.width = "100%";
      document.getElementById("mainDoc").style.WebkitAnimationName = "transOut";


    }

    function closeNav() {
      document.getElementById("mySidenav").style.width = "0";
      document.getElementById("mainDoc").style.WebkitAnimationName = "transOut";
      document.getElementById("mainDoc").style.display = "inline";
    }

    function signFunction() {
      var x = document.getElementById("log");
      var y = document.getElementById("sign");
      if (x.style.display === "none") {
        x.style.display = "block";
      } else {
        x.style.display = "none";
        y.style.display = "block";
      }
    }

    function logFunction() {
      var x = document.getElementById("sign");
      var y = document.getElementById("log");
      if (x.style.display === "none") {
        x.style.display = "block";
      } else {
        x.style.display = "none";
        y.style.display = "block";
      }
    }

    function getForm() {
      var x = document.getElementById("sidenav1");
      var y = document.getElementById("sidenavA");
      var z = document.getElementById("formCon");
      if (x.style.display === "none") {
        x.style.display = "block";
      } else {
        y.style.display = "block";
        z.style.webkitAnimationName = "trans";
        x.style.display = "none";

      }
    }

    function getNav() {
      var x = document.getElementById("sidenav1");
      var y = document.getElementById("sidenavA");
      var z = document.getElementById("formCon");
      if (y.style.display === "none") {
        y.style.display = "block";
      } else {
        y.style.display = "none";
        x.style.display = "block";
      }
    }
  </script>
</body>

</html>