<?php 
//Eger submit edilmis ise
if(isset($_POST["submit"]))
{
    //Grabbing the data
    $uid = $_POST["uid"] ?? "";
    $pass = $_POST["pass"] ?? "";
  
}


//Instantiate SignupContr class 
include "../classes/dbh.class.php";
include "../classes/login.classes.php";
include "../classes/login-contr.classes.php";
//!BESTPRACTISE BURDA INCLUDE EDILEN CLASS LARIN SIRALAMASI COK ONEMLIDIR , CUNKU EN TEPEDE BASE CLASS OLARAK BULUNAN DBH CLASS I ILK ONCE INCLUDE EDILIR, ONU INHERIT EDEN SIGNUP CLASS I ONUN ALTINDA, VE SIGNUP CLASS ININ INHERIT EDEN SIGNUP-CONT CLASS I DA DIGER IKI CLASS TAN SONRA INCLUDE EDILMELIDIR KI METODLARIMIZ DOGRU BIR SEKILDE CALISSIN


$login_cont = new LoginContr($uid, $pass);

//Running error handler and user signup
$login_cont->loginUser();

//Going to back to front page
header("location: ../index.php?error=none");



?>