<?php

//Ama callback teki request ve respoinse lar bir class degil, bir interface dirler..
//Biz eger interface lerin nasil kullanilmasi gerektigini anlamak istiyhorsak, yani gercek hayatta nasil kullanilmasi gerektigni anlamak istiyorsak eger o zaman yapacagimz is sudur ki php nin inbuild bu tarz frameworkleri icerisinde nasil kullanildigini cok iyi kesfetmek ve ayni mantik ile kendi projelerimizde kullanmaktir....BU METHOD HARIKKA BIR YOLDUR
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

//Bu bir class tir
use Slim\Factory\AppFactory;
require __DIR__ . '/../vendor/autoload.php';

require "config.php";

$app = AppFactory::create();

$app->setBasePath('/main/php-trening/php-tutorials/php-youtube/restapi/slimapi2/public');

//http://localhost/main/php-trening/php-tutorials/php-youtube/restapi/slimapi2/public/users
$app->get('/users', function (Request $request, Response $response, $args) {
    $body = json_encode(["id"=>1,"name"=>"Pc"]);
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


//http://localhost/main/php-trening/php-tutorials/php-youtube/restapi/slimapi2/public/user/2
//2 numarali id yi getiriyor
$app->get('/user/{id}', function (Request $request, Response $response, $args) {
    $id = $args["id"];

    $db = new Db();
        try {
         
            $stmt = $db->connect()->prepare("select * from user where id=?");
            $stmt->execute([$id]);
            $data = $stmt->fetch(PDO::FETCH_ASSOC);
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

$app->run();