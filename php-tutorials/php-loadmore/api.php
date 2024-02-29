<?php
require_once("conf.php");

if($_POST)
{
    $offset = $_POST["offset"] ?? 0;
    $limit  = $_POST["limit"] ?? 2;

  
    try {
    
        // Ensure $x and $y are integers to avoid SQL injection
        $offset= intval($offset);
        $limit = intval($limit);
    
        $query = "SELECT * FROM testdb.user WHERE username IS NOT NULL  ORDER BY ID ASC LIMIT :offset, :count";
        $stmt  = $conn->prepare($query);
        // Bind the parameters as integers
        $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
        $stmt->bindParam(':count', $limit, PDO::PARAM_INT);
    
        // Execute the query
        $stmt->execute();
    
        // Fetch all rows as an associative array
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        echo json_encode($rows);
    
    
    } catch (PDOException $ex) {
        echo $ex->getMessage();
    }
}





//SELECT * FROM tbl LIMIT 5,10;  # Retrieve rows 6-15( ilk 5'i alma-(offset), ondan sonra 10 tane data getir)
//SELECT * FROM tbl LIMIT 5;     # Retrieve first 5 rows

//!SELECT * FROM table_name LIMIT [number of records to skip], [number of records];
//!SELECT * FROM table_name LIMIT [number of records] OFFSET [number of records to skip];


?>