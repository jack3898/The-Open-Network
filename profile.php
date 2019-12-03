<?php

include_once 'HTML/head.html.php';

if(empty($_SESSION['logged_in'])){
    header('Location: '.'login.php');
} else {

include_once 'HTML/header.html.php';

include_once 'reusable/getprofileuser.php'; // Get details of the user's profile

?>

<body>
    <main>
        <img id="profile-banner" src="<?php
            if($profileuser->profilebannerurl){
                echo 'uploads/profilebanners/' . $profileuser->profilebannerurl;
            } else {
                echo 'resources/bannerpicokaceholder.svg';
            }
            ?>">
        <img id="profile-picture" src="<?php echo 'uploads/profilepics/' . $profileuser->profilepicurl ?>">
        <h1 style="text-align: center"><?php echo $profileuser->forename . ' ' . $profileuser->surname ?></h1>
        <div id="profile-container">
            <div>
                <h2>About <?php echo $profileuser->forename . ' ' . $profileuser->surname ?></h2>
                <ul id="profile" class="list-style-1">
                    <li>Name: <?php echo $profileuser->forename . ' ' . $profileuser->surname ?></li>
                    <li>User: <?php echo $profileuser->username ?></li>
                    <li>Email: <a href="mailto: <?php echo $profileuser->email ?>"><?php echo $profileuser->email ?></a></li>
                </ul>
                <?php if(!viewing_own_profile()){ ?>
                <form class="plain" id="add_friend">
                    <button>Add <?php echo $profileuser->forename ?> as a friend!</button>
                </form>
                <?php } ?>
            </div>
            <div>
                <div id="bio">
                    <h2>Bio</h2>
                    <blockquote><?php echo $profileuser->bio ?></blockquote>
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