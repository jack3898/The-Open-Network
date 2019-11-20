<?php

session_start();

$_SESSION['logged_in'] = null;

header('Location: '.'index.php');