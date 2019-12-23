<?php

class AddFriend extends dbconn{
    function __construct($un, $un_loggedin){
        $sql = "INSERT INTO `pendingfriends`(`username`, `pendingfriend`) VALUES ('$un_loggedin', '$un')";
        
        $conn = $this->connect();

        mysqli_query($conn, $sql);

        header('Location: profile.php');
    }
}