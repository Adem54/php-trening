<?php

require_once("abstract/vehicle.abstract.php");
require_once("classes/Car.class.php");


// $vehicle = new Vehicle(); // Error: Cannot instantiate abstract class Vehicle
$car = new Car();
$car->setMake('Toyota');
echo $car->getMake(); // Outputs: Toyota
echo $car->honk();    // Outputs: Beep beep!


//!C# DA VIRTUAL METHODLAR VE PHP DE VIRTUAL METHOD MANTIGI NEDIR
//!Cok kritik bir fark var php ile C# arasinda, virtual methdos...Yani eger ki bizim default degerini direk olarak abstract classimizda veya normal class imizda(cunkuj virtual methodlar normal class larda d akullanilabilir) tanimlariz sonra da , subclass lar bu virtual method un icerigini isterse override diyerek olduguu gibi birakir, isterse de override eder once defualt degerini alir sonra eklemek istedigi seyler var ise onu ekler, istger se de hic override etmez ve tamamen kendi isteegnie gore doldurur 
//!Iste php de virtual methods yoktur, virtual methodlar ile yapilan islem php de normal metohdlarda yapilabiliyor...yani baseclass ta tanimlana bir methot gidip subclass ta icerigi istenildigi gibi doldurulabilir...Ama c# da bu islemm normal methdlar uzerinden yapilamaz ondan dolayi virtual method lar vardir C# da,ama php de de virtual methodlar yoktur ki zaten normal metodlar virtual methodlarini yapgtigi isi kendisi yapmaktadir


/*
!VIRTUAL METHOD IN C# AND PHP
Using Base Class Methods in C#

public class Vehicle {
    public virtual void StartEngine() {
        Console.WriteLine("Vehicle engine starts.");
    }
}

public class Car : Vehicle {
    public override void StartEngine() {
        // Extend the functionality rather than replace it
        base.StartEngine();  // Calls the Vehicle's StartEngine method
        Console.WriteLine("Car engine starts with a roar!");
    }
}


Using Base Class Methods in PHP

class Vehicle {
    public function StartEngine() {
        echo "Vehicle engine starts.\n";
    }
}

class Car extends Vehicle {
    public function StartEngine() {
        // Extend the functionality rather than replace it
        parent::StartEngine();  // Calls the Vehicle's StartEngine method
        echo "Car engine starts with a roar!\n";
    }
}


*/

?>