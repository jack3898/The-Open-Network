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
    public $profilepicurl;
    public $profilebannerurl;
    public $friends;
    public $friendrequests;

    /**
     * un = username
     * fn = forename
     * sn = surname
     * b = bio
     * e = email
     * pp = profile pic url
     * pb = profile banner url
     * fr = friends
     * frr = friend requests
     */
    public function __construct($un, $fn, $sn, $b, $e, $pp, $pb, $fr, $frr){
        $this->username = $un;
        $this->forename = $fn;
        $this->surname = $sn;
        $this->bio = $b;
        $this->email = $e;
        $this->profilepicurl = $pp;
        $this->profilebannerurl = $pb;
        $this->loggedin = true;
        $this->friends = $fr;
        $this->friendrequests = $frr;
    }
}

if(!empty($_SESSION['logged_in'])){
    $currentuser = new User(
        $_SESSION['logged_in']['username'],
        $_SESSION['logged_in']['forename'],
        $_SESSION['logged_in']['surname'],
        $_SESSION['logged_in']['bio'],
        $_SESSION['logged_in']['email'],
        true,
        null,
        $_SESSION['logged_in']['friendids'],
        $_SESSION['logged_in']['pendingfriends']
    );
}