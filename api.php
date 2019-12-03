<?php 
header('Content-type: application/json');

require_once('functions.php');

if(isset($_GET['type'])){
    $publicuser = new GetUser($_GET['username']);

    $profileuser = new User(
        $publicuser->result['username'],
        $publicuser->result['forename'],
        $publicuser->result['surname'],
        $publicuser->result['bio'],
        $publicuser->result['email'],
        $publicuser->result['profilepicurl'],
        $publicuser->result['bannerpicurl'],
        true,
        false
    );

    $type = $_GET['type'];
    $username = $_GET['username'];

    if($type === 'currentuser'){
        echo(json_encode($currentuser));
    } else if($type === 'profileuser' && isset($username)){
        echo(json_encode($publicuser));
    } else{
        echo '["Unable to retrieve data! Check the API argument in the URL."]';
    }
} else {
    echo '["User type is invalid or blank."]';
}