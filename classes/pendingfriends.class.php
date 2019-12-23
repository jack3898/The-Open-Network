<?php
// This PHP file gathers all the associated pending friend requests for the logged in user.
// The logged in user is found via the variable "$currentuser" which is created in head.html.php.

class PendingFriends extends dbconn{
    public $result = array();

    function __construct($un){
        // There is a table with pending friends assigned to users.
        // The following query links the users table and the pendingfriends table.
        // This class is actioned in functions.php
        $sql = "SELECT * FROM collate_pending_friends WHERE username = '$un' OR pendingfriend = '$un'";
        
        $conn = $this->connect();

        $data = mysqli_query($conn, $sql);

        if(mysqli_num_rows($data) > 0){
            $rows = array();
            while($row = mysqli_fetch_assoc($data)) {
                $rows[] = $row;
            }
            $this->result = $rows;
        }
    }
}