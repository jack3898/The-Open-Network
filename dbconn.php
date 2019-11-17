<?php
// Database connection configuration

$location = 'localhost'; // Server
$username = 'root'; // DB username
$password = ''; // DB password
$database = '4rum'; // DB to select

$conn = mysqli_connect($location, $username, $password, $database);

if(mysqli_connect_errno()){
    // Display the error code should the connection to the DB fail.
    echo "Unable to connect to the database: " . mysqli_connect_error();
}

// Display errors
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);