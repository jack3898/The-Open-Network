<?php
session_start();

// Load classes automatically
require 'autoload.php';

class Auth extends dbconn{
    function __construct($un, $pw){
        $sql = "SELECT * FROM users WHERE username=? AND password=?;";

        $conn = $this->connect();

        $stmt = mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt, $sql)){
            echo 'Error with SQL statement.';
        } else {
            mysqli_stmt_bind_param($stmt, 'ss', $un, $pw);

            mysqli_stmt_execute($stmt);

            $data = mysqli_stmt_get_result($stmt);

            if(mysqli_num_rows($data) > 0){
                $result = mysqli_fetch_assoc($data);
                $_SESSION['logged_in'] = $result;
                header('Location: index.php');
            } else {
                echo 'Unable to log in m80. Did you fill in all of the fields correctly?<br>';
                echo '<a href="index.php">Go back</a>';
            }
        }
    }
}

$login = new Auth($_POST['username'], $_POST['password']);