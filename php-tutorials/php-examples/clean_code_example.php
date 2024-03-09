<?php


class Rectangle {
    private ?int $length = 0;
    private ?int $height = 0 ;

    public function calcArea():int
    {
        return $this->length * $this->height;
    }

    public function getAround(): int {
        return ($this->length + $this->height)*2;
    }
}



?>