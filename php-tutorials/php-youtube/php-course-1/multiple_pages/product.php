<?php

require_once("includes/db.php");



$id = "";
if($_GET && isset($_GET["id"]))
{
    $id = $_GET["id"];
}
//!id yi daha guvenli alabilmek icin onun number olup olmadigini kontrol edebiliriz
if(!is_numeric($id))
{
 $id = 0;
}
//Ya da intval da iyi bir cozumdur
if(intval($id)>0)//Eger string bile gelse onu int e cevirerek degerlendirir ve bu sekilde de int olmayan degerler artik 0 olarak gelir ve manipulasyonlara karsi onlemis oluruz..
{

}

$myResults = mysqli_query($conn,"SELECT * FROM products where id=$id"); 
//multiple_pages/product.php?id=4 artik kullanici url e ne girerse onu alabiliriz
if( $myResults === false)
{
  echo mysqli_error($conn);
}else
{
 // $data = mysqli_fetch_all($myResults, MYSQLI_ASSOC);//[[],[]...] multiple array, in array

 //!return single row   [] bir array dondurur sadece, her turlu..Burasi individuel product, yani productDetail i gormek istedigimzde kullanabilcegimz bir metghoddur
 $data = (array)mysqli_fetch_assoc($myResults);//mysql_fetch_assoc her harukarda tek array dondurur, yani, query miz tum production datasini cagirsa bile, bize ilk karsilastigi data yi getirecektir o zamanda 
 //!Normalde sonuc eger aranan id li record bulunamz ise o zaman null gelir ancak, eger array ile casting yaparsak (array) bu sekilde o zaman null geldiginde bile bos array a donusturulur ve bizde array uzerinden de kontrol yaparbiliz istersek
 var_dump($data);
}


?>

<?php
require_once("includes/header.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <main>
        <section>
            <h2>BOYD-MAIN PAGE</h2>
        </section>
    </main>
</body>
</html>

<?php
require_once("includes/footer.php");
?>