<?php
class Auth extends dbconn{
    function __construct($un, $pw){
        // Query template
        $sql = "SELECT * FROM users WHERE username=? AND password=?;";
        // $sql_getpendingrequests = "SELECT users.username, users.forename, users.surname, pendingfriends.pendingfriend FROM pendingfriends JOIN users ON users.? = pendingfriends.username;";
        //SELECT users.username, users.forename, users.surname, pendingfriends.pendingfriend FROM pendingfriends JOIN users ON users.username = pendingfriends.username 

        // Get the connection details of the database
        $conn = $this->connect();

        // initialise the prepared statement (make it known to the DB)
        $stmt = mysqli_stmt_init($conn);

        // Prepare the initialised statement for execution
        if(!mysqli_stmt_prepare($stmt, $sql) && mysqli_stmt_prepare($stmt_pendingfriends)){
            // If failed to prapare the initialised statement
            echo 'Error with SQL statement.';
        } else {
            // Bind the question mark in the statement template to 'ss' (string, string)
            mysqli_stmt_bind_param($stmt, 'ss', $un, $pw);

            // Get the prepared statement and execute the query
            mysqli_stmt_execute($stmt);

            // Assign the result of $stmt to $data
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