<?php

//
declare(strict_types=1);



class Helper 
{
    public function __construct(){

    }

    //!paramtreye verilen pattern text in baslangic  inda var mi onu kontrol ederiz
    public static function startsWith(?string $letter, ?string $text):bool
    {
        $len = strlen($letter);
        $firstLetter = substr($text, 0, $len);//0-start index, $len-startindexten baslayip kac karakter gostersin
        if(strcmp(strtolower($firstLetter), strtolower($letter)) === 0) 
        {
            return true;
        }

        return false;
    }


    public static function endsWith(?string $letter, ?string $text):bool
    {

        $pos = strpos($text, $letter);//Aranan harf veya ifadenin ilk olarak karsilasildigi index numarasidir
        return $pos;
    }


    //!Demekki biz bir text in baslangicinda belirli bir pattern ile baslayip baslamdigini 2 farkli seklilde bulabiliyoruz..php de....
    public static function startsWith2(?string $str, ?string $startChar)
    {
        return preg_match('#^'.$startChar.'#', $str);
    }

}

$result =  Helper::startsWith("Zehra", "Zehra");

echo  $result ? "TRUE" : "FALSE";

$test = "Hello";
echo "<br>". strtolower($test);
echo "<br>". strtoupper($test);

echo "<br>";



$result3 = strpos("Adem", "em");
echo "<br>*******";
echo $result3;



$result4 = Helper::startsWith2("Adem", "Ad");
echo "<br>&&&&&&&&&& <br>";
echo $result4;

?>