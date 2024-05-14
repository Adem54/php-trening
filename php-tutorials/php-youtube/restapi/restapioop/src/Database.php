<?php

declare(strict_types=1);
class Database {
  

    public function __construct(private string $host,private string $name, private string $user, private string $password)
    {
        
    }

    public function getConnection():PDO
    {
        try {
            $mysql_connection = "mysql:host=$this->host;dbname=$this->name;charset=utf8";
        $connection = new PDO($mysql_connection, $this->user, $this->password, [
            PDO::ATTR_EMULATE_PREPARES=>false,
            PDO::ATTR_STRINGIFY_FETCHES=>false
        ]);
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $connection;
    }
    
}



?>
