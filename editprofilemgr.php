<?php

include_once 'HTML/head.html.php';


// Check the GET valus is set!
if(!isset($_GET['type'])){
    ?>
        <h2>Error!</h2>
        <p>GET value is invalid.</p>
    <?php
    die;
} else {
    $type = $_GET['type'];
}

if($type === 'bio'){
    $data = $_REQUEST;

    // Check that the form has a text field with the name 'newbio'
    if(!isset($data['newbio'])){
        ?>
            <h2>Error!</h2>
            <p>Issue with POST data. Unable to retrieve new bio data. Contact an admin!</p>
        <?php
        die;
    }

    // Validate the bio data
    if(empty($data['newbio']) || preg_match('/[^a-zA-Z0-9 "\'\?\!-]/', $data['newbio']) || strlen($data['newbio']) > 255){
        ?>
        <div>
            <h2>Error!</h2>
            <p>Bio must:</p>
            <ul>
                <li>Be under 255 characters long.</li>
                <li>Not contain weird symbols.</li>
                <li>Not be empty.</li>
            </ul>
        </div>
        <?php
        die;
    } else {
        $begin = new EditProfile($data, $currentuser->username); // $type should be 'bio'
    }
}