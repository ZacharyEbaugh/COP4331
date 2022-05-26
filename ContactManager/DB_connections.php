<?php

$con = mysqli_connect("zacharyebaugh.com", "zachasv9_team", "COP4331", "zachasv9_ContactManagerDB");

if (mysqli_connect_error()) {

    echo "<script>alert('Cannot Establish Connection With The Database')</script>";
    exit();
}