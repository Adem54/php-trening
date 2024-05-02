<?php
declare(strict_types=1);
class LoginContr extends Login
{
    //Diger class larin dogrudan erismesini gerektirmedigi durum olmadigi surece private olarak, field larimzi tutmak mantiklidir
    private string $uid;
    private string $pass;

    public function __construct(string $uid, string $pass)
    {
        parent::__construct();
        $this->uid = $uid;
        $this->pass = $pass;
       
    }


    public function loginUser():void
    {
      
        if(!$this->emptyInput())
        {
            //echo "Empty input!";
            header("Location: ../index.php?error=emptyinput");
            exit();
        }

        $this->getUser($this->uid, $this->pass);

    }


    //Tum inputlar girildi ise ve kurallara uygun girildi ise true, ama en az 1 tanesi bile eksik dolduruldu veya bos birakildi ise false donecegiz
    private function emptyInput()
    {
        $result = true;
        if(empty($this->uid) || empty($this->pass))
        {
            $result = false;
        }else
        {
            $result = true;
        } 

        return $result;
    }

 

    //!user,email in daha onceden database de var olup olmadigini da kontrol etmemiz gerekiyor. Ama bu signup modal in icerisinde bu kontrol methodlarini olusturup sonrasinda da bunu controller da bir method olusturarak o metod icerisinde invoke edebiliriz


}

//!Kullanicinin girdigi inputun alindigi yer controller dir, dolayisi ile de validation islemini yapan metjhod da burda olacaktir

?>