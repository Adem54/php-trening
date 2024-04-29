<?php 

namespace Person;
class Person 
{

    public string $name = "";
    public int $age = 0;
    function __construct(string $name, int $age)
    {
        $this->name = $name;
        $this->age = $age;
    }


    public function getPerson()
    {
        return $this->name;
    }

}