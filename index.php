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

if(empty($_SESSION['logged_in'])){
    header('Location: '.'login.php');
} else {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="<?php echo $css->cssPath; ?>">
    <script href="<?php echo $js->jsPath ?>"></script>
    <title><?php echo GetWebsiteInfo::$title ?></title>
</head>
<body>
    <header>
        <h1>4rum</h1>
        <span>Hey, <?php echo $currentuser->forename ?>!</span>
    </header>
    <main></main>
    <footer></footer>
</body>
</html>
<?php
}