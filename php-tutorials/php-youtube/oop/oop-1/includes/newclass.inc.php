<?php
declare(strict_types = 1);


class Newclass 
{
    //Properties and methods goes here 
    public ?string $info= "This is some info";
    //?string null olabilir onu gosterir
    
}

//instanciate the class  -new lemek
$object = new Newclass();


var_dump($object);

class Person 
{
    public ?int $id = 0;
    public ?string $name = "Person";
    public ?int $age = 0;

    protected string $first = "Daniel";
    private string $lastname = "erbas";

    protected string $myName = "Protected property";

    //private lara sadece class icerisinde erisebiliriz ve orda kullanabiliriz
    public function test():bool {
        var_dump("This is tes private func ".$this->lastname);
        return true;
    }
}
//private olan property-field veya methodlar, onu inherit eden class tarafindan da kullanilamazlar ancak protected ile
//private olan bir property yi biz ayni class icerisinde public bir fonksiyon icerisinde eger kullanirsak o public fonksiyonu da disarda kullanarak, aslinda private olan bir propert nin disarda kullanilabilmesine imkan tanimis oluruz 
class Peter extends Person {

    public function showInfo() : bool 
    {

        $this->name = "Peter";
        $this->age = 32;
        var_dump($this->name . " - ". $this->age);
      var_dump($this->test());
        return true;
    }

    public function showProtectedField():bool 
    {
        var_dump($this->myName);
        return true;
    }

    public function owner():bool 
    {
        $a = $this->first;
        var_dump($a);
        return true;
    }
}

$peter = new Peter();
var_dump($peter->name);
$peter->showInfo();
$peter->showProtectedField();

$peter->owner();

//Ama protected property ye disardan direk olarak erisemeyiz , sadece inherit eden class lar tarafindan ve class in kendisi tarafindan erisilebilir 

$person = new Person();
//Aslinda person class i extend edilerek Peter class ina diyhoruz ki sende bir Person class isin demis oluyoruz ve bu da aslinda soye oluyor

//! Inherit in bize kazandirdigi ve gozden kacirilan 2 nokta 
//!1-base class veya implement edilen interface kendilerini implemente veya inherit eden tum class larin referansini tutar... 
//!2-base class veya implement edilen interface i implemente eden veya baseclass i inherit eden tum classlar aslinda bir nevi, type lari ayni olmus olacagi icin biz bunlari ayni, dizi icerisinde de kullanabiliriz!!!!!!!!!!!!!!!!
//!Person class indan ornegin inherit edilen 10 farkli class olsun ve biz bu 10 farkli class i yerine gore kullanacagimz cok farkli islemerimz var ve baska bir class icerisinde bu 10 farkli class dan hangisini kullanirsak ona gore fonksyonun dinamk calismasini bekliyoruz o zaman hangi class icerisinde kullanilacakasa bu 10 class biz o 10 class dan hangisin kullanirsak kullanalim, sorun cikarmayacak, ve o 10 class in da referansini tutan base-class olan inherit edilen class i parametreye gondeririz ki, artik parametreye verilen class i inherit eden tum class lar o class new lenirken parametreye verilebilir...

/*

SIMDI USECASE LERE BAKACAK OLURSAK EGER
! Simdi biz projelerimizde cok ciddi benzerlikler kullaniyoruz ve bu benzerliklerden dolayi da cok fazla tekrar eden kodlar kullanabiliyoruz 
Ornegin 
$name1 = "Daniel";
$eyecolor="Blue";
$age1 = 28;


$name2 = "Peter";
$eyecolor2="Green";
$age12 = 32;

BUNUN YERINE HEMEN SUNU YAPABILIRIZ 

*/


class MyPerson 
{
    private ?string $name = "";
    private ?string $eyecolor = "";
    private ?int $age = 0;

