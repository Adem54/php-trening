<?php




class DB {
    private $db;

    public function __construct() 
    {
       try {
        $this->db = new PDO("mysql:host=localhost;dbname=testdb;charset=utf8", "adem", "adem");
        echo "connection succesffuly";
       } catch (PDOException $ex) {
         echo $ex->getMessage();
       }
    }
}


$db = new DB();

?>