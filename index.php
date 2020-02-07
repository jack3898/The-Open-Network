<?php

include_once 'HTML/head.html.php';

if(empty($_SESSION['logged_in'])){
    header('Location: login.php');
} else {

include_once 'HTML/header.html.php';

?>

<body>
    <main>
        <h2>Posts for <?php echo $currentuser->forename ?>:</h2>

        <button>Compose</button>

        <?php
            $posts = new Posts('get', $currentuser->username);
            foreach($posts->result as $post){
                ?>
                <div class="post">
                <img class="profile-picture-post" src="<?php
                    if(!empty($post['profilepicurl'])){
                        echo "uploads/profilepics/{$post['profilepicurl']}";
                    } else {
                        echo "resources/profilepicplaceholder.php";
                    }
                    ?>">

                    <p><?php echo $post['post_content'] ?></p>
                    <p><?php echo "Posted by {$post['forename']} {$post['surname']} at " . date("j\\t\\h M, Y", $post['post_date']) ?></p>
                </div>
                <?php
            }
        ?>
    </main>
    <?php include 'HTML/footer.html.php'; ?>
</body>
</html><?php }