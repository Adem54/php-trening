<?php


class Cars 
{
    public function __construct()
    {   
        var_dump("Cars base class");
    }

    protected function getName()
    {
        var_dump("Name in Cars");
    }

    private function getTitle()
    {
        var_dump("Title in Cars");
    }

    public function getDesc()
    {
        var_dump("Desc in Cars");
    }


    public static function getAge()
    {
        return 37;
    }
}

$result = Cars::getAge();

class Mercedes extends Cars
{
    public function __construct()
    {
         var_dump("Mercedes sub class");   
    }
}

class Volvo extends Cars 
{
    public function __construct()
    {
         var_dump("Mercedes sub class");   
    }

    public function accessParentProtected()
    {
        $this->getName();
    }

    //static method uzerijnden de base class taki static mehtodu cagirabiliyoruz
    public static function getFullName()
    {
        //$this yazarsak static bi rmethodu getiremeyiz, cunku this instance olsuturuldugundaki olusturulan, referans tutucuyu temsil ediyor 
        //self ise direk olarak class in instance olusturulmadan onceki durumunu yani dogrudan class i temsil ediyor
        return    self::getAge();
    }
}

//!static methodlari kullanirken, biz instance olusturmadan da kullanabiliriz


$mercedes = new Cars();
$mercedes->getDesc();

$volvo = new Volvo();


//protected oldugu icin disardan erisilemez ama subclass icinden this aracilig ile proteceted class a erisilebilir
//$volvo->getName();
$volvo->accessParentProtected();

?>