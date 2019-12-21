<?php

include_once 'HTML/head.html.php';

$action = $_POST['friend_action']; // The form sends either 'true' or 'false'. True meaning accept the request.

$handleRequest = new FriendReqHandler($action);

if($action){
    
} else if(!$action){

}