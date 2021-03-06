<?php

class UploadScript extends dbconn{
    function __construct($type, $currentuser, $directory, $dbcol){
        $filename = $_FILES[$type]['name'];
        $filetype = $_FILES[$type]['type'];
        $filetmp = $_FILES[$type]['tmp_name'];
        $fileerror = $_FILES[$type]['error'];
        $filesize = $_FILES[$type]['size'];

        $fileext = explode('.', $filename);

        $conn = $this->connect();

        $fileactualextension = strtolower(end($fileext));

        $allowedfiles = array('jpg', 'png', 'jpeg');

        if(in_array($fileactualextension, $allowedfiles)){
            if($fileerror === 0){
                if($filesize < 5000000){
                    $newfilename = uniqid('', true).$currentuser.'.'.$fileactualextension;
                    
                    $filedestination = $directory . $newfilename;

                    $sqli_del_pp = "SELECT $dbcol FROM `users` WHERE username = '$currentuser'";
                    $del = mysqli_query($conn, $sqli_del_pp);
                    $del2 = end(mysqli_fetch_assoc($del));
    
                    unlink($directory . $del2);
                    $sqli_upload_pp = "UPDATE users SET $dbcol = '$newfilename' WHERE username = '$currentuser'";
    
                    mysqli_query($conn, $sqli_upload_pp);
    
                    move_uploaded_file($filetmp, $filedestination);
                    header('Location: profile.php?user=' . $currentuser);
                } else {
                    return 'The file was too big! Maximum file size is 5mb.';
                }
            } else {
                return 'There was a problem with the uploaded file.';
            }
        } else {
            return 'Only JPG or PNG under 5Mb!';
        }
    }
}