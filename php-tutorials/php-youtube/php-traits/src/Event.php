<?php

//Her bir 


abstract class Event 
{
    //Event abstract class  ini extend eden tum class lar abstrct getNewPrice methodunun icini doldurmk zorunddir, ayni kullanmak zorunddir
    abstract public function getNewPrice();

    public function chargeCard()
    {
        //process the transaction
        echo "<h4>ChargeCard in event abst class</h4>";
    }


}

?>