<?php
declare(strict_types=1);

trait HasMenu
{

    public $items;
    public function getMenu():array | null
    {
        //return menu
        echo "<h4>GetMenu!!!!</h4>";
        var_dump($this->items);
        return $this->items;
    }    

    public function getPrice()
    {
        //get the price
    }
}    
//!Icerisinde ortak olarak kullanmak istgeigmz fonksiyonlari burda bir trait icinde toplariz ve sonra bu trait i use ile icinde kullanacagimz class ta tanimlayip artik o class uzerinden, trait icindedki methodlari cagirabiliriz
//trait in varkli sebebi, eger ayni isimdeki method lar bircok farkli class ta kullanilmak isteniyor ise trait kullanilabilir
//!Her bir class bu methjodu kendi ihtiyacina gore kullanabilecektir
?>