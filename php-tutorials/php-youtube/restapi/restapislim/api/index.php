<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require __DIR__ . '/../vendor/autoload.php';

require '../src/config/db.php';

$app = AppFactory::create();

//$app->setBasePath('/main/php-trening/php-tutorials/php-youtube/restapi/restapislim/api/index.php');
$app->setBasePath('/main/php-trening/php-tutorials/php-youtube/restapi/restapislim/api');
//main/php-trening/php-tutorials/php-youtube/restapi/restapislim$ 

// $app->get('/hello/{name}', function (Request $request, Response $response, $args) {
//     $name = $args["name"];
//     $response->getBody()->write("Hello, $name");
//     return $response;
// });

//testdb database deki users tablosu ile ilgili olan endpoint
require "../src/routes/users.php";

$app->run();