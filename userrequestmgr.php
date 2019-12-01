<?php
header('Content-type: text/plain');

include_once 'HTML/head.html.php';

$user = $_POST['user'];

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

$accept = new AcceptFriend($currentuser->username, $user);