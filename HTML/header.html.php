<header>
    <h1><?php echo GetWebsiteInfo::$title ?></h1>
    <nav>
        <ul>
        <?php if(isset($currentuser->loggedin)){ ?>
            <li><a href="../forum">Posts</a></li>
            <li><a href="../forum/profile.php?user=<?php echo $currentuser->username ?>">Profile</a></li>
            <li>Settings</li>
            <li><a href="logout.php">Logout</a></li>
            <li><span id="notifications"><i class="fas fa-bell" id="bell"></i>
                <!-- Popup box -->
                <div id="notifications-box">
                    <h2>Notifications</h2>
                    <ul>
                        <?php
                            // Notifications comes from the $currentuser table, and is assigned in head.html.php
                            foreach($pending_friends as $notification){
                                ?>
                                    <li><a href="profile.php?user=<?php echo $notification ?>"><?php echo $notification ?></a> wants to add you as a friend!<br>
                                        <!-- Put form code here to accept or decline friend request. -->
                                        <button class="friend-accept" name="<?php echo $notification ?>">Accept</button>
                                        <button class="friend-decline" name="<?php echo $notification ?>">Decline</button>
                                    </li>
                                <?php
                            }
                        ?>
                    </ul>
                </div>
            </span></li>
        <?php } ?>
        </ul>
    </nav>
</header>