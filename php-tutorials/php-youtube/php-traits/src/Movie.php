<?php


class Movie implements PricingContract
{
    use HasMenu, HasAssignedSeats;


   
    /**
     */
    public function getPrice() 
    {
        //use regular pricing
    }
}


?>