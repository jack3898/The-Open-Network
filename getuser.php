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

    /**
     * un = username
     * fn = forename
     * sn = surname
     */
    public function __construct($un, $fn, $sn, $b){
        $this->username = $un;
        $this->forename = $fn;
        $this->surname = $sn;
        $this->bio = $b;
    }
}

if(!empty($_SESSION['logged_in'])){
    $currentuser = new User(
        $_SESSION['logged_in']['username'],
        $_SESSION['logged_in']['forename'],
        $_SESSION['logged_in']['surname'],
        $_SESSION['logged_in']['bio']
    );
}