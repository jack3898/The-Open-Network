<?php

include_once 'HTML/head.html.php';

if(empty($_SESSION['logged_in'])){
    header('Location: '.'login.php');
} else {

include_once 'HTML/header.html.php';

?>

<body>
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
</html><?php }