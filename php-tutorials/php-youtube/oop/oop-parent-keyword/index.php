<?php 



class FirstClass 
{

    const EXAMPLE = "You can not change this";
    public static function test():string
    {
        $testing = "This is a test";
        return $testing;
    }
}


class SecondClass extends FirstClass
{

    const  SECOND = "SECOND!!!!!";
    public static $staticPorperty = "A static property!";
    function __construct()
    {
        echo parent::EXAMPLE;
        echo "<br>";
        echo self::EXAMPLE;
        echo "<br>";

      //  echo $this->EXAMPLE; THIS ILE BASE CLASS A AIT,CONST PROPERTY YI CAGIRAMAYIZ
        echo "<br>";

        echo self::$staticPorperty;
        echo "<br>";
        
        echo $this->staticPorperty;     
        
        echo "<br>";

        echo parent::test();

        echo "<br>";

        echo self::test();

        
        echo "<br>";

        echo self::SECOND;
        echo "<br>";

       // echo $this->SECOND; CONST PROPERTY LER VE STATIC METHODLAR $THIS ILE CAGIRILMAZ, SELF ILE CAGRILMALIDIR
    }


    //!!PARENT KEYWORDU INHERIT EDILEN, YANI BASEE CLASS I TEMSIL EDER VEEEEE BIZ PARENT KEYWORDUNU SUBCLASS IN HEM CONSTRUCTOR ININ ICERISINDE HEM DE DIGER METHODLARINI ICERISINDE KULLANABILIYORUZ
    public static function secondTest()
    {
        echo parent::EXAMPLE;
        echo "<br>*************<br>";
        echo self::EXAMPLE;
        echo "<br>*************<br>";
        
    }
}

$result = new SecondClass();
echo "<br>";

//!const value leri ve static methodlari dogrudan class in ismi ile de cagirabiliyoruz...class i newlemeye gerek kalmadan
echo FirstClass::EXAMPLE;
echo "<br>";

echo FirstClass::test();

echo "<br>";

echo SecondClass::SECOND;

echo "<br>";

echo SecondClass::$staticPorperty;

echo "<br>&&&&&&&&&&&&&&&<br>";
echo SecondClass::secondTest();


?>