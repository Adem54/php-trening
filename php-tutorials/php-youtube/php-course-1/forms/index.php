<?php

require_once("auth.php");

if(!isLoggedIn())
{
    //3 saniye kadar you are unauthorized diye mesaj verip sonra da login e de gonderebiliriz, bunu da yapabiliriz header ile
    header("Location:login.php");
}

//Ama bu kontrol u kullanici login olduktan sonra gostermek istedigmz protected page ler icin, mutlaka ilk olarak yapariz ki, kullanicinin giris izni var ise sayfaya girsin yok sa hic asagiya inmesin


var_dump($_SERVER["REQUEST_METHOD"]);

var_dump($_POST);

$name = $_POST["name"] ?? "";

echo "<h1>SESSION</h1>";



/*
Session Fixation Attacks
Bu vulnerability yapisina onlem almak icin 
We can help to prevent an attack like this by changing the session ID after the user has logged in
bool session_regenerate_id([bool $delete_old_session=false])
User basarili bir sekilde login olur olmaz, hemen bu fonksiyonu cagiririz ki yeni bir session id si uretelim ve ondan sonra artik session icerisine istedigmz gibi user credentials lari kaydedegbilriiz

*/
session_start();

if($_POST["username"] == "adem" && $_POST["password"] == "1234")
{
    //Artik burda login oluyor ve session bilgilerini kyadederiz...ama yukardaki kontrol bu sekilde degil tabi ki ornek icin yaptik yoksa password boyle kontrol edilmez..ve username de veritabanindan kontrol edilir boyle degil 
    session_regenerate_id(true);//eski session i sil yeni id olustur
    $_SESSION["username"] = "adem";
    $_SESSION["pass"] = "1234";

}



$_SESSION["count"] = 1;

if(isset($_SESSION["count"]))
{
    $_SESSION["count"]++;
}else 
{
    $_SESSION["count"] = 1;
}


var_dump($_SESSION);
//!Diger sayfada olusturulmus olan session a bu sayfada da erisebilmek icin bu sayfa da da session i baslatmamiz gerekiyor bunu iyi bilelim. Ama eger ki biz bu sayfaya include-require ettimgz bir dosya vardir ornegin index2.php ve bu dosya icerisinde session_start zaten yapilmis ise o zaman bizim bu icinde bulundgumz sayfada bir kez daha session_start yapmamiza gerek kalmadan, session daki datalara superglobal $_SESSION uzerinden erisebiliriz

//!Cookies
//Web siteleri kendilerini ziyaret eden, son kullanicilarin browserlarina bazi stringler kaydederler, ki onlar daha sonra tekrar ayni sisteye geldiklerinde onlari daha kolay hatirlasinlar, ve onlarin ornegin eger yarim biraktiklari islemler var ise mesela, shoppingcart a order olusturmus ama oyle ce birakip cikmistir...mesela..veya bunun gibi durumlar ve kullaniciya daha iyi bir user-experience sunmak amaci ile de yapilir bu
//Cookies ler direk olarak webbrowswer uzerinden erisilebilen ve data lar herhangi bir sekilde sifrelenmemis ve dogrudan erisilebiliyor dolayisi ile de sensitive bilgileri burda tutmamaliyiz
//Remember me, gibi password hatirlama islemleri mesela(kimi zaman localhostta kullanlir bu islem icin bu arada)

setcookie("example", "hello");

var_dump($_COOKIE);
//deV-TOOLS DA kontrol ettgimz zaman Expires/max-age-Session yaziyorsa bu cookie, session kapatilana kadar gecerlidir demektir
//!Biz expire time i da atayabiliriz bu arada bu onemli

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<form name="form" value="form1" method="POST" >
<!--<input name="name"  autofocus  pattern="[a-zA-Z0-9]+" value="<?php echo $name; ?>"/> -->
<input name="name"  autofocus  pattern="[a-zA-Z0-9]+" value="<?php echo $name; ?>"/>
<input name="lastname" value="" readonly/>
<input name="age"  required/>
<textarea name="desc"> 

</textarea>   

<?php 
$data = [["id"=>1, "name"=>"Skien"],["id"=>2, "name"=>"Porsgrunn"],["id"=>3, "name"=>"Larvik"]];
?>
<select name="city[]" multiple><!-- multiple choise yapabilmemiz icin name=city[] sekliknde tanimlamaliyiz-->
    <?php 
    foreach ($data as $key => $value) {
        # code...
        ?>
        <option
        <?php echo $value['id']== 2 ? 'selected' : ''; ?>
        value="<?php echo $value['id']; ?>"><?php echo $value["name"]; ?></option>
        
        <?php
    }
    
    ?>
    
</select>
<br>
<input type="checkbox" name="agree1" id="agree" value="agree">
<!--Eger type=checkbox ise ve name i var ve de ayrica spesifik value vermis isek o zaman, POST a value si gelecektir, checkbox check edildigi zaman 
!ama eger ki, value verilmezse checkbox a ve check edilirse o aman POST  a 'on' olarak gelecektir checkbox name ine karsilik gelen value.Bu on degeri default degerdir
-->
<input type="checkbox" name="agree2" id="agree">
<label for="agree">I agree</label>
<br>
<!--Radio button  -->

<input type="radio" name="contact" id="contact_email" value="email" />
<label for="contact_email">Email</label>

<input type="radio" name="contact" id="contact_phone" value="phone" />
<label for="contact_phone">Phone</label>

<input type="hidden" name="form" value="form1"/>
<button type="submit">Form1Submit</button>
</form>

<form name="form" value="form2" method="POST">

<input type="hidden" name="form" value="form2"/>

<button type="submit" disabled>Form2Submit</button>
</form>

<script>
    let history = window.history;
    console.log("history:  ", history)
</script>

<hr>
<hr>

</body>
</html>
