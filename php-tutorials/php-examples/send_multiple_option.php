<?php
if($_POST)
{
    $professions = $_POST["profession"];
    var_dump($professions);
    exit;
}

/*
Biz veritabanina array icerisinde bircok farkli data yi gonderebilmek icin 
1-Ya array i json formatina cevirip(json_encode) json olarak veritabanina kaydederiz....
2-Array data sini implode ile arasina virgul koyup stringe cevirp o sekilde veritabanina kaydederiz...
*/

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!--

    !name="profession[]" seklinde vermemiz coook onemlidir dizi olarak alabilmek icin, yani mutliple data olarak alabilmek icin 
    Sonrasinda da bunu database e nasil basabiliriz...String olarak aralarina virgul kolyacak sekilde yazabiliriz...
     -->
   <form action="" method="POST" >
        <select name="profession[]" id="profession" multiple size="6">
            <option value="">--choose profession</option>
            <option value="1">Backend developer</option>
            <option value="2">Frontend developer</option>
            <option value="3">Designer</option>
        </select>
        <input type="hidden" name="act" value="send">
        <button type="submit">Send</button>
</form> 
</body>
</html>