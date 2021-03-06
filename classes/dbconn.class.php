<?php
// Database connection configuration
// This class is usually referenced as an extension to other classes that need to connect to the database.

abstract class dbconn{
    private $location; // Server
    private $username; // DB username
    private $password; // DB password
    private $database; // DB to select

    protected function connect(){
        $this->location = 'localhost';
        $this->username = 'root';
        $this->password = '';
        $this->database = '4rum';

        return mysqli_connect($this->location, $this->username, $this->password, $this->database);
    }
}