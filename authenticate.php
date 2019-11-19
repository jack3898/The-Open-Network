<?php
session_start();

// Ready up a database connection
require 'dbconn.php';

// Load classes automatically
require 'autoload.php';

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM `users` WHERE `username` = '$username' AND `password` = '$password'";

$query = mysqli_query($conn, $sql);

if(mysqli_num_rows($query) > 0){
    $result = mysqli_fetch_array($query);
    $_SESSION['logged_in'] = $result;
    header('Location: '.'index.php');
} else {
    echo 'Unable to log in m80. Did you fill in all of the fields correctly?';
}