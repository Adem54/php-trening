<?php
require_once("conf.php");

//post api -loadmore with scroll

if($_POST)
{
    $offset = $_POST["start"] ?? 0;
    $limit  = $_POST["limit"] ?? 2;

  
    try {
    
        // Ensure $x and $y are integers to avoid SQL injection
        $offset= intval($offset);
        $limit = intval($limit);
    
        $query = "SELECT * FROM testdb.posts ORDER BY ID ASC LIMIT :offset, :count";
        $stmt  = $conn->prepare($query);
        // Bind the parameters as integers
        $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
        $stmt->bindParam(':count', $limit, PDO::PARAM_INT);
    
        // Execute the query
        $stmt->execute();
    
        // Fetch all rows as an associative array
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
       foreach ($rows as $key => $row) {
        echo '
        <h3>'.$row["title"].'</h3>
        <p>'.$row["description"].'</p>
        <hr />
  ';
       }     
    
    
    } catch (PDOException $ex) {
        echo $ex->getMessage();
    }
}



?>