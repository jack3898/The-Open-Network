<?php

echo 'pls log in';

?>

<form action="authenticate.php" method="POST">
    <input type="text" name="username"> <label>Username</label><br>
    <input type="password" name="password"> <label>Password</label><br>
    <input type="submit" value="Login">
</form>