<?php

require_once("Event.php");
require_once("HasAssignedSeats.php");
require_once("PricingContract.php");

class Concert extends Event implements PricingContract
{
    use HasMenu, HasAssignedSeats;

    /**
     * Summary of __construct
     */
    public function __construct()
    {
        $this->items = [
            "Juice",
            "Cola",
            "Tea",
            "Coffee"
        ];
    }


    /**
     */
    public function getPrice() 
    {
        //use peak pricing
    }
    /**
     */
    public function getNewPrice() 
    {
    
    }

    //overriding
    public function chargeCard()
    {
        //process the transaction
        echo "<h4>ChargeCard in Concert class</h4>";
    }
 
}

?>