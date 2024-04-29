<?php

class Dbh2 {
    private $host = "127.0.0.1";
    private $dbname = "testdb";
    private $username = "adem";
    private $password = "adem";
    private $charset = 'utf8mb4';
    public $conn;

    public function __construct() {
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

    public function fetchAllUsers() 
    {
        $sql = "SELECT * FROM user";  // Assuming the default database is 'testdb', no need to specify it in the query
        $stmt = $this->conn->query($sql);
        $users = $stmt->fetchAll();
        var_dump($users);
    }

    //Insert-operation
    /*
    Using Named Placeholders:
    $table = 'users';
    $fields = "username, email";
    $placeholders = ":username, :email";
    $sql = "INSERT INTO $table ($fields) VALUES ($placeholders)";
    This results in: INSERT INTO users (username, email) VALUES (:username, :email)

    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':username', 'john');
    $stmt->bindValue(':email', 'john@example.com');
    $stmt->execute();


    Using Positional Placeholders:
    $table = 'users';
    $fields = "username, email";
    $placeholders = "?, ?";
    $sql = "INSERT INTO $table ($fields) VALUES ($placeholders)";
    This results in: INSERT INTO users (username, email) VALUES (?, ?)

    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(1, 'john');
    $stmt->bindValue(2, 'john@example.com');
    $stmt->execute();


    FETCH OPERATION

    Using Named Placeholders:
    $table = 'users';
    $conditions = ['username' => 'john', 'email' => 'john@example.com'];
    $sql = "SELECT * FROM $table WHERE username = :username AND email = :email";
    This results in: SELECT * FROM users WHERE username = :username AND email = :email

    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':username', 'john');
    $stmt->bindValue(':email', 'john@example.com');
    $stmt->execute();


    Using Positional Placeholders:
    $table = 'users';
    $sql = "SELECT * FROM $table WHERE username = ? AND email = ?";
    This results in: SELECT * FROM users WHERE username = ? AND email = ?

    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(1, 'john');
    $stmt->bindValue(2, 'john@example.com');
    $stmt->execute();

    */

public function insert($table, $data) 
{
    $keys = array_keys($data);
    $fields = implode(', ', $keys);
    $placeholders = ':' . implode(', :', $keys);

    $sql = "INSERT INTO $table ($fields) VALUES ($placeholders)";
    $stmt = $this->conn->prepare($sql);

    foreach ($data as $key => $value) 
    {
        $stmt->bindValue(':' . $key, $value);
    }

    $stmt->execute();
    return $this->conn->lastInsertId();
}

//
public function fetch($table, $conditions = []) 
{
    $sql = "SELECT * FROM $table";
    if (!empty($conditions)) {
        $sql .= " WHERE ";
        $clauses = [];
        foreach ($conditions as $field => $value) {
            $clauses[] = "$field = :$field";
        }
        $sql .= implode(' AND ', $clauses);
    }
    $stmt = $this->conn->prepare($sql);

    if (!empty($conditions)) {
        foreach ($conditions as $field => $value) {
            $stmt->bindValue(':' . $field, $value);
        }
    }

    $stmt->execute();
    return $stmt->fetchAll();
}

/*
!Kisacasi ana mantigimiz biz oyle bir insert methodu hazirliyoruz ki, karsimza gelebilecek her turlu insert islemini karsilayabilecek, handle edebilecek sekilde... 
!Ayni mantikla , fetch islemini de oyle bir sekilde yapiyoruzki her turlu , query filtreleyerek data yi bize guvenli bir sekilde prepare ile getirecek sekilde sistem kurmak istiyoruz....
*/

}



?>