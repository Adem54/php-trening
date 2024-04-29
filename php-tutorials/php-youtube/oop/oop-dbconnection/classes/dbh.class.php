<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);
//! dbh.class.php deki .class sadece naming convention dir..yani bu dosyasinin class a a it oldugunu gostermek icindir


class Dbh //!Database handler, database helper
{
    //!Burasi database ile ilgili bilgiler i tutacagimz ve baglantiyi kuracagimz class oldugu icin biz, private field kullanmak istiyoruz cunku hassas bilgileri tutacagiz gelip de disardan birisi degistirmesini istemiyoruz
    private $host = "127.0.0.1";
    private $dbname = "testdb";
    private $username = "adem";
    private $password = "adem";
    private $charset = 'utf8mb4';

    public $conn;

public function __construct() 
{
  $this->connect();
}

//protected olunca sadece bu class i inherit eden class tarafindan erisilebiliyor
protected function connect()
{
    try 
    {
        // $conn = new PDO("mysql:host=localhost;dbname=testdb", "adem", "adem");
        // Format string with placeholders
        //!dns-data source name
        $dsn = sprintf("mysql:host=%s;dbname=%s;charset=%s", $this->host, $this->dbname, $this->charset);
        //$dsn = "mysql:host=" . $this->host . ";dbname=" . $this->dbname . ";charset=" . $this->charset;
        $this->conn = new PDO($dsn, $this->username, $this->password);
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        echo "Database connection is succesfuull";
 
    } catch (PDOException $exception) 
    {
        echo "Database connection error: " . $exception->getMessage();
        throw $exception;
    }
}


//$data = ["username"=>"adem", "email"=>"adem@gmail.com"];
/*
$arr = ["username = ?", "email = ? ", "password =  ?"];
$res = implode(" AND ", $arr);
$res =  'username = ? AND email = ? AND password = ?'
!Elmizde var olan, ornegin string durumunda var olan, bir ifadenin 1. siNIN ONUNE GELMEYECEK VE SONUNCUDAN DA SONRA GELMEYECEK SEKILDE ARALARA AND GETIRMEK ICIN ONCE ARALARINA AND GETIRECEGIMZ IFADELERI DIZI ICERISINE ATARIZ SONRA DA O DIZIYI IMPLODE ILE ARALARINA AND GELECEK SEKILDE TEKRAR STRINGE CEVIRIRIZ...
*/
public function getUsersStmt(string $table, $data)
{
    $fields = array_keys($data);
    $sql = "SELECT * FROM ".  $table . " WHERE ";//tablo adini buyuk yazinca sorun yasadik
    //username = ?  AND email = ?
    $clouses = [];
    $values = [];
    foreach ($data as $key => $value) 
    {
        $clouses[] = $key. " = ?";
        $values[] = $value;
    }

    $sql .= implode(" AND ", $clouses);
    var_dump($sql);

    $stmt = $this->conn->prepare($sql);
    $stmt->execute($values);

    $users = $stmt->fetchAll();
    var_dump($users);
  
}

//Bu da manuel hali, yukardaki islemin manuel hali..
public function getUsersStmt2(string $username, string $email)
{
    $sql = "SELECT * FROM user where username = ? and email = ? ";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute([$username, $email]);
    $users = $stmt->fetchAll();
    var_dump($users);
    
}

public function setUsersStmt2(string $username, string $email)
{
    $sql = "INSERT INTO user (username, email) VALUES(?, ?)";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute([$username, $email]);
    if($stmt->rowCount()>0)
    {
        echo "data is inserted";
    }
   
}


}


/*
!$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
!$this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
Bunlar database baglantisi veya queyr ler de ortaya cikacak hatalarin handle edilme sekilleri aacisindan ve database den query ler ile cekilecek datalarin fetch edilecek datalarin , hangi turde ve ihtiaycimza yonelik olarak cekilmesi icin coook kritik oneme sahiptir ondan dolayi bunlar mutlaka kullanilmalidir
*/




?>