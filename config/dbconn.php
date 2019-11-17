<?php
// Database connection configuration

$location = 'localhost'; // Server
$username = 'root'; // DB username
$password = ''; // DB password
$database = '4rum'; // DB to select

$conn = mysqli_connect($location, $username, $password, $database);

if(!isset($conn)){
    echo 'Unable to connect to the 4rum database! If you see this'
}