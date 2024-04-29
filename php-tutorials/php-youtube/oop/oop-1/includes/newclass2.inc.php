<?php 
declare(strict_types = 1);


class Newclass2_inc
{
    public string $data =  "I am a property";

    public static $drinkingAge = 21;

    function __construct()
    {
        echo "<br>This class has been instantiated<br>";
    }

    public function setNewProperty(string $newData)
    {
        $this->data = $newData;
    }

    public function getNewProperty()
    {
        return $this->data;
    }


    function __destruct()
    {
        echo "<br> This is the end of the class!! <br>";
        
    }

    public static function setDrinkingAge($newDrinkAge)
    {
        self::$drinkingAge = $newDrinkAge;
    }
}

$mynewclass1 = new Newclass2_inc();
//!Olusturdgumz objeyi silmek icin, unset i kullaniriz
unset($mynewclass1);//

//!Dikkat edersek unset ile kaldirdigmz icin artik objeyi kullanamiyoruz...Ve unset kullanilinca, destruct icerisinde obje kaldiriliyor....Destruct icerisinde objenin kaldirilmasi saglanmis oluyor
//echo $mynewclass1->getNewProperty();

//!Static Property and methods
//Static Property ve methdds lari kullanmak icin, class tan yeni bir obje ornegi, yeni bir obje olusturmaya gerek yoktur!!!Zaten bir manada static property ve methodlarin da kullanilma mantiklarinda, da helper, tool mantiginda kullanildigi icin, hic objeyi new lemeden ortak kullanilacak property ve methodlar iicn kullanilir
//!Ancak, sunu da hatirlayalim...biz bir class tan-model-template den olusturulan bir obje den objeye aktarilacak degerler de kullanabilioruz ve olusturulan obje nin kacincin obje oldugunu sayabiliriz...vs bu tarz islemler de yapabiliriz

//!Static ne icin kullaniliyordu sunu hatirlayalim...Ornegin bir class olusturduk Person class i ve bu person class indan biz her bir kisi icin Adem, Daniel, Zeynep, Peter... her biri icin bir obje olusturacgiz, yani bir ornek olusturacagiz....yani abstraction yapmis oluyoruz aslinda...Ve tabi ki her bir obje nin kendine has ozleliklerini kendisi icin atama yapariz...Ama Person class indan olusturulan tum person orneklerinde, yani objelerinde ayni olacak bazi degerler vardir mesela....drinkinAge=21 o zaman iste bunu static yapariz ki bu zaten tum Person class inda olusturulacak ornek objelerde ayni olacaktir...bunu anlamak cook onemlidir

//!Hibirsekilde class i newlemeden erisebiliriz stattic property ye..
echo "<br>";
echo Newclass2_inc::$drinkingAge;

$mynewclass2 = new Newclass2_inc();

echo "<br>*****************</br>";
echo $mynewclass2::$drinkingAge;

Newclass2_inc::setDrinkingAge(25);
echo Newclass2_inc::$drinkingAge;
//!Static methodlar class tan olusturulan, new leneerek olsuturulan objelerin bir parcasi degildir, ama onlarin bir parcalari olmalarina zaten gerek yok, ve static property ve methodlar i zaten biz herhangi bir obje olusturmadan da kullanabiliyoruz!!!!!!!

//!Peki static class larin bir mantigi da aslinda bir nevi class lari da kategorize etmeye yariyor

