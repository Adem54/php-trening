<?php

class Dbh {
    private $host = "127.0.0.1";
    private $dbname = "testdb";
    private $username = "adem";
    private $password = "adem";
    private $charset = 'utf8mb4';
    public $conn;

    public function __construct() 
    {
        $this->connect();

    }

    private function connect() 
    {
        try 
        {
            $dsn = sprintf("mysql:host=%s;dbname=%s;charset=%s", $this->host, $this->dbname, $this->charset);
            $this->conn = new PDO($dsn, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            echo "Database connection is successful";
        } catch (PDOException $exception) {
            echo "Database connection error: " . $exception->getMessage();
            throw $exception;
        }
    }

}

?>