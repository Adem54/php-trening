<?php


class BuyProduct extends Visa {
    public function getPayment()
    {
        return $this->visaPayment();
    }
}

//!Abstract class lardan obje olusturamayiz...new leyemeyiz...
?>