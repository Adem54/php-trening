<?php
declare(strict_types=1);
ini_set('display_errors', 1);
error_reporting(E_ALL);
/*
Class olustururken 
1.si hangi katmanda olacak bunu belirleriz 
2.dogru isimlendirme yaklasimimiz 
3.class ne is yapacak, single responseble mantigi burda da olmali(Database islemleri de cok farkli connection,
 get data(list)-filter data, update-delete-save islemleri var)
4.class ne is yapacak detaylandir hangi field lar gerekiyor bunlari belirle
5.Database connection class burda class larin her kullanildigi yerde new lenmesinden ziyade bir tane ortak newlenmis bir yerde new lenen degisken kullanilmasina ozen gosterilmeli, bunmlar proje buyudgunde cok onemli hale gelecek seylerdir
6.Real time projeler gibi, ilk once, bu tarz hassas bilgileri bir dosya ini dosyasi olusturup o dosya icerisine girerek o dosyadan bu verileri okutarak baslariz ki, ve bu dosyayi da korumaya aliriz hassas dosya ve sifreyi direk proje icnde kodda gostermemis oluruz, ve de environment variable a bu dosyanin konumunu kaydederek direk bir method uzerinden okuruz ki her zaman bu okunabilsin

 */


class Database
{

    private string $host =  "localhost";
    private string $dbname = "gallery_db";
    private string $charset = "utf8mb4";
    private string $username = "adem";
    private string $password = "adem";
    public $db;


    public function __construct()
    {
        //data source name
        try 
        {
            $args = [$this->host, $this->dbname, $this->charset];
            $dsn = sprintf("mysql:host=%s;dbname=%s;charset=%s", ...$args);
            $opts = [$this->username, $this->password];
             $this->db = new PDO($dsn, ...$opts );
            echo "Connected"; 
        } catch (Throwable $throwable) 
        {
            echo $throwable->getMessage();
        }
    }
    

}

//$db = new PDO("mysql:host=localhost;dbname=gallery_db;charset=utf8mb4;", "adem", "adem");

/*
1.yaklasim new lendigi gibi conructor icerisinde, hemen baglanti kurulsun isteyebiliriz ve sonra da direk query CRUD islemini yapan methodlari kullanmak iseyebilirz
2.Db crud islemlerinin temellerini atmaliyiz...yani her bir modul icin onun datase islemelrini yapan alt yapisni kuralim ornegin Product altinda get(), getById(), create(), update(), delete() ama bunlar gelebilecek tum veritabani islemlerini karsilamali, yani gidip arkada surekli bu metodlari calistirmaliyz tum guvenlik onlemleri almamiz ile beraber yani...
3.Herzaman once yapacaklarimzi ilk aklimiza geldigi gibi yapalim 1 yerde toplayalim sonra uzerinde kafa yorarak parcalayalim....bu benim icin su an daha uygulanabilirz ilk basta..burda da bu sekilde yaklasmaliyim...once direk elle sql kodlarini vs yazalim hepsini ardindan onu dinamik hale getirelim...
4.CROSS-CUTTING-CONCERNS BUNLAR OZELLIKLE AYRI ELE ALINACAK, VALIDATION-JWT TOKEN-PERFORMANCE-CACHING-AUTH-AUTHORS--HER YERDE FARKLI VARYASYONLARDA YAPTIGMZ ISLEMLERI NASIL HEM SUREKLI YAZMAYIZ HEM DE ISETDGMIZ GIBI GENISLETEREK KULLANABILIRIZ ISTE BUNLARA CIDDI KAFA YORMAK 
5.PERFORMANS ARTTIRMA ICIN, CLASS LARI SUREKLI SUREKLI NEWLEMEK YERINE DAHA KALICI, VE BAGIMLIKLIKLARI AZALTICI YAKLAISM MANTIGI ORNEGIN BIR ANDA MYSQL DEN POSTGRESQL E GECIS, BIR ANDA NORGESKARTTAN , NORKART A GECIS BUNLARA SISTEMIMIZ HAZIR OLACAK SEKILDE BIR SISTEM
*/
$db = new Database();
?>