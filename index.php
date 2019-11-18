<?php

session_start();

if(!$_SESSION['logged_in']){
    header('Location: '.'login.php');
} else {
    ?>Logged in!<?php
}

// All dependencies
require 'dbconn.php';

// Load classes automatically
require 'autoload.php';

// Variables
$css = new getWebsiteInfo('css', 'style');
$js = new getWebsiteInfo('js', 'script');

// Content
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="<?php echo $css->cssPath; ?>">
    <script href="<?php echo $js->jsPath ?>"></script>
    <title><?php echo getWebsiteInfo::$title ?></title>
</head>
<body>
    
</body>
</html>