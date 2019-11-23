<?php

include_once 'HTML/head.html.php';

if(empty($_SESSION['logged_in'])){
    header('Location: '.'login.php');
} else {

include_once 'HTML/header.html.php';

$user = $_GET['user'];

$sql = "SELECT * FROM `users` WHERE `username` = '$user'";

$query = mysqli_query($conn, $sql);

if(mysqli_num_rows($query) > 0){
    $result = mysqli_fetch_array($query);
} else {
    echo 'Invalid user!<br>';
    echo '<a href="index.php">Go home</a>';
    die;
}

$profileuser = new User(
    $result['username'],
    $result['forename'],
    $result['surname'],
    $result['bio'],
    $result['email'],
    $result['profilepicurl'],
    $result['bannerpicurl'],
    true
);

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
            </div>
            <div>
                <div id="bio">
                    <h2>Bio</h2>
                    <blockquote><?php echo $profileuser->bio ?></blockquote>
                </div>
            </div>
        </div>
        <?php if($currentuser->username === $profileuser->username){
            ?>
            <h2>Customise</h2>
                <div id="customize-profile">
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
    <footer></footer>
</body>
</html><?php }