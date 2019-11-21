<?php

session_start();

// All dependencies
require 'dbconn.php';

// Load classes automatically
require 'autoload.php';

// Load user data!
require 'getuser.php';

// Variables
$css = new GetWebsiteInfo('css', 'style');
$js = new GetWebsiteInfo('js', 'script');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Bebas+Neue|Roboto&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" type="text/css" href="<?php echo $css->cssPath; ?>">
    <script href="<?php echo $js->jsPath ?>"></script>
    <title><?php echo GetWebsiteInfo::$title ?></title>
</head>