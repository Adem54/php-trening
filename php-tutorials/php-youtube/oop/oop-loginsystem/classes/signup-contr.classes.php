<?php
declare(strict_types=1);
class SignupContr extends Signup
{
    //Diger class larin dogrudan erismesini gerektirmedigi durum olmadigi surece private olarak, field larimzi tutmak mantiklidir
    private string $uid;
    private string $email;
    private string $pass;
    private string $pass_again;

    public function __construct(string $uid, string $email, string $pass, string $pass_again)
    {
        parent::__construct();
        $this->uid = $uid;
        $this->email = $email;
        $this->pass = $pass;
        $this->pass_again = $pass_again;
       
    }

    public function signupUser():void
    {
      
        if(!$this->emptyInput())
        {
            //echo "Empty input!";
            header("Location: ../index.php?error=emptyinput");
            exit();
        }

        if(!$this->invalidUid())
        {
            // echo "Invalid username!";
            header("location: ../index.php?error=username");
            exit();
        }
        
        if(!$this->invalidEmail())
        {
            // echo "Invalid email!";
            header("location: ../index.php?error=email");
            exit();
        }

        if(!$this->pwdMatch())
        {
            // echo "Password don't match!";
            header("location: ../index.php?error=passwordmatch");
            exit();
        }
       
        if(!$this->checkUserExist())
        {
            // echo "Username or email taken!";
            header("location: ../index.php?error=useroremailtaken");
            exit();
        }
        
        //create the new user
        $this->setUser($this->uid, $this->email, $this->pass);
    }

    //Tum inputlar girildi ise ve kurallara uygun girildi ise true, ama en az 1 tanesi bile eksik dolduruldu veya bos birakildi ise false donecegiz
    private function emptyInput()
    {
        $result = true;
        if(empty($this->uid) || empty($this->email) || empty($this->pass) || empty($this->pass_again))
        {
            $result = false;
        }else
        {
            $result = true;
        } 

        return $result;
    }

    //usenamee in business logic kurallarina uyup uymadigini kontrol edebiliriz 
    private function invalidUid()
    {
        $result = true;
        //it is just allowerd these characters
        if(!preg_match("/^[a-zA-Z0-9]*$/", $this->uid))
        {
            $result = false;
        }else 
        {
            $result = true;
        }
        return $result;
    }

        //email in email formatina uygun olup olmadingi kontrol etmemi zde gerekir tabi ki 
    private function invalidEmail()
    {
        $result = true;
        if(!filter_var($this->email, FILTER_VALIDATE_EMAIL))
        {
            $result = false;
        }else 
        {
            $result = true;
        }

        return $result;
    }

    private function pwdMatch()
    {
        $result = true;
        if($this->pass !== $this->pass_again)
        {
            $result = false;
        }else 
        {
            $result = true;
        }
        return $result;
    }

    //!user,email in daha onceden database de var olup olmadigini da kontrol etmemiz gerekiyor. Ama bu signup modal in icerisinde bu kontrol methodlarini olusturup sonrasinda da bunu controller da bir method olusturarak o metod icerisinde invoke edebiliriz
    private function checkUserExist()
    {
        $result = $this->checkUser($this->uid, $this->email);
        return $result;
    }

}

//!Kullanicinin girdigi inputun alindigi yer controller dir, dolayisi ile de validation islemini yapan metjhod da burda olacaktir

?>