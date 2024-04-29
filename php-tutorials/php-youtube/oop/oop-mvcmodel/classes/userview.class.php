<?php 

//!Burada suna cok dikkat edelim..user-view.class.php ismin veremeyiz, cunku o zaman user-View ismnde bir class ismin vermeeyiz buda bizim autoload islemimizin zaten calismamasina sebep olur

//User  class i modal dir ve database connection vs gibi databasea islemleri orda yurutuluyor ondan dolayi da view class inda bizim onu extends ederek ordaki datayi, kullaniciya gostermemiz gerekiiyor
class Userview extends Users
{


    //Burda public olacak cunku artik biz bu methodu front-end e gonderecegiz...
    public function showUser(string $username)
    {
        $results = $this->getUser($username);
        return $results;
    }
}
?>