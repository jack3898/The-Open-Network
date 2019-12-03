<?php 
header('Content-type: application/json');

require_once('functions.php');

if(isset($_GET['type'])){

    require_once 'reusable/getprofileuser.php'; // Get the details of that user's profile.

    $type = $_GET['type'];
    $username = $_GET['user'];

    if($type === 'currentuser'){
        echo(json_encode($currentuser));
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