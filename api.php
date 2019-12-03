<?php 
header('Content-type: application/json');

require_once('functions.php');

if(isset($_GET['type'])){
    $user = $_GET['type'];

    if($user = 'currentuser'){
        echo(json_encode($currentuser));
    } else if($user = 'profileuser'){
        echo(json_encode($profileuser));
    } else{
        echo '["Unable to retrieve data! Check the API argument in the URL."]';
    }
} else {
    echo '["User type is invalid or blank."]';
}