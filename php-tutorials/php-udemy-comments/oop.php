<?php

class ApiParser 
{
    private $data;
    private $url;

    public function __construct($url)
    {
        $this->data = file_get_contents($url);
    }

    private function parser()
    {
         $this->data = json_decode($this->data, true);
    }

    public function getComments()
    {
        return $this->data["results"];
    }
}

//!oop.php de de gosterdigmz gibi class yapisi icinde bu islemleri yaparken de yine bir class new lendiginde ilk oalrak calisacak yer olan construct icerisinde biz data nin cekilmesini yaparak class new lendiginde hemen ilk olarak data yi aliriz ki, class icinde olusturulacak olan, method larda data problemis bir sekilde kullanilabilsin...BU MANTIK AYNI FRONT-ENDDE BIZIM SAYFA YUKLENIR YUKLENMEZ ILK DATA YI ALIP EKRANA BASMAMIZ MANTIGI ILE AYNI SEYDIR, KI REACT TAKI COMPOONENT MOUNT MANTIGIDIR-USEEFFECT ICINDEKI DEPENDENCY ARRAY I BOS BIRAKARAK SAYFA ILK YUKLENDIGINDE DATA YI ORDA FETCH EDIP DOM UZERIDNEN DATA YI EKRANA BASMA MANTIGIMIZ GIBIDIR
?>