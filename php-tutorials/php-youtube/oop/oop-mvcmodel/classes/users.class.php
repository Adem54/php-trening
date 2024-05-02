<?php

//!Burasi model kismi olacak ve model dedgimz yer database ile kontagi kuran yer sadece burasi olacak
//!Users(modal) class i Dbh class ini extend-inherit ederek database baglantisini saglar ve verileri burda fetch ederiz... 
//!Ardinda Users(modal) class i view tarafindan inherit edilerek, data kullaniciya sunulur.yani front-end ciye sunulur..ve de controller da users(modal) i inherit ederek, veritabani baglantisi uzerinden veritabanindaki insert,update,delete islemlerini yapar ve business logic de burda gerceklesir 
class Users extends Dbh
{

    //Bu class Users class i modal dir yani db baglantisini gerceklestirir, dolayisi ile buna sadece bunu inherit edecek olan view-controller erismelidir disardan baska turlu dogrudan erisim vermemeliyiz ondan dolayi da protected yapariz....burdai coook onemli
    protected function getUser(string $username)
    {
       try {
        $sql = "SELECT * from user where username = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$username]);
        //!Biz burda neden herhangi bir sey girmiyoruz fetcAll()
        //!fetch all rows -$publishers = $statement->fetchAll(PDO::FETCH_ASSOC); CUNKU BIZ FETHC ILE ILGILI ILK CONNECTINO YAPILIRKEN, DBH.CLASS.PHP DE  $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC); BUNU YAPTIMGZ ICIN ARTIK, DIREK OLARAK FETCHALL() DIYE CAGIRIRZ YOK BUNU VERMESE IDIK O ZAMAN, PARAMETREYE PDO::FETCH_ASSOC GIRMEMIZ GEREKIRDI

        $results = $stmt->fetchAll();
        return $results;
       } catch (PDOException $ex) {
            echo $ex->getMessage();
       }
    }


    //Bu insert islemi de controller icerisinde invoke edilecektir, cunku biz modal class imizi tamamen disariya kapatmak istiyoruz sadece view-controller tarafindan erisilip oralarda call-invoke edilsin istiyoruz...ONEMLI
    //
    protected function setUser(string $username, string $email)
    {
       try {
        $sql = "INSERT INTO user (username,email) VALUES(?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$username]);
        return ($stmt->rowCount() > 0);

       } catch (PDOException $ex) 
       {
            echo $ex->getMessage();
       }
    }
}

?>