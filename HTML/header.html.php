<header><?php
    if(isset($currentuser)){
        ?><h1>Hey, <?php echo $currentuser->forename ?></h1><?php
    } else {
        ?><h1><?php echo GetWebsiteInfo::$title ?></h1><?php   
    }?>
    
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
                            if($pending_friends){
                                foreach($pending_friends as $notification){
                                    if($notification != $currentuser->username){?>
                                        <li>
                                        <form action="userrequestmgr.php?type=notification" method="POST">
                                            <a href="profile.php?user=<?php echo $notification ?>"><?php echo $notification ?></a> wants to add you as a friend!<br>
                                            <!-- Put form code here to accept or decline friend request. -->
                                            <button class="friend-accept" name="friend_action" value="true,<?php echo $notification ?>">Accept</button>
                                            <button class="friend-decline" name="friend_action" value="false,<?php echo $notification ?>">Decline</button>
                                        </form>
                                        </li>
                                    <?php }
                                }
                            } else {
                                ?> <li>No messages!</li> <?php
                            }
                        ?>
                    </ul>
                </div>
            </span></li>
        <?php } ?>
        </ul>
    </nav>
</header>