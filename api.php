<?php 
header('Content-type: application/json');

require_once('functions.php');

if(isset($_GET['type'])){

    require_once 'reusable/getprofileuser.php'; // Get the details of that user's profile.

    $type = $_GET['type'];

    if(isset($_GET['user'])){
        $username = $_GET['user'];
    }
    

    if($type === 'currentuser'){
        if(isset($currentuser)){
            echo(json_encode($currentuser));
        } else {
            echo '["You are not logged in!"]';
        }
    } else if($type === 'profileuser' && isset($username)){
        $profileuser_filtered = array(
            'forename' => $profileuser->forename,
            'surname' => $profileuser->surname,
            'username' => $profileuser->username
        );
        echo json_encode($profileuser_filtered);
    } else{
        echo '["Unable to retrieve data! Check the API argument in the URL."]';
    }
} else {
    echo '["User type is invalid or blank."]';
}