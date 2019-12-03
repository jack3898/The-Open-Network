<?php

$publicuser = new GetUser($_GET['user']);

$profileuser = new User(
    $publicuser->result['username'],
    $publicuser->result['forename'],
    $publicuser->result['surname'],
    $publicuser->result['bio'],
    $publicuser->result['email'],
    $publicuser->result['profilepicurl'],
    $publicuser->result['bannerpicurl'],
    true,
    false
);