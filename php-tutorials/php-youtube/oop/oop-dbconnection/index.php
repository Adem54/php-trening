<?php 
include "includes/class-autoload.inc.php";

require_once("classes/dbh.class.php");
require_once("classes/dbh2.class.php");
require_once("classes/test.class.php");

try 
{
    $dbh = new Dbh();
    $data = ["username" => "adem54", "email" => "adem@gmail.com"];
    $table = "user";
    $dbh->getUsersStmt($table, $data);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

//$dbh2 = new Dbh();
//$dbh2->fetchAllUsers();


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    
    // $test = new Test();
    // $test->getUsers();
    ?>
</body>
</html>