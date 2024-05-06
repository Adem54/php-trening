<?php

class Db {
    private $dbhost = "localhost";
    private $dbUser  = "adem";
    private $dbpass = "adem";
    private $dbname = "testdb";

    public $conn = "";

    // public function __construct()
    // {
    //     $this->conn = $this->connect();
    // }

    public function connect()
    {
        $mysql_connection = "mysql:host=$this->dbhost;dbname=$this->dbname;charset=utf8";
        $connection = new PDO($mysql_connection, $this->dbUser, $this->dbpass);
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $connection;
    }
    
}



?>