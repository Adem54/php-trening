<?php

//Cookies ler tarayicida depolanir ve $name,$value,$time,$path bunlar tarayicida depolanir yani client tarafinda 
//sONUC OLARAK DATA USER IN BROWSER INDA TUTULUYOR...ONDAN DOLAYI...GUNVELI DEGILDIR DISARDAN YABANCI KULLANICLAR TARAFINDAN ERISILEBILIR...
//Cookiler sayesinde e-ticaret sitelerinde alisveris sepetine attimgz bir urun 2 gun sonra gidiyoruz hala orda duruyor... cunku, cookileri bilgisayara ekliyor ve 2 gun sonra tekrar siteyi actigmzda cookie bilgilerinden sizi hatirliyor ve sizin septinize ekledginiz verileri gorebiliyor  
//Cooki lere eger bir bulunma tarihi vermez isek o zaman, biz browser i kapattigmizda cookies data si da silinecektir 
//Beni hatirla(password), tema secmi(koyu-acik), coklu dil destegi secimi...vs gibi ornekleri biz cookie ler yardimi ile yapabiliriz
//Google bizim hangi urunleri sevdgimzi ilgi duydugumuz anlayarak o urune ile ilgili reklamlari onumuze getiriyor bunu da cookieler yardimi ile yapiyor...Browser uzerinden sectimgz urunleri cookie lerle tutarak ordan kontrol ediyor...ve ona uygun reklamlar getiriyor
//Kisacasi cookies ler, siteyi biz en son biraktk ve 2 gun sonra tekrar o siteyi actigmzda bazi islemlerin tekrarlanmasina gerek kalmadan islemleriniz i daha hizli bir sekilde gerceklestirmeye yarar...
//Cookies serverlarin yani ziyaret edilen sitelere ait serverlarin client in browser ina yerlestirdgi kucuk bir dosyadir(4KB buyuklugundedir)
//Ayrica, eger cookies e bir tarih verirsek o zaman o cookies ler o tarihe kadar silinmezler
//Sessions lar ise server da depolanir tarayici da sadece id leri tutulur...BUNDAN DOLAYI BROWSER DAN SESSION DATALARINA ERISILEMEZ VE ONDAN DA DLAYI COOKIES LERE GORE DAH GUVENLIDIR... 

$isChecked = false;


if(isset($_POST["rememberMe"]) && isset($_POST["name"]))
{
    $isChecked = true;
    echo "<h2>checked</h2>";
    $name = $_POST["name"];
    $myTime = time()+ 60*1;//2 minutter (60*60 1 hour)
    $myCookie = setcookie("name", $name, $myTime);//Eger cookies olusturulmussa $myCookie true gelir
    $myCookie2 = setcookie("ischecked", true);//
}else 
{
    echo "<h2>unchecked</h2>";
    $myCookie2 = setcookie("ischecked", false);
}

var_dump($_COOKIE);


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
        <label for="name">Name</label>
        <input type="text" id="name" name="name">
        <input type="checkbox" name="rememberMe"/>
        <button type="submit">Send</button>
    </form>
</body>
</html>

<?php

//Session birden cok sayfada kullanilacak bilgileri dedgiskenler halinde depolamanin bir yoludur...Bir cookieden farkli olarak, bilgiler kullanicinin bilgisayarinda saklanmaz... 
//Normalde lokal deki pc senin kim oldugunu biliyor...Ancak server dan http araciligi ile sana data gonderen, api ler seni tanimaz...Seni tanimak icin de yine server da bilgilerini session da tutar....Tek bir yerde uygulama boyunca tutar ve ne zaman ihtiyacimz olsa orda kullanabiliriz...Aslinda reacttaki react-context, redux....mantiklari gibidir ama onlar sadece client tarafinin datalaridir
//!Biz ayni dedgiskeni iki farkli sayfada kullanamayiz...ve bir sayfada gerceklesen islemlerin ardindan degiskenlere atanan degerleri hemen farkli sayfalar arasinda kullanamayiz...iste bunu session ile  yapabiliriz...Session datanin server da tutulmasidir 
//!Uygulama ile ilgili uygualamanin geneli ile ilgili tutulacak datalari session da tutarak uygulama boyunca ihtiyac oldugu anda...direk o dataya erisebiliriz... Ornegin kullanici login oldukta sonra istedgimz her an...name,username, emaill... 
//Http adresi durumu korumdadigi icin
//Kullanici tarayiciyi kapatana kadar session oturumu surecektir!!!!!
//Session suresini php.ini dosyasi belirler
//!session.gc_maxlifetime = 7200(2HOURS) bu sure saniye cinsinden ve ekranda hicbirislem yapilmazsa bu sure boyunca, session kendisi silinecektir(GUVENLIK SEBEBI ILE)
//Tek bir uygulamadaki tum safyalarda kullanilabilir

//!SESSION  I BASLATMAMIZ GEREKIR 
session_start();//session oturumu baslatmak demektir
$_SESSION["name"] = "Adem";
//Session datalari, browser kapatildiginda, silinecektir ... Session icin lokalde de bir dosya olusturuluyor oturum kapatildiginda, browser kapatildiginda o lokalde olsuturulan dosyalar da kisa bir sure durup sonra siliniyor onda dolayi zaten tmp klasoru altinda tutuluyor windows da
/*
Linux de 
adem@adem-ThinkPad-13-2nd-Gen:/var/lib/php/sessions$ sudo ls
[sudo] password for adem: 
sess_heq6l5513vuu6p8ql0f4g9evec

*/


?>