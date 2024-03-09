<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

class Database 
{
    public  $db;
    public function __construct() 
    {
       try {
        $this->db = new PDO("mysql:host=localhost;dbname=testdb;charset=utf8", "adem", "adem");
        //echo "connection succesffuly";
       } catch (PDOException $ex) {
         echo $ex->getMessage();
       }
    }
}

?>