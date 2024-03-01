<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

class DB
{

    public $db ;
    public static $instance;

    //Eger daha once isntance olusturulmamis ise instance olustur diyoruz
    //new lendigi anda da ne olmus olacak, instance olusmus olacak

    //static method ile biz bir class seviyesinde kullanip bir degiskeni olusturulan her bir instance icerisinde dinamik olarak kullanilmasini saglayabiliyoruz..BIZE HARIKA BESTPRACTISE LER SAGLAYABILIYOR
    public static function getInstance()
    {
        if(!self::$instance)
        {
           
            self::$instance = new self();

        }

        return self::$instance;
    }

    public function __construct()//construction degl construct
    {
    
        try {
            $this->db = new PDO("mysql:host=localhost;dbname=testdb;", "adem", "adem");
            echo "Connected successfully";

        } catch (PDOException $ex) 
        {
                echo $ex->getMessage();
        }
      
    }


    public function connection()
    {
        echo "<br>connection";
        return $this->db;
    }


}


//$db = new DB();
//$db->$db->query("SELECT * from user");
//!Problemimiz su, biz burayi ayri bir dosya yapip config.php yapip bu sayfa da 1 kez newleyip-instance olusturup diger sayfalarda kullanirsak, o zaman problemimiz su, ki her config.php yi kullandgimz sayfalarda tekrar tekrar new leme islemi gerceklesmis olacak ve bu da belli bir kullanimdan sonra ciddi bir yuk haline gelecektir
//!Dolayisi ile biz DB class indan instance olsuturulmus mu bunu static vasitasi ile kontrol edecegiz ve eger instance olusturulmus ise 1 kere artik hep o instanceyi kullanacagiz, egr olusturulmamis ise de o zaman biz olustur diyecegiz

//!Artik new leme yapmak yerine asagidaki gibi yaparak bu config.php nin kullanldigi her yerde tekrar tekrar new lenmesini onlemis oluruz 

$db = DB::getInstance();//Burasi 1 kez new leyecek sonraki cagrildiklarinda new lenemyecek cunku zaten newlenmis 1 kere ve hep o ilk newlendigindeki instance yi kullanmis olacak
$data = $db->connection();
var_dump($data);

?>