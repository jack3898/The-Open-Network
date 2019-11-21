<header>
    <h1>4rum</h1>
    <nav>
        <ul>
        <?php if(isset($currentuser->loggedin)){ ?>
            <li>Profile</li>
            <li>Settings</li>
            <li><a href="logout.php">Logout</a></li>
        <?php } ?>
        </ul>
    </nav>
</header>