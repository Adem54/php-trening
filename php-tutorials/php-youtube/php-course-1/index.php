<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// require_once("classes/Auth.php");
// require_once("classes/User.php");
// require_once("classes/Person.php");

require_once("autoloading.php");


$person = new Person();
$user = new User();
$auth = new Auth();


?>