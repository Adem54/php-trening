<?php 
require_once("conn.php");

if($_POST)
{
    $questionId = $_POST["questionId"] ?? 0 ;
    $option = $_POST["choosenOption"] ?? "";


    try {
        $sql = "INSERT INTO survey (questionId,choosenoption) VALUES(?,?)";
        $stmt = $conn->prepare($sql);
        $success = $stmt->execute([$questionId, $option]);
    
        if ($stmt->rowCount() > 0) {
            echo json_encode(["msg"=>"your choise added", "res"=>true, "data"=>["questionId"=>$questionId ,  "choosenOption"=>$option ]]);
        } else {
            echo "Error: Could not execute the query.";
        }
    
        
    }catch(PDOException $e) 
    {
        echo $e->getMessage();
    }

    catch (\Throwable $th) 
    {
        //echo $e->getMessage();
    }
}

?>