<?php
session_start();
// Load classes automatically
include_once 'HTML/head.html.php';

if(isset($_GET['type'])){
    $type = $_GET['type'];
} else {
    ?>
        <h2>Error</h2>
        <p>You may have visited this page by mistake. If not, there is an issue on our end.</p>
        <p>Contact an admin for help!</p>
    <?php
    die;
}

if($type === "login"){
    $login = new Auth(
        $_POST['username'],
        $_POST['password'],
        null,
        null,
        null,
        'login');
    // The class will redirect the user to the homepage if login was successful.
} else if ($type === "create"){
    $login = new Auth(
        $_POST['username'],
        $_POST['password'],
        $_POST['forename'],
        $_POST['lastname'],
        $_POST['email'],
        'create');
}