<?php

if(session_status() == PHP_SESSION_NONE){
    session_start();
}

// This PHP file gathers all the associated pending friend requests for the logged in user.
// The logged in user is found via the variable "$currentuser" which is created in getuser.php

class PendingFriends extends dbconn{
    public $result = array();

    function __construct($un){
        // There is a table with pending friends assigned to users.
        // The following query links the users table and the pendingfriends table
        $sql =
        "SELECT
            users.username,
            users.forename,
            users.surname,
            pendingfriends.pendingfriend
        FROM pendingfriends
        JOIN users
        ON users.username = pendingfriends.username
        WHERE users.username = 'jackwright3898'";
        
        $conn = $this->connect();

        $data = mysqli_query($conn, $sql);

        if(mysqli_num_rows($data) > 0){
            $rows = array();
            while($row = mysqli_fetch_assoc($data)) {
                $rows[] = $row;
            }
            $this->result = $rows;
        } else {
            echo 'Unable to get pending friends.';
        }
    }
}

// Filter the query results in the class to show only pending friend requests.
if(isset($currentuser)){
    $pending_data = new PendingFriends($currentuser->username);
    $pending_friends_unfiltered = $pending_data->result;
    $pending_friends = array();
    foreach($pending_friends_unfiltered as $item){
        array_push($pending_friends, $item['pendingfriend']);
    }
}