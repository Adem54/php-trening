<?php 
//Eger submit edilmis ise
if(isset($_POST["submit"]))
{
    //Grabbing the data
    $uid = $_POST["uid"] ?? "";
    $pass = $_POST["pass"] ?? "";
    $pass_again = $_POST["pass_again"] ?? "";
    $email = $_POST["email"] ?? "";
}


//Instantiate SignupContr class 
include "../classes/dbh.class.php";
include "../classes/signup.classes.php";
include "../classes/signup-contr.classes.php";
//!BESTPRACTISE BURDA INCLUDE EDILEN CLASS LARIN SIRALAMASI COK ONEMLIDIR , CUNKU EN TEPEDE BASE CLASS OLARAK BULUNAN DBH CLASS I ILK ONCE INCLUDE EDILIR, ONU INHERIT EDEN SIGNUP CLASS I ONUN ALTINDA, VE SIGNUP CLASS ININ INHERIT EDEN SIGNUP-CONT CLASS I DA DIGER IKI CLASS TAN SONRA INCLUDE EDILMELIDIR KI METODLARIMIZ DOGRU BIR SEKILDE CALISSIN


$signup_cont = new SignupContr($uid, $email, $pass, $pass_again);

//Running error handler and user signup
$signup_cont->signupUser();

//Going to back to front page
header("location: ../index.php?error=none");

//!Burda biz signup class larini linkk veriip cagiracagiz,neden SignupContr u instantiate edecegiz cunku, kullanicidan gelen inputun alindigi yer controllerdir, insert,update,delete islemleri controller da yapilir ama methodlar Model class indadir, ve ayni mantikta da fetch, get gibi verinin getirildigi fonksiyonlar database baglantisi yine Modal dadir ama fetch,veya get edilen data View da kullanilarak, son kullaniciya sunulacak hale getriliir
?>