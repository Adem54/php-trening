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


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="" method="GET">
    <input type="text" value="" name="name">
    <button type="submit">Send</button>
</form>
</body>
</html>
<!--
!HTML URL ENCODING
html url encoding hexadecimal kodunu url e yazar
decimal-10lu, hexadecimal 16 li
@ ASCI TABLOSUNDA KI DECIMAL KARSILIGI 64 TUR- HEXADECIMAL KARSILIGI ISE 40 TIR %40 DIYE GELIR ISTE @ YAZILINCA ASCI TABLOSU UZERINDEKI HESAPLAMA DAN HEXADECIMAL KARSILIGI OLAN %40 IN GELMESI ISLEMINE URL-ENCODED DIYORUZ
input- @adem girersek url de ?name=%40adem
input adem erbas girersek url de ?name=adem+erbas

!URL kodlama, tarayıcının ve sunucunun, gönderilen verileri herhangi bir belirsizlik veya URL'deki özel karakterlerden kaynaklanan sorunlar olmadan doğru şekilde yorumlayabilmesini sağlar. Bu kodlama işlemi, bir form gönderildiğinde tarayıcı tarafından otomatik olarak gerçekleştirilir.

URL kodlama bağlamında ASCII kullanılır çünkü URL'ler başlangıçta yalnızca ASCII karakterlerini iletebilecek şekilde tasarlanmıştır. Bu aralığın dışındaki herhangi bir karakterin veya URL'lerde özel anlamları olan karakterlerin (boşluk, ve işareti ve eğik çizgi gibi) kodlanması gerekir. ASCII kullanımı, bu karakterlerin standart, tanınabilir bir formatta kodlanmasını sağlayarak, farklı web teknolojileri ve platformları arasında güvenilir veri aktarımına ve yorumlanmasına olanak tanır.
URL ENDODING OLAYININ GOOGLE BROWSER LARDA ARAMA YAPTIGMIZ ZAAMN DA GOREBILIRIZ

!MIME TYPE(DOSYA KIMLIK TANIMLANMASI) 
Sunucu ya bir dosya yuklendiginde sunucu bu dosyanin ilk olarak uzantisina bakar, yani mime-type ina bakar 
index.html=>text/html dir, suncu mimetype ina bakar ve mime-type inin text/html olmasindan onun html oldugunu anlar, uzerinde islemi ona gore yapacaktir
index.php=>text/php dir mimetype.----Sunucu once dosynin mimetype ina bakar ve dosyayi ona gore calistiriri..bu cok onemli... png,xml,html,video mu...ne oldugunu anlamasi gerekiyor....BUNU IYI ANLAYALIM

SSL
GOOGLE CHROME TUM SITELERIN SSL OLMASINI ISTEDIGI ICIN, HTTP ILE GIRILEN SITELERE GUVENLI DEGIL DIYECEKTIR 
E-COMMERCIELLE SITELERINDE DE SSL ZORUNLUDUR
SUNUCUYA GONDERILEN USERNAME-PASSWORD U BIZDEN SIFRELI BIR SEKILDE GONDERIYOR...VE TEKRAR CLIENT A USERNAME-PASSWORDU SIFRE ILE GONDERIYOR VA ARAYA HACKERLARIN GIRIP DE USERNAME-PASSWORDUNUN CALISNMASIN ONLUYOR... 
HTTP-SSL SIZ -GUVENSIZ
HTTPS - SSL LI-GUVENLI

HTTP DURUM KODLARI 
200-SUCCESS
300-YONLENDIRM KODLARI 
HTTP 301- YONLENDIRME YAPILACAGINI GOSTERIR..GELEN ISTEGIN, BIR URL IN BASKA BIR URLE YONLENDIRILMEK ISTENDIGINDE
SITEMIZ ISMI DEGISTI, AMA ESKI DOMAIN I UZUN SURE KULLANDIGMZ ICIN, ESKI SITEEY GELENLERIN YENI SITEYE YONLENDIRILMESINI ISTEDGINIZDE KULLAN...302 DE GECICI OLARAK YENI DOMAINA GITTIGINDE 
304-
401-SUNUCU TARAFINDAN ISLENEMIYOR, YANLI BIR SOZ DIZIMINDEN KAYNAKLANIYOR--YETKIN YOK--AUTHENTICATION
404-nOT FOUND

501(INTERNAL SERVER ERROR)
HATA SUNUCUDAN KAYNAKLIDIR, SUNUCU RESPONSE  VERECEK GEREKSINIMLERE SAHIP DEGIL, YANI HATA SUNUCUYA GONDERILEN ISTEGIN GONDERILDIGI ENDPOINT IN DUZELTILMESI GEREKLIDIR
503-SERVICE UNAVAILABLE

 -->