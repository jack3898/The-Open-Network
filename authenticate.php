<?php

require 'dbconn.php';

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM `users` WHERE `username` = '$username' AND `password` = '$password'";

$query = mysqli_query($conn, $sql);

if(mysqli_num_rows($query) > 0){
    echo 'yes!';
    $_SESSION['logged_in'] = $username;
    header('Location: '.'index.php');
} else {
    echo 'no!';
}