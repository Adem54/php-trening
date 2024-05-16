<?php
declare(strict_types=1);

spl_autoload_register(function($class)
{
    require __DIR__. "/src/$class.php";
});

//!ErrorHandler.php dosyasindaki ErrorHandler class ini generic exceptionhandler olarak index.php de kulanablmek icin, bu methoda parametreyi bu sekilde geceriz..coooook onemli burasi 

set_exception_handler("ErrorHandler::handleError");
set_exception_handler("ErrorHandler::handleException");
//set_exception_handler buarasi , spl_autoload_register dan yani class otomaitk olrak reequire edildikten sonra kullanilmalidir
//!Bu error-handling try-catch devreye girmezse devreye girecek ve global bir sekildedir, ve her turlu hatayi yakalar, hatalari yakalama konusunda isimizi garantiye almis oluruz bir nevi
/*

!ISTE BU ERRORHANDLER I KULLANINCA  COK DAHA DETAYLI VE HATANIN NERDEN GOSTEREN CIKTI ALIRIZ...VE BURASI COK KRITIK ONEME SAHIPTIR
Access denied for user 'adem'@'localhost' (using password: YES){
    "code": 0,
    "message": "Database::getConnection(): Return value must be of type PDO, null returned",
    "file": "/var/www/html/main/php-trening/php-tutorials/php-youtube/restapi/restapioop/src/Database.php",
    "line": 22
}

*/
header("Content-type:application/json; charset=UTF-8");
//!BURAYI KULLANMAZSAK DEFAULT OLARAK text/html; charset=UTF-8 CONTENT-TYPE RETURN DATASINDA BU SEKIKLDE GONDER,AMA BIZ BUNUN JSON OLARAK DONMESIN ISTIERIZ ONDAN DOLAYI DA BU SATIRI KULLANMAMIZ GEREKIR

//http://localhost/main/php-trening/php-tutorials/php-youtube/restapi/restapioop/products 
//klaorumzde products olmamasina ragmen, products i da liste icinde getirir cunku, .htaccess deki ayarlama ile . index.php den dolayi 
//Birde .htaccess dosya izinlerini vermezsek ordaki degisikligin etkisini goremeyiz  sudo chmod 777 .htaccess 
//$_SERVER['REQUEST_URI'] tum url i aralarinda / ile bize veriyor string olarakk, bizde bu stringi array a cevirerek istedigmz gibi kullanabiluyoruz
$parts = explode("/", $_SERVER['REQUEST_URI']);

$second_to_last = array_slice($parts,-2,1);//Array in son elemandan bir onceki-second last

if($second_to_last[0] !== "products")
{
    http_response_code(404);
    exit;
}


$id = array_slice($parts,-1,1)[0];//Array in son elemani
$id = $id ?? null;


$database = new Database("localhost","testdb","adem", "adem");
$database->getConnection();


$productGateway = new ProductGateway($database);
/*
[
    {
        "id": 1,
        "name": "Product1",
        "size": 10,
        "is_available": 1
    },
    {
        "id": 2,
        "name": "Product2",
        "size": 15,
        "is_available": 0
    },

    data , products request i yapilinca get request bu sekilde string olarak,gelir ve is_available a da bakarsak 0-1 olarak gelir, boolean degerdir normalde o da string, cunku PDO bu value leri string e donsutruuyor, bu kendisi default olarak bu sekilde gelir ama PDO Yu veritabani baglantisinda kullanirken, new PDO() EGER 4.PARAMETRE OLARAK PDO::ATTR_EMULATE_PREPARES=>false, PDO::ATTR_STRINGIFY_FETCHES=>false yaparsak o zaman data donus tipi artik direk olarak, beklenildigi gibi veritabaninda nasil verildi ise o type de olacak sekilde gelecektir..Yani artk PDO data yi stringe cevirmeden return edecektir
    Neden "is_available": 0 ve 1 olarak donduruyor biz boolean vermemize ragmen cunku databae icerisinde true-false un karsiligi 1-0 dir ve de beklendildigi gibi dogru bir sekilde gondermistir
    Ama illa ki boolean olarak true-false olarak donmesini istersek bunu manuel olarak yapmamiz gerekir, while looop icinde, fetch yaptimgz dongu icinde   $row["is_available"] = (bool)$row["is_available"]; bu seklde yaparak, return edilen data icinde 1-0 degilde true-false olarak donmesini de saglayabiliriz 

*/

//products/id seklinde bir request e gore bir karsilama yaptik burda
//!Manuel bir sekilde router u nasil organize edip yonetiyoruz bunu goruyoruz
//!Autoload u burd ada spl_autoload_register ile manuel bir sekilde yapiyoruz ama, normalde composer ile autoload i  yoneterek daha buyuk proejlerde class larin ayri ayri require edilmesi zorunlulugunu da cozmus olacagiz
//!Asagida goruldugu uzere, Controller class biz require vs yapmadk otomatik olarak, require edilmesin manuel bir sekilde saglamis oluyoruz, composer kullanmadan


$controller = new ProductController($productGateway);


$controller->processRequest($_SERVER['REQUEST_METHOD'], $id);
//!products/123  SONUC: POST-123





?>