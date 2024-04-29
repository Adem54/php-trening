<?php

include "includes/class-autoload.inc.php";
require_once("classes/dbh.class.php");
require_once("classes/users.class.php");
require_once("classes/userview.class.php");



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

        $userView = new Userview();
        var_dump($userView->showUser("adem54"));
    
    ?>
</body>
</html>