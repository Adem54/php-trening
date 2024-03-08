<?php

//MAGIC METHODS -INVOKE METHODS
//!Invoke methodlar nesnelerin fonksiyon gibi kullanilabilmesini saglar..ILK DEFA GORDUM
class  NewClass 
{
       public function greeting()
       {
        echo "greetings<br>";
       } 

       public function __invoke(?string $name){
        echo $name." <b>GREETINGS WITH INVOKE</b> <br>";
       }
}

$instance = new NewClass();
$instance->greeting();

$instance("Adem");
//Ama biz bu nesneyi nasil fonsiyon gibi calistirabiliriz



class Test {
    public function method1()
    {
        echo "Hello method1";
    }

    public function method2()
    {
        echo "Hello method2";
    }
}

//!HARIKA BIR OLAY...DINAMIK OLARAK METHODLARI CALISTIRABILIYORUZ....ILK DEFA GORDUM
$instance2 = new Test();
$method = "method2";
$instance2->$method();


class Invoker {
   //methodu calistiracak bir method bu 
    public function executeMethod($object, $method)
    {
        $object->$method();
    }
}

$test = new Test();
$invoker = new Invoker();
//!Dikkat edelim bir baska class a ait, methodun yine farkli bir class in mehtodu icinde invoke edilebilmesini saglamis oluyoruz dinamik bir sekilde ki bu cooook ciddi fleksibellik kazandiririz bize...HARIKA BIR BESTPRACTISE...

$invoker->executeMethod($test, "method2");
$invoker->executeMethod($test, "method1");

?>