<?php

include_once 'HTML/head.html.php';

/*
* This upload.php file is called when the users submits the form to upload a custom profile picture or
* Banner from their profile page. These IF statements find which type they uploaded, before
* using the UploadScript class to execute the upload.
*/

if(isset($_POST['submit'])){
    if(isset($_FILES['file']['name'])){
        UploadScript::initiateUpload(
            'file', // Submit button name in the form
            $currentuser->username, // Passing in a variable which contains the logged in user details
            'uploads/profilepics/', // Directory to store the uploaded file
            'profilepicurl' // Database column to reference file name
        );
    }
    if(isset($_FILES['file_banner']['name'])){
        UploadScript::initiateUpload(
            'file_banner', // Submit button name in the form
            $currentuser->username, // Passing in a variable which contains the logged in user details
            'uploads/profilebanners/', // Directory to store the uploaded file
            'bannerpicurl' // Database column to reference file name
        );
    }
}