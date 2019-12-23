<?php
class GetUser extends dbconn{
    public $result;

    function __construct($un){
        $sql = "SELECT * FROM `users` WHERE `username` = '$un'";

        $query = mysqli_query($this->connect(), $sql);

        if(mysqli_num_rows($query) > 0){
            $this->result = mysqli_fetch_array($query);
        } else {
            echo 'Invalid user!<br>';
            echo '<a href="index.php">Go home</a>';
            die;
        }
    }
}