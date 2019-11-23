<?php
// Database connection configuration

class dbconn{
    private $location; // Server
    private $username; // DB username
    private $password; // DB password
    private $database; // DB to select

    public function connect(){
        $this->location = 'localhost';
        $this->username = 'root';
        $this->password = '';
        $this->database = '4rum';

        return $conn = mysqli_connect($this->location, $this->username, $this->password, $this->database);
    }
}