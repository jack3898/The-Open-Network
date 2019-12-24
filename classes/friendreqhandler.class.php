<?php

// This is unused and very incorrect! Will need updating.

class FriendReqHandler extends dbconn{
    function __construct($action){
        global $currentuser;

        $result = explode(',', $action);
        // $result = array('true/false', '[username]');

        $secondaryuser = $result[1];

        $conn = $this->connect();

        $del_req = "DELETE FROM `pendingfriends` WHERE `pendingfriend` = '$currentuser->username' AND `username` = '$secondaryuser'";

        $accept_the_request = "INSERT INTO `existingfriends`(`username`, `friends`) VALUES ('$currentuser->username', '$secondaryuser')";

        if($result[0] === 'true'){ // Action to take if the user accepts the friend request.
            mysqli_query($conn, $del_req);
            mysqli_query($conn, $accept_the_request);
            header('Location: profile.php?user=' . $secondaryuser);
        } else if($result[0] === 'false') { // Action to take if the user declines the friend request.
            mysqli_query($conn, $del_req);
            header('Location: profile.php?user=' . $secondaryuser);
        }
    }
}