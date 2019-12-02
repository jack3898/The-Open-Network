<?php
// Please ignore this as a working file. This is not currently used and is in need of renovation.

header('Content-type: text/plain');

include_once 'HTML/head.html.php';

$user = $_POST['user'];

$accept = new AcceptFriend($currentuser->username, $user);