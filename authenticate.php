<?php
session_start();
// Load classes automatically
require 'autoload.php';

$login = new Auth($_POST['username'], $_POST['password']);
// The class will redirect the user to the homepage if login was successful.