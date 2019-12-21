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
    public function __construct($un, $fn, $sn, $b, $e, $pp, $pb){
        $this->username = $un;
        $this->forename = $fn;
        $this->surname = $sn;
        $this->bio = $b;
        $this->email = $e;
        $this->profilepicurl = $pp;
        $this->profilebannerurl = $pb;
        $this->loggedin = true;
    }
}