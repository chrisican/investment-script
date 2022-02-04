<?php
require_once('config.php');

// This is for sanitizing our inputs...
function sanitize($input) {
    $input = htmlentities(htmlspecialchars(strip_tags(trim($input))));
    return $input;
}

// This is a function for blocking url hackers
function blockUrlHackers($url) {
    if (!isset($_SESSION['admin_id'])) {
        header("Location: $url");
    }
}

// This function is for resisting unauthenticated users
function authenticate($url) {
    if (!isset($_SESSION['user_id'])) {
        header("Location: $url");
        exit();
    }
}

function defaultTime(){
    date_default_timezone_set("Africa/Lagos");
    echo "The time is " . date("d/m/Y h:i:sa");
}

function isLoggedIn(){
    if (isset($_SESSION['email'])) {
        return true;
    }else{
        return false;
    }
}

function isAdmin(){
    if (isset($_SESSION['email']) && $_SESSION['user']['user_type'] == 'admin' ){
        return true;
    }else{
        return false;
    }
}
?>