<?php

/* This is where the user login details comes into play for the phpmyadmin // If this was a proper website than something secure would be used instead of a blank password*/
$server = "localhost";
$username = "root";
$password = "";
$dbname = "games";

$conn = mysqli_connect($server, $username, $password, $dbname);

?>