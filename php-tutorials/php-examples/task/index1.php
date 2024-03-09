<?php
require_once("Database.php");
require_once("ProcessInterface.php");

require_once("Processer.php");

//timezone yi Oslo ya gore yapmak icin bu sekilde yapariz
date_default_timezone_get("Europe/Oslo");


try {
    $processor = new Processer();
    $processor->add("adem5434@gmail.com", "test", "Hello bu task");
} catch (\Throwable $th) {
   echo $th->getMessage();
}



?>