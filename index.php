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
    <?php include_once 'HTML/head.html.php' ?>
<body>
    <header>
        <h1>4rum</h1>
        <nav>
            <ul>
                <li>Profile</li>
                <li>Settings</li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <h2>Profile</h2>
        <p>Hey, <?php echo $currentuser->forename . ' ' . $currentuser->surname ?>! Welcome to the forum.</p>
        <ul id="profile">
            <li>Name: <?php echo $currentuser->forename . ' ' . $currentuser->surname ?></li>
            <li>User: <?php echo $currentuser->username ?></li>
            <li>About: <?php echo $currentuser->bio ?></li>
            <li>Email: <a href="mailto: <?php echo $currentuser->email ?>"><?php echo $currentuser->email ?></li>
        </ul>
    </main>
    <footer></footer>
</body>
</html>
<?php
}