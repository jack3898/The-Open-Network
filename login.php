<?php 

include_once 'HTML/head.html.php';
include_once 'HTML/header.html.php';

?>
<main>
<h2>Log in</h2>
<form action="authenticate.php" method="POST">
    <label>Username</label>
    <input type="text" name="username" placeholder="Username">
    <label>Password</label>
    <input type="password" name="password" placeholder="Password">
    <input type="submit" value="Login">
</form>
</main>
<?php include 'HTML/footer.html.php'; ?>
</body>
</html>