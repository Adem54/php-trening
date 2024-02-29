<?php 

ini_set('display_errors', 1);
error_reporting(E_ALL);


    try {
        $conn = new PDO("mysql:host=localhost;dbname=testdb;charset=utf8", "adem", "adem");
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        //echo "Connected successfully";
    }
    catch(PDOException $e) 
    {
        echo $e->getMessage();
    }

    catch (\Throwable $th) 
    {
        //echo $e->getMessage();
    }


?>