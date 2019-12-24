<?php 

include_once 'HTML/head.html.php';
include_once 'HTML/header.html.php';

?>

<main id="login">

<?php
if(isset($_GET['success'])){
    ?>
        <span class="popup"><h3 style="display: inline">Success!</h3> You can now log in as <?php echo $_GET['success']; ?>! As a quick excercise, try and log in with your new password.</span>
    <?php
}
if(isset($_GET['error'])){
    ?>
        <span class="popup-error"><h3 style="display: inline">Error!</h3> There was an issue! Message: <?php echo $_GET['error']; ?></span>
    <?php
}
?>

<div id="existing-user">
    <h2>Log in</h2>
    <form action="authenticate.php?type=login" method="POST">
        <label>Username</label>
        <input type="text" name="username" placeholder="Username">
        <label>Password</label>
        <input type="password" name="password" placeholder="Password">
        <input type="submit" value="Login">
    </form>
</div>

<div id="new-user">
    <h2>Create an account!</h2>
    <form action="authenticate.php?type=create" method="POST">
        <p>Fields marked with a <i class="fas fa-exclamation-circle"></i> are required.</p>
        <label>Your first name <i class="fas fa-exclamation-circle"></i></label>
        <input type="text" name="forename" placeholder="e.g. Jim">
        <label>Your last name <i class="fas fa-exclamation-circle"></i></label>
        <input type="text" name="lastname" placeholder="e.g. Bobson">
        <label>Unique username <i class="fas fa-exclamation-circle"></i></label>
        <input type="text" name="username" placeholder="e.g. jimbo123">
        <label>Secure password <i class="fas fa-exclamation-circle"></i></label>
        <input type="password" name="password" placeholder="Something secure">
        <label>Email for contact <i class="fas fa-exclamation-circle"></i></label>
        <input type="email" name="email" placeholder="e.g. jimbo@email.com"><em>You will need to verify your email.</em>
        <input type="submit" value="Sign up!">

        <p>Turns out they're all required! Huh, what what do ya know...</p>
    </form>
</div>
</main>
<?php include 'HTML/footer.html.php'; ?>
</body>
</html>