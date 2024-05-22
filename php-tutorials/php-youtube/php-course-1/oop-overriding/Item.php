<?php 

declare(strict_types=1);
class Item 
{
    public string $name = "";

    public function getDescription():string
    {
        return $this->name;
    }
}

class Book extends Item
{
    public string $author = "";

    public function getDescription(): string
    {
        //istersek su sekilde yapariz direk istdgimz gibi farkli bir icerik yazarak override ederiz 
        //return $this->name." by ". $this->author;
        //Istersek de base class icerigini direk olarak kullanip ek olarak kendi icerigimizi ekleriz istersek de hic eklemeden direk base-class iceriigni kullanrizi
      //  return parent::getDescription() . " by ". $this->author;
      //Ayni seyi this ile de yapabiliyoruz
       return $this->getDescription() . " by ". $this->author;

    }
}


?>