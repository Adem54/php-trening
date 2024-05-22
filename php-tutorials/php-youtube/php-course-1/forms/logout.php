<?php

session_start();

//Unset the all of the session variables
$_SESSION = array();

//It will destroy the session not just sesson data 
if(ini_get("session.use cookies"))
{
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000, $params["path"], $params["domain"], $params["secure"], $params["httponly"]);
}

//Finally destroy the session 
session_destroy();

?>
