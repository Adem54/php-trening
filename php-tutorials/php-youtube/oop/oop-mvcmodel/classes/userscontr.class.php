<?php

//Burasi da controller kismi olacak ve database baglanti kismi modal da gerceklesecegi icin burda bizim modal i inherit etmemiz gerekiyor

//!Controller, insert ve update islemlerini yapar databas ile ilgili ama modal da connection, fetch islemerli yapilir
//!Business logiclerimiz de controller da yurutulur
class Userscontr extends Users
{

    public function createUser(string $username, string $email)
    {
        $result = $this->setUser($username, $email);
        return $result;
    }
}


?>