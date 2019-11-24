<?php

session_start();

// Load classes automatically
require 'autoload.php';

// Load user data!
require 'getuser.php';

// Variables
$css = new GetWebsiteInfo('css', 'style');
$js = new GetWebsiteInfo('js', 'notification-script');
if(isset($currentuser->friendrequests)){
    $notifications = json_decode($currentuser->friendrequests);
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