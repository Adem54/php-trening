<?php

require_once("conf.php");



if(isset($_POST["action"]) && $_POST["action"] = "send")
{
    $title = $_POST["title"];
    $description = $_POST["description"];
    var_dump([$title, $description]);
   
    try {
        $sql = "INSERT INTO posts (title,description) VALUES(?,?)";
    $stmt = $conn->prepare($sql);
    $success = $stmt->execute([$title, $description]);
    
    if ($stmt->rowCount() > 0) {
        echo ("Data added succesfully");
    } else {
        echo "Error: Could not execute the query.";
    }
    } catch (PDOException $e) 
    {
        echo $e->getMessage();
    }
}



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<form action="" method="POST">
    <label>title:</label>
    <input type="text" name="title" value="">
    <br>
    <br>
    <label for="">description:</label>
    <textarea type="text" name="description"></textarea>

    <input type="hidden" name="action" value="send">
    <button> Add data </button>
</form>
</body>
</html>