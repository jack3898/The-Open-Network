<?php
session_start();

// // Ready up a database connection
// require 'dbconn.php';

// Load classes automatically
require 'autoload.php';

class Auth extends dbconn{
    function __construct($un, $pw){
        $sql = "SELECT * FROM `users` WHERE `username` = '$un' AND `password` = '$pw'";

        $query = mysqli_query($this->connect(), $sql);
        
        if(mysqli_num_rows($query) > 0){
            $result = mysqli_fetch_array($query);
            $_SESSION['logged_in'] = $result;
            header('Location: index.php');
        } else {
            echo 'Unable to log in m80. Did you fill in all of the fields correctly?<br>';
            echo '<a href="index.php">Go back</a>';
        }
    }
}

$login = new Auth($_POST['username'], $_POST['password']);