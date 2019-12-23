<?php
include_once 'HTML/head.html.php';

if(!isset($_GET['type'])){
    ?>
        <h2>Error</h2>
        <p>GET value not set! Contact the admin for help!</p>
    <?php
    die;
}

$type = $_GET['type'];

if($type === 'notification'){
    if(!isset($_POST['friend_action'])){
        ?>
            <h2>Error</h2>
            <p>Incorrect post request. Contact the admin for help!</p>
        <?php
        die;
    }
    $action = $_POST['friend_action']; // The form sends either 'true' or 'false'. True meaning accept the request.
    $handleRequest = new FriendReqHandler($action);
}

if($type = 'alterfriend'){
    if(!isset($_SESSION['pre-friendstatuschange'])){
        ?>
            <h2>Error</h2>
            <p>Invalid session for removing a friend!</p>
        <?php
        die;
    }

    $user = $_SESSION['pre-friendstatuschange'];

    if(isset($_POST['addfriend'])){
        if(!isset($_SESSION['pre-friendstatuschangecurrent'])){
            ?>
                <h1>Error</h1>
                <p>Invalid session for adding a friend!</p>
            <?php
            die;
        }
        $loggedin = $_SESSION['pre-friendstatuschangecurrent'];
        $addfriend = new AddFriend($user, $loggedin);

    } else if(isset($_POST['removefriend'])){

        $removefriend = new RemoveFriend($user);
        
    }
}