<?php

session_start();

unset($_SESSION['logged_in']);
unset($User);

header('Location: '.'index.php');