<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

//Ama callback teki request ve respoinse lar bir class degil, bir interface dirler..
//Biz eger interface lerin nasil kullanilmasi gerektigini anlamak istiyhorsak, yani gercek hayatta nasil kullanilmasi gerektigni anlamak istiyorsak eger o zaman yapacagimz is sudur ki php nin inbuild bu tarz frameworkleri icerisinde nasil kullanildigini cok iyi kesfetmek ve ayni mantik ile kendi projelerimizde kullanmaktir....BU METHOD HARIKKA BIR YOLDUR
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

//Bu bir class tir
use Slim\Factory\AppFactory;
require __DIR__ . '/../vendor/autoload.php';

//use App\Repositories\UserRepository; ya use ile bu sekilde kullanip sonra direk UserRepository class ini asagida kullaniriz ya  da direk olarak asaigda App\Repositories\UserRepository bu seklde kullaniriz
use App\Database;

$app = AppFactory::create();

$app->setBasePath('/main/php-trening/php-tutorials/php-youtube/restapi/slimapi2/public');

//http://localhost/main/php-trening/php-tutorials/php-youtube/restapi/slimapi2/public/users
$app->get('/users', function (Request $request, Response $response, $args) {
   // $body = json_encode(["id"=>1,"name"=>"Pc"]);
    $db =  new App\Database();
    $userRep = new App\Repositories\UserRepository($db);

        try {
            // $stmt = $db->connect()->query("select * from user");
            // $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $data = $userRep->getAll();
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

    $db = new App\Database();
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

$app->post('/users', function (Request $request, Response $response, $args) {
 

    $db = new App\Database();
        try {
            
            $stmt = $db->connect()->prepare("INSERT into user (username,email,password) values(?, ? ,?)");
            $stmt->execute(["ademnixus","ae@nixus.no", "test!"]);
            $res = $stmt->rowCount() > 0 ? true : false;
            $payload = json_encode(["result"=>$res, "message"=>"Added succesfully"]);
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

$app->put('/user/{id}', function (Request $request, Response $response, $args) {
 
    $id = $args["id"];
    $db = new App\Database();
        try {
            
            $user = ["testusername","test@gmail.com","test",$id];
            $stmt = $db->connect()->prepare("UPDATE  user SET username=?,email=?, password=? where id=?");
            $stmt->execute($user);
            $res = $stmt->rowCount() > 0 ? true : false;
            $payload = json_encode(["result"=>$res, "message"=>"Updated succesfully"]);
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


$app->delete('/user/{id}', function (Request $request, Response $response, $args) {
 
    $id = $args["id"];
    $db = new App\Database();
        try {
            
            $stmt = $db->connect()->prepare("DELETE from user where id=?");
            $stmt->execute([$id]);
            $res = $stmt->rowCount() > 0 ? true : false;
            $payload = json_encode(["result"=>$res, "message"=>"Deleted succesfully"]);
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


//!1-post,update isleminde nasil veriyi post mandan gireriz ve girdigimz veriyi nasil slim de endpointler icerisinde alip kullanabiliriz buna bakalim
$app->run();

//! 1 -
/*!Bestpractise: composer.json a   "autoload": {
        "psr-4": { "": "src/" }   } ekleriz ve sonrasinda index.php icerisinde Database.php yi ekledigmz require i kaldirsak bile autoload dan dolayi require otomatiik bir sekilde yapmilmis olacaktir..Ama bu degisiklk sonrasinda mutlaka composer dump-autoload slimapi2 klasorunde iken composer dump-autoload bu komutu calistirmaliyiz...ki tekrar autoload duzene giriyor ve ondan sonra calismaya baslar
*/