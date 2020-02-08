<?php

include_once 'HTML/head.html.php';

if(empty($_SESSION['logged_in'])){
    header('Location: login.php');
} else if(!isset($_GET['user'])){
    header('Location: profile.php?user=' . $currentuser->username);
    // If user navigates to profile.php without a GET value. Defaults to logged in user profile.
} else {

include_once 'HTML/header.html.php';

include_once 'reusable/getprofileuser.php'; // Get details of the user's profile

?>

<body>
    <main>
        <img id="profile-banner" src="<?php
            if($profileuser->profilebannerurl){
                echo "uploads/profilebanners/{$profileuser->profilebannerurl}";
            } else {
                echo 'resources/bannerpicplaceholder.php';
            }
            ?>">
        <img id="profile-picture" src="<?php
            if($profileuser->profilepicurl){
                echo "uploads/profilepics/{$profileuser->profilepicurl}";
            } else {
                echo "resources/profilepicplaceholder.php";
            }
            ?>">
        <h1 style="text-align: center"><?php echo "{$profileuser->forename} {$profileuser->surname}" ?></h1>
        <div id="profile-container">
            <div>
                <h2>About <?php echo "{$profileuser->forename} {$profileuser->surname}" ?></h2>
                <ul id="profile" class="list-style-1">
                    <li>Name: <?php echo "{$profileuser->forename} {$profileuser->surname}" ?></li>
                    <li>User: <?php echo $profileuser->username ?></li>
                    <li>Email: <a href="mailto: <?php echo $profileuser->email ?>"><?php echo $profileuser->email ?></a></li>
                </ul>
                <?php
                
                // Add, delete, pending friend button on the users profile
                if(!viewing_own_profile() && !check_is_friend() && !check_is_pending()){ ?>
                <form class="plain" id="add_friend" action="userrequestmgr.php?type=alterfriend" method="POST">
                    <?php
                        $_SESSION['pre-friendstatuschange'] = $profileuser->username;
                        $_SESSION['pre-friendstatuschangecurrent'] = $currentuser->username;
                    ?>
                    <button type="submit" name="addfriend">Add <?php echo $profileuser->forename ?> as a friend!</button>
                </form>
                <?php } else if(!viewing_own_profile() && check_is_friend()){
                ?><form class="plain" id="remove_friend" action="userrequestmgr.php?type=alterfriend" method="POST">
                    <?php
                        $_SESSION['pre-friendstatuschange'] = $profileuser->username;
                    ?>
                    <button type="submit" name="removefriend">Remove <?php echo $profileuser->forename ?> as a friend :(</button>
                </form><?php
                } else if(check_is_pending()){
                  ?><form class="plain"><button style="cursor: default; pointer-events: none">Friend request pending...</button></form><?php  
                } ?>
            </div>

            <div>
                <div id="bio">
                    <h2>Bio</h2>
                    <blockquote><?php echo $profileuser->bio ?></blockquote>
                    <?php
                        if(viewing_own_profile()){
                            ?>
                                <button id="edit-bio">Edit</button>
                            <?php
                        }
                    ?>
                </div>
            </div>
            <div>
                <div id="friends">
                    <h2>Friends</h2>
                    <?php get_friends(true, true) // On profile = true, stylised = true ?>
                </div>
            </div>
        </div>
        <?php if(viewing_own_profile()){
            ?>
            <h2>Customise your profile!</h2>
                <div id="customize-profile">
                    <form method="POST" class="work-in-progress"> <!-- Needs action -->
                        <label>First name</label>
                        <input type="text">
                        <label>Last name</label>
                        <input type="text">
                        <button type="submit">Update</button>
                        <p>Note: You cannot change your email or password yet.</p>
                    </form>
                    <form action="upload.php" method="POST" enctype="multipart/form-data">
                        <label>Profile picture</label>
                        <input type="file" name="file">
                        <button type="submit" name="submit">Upload</button>
                    </form>
                    <form action="upload.php" method="POST" enctype="multipart/form-data">
                        <label>Profile banner</label>
                        <input type="file" name="file_banner">
                        <button type="submit" name="submit">Upload</button>
                    </form>
                </div>
            <?php
        } ?>
    </main>
    <?php include 'HTML/footer.html.php'; ?>
</body>
</html><?php }