    //set-get methoddlarini kullanmaliyiz
    public function setName(?string $name)
    {
        //encapsulation ile disardan direk olarak field-lara erisilmesini engelleiyoruz ve bizim koydgumuz kurallara gore disardan veri girilmesini sagliyoruz...Yani filtreleme gibi, kapsulliyoruz...field imiza veri atamasi ve erismini belirli kurala baglayarak bizim kontrolumuz altinda tutmus oluyoruz..Disardan birsinin bize ait bir field i istedgi gibi ele alamamasini saglamis oluyoruz
        if(strlen($name) <= 3)
        {
            echo "name must be min 3 chars";
        }else{
            $this->name = $name;
        }
       
    }

    public function getName()
    {
        return $this->name;
    }
}

class Daniel extends MyPerson 
{

}

class Peterr extends MyPerson
{

}

$daniel = new Daniel();
$peter = new Peterr();

$daniel->setName("Daniel");
var_dump($daniel->getName());


$peter->setName("Peter");
var_dump($peter->getName());
/*
!1- O zaman demekki OOP KULLANIRKEN ilk ana mantigmz property(public olanlar), field(private olanlar)
Biz olabildigince genellikle disardan erisilmesini istemez isek hassas datalari icin visibility yi propery yaparak, setter ve getter methodlarimiz uzerinden disardan kullanicilarin field larimiza erismesini saglayarak ENCAPSULATION MANTGINI CALISTIRMIS OLACAGIZ...

!CLASS BIR MODEL DIR YA DA BIR TEMPLATE GIBI BIR CLASS DESIGNI OLUSTURURUZ VE O CALSS TAN ISE ISTEDGIMZ KADAR OBJECT OLUSTURURUZ...ISTEDIGMZ KADAR INSTANCE-YANI NEW LEYEREK ORNEK OLUSTURURUZ... ISTE ZATEN BUNUN ADIDIR ABSTRACTION YANI BIZ ESASINDA BIR SOYUTLAMA YAPIYORUZ...REAL LIFE DA KI PROBLEMLER ICIN MODEL-TEMPLATE LER OLSUTURUP SONRA DA ONDAN IHTIYACIMIZ OLDUGU KADAR OBJELER OLUSTURARAK GERCEK HAYATTAKI BIR PROBLEMI SOYUTLAMIS OLUYORUZ..ESASINDA

!AYRICA BIZ BAZI DEFAULT OLARAK DEGERLERI DIREK OLARAK, CLASS I OLUSTURURKEN DE ATAYABILIRIZ, EGER HERHANGI BIR DEGER ATANMAZ ISE BIZIM CLASS ICERISINDE ATADIGMZ DEGLERLER GELMESI ICIN....BUNU ANLAYALIM...CLASS ICERISINDE ATAYACAGIMZ DEGERLER DEFAULT DEGERLERDIR....BIZ ZATEN BUNU TUM DEGISKENLERDE DE YAPMAYA CALISIYOURZ...AYNI MANTIK ASLINDA... 

class MyClass 
{
    private ?string $name = "Jack";
}

Demis oluyruz ki eger bu class instanciate edildiginde herhangi bir deger atanmaz ise setName ile o zaman sen surekli bu deger  i al ki bizde bilelim o zaman demekki bu field a herhangi bir deger atamasi olmamis

!2-Constructor running in the beginning, destructor running at the end when we instanciate the class(create new instance).. 
Dolayisi ile biz bir class dan yeni bir ornek olusturulurken eger ki , olusturulan ornek geldginde belli dataa lar la gelsin istiyorsak bu datalari bizim, constructor da olusturmamiz gerekir ki mesela, cart- bir e-ticaret sitesinde shopping-cart i bos bir diziyi constructor icerisinde olusturarak baslatmis oluruz...BU MANTIK AYNEN...REACTTAKI COMPONENET MOUN-USEEFFECT IN BOS ARRAY LI HALI OLAN COMPONENT ILK YUKLENDIGINDE 1 DEFA HERSEYDEN ONCE CALISAN METHOD MANTIGINDADIR
Destructor a gelince ise orda da bizim class tan olsuturlan obje icerisinde kullanip da en son kaldirilmasini istedgimz datalar vs leri orda kaldiririz kesinlikle bu islemler bosuna olan seyler degil cok efektif ve spesifik kullanim alanlari vardir ve bize cok ciddi sustainability ve effecitivityc saglarlar 


*/

class Myclass 
{

    public array $shoppingCard = []; 
    public string $name = "";
    function __construct(string $name)
    {
        echo "<br> <h2> Myclass - construct!! </h2><br>";

        $this->name = $name;
        $this->shoppingCard = ["products"=>["id"=>1, "title"=>"Pc", "price"=>200]];
        var_dump($this->name);
        var_dump($this->shoppingCard);
    }

    function __destruct()
    {
        echo "<br><h2>My class destruct</h2>  <br>";
    }

}

class mySubclass1 extends Myclass 
{
    function __construct()
    {
        echo "<br> <h2> mySubclass1 - construct!! </h2><br>";

        //
        parent::__construct("Adem");//Burasi esasinda baseclss i new lemis oluyor...BURASI KRITIK BIR DURUM.... VE EGER PARAMETRE ALMAZSAK DA ESASEN OTOMATIK OLARAK BASECLASS NEW LENIYOR..BIZ SUBCLASS LARI NEW LEDGIMZDE(parent::__construct(); bunu kullanmazsak bile) 
        //!If the base class has a parameterless constructor (or no constructor explicitly defined), and you instantiate a subclass that does not explicitly call the base class's constructor (using parent::__construct() in PHP or base() in C#), the base class's constructor will still be called automatically. This ensures that any initialization code in the base class's constructor is executed, maintaining proper object construction through the inheritance chain.
    }


    function __destruct()
    {
        echo "<br> <h2> destruct!! </h2><br>";
    }
}


class Myclass2 
{

    function __construct()
    {
        echo "<br> <h2> Myclass2 - __construct!! </h2><br>";

    }
    function __destruct()
    {
        echo "<br> <h2> Myclass2 - destruct!! </h2><br>";
    }
}

class mySubclass2 extends Myclass2
{

    function __construct()
    {
        parent::__construct();
        echo "<br> <h2> mySubclass2 - __construct!! </h2><br>";
    }
    function __destruct()
    {
        parent::__destruct();
        echo "<br> <h2> mySubclass2 - destruct!! </h2><br>";
    }

}

// $subclass1 = new mySubclass1();
//Normalde,
$subclass2  = new mySubclass2();


class mynewclass1
{
    private string $id = "";
    private string $firstname = "";
    private string $lastname = "";

    function __construct(string $firstname,  string $lastname)
    {
        $this->id = uniqid();
        $this->firstname = $firstname;
        $this->lastname = $lastname;
    }


    public function getFirstName():string 
    {
        return $this->firstname;
    }
    
}

//! 1.si constructor dan deger almak, backendde oop de inputtur...oop nin inputu da budur...bunu bilelim....

$mynewclass1 = new mynewclass1("Ademmmm", "Erbaas");
echo "<br><h3>". $mynewclass1->getFirstName()." </h3><br>";

//!deconstructor da biz neler yapabiliriz ...Class icerisini temizlemek icindir, isimiz bittikten sonra gereksiz fazlaliklardan kurtulmak icindir
//! 1-Veritabani baglantisini kapatmak icin!!! 
//! 2-Clean-up the class i

//!Bir objeyi instanciate - create instance olusturduktan sonra bir objeyi nasil silebiliriz....DISPOSABAL YAPIYORDUK C# DA GARBAGE COLLECTOR A HAVALE EDERK HIZLI BIR SEKILDE SILINMESINI SAGLIYORDUK BUNU UNUTMAYALIM1!!!!!


