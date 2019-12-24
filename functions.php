<?php

/**
 * This functions file contains a lot of the crucial variables and functions the site uses across all pages.
 * Things like the logged in user, the details of the profile the user it viewing and so forth and some
 * check functions that return true to help with code speed (i.e. is the user viewing their own profile).
 * All shortcut functions and variables that should be used across the site should be stored here preferably.
 */

if(session_status() == PHP_SESSION_NONE){
    session_start();
}

// Load classes automatically.
require 'autoload.php';

// Create a variable with the current logged in user.
if(!empty($_SESSION['logged_in'])){
    $currentuser = new User(
        $_SESSION['logged_in']['username'],
        $_SESSION['logged_in']['forename'],
        $_SESSION['logged_in']['surname'],
        $_SESSION['logged_in']['bio'],
        $_SESSION['logged_in']['email'],
        true,
        null
    );
}

// Filter the query results in the class to show only pending friend requests for the current user.
if(isset($currentuser)){
    $pending_data = new PendingFriends($currentuser->username);
    $pending_friends = array();
    $pending_friends_full = array();

    foreach($pending_data->result as $item){
        array_push($pending_friends, $item['username']);
        array_push($pending_friends_full, $item);
    }
}

// Various variables.
$css = new GetWebsiteInfo('css', 'style');
$js = new GetWebsiteInfo('js', 'scripts');

// Detect if the user is viewing their own profile. Returns true if so.
function viewing_own_profile(){
    global $currentuser;
    global $profileuser;

    if($currentuser->username == $profileuser->username){
        return true;
    } else {
        return false;
    }
}

/* The friend system is odd, in that it will show the pending friend notifications to both parties.
* This is due to how the tables in the DB work and the query that references those tables.
* For example, the person who sent the request will also see it.
* This will detect if the sender will see their own notification and the rest is up to you.
*/
function check_is_friend(){
    global $friends;
    global $currentuser;
    
    foreach($friends->result as $username){
        if(in_array($currentuser->username, $username)){
            return true;
        break;
        }
    }
}

// Checks if the logged in user is viewing a profile which they have sent a friend request to. Returns true if so.
function check_is_pending(){
    global $pending_friends_full;
    global $profileuser;
    global $currentuser;
    
    foreach($pending_friends_full as $pendingusername){
        if(!viewing_own_profile()){
            if($profileuser->username == $pendingusername['username'] || $pendingusername['pendingfriend']){
                return true;
            }
        }
    break;
    }
}