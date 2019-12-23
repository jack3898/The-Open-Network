<?php

class RemoveFriend extends dbconn{
    function __construct($un){
        $sql = "DELETE FROM `existingfriends` WHERE `existingfriends`.`username` = '$un' OR `existingfriends`.`friends` = '$un'";
        
        $conn = $this->connect();

        mysqli_query($conn, $sql);

        header('Location: profile.php');
    }
}