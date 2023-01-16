<?php

//If User is logged in the session['user_logged_in'] will be set to true

//if user is Not Logged in, redirect to login.php page.
if (!isset($_SESSION['user_logged_in'])) {
    echo("Login Failed");
	header('Location:login.php');
}
/*
session_start();
$idletime=60;//after 60 seconds the user gets logged out
if (time()-$_SESSION['timestamp']>$idletime){
    session_destroy();
    session_unset();
}else{
    $_SESSION['timestamp']=time();
}
//on session creation
$_SESSION['timestamp']=time();
*/

 ?>