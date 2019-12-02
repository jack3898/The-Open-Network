<?php

if(session_status() == PHP_SESSION_NONE){
    session_start();
}
// Load classes automatically.
require 'autoload.php';

// Load user data!
require 'pendingfriends.php';

// Create a variable with the current logged in user.
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

// Filter the query results in the class to show only pending friend requests for the current user.
if(isset($currentuser)){
    $pending_data = new PendingFriends($currentuser->username);
    $pending_friends = array();
    $pending_friends_full = array();

    foreach($pending_data->result as $item){
        array_push($pending_friends, $item['pendingfriend']);
        array_push($pending_friends_full, $item);
    }
}

// Various variables.
$css = new GetWebsiteInfo('css', 'style');
$js = new GetWebsiteInfo('js', 'notification-script');

function viewing_own_profile(){
    global $currentuser;
    global $profileuser;

    if($currentuser->username == $profileuser->username){
        return true;
    } else {
        return false;
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Bebas+Neue|Roboto&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" type="text/css" href="<?php echo $css->cssPath; ?>">
    <script src="<?php echo $js->jsPath ?>" defer></script>
    <script src="https://kit.fontawesome.com/4304024161.js" crossorigin="anonymous"></script>
    <title><?php echo GetWebsiteInfo::$title ?></title>
</head>