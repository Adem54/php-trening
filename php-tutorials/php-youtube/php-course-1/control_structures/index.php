<?php

$arr = [];
if(empty($arr))
{
    echo "array is empty";
}

//!Php dosyalari server da calisir, ve php kodlarinin yazdirdigi result lardan olusan, html- dosyalari client a gonderilerek browerda kullaniciya sunulur, render edildikten sonra tabi
//Browser bilmez, bu data nin php tarafindan gonderildigini, sadece php kendine gelen html css ve javscript i tanir 
//php sadece echo ile var_dump ile ekrana html,css text yazdirarak bunun browser da gozukecek, browser in taniyacagi sonucu return ederek browser da gosterilmesni saglayabiliyor
//!Kesinlikle php codu browser da calismaz, browser php kodunu anlamaz..
//!php sayesinde biz dinamik websiteleri olusturabiliyoruz...

//!Server php kodunu anlar buna dikkat edelim....

$is_ok = false;

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <ul>
        <?php
        $variable = [["id"=>1,"name"=>"Adem", "gender"=>"man"],["id"=>1,"name"=>"Zeynep", "gender"=>"woman"]];
        foreach ($variable as $key => $value) 
        {
?>
 <li> <?php if($value["gender"] == "man")
 {
    echo $value["name"];
 } ?>  </li>
<?php
        }
        
        ?>
       
    </ul>

    <?php
    if($is_ok):
        ?>
        <h3>It is ok</h3>
        <?php
    else:
            ?>
            <h3>It is not ok!</h3>
            <?php
    endif;
    ?>
</body>
</html>