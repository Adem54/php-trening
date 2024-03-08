<?php

//MAGIC METHODS -INVOKE METHODS
//!Invoke methodlar nesnelerin fonksiyon gibi kullanilabilmesini saglar
class  NewClass 
{
       public function greeting()
       {
        echo "greetings<br>";
       } 

       public function __invoke(?string $name){
        echo $name." <b>GREETINGS WITH INVOKE</b>";
       }
}

$instance = new NewClass();
$instance->greeting();

$instance("Adem");
//Ama biz bu nesneyi nasil fonsiyon gibi calistirabiliriz

?>