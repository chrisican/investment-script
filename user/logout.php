<?php
//Begin the session
session_start();

if(isset($_SESSION['user'])){
//Remove all session variables
session_unset();
//Destroy the session
session_destroy();
//Redirect to login
header('Location:admin/login.php');
if(isset($_SESSION['email'])){
//Remove all session variables
session_unset();
//Destroy the session
session_destroy();
//Redirect to login
header('Location:./login.php');
} 
}
else{
	header('Location:https://p2pxtrade.com');
}