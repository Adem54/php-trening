<?php 




if(isset($_GET["mode"]) && $_GET["mode"]=="comments")
{
    $result = file_get_contents("https://www.udemy.com/api-2.0/courses/1050454/reviews");
    $results = json_decode($result)->results;
    
    echo json_encode($results);
}


?>