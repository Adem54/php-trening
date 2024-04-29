<?php


abstract class Visa 
{
    public function visaPayment()
    {
        return "Perform a payment";
    }
}


abstract class Vehicle {

    //Normal class icerisinde tanimladigmz herseyi tanimalyabilirzki bu zaten abstract class i kullanilmasini gerektiren bir ozellikl degill 
    //!Ama dikkat abstract methodlar tanimlayabiliyoruz ve herkes icerisini kendine gore dldurabiliyro
    private $make;

    public function setMake($make) {
        $this->make = $make;
    }

    public function getMake() {
        return $this->make;
    }

    // Abstract method
    abstract public function honk();
}

?>