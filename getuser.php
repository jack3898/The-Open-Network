<?php

// This file loads a new user.

/**
 * User information template
 */
class User {
    public $username;
    public $forename;
    public $surname;
    public $bio;
    public $email;
    public $loggedin;

    /**
     * un = username
     * fn = forename
     * sn = surname
     * b = bio
     * e = email
     */
    public function __construct($un, $fn, $sn, $b, $e){
        $this->username = $un;
        $this->forename = $fn;
        $this->surname = $sn;
        $this->bio = $b;
        $this->email = $e;
        $this->loggedin = true;
    }
}

if(!empty($_SESSION['logged_in'])){
    $currentuser = new User(
        $_SESSION['logged_in']['username'],
        $_SESSION['logged_in']['forename'],
        $_SESSION['logged_in']['surname'],
        $_SESSION['logged_in']['bio'],
        $_SESSION['logged_in']['email']
    );
}