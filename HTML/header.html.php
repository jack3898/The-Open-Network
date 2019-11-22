<header>
    <h1>4rum</h1>
    <nav>
        <ul>
        <?php if(isset($currentuser->loggedin)){ ?>
            <li><a href="../forum">Posts</a></li>
            <li><a href="../forum/profile.php?user=<?php echo $currentuser->username ?>">Profile</a></li>
            <li>Settings</li>
            <li><a href="logout.php">Logout</a></li>
        <?php } ?>
        </ul>
    </nav>
</header>