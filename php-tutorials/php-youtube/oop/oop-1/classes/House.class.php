<?php 
class House 
{

    public string $address = "";
    public int $houseNo = 0;
    function __construct(string $address, int $houseNo)
    {
        $this->address = $address;
        $this->houseNo = $houseNo;
    }



    public function getAddress()
    {
        return $this->address;
    }
}