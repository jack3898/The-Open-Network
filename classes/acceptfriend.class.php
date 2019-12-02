<?php

// This is unused and very incorrect! Will need updating.

class AcceptFriend extends dbconn{
    function __construct($loggedin, $friend){
        $conn = $this->connect();

        $getpending = "SELECT pendingfriends FROM `users` WHERE username = 'jackwright3898'";

        $pending = mysqli_query($conn, $getpending);

        $returnedJSON = json_decode($pending);

        echo $returnedJSON;

        // $removependingfriend = "UPDATE users SET pendingfriends = '["hello"]' WHERE username = 'jackwright3898'";

        // $addfriend = ";";
    }
}