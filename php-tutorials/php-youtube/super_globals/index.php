<?php

//Tum site boyunca kullanabilecegimz, super globals-global variables...her zaman heryerden erisebiliriz 
/*
$GLOBALS
$_SERVER
$_REQUEST
$_POST
$_GET
$_FILES
$_ENV
$_COOKIE
$_SESSION
_FILE_


if($_SERVER["REQUEST_METHOD"] == "POST")
{

}else if($_SERVER["REQUEST_METHOD"] == "GET")
{

}

<form action= "<?php echo $_SERVER["PHP_SELF"]; ?>"
kendi bulundugu sayfasina gonderir

!$_POST ve $_GET YERIJE $_REQUEST TE KULLANABILIYORUZ

!SIHIRLI SABITLAR - MAGIC CONSTANTS 
!DEGERLER KULLANILAN YERE GORE DEGISIR VE DYNAMIC TIR 
__LINE__(SATIR NUMARASIN VERIR)
__FILE__(ICINDE BULUNA DOSYA ISMINI VERIR)
__DIR__(ICINDE BULUNAN DIRECTORY VERIR)
__FUNCTION__
__CLASS__
__TRAIT__
__METHOD__
__NAMESPACE__

settype($text, "int");
$text = "sad";
(bool)$text

$num = 7.19;//double veya float i integer e yani tam sayiya ceviriyoruz ama turu ile oynamadan cevirmek istersek 
$res = intval(7.19);
$res=7 type hala double

!Zorla sadece tipini degistiryoruz ama degeri degismiyor
intval
strval
boolval
floatval
doubleval

!Serialize:Herhangi bir degeri saklanabilir veri turune donusturmek icin kullanilir
Ornegin bir array de 20 veri var ve hepsini veritabanni tablosunda tek bir sutun da tutmak isterseniz
Array i veritabanina array olarak ekleyemeyiz(ya string e donustururuz-explode ya da json olarak da veritabani tablosuna kaydederiz) 
Serialize ile de veritabanina kaydedebiliriz, veritabanindan cekerken de unserialize ile cekip tekrar kullanabiliriz
!Unserialize:

*/

$info = [
    "name"=>"Adem",
"surname"=> "Erbas",
"isMarried"=>true,
"age"=>37
];

$result = serialize($info);
echo $result;
//a:4:{s:4:"name";s:4:"Adem";s:7:"surname";s:5:"Erbas";s:9:"isMarried";b:1;s:3:"age";i:37;}
//a:4 array verisi 4 elemanli  string 4 byte(normalde her ingilizce karakter 1 byte a karsilik gelir ancak eger norvecceye ozel karakter kullanirsak o zaman bazen 1,2,4 byte da olabilir)

//!Bu serialize ile veritabanina kaydedilebilir hale getirilen data yi tekrar kullanmak icin ise unserialize  kullaniriz
//Serialize ile donusturulen data da aralarinda kesinlikle bosluk olmamasi gerekir, unserialize ile kullanabilmek icin
echo "<br>";
echo var_dump(unserialize($result));

//Serialization using PHP's serialize function converts arrays (and objects) into a storable representation. unserialize can convert it back.


//!Veritabanina array leri 3 sekilde kaydedebiliriz 
//1-Stringe donusturureek
// Use when:

// You have a simple, flat list of values.
// You don't need to preserve keys or data types.

//2. JSON Encoding (json_encode)
// Use when:

// You need to store complex data structures.
// You might use the data with other languages or systems that support JSON.
// You prefer a standardized and human-readable format.

//3. Serializing (serialize)
// Use when:

// You need to preserve the exact PHP data types and structure, including objects.
// The data will only be used within PHP applications.
// You ensure that the serialized data is from a trusted source or properly validated before unserializing.

/*
The choice among these methods depends on your specific requirements, including the complexity of the data, the need for interoperability with other systems, human readability, and security considerations. For most applications that involve complex data structures or need interoperability, JSON encoding is often the preferred choice. Serialization is powerful for PHP-specific applications but requires caution regarding security. Delimited strings might be suitable for very simple lists but lack the flexibility and robustness of the other two methods.
*/

//!htmlspecielchars ile biz form uzerinden gonderilen data nin html den arindiriilmasini ve onlari html karakteri olarak gonderilmemesin i saglariz

function security($text)
{
    $text = trim($text);//!Bosluklari kaldir
    $text = stripslashes($text);//! / egik slash lari kaldir..eger javascript kodu vs yazilmis ise kaldir, yalniz bu kullanimin kullanimdan kaldirildigi yaziyor
    $text = htmlspecialchars($text);//yazilan html karakterleri kaldir
    return $text;
}
//

//$safeText = htmlspecialchars($text, ENT_QUOTES, 'UTF-8');
//$cleaned = filter_var($input, FILTER_SANITIZE_STRING);
// Example: Validating an email address
$email = filter_var($email, FILTER_VALIDATE_EMAIL);
if (!$email) {
    // Handle invalid email
}


//!empty methodu ile de post ile gonderilen data checkedilebilir
//!isset-boyle bir data var mi...

?>