<?php

//abstract class in implemente ettigi, interface icerisindeki method, abstract class icerisinde yazilmak zorunda degildir ancak , bu abstract class i inherit edecek olan class lar icerisinde abstract class in implemente ettigi intrface iceriisndeki method kullanilmak zorundadir
abstract class Vehicle implements VehicleInterface
{

    //Normal class icerisinde tanimladigmz herseyi tanimalyabilirzki bu zaten abstract class i kullanilmasini gerektiren bir ozellikl degill 
    //!Ama dikkat abstract methodlar tanimlayabiliyoruz ve herkes icerisini kendine gore dldurabiliyro
    private $make;

    public function setMake($make) {
        $this->make = $make;
    }

    public function getMake() {
        return $this->make;
    }

    // Abstract method-Abstract methodlarin sadece imzasi yazilir ve de ayni interface de oldugu gibi bu abstract methodun, icinde bulundugu abstract class i inherit eden subclass icerisinde kullanilmak zorundadir
    //!Abstract methodlar ancak abstract class lar icerisinde olusturulabilir
    //!Ve boyle bir method olmak zournda ve bu methodun icerigi  subclass larin herbirisnde kendsine gore doldurulacak ise bu sekilde kullanilir
    abstract public function honk();
}

//!abstract methodlar, sadece abstract classlar icerisinde olusturulabilir bunu unutmayalim...

interface VehicleInterface
{
    public function test();
}

//!VIRTUAL METHOD NEDIR
//!Cok kritik bir fark var php ile C# arasinda, virtual methdos...Yani eger ki bizim default degerini direk olarak abstract classimizda veya normal class imizda(cunkuj virtual methodlar normal class larda d akullanilabilir) tanimlariz sonra da , subclass lar bu virtual method un icerigini isterse override diyerek olduguu gibi birakir, isterse de override eder once defualt degerini alir sonra eklemek istedigi seyler var ise onu ekler, istger se de hic override etmez ve tamamen kendi isteegnie gore doldurur 
//!Iste php de virtual methods yoktur, virtual methodlar ile yapilan islem php de normal metohdlarda yapilabiliyor...yani baseclass ta tanimlana bir methot gidip subclass ta icerigi istenildigi gibi doldurulabilir...Ama c# da bu islemm normal methdlar uzerinden yapilamaz ondan dolayi virtual method lar vardir C# da,ama php de de virtual methodlar yoktur ki zaten normal metodlar virtual methodlarini yapgtigi isi kendisi yapmaktadir
?>