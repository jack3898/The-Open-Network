<?php

include_once 'HTML/head.html.php';

if(isset($_POST['submit'])){
    if(isset($_FILES['file']['name'])){
        UploadScript::initiateUpload(
            'file', // Submit button name in the form
            $currentuser->username, // Passing in a variable which contains the logged in user details
            $conn, // Database connection
            'uploads/profilepics/', // Directory to store the uploaded file
            'profilepicurl' // Database column to reference file name
        );
    }
    if(isset($_FILES['file_banner']['name'])){
        UploadScript::initiateUpload(
            'file_banner', // Submit button name in the form
            $currentuser->username, // Passing in a variable which contains the logged in user details
            $conn, // Database connection
            'uploads/profilebanners/', // Directory to store the uploaded file
            'bannerpicurl' // Database column to reference file name
        );
    }
}