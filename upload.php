<?php

include_once 'HTML/head.html.php';

if(isset($_POST['submit'])){
    $filename = $_FILES['file']['name'];
    $filetype = $_FILES['file']['type'];
    $filetmp = $_FILES['file']['tmp_name'];
    $fileerror = $_FILES['file']['error'];
    $filesize = $_FILES['file']['size'];

    $fileext = explode('.', $filename);

    $fileactualextension = strtolower(end($fileext));

    $allowedfiles = array('jpg', 'png', 'jpeg');

    echo $filesize;

    if(in_array($fileactualextension, $allowedfiles)){
        if($fileerror === 0){
            if($filesize < 5000000){
                $newfilename = uniqid('', true).$currentuser->username.'.'.$fileactualextension;

                $filedestination = 'uploads/' . $newfilename;
                $sqli_del_pp = "SELECT `profilepicurl` FROM `users` WHERE username = '$currentuser->username'";
                $del = mysqli_query($conn, $sqli_del_pp);
                $del2 = end(mysqli_fetch_assoc($del));

                unlink('uploads/' . $del2);
                $sqli_upload_pp = "UPDATE users SET profilepicurl = '$newfilename' WHERE username = '$currentuser->username'";

                mysqli_query($conn, $sqli_upload_pp);

                move_uploaded_file($filetmp, $filedestination);
                header('Location: profile.php?user=' . $currentuser->username);
            } else {
                echo 'The file was too big! Maximum file size is 5mb.';
            }
        } else {
            echo 'There was a problem with the uploaded file.';
        }
    } else {
        echo 'Only JPG or PNG under 5Mb!';
    }
}