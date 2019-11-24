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
        
    </main>
    <?php include 'HTML/footer.html.php'; ?>
</body>
</html><?php }