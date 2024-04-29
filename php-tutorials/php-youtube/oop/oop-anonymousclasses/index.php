<?php

//Bu normal bir class
class SimpleClass {
    public function helloWorld()
    {
        echo "Hello world";
    }
}

$obj = new SimpleClass();
$obj->helloWorld();


//Anonymous class , da eger parantez kullanmazsak o zaman constructor kullanmamiz oluruz...ama constructor kullanmaya ihtiyacimz var ise o zaman parantezlerle birlikte kullanmamiz gerekir

$newObj = new class
{
    public function helloWorld()
    {
        echo "<br>anonymouse class hello world";
    }
};

$newObj->helloWorld();

//!Bazen biz sadece 1 kere kullanmamiz gereken class lar olabilir
/*
!Anonymous classes are typically used when only a single instance of the class is needed, or when a class is used as a simple data structure or to implement an interface without declaring a concrete class that might clutter the namespace

!Anonimouse class lar projemizin memorisinde tutulmaz, saklanmaz, 
!Cok daha az y uk olur proejey ve noirmal class tan daha kolaydir
!Aslinda olay su, burda anonymouse class i 1 kez instance olusturup ihtiyacimiz olan yerde kullanip sonra da siliyoruz ve projemizin hicbiryerinde saklanmamis oluyor, ana esprisi de budur
!Bir cesit tools gibi helper gibi dusunebiliriz anoynmous class i , ihtiyac olan yerde kullanilip sonra memory den silinir
*/

interface Greeter {
    public function greet();
}

$greeter = new class implements Greeter {
    public function greet() {
        echo "<br>Hello, World!";
    }
};

$greeter->greet();  // Outputs: Hello, World!

?>