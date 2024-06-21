<?php
declare(strict_types=1);

require_once("new_config.php");

class Database
{
    
    public $conn;

    public function __construct()
    {
        $this->open_db_connection();
    }
    
    public function open_db_connection()
    {
        try 
        {
            
            $dsn = sprintf("mysql:host=%s;dbname=%s;charset=%s;", DB_HOST,DB_NAME,CHARSET);
           
            $this->conn = new PDO($dsn, USERNAME, PASSWORD);
           
            return  $this->conn;
        } catch (\Throwable $th) 
        {
            echo $th->getMessage();
        }

        
    }


    public function select_query(string $sql , array $data)
    {
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($data);
        $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    }
    
}

$db = new Database();


?>