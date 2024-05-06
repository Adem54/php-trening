<?php

//users tablosuna gelen istekleri nasil karsilayacagmizi burda yazariz

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;


$app = AppFactory::create();
$app->setBasePath('/main/php-trening/php-tutorials/php-youtube/restapi/restapislim/api');
//get all users list
$app->get('/users', function (Request $request, Response $response) {
    
       
       $db = new Db();
        try {
         
            $stmt = $db->connect()->query("select * from user");
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $payload = json_encode($data);
            $response->getBody()->write($payload);
            return $response
                      ->withHeader('Content-Type', 'application/json');
            
           
            
        } catch (PDOException $ex) 
        {
           // echo $ex->getMessage();
           // Handle exceptions and return JSON error response
            $error = [
                "error" => [
                    "text" => $ex->getMessage(),
                    "code" => $ex->getCode()
                ]
            ];
            $response->getBody()->write(json_encode($error));
            return $response->withHeader('Content-Type', 'application/json')->withStatus(500);
        }
       
    
});

?>