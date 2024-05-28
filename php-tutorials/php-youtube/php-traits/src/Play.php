<?php

class Play implements PricingContract
{
   use HasMenu, HasAssignedSeats;

   public function __construct()
   {
        $this->seats = ["1","3","6"];
       $this->items = [
           "Pizza",
           "Hamburger",
           "Sushi",
           "Noodle"
       ];
   }

 
    //trait iceriisnde getPrice methodu oldugu icin interface bize hata vermiyor
    // public function getPrice() 
    // {
    //     //use pricing based on level
    // }
}

/*
1-Trade
Trade lerin kullanim yerleri 
birbirileri ile inheritance veya interface, abstract class lar uzerinden baglanti kuramadigmz class lar dan, ki php nin oop deki zayif yonlerinden birisi, 1 subclass 1 tane base class i inherit edebiliyor, bu normalde C# da , boyle degil...Ondan dolayi da bizim burda fleksibelligimz da azalacaktir ve iste eger ayni , benzer fonksiyhonlari kullanan ama arlarinda herhangi bir inheritanca, interface veya abstract class ile bir solution uretemdegimiz durumlarda trade ler devreye girer ve ayni fonksiyonlari defalarca yazilmasini onlemis oluruz

2-Interface 
Eger bazi class lar ayni ortak fonksiyonlari kullanmak zorundalar ise ve biz ileriki zamanlarda ornegin, bugun payment sistem olarak 1 sistem kullaniyoruz ama yarin yeni bir tane ekleyebiliriz buna acik olmak istiyorsak ki her zmana acik olmaliyz, bugun mysql, yarin postgresql e gecebiliriz, bugun norgeskart, yarin norkart a gecebiliriz bunlar an meselesidir onemli olan senin sistemin buna acik mi...KI SOLID- 2.PRENSIIBI O - OPEN-CLOSE, VAR OLAN MODULLERIN DEGISIMINE KAPALI, IKEN YENI FEATURE LAR EKLEMEYE HER ZAMAN ACIK OLMALI... BU COK KRITIK BIR SEYDIR..
!YANI TABIR I CAIZ ISE YAZILMICILARI, VE SISTEMI BIR KURAL TAKIP ETMEYE ZORLUYORUZ KI HER KES BELLI BIR RUTINI TAKIP ETSIN..VE PROJE KONTROLMUZ DE OLSUN... BIZ HER ZAMAN SUNA ACIK OLMALIYIZ..TAMAM YENI BIR FEATURE EKLEMEM GEREKIRSE BU MODULE DE TAMAM BEN MEVCUT MODULLERE HIC DOKUNMADAN BU ISI YAPARIM....
!YENI BIR CLASS EKLEDIGMZDE , AYNI INTERFACE I IMPLEMENT E ETTGIMZ ANDA, O INTERFACE ICINDEKI METHOD U YENI CLASS KENDI IHTIYACINA GORE DOLDURACAKTIR
!bir class istedigi kadar interface implemente edebilir
!trait ler interface implemente edemezler
!COOK KRITIK BIR SEY, OERNEGNI CLASS IMIZ BIR INTERFACE I IMPLEMNTE ETMIS VE GETPRICE ISIMLI METHODU KULLANMAK ZORUNDA, YANI ICINI DOLDURMAK ZORUNDA, VE BU CLASS EGER BIR TRAIT KULLANIYOR ISE O INTRERFACE DEN GELEN METHODU KENDI ICINDE USE ILE KULLANDIGI TRAIT IN ICERISINDE KULLANARAK DA , O INTERFACE IN METHODUNU KULLANMIS SAYHILIR VE HERHANGI BIR HATA DA ALMAYIZ


3-Abstract classess 
Conert,Theater,Play,Movie bnlarin hepsinin ortak noktasi hepsi birer eventtir dolayisi ile bir event parent class, base class olusturmayi dusunebilirz tabi ki
Ama problem su ki biz, bu parent class i new lemek istemeyiz..cunku parent class kendi subclass lari ile ilgili hicbirsey gostermiyor ama onun yerine biz eger ki subclass larin inherit ettigi base class  inherit edilemesin sadece, subclass lar inherit edilsin istersek o zaman da devreye abstract class girer, hem base class olarak is gorur abstract class lar hem de kendi kendine newlenemezler...COOOK ONEMLI
Abstract class icindeki abstract metjhodlar intrface icindekki methodlarin aynisidir, sadece signature lari ile yazilirlar ve onu extend-inherit eden class lar tarafidan kullanilmak zorundadir


!Interface ler le biz birse soyle bir problemi cozeriz, bazen ornegin bir trait icerisinde olustrudguzm 3 farkli methodun mesela 2 tanesi tum classlarda ihtiyacdir ama 1 tanesi, ise sadece 1,2 tanesinde ihtiyactir... ve biz o hepsinde degil de sadece 2 class da ihtiyac olan mehtod lari ise sadece o class lara has yapmak isteyebiliriz treate ler icinde hic olusturmadan o zaman ne yapariz dogru interface lere basvururuz..ne zaman ki class a ozel spesifik durumlar soz konusu ne zaman ki bir cok class icinde sadece birkacinda olmasini istedigmz methodlar ortaya cikiyor ve biz bu isin icinden cikamiyoruz hemen interface lere basvurabilriizi...SONUC TA BIR CLASSS ISTEDIGI KADAR INTERFACE INMPLEMENTE EDEBILIRZ..INTERFACE LER BIR NEVI IMPLMENTE EDILDIGI CLASS LAR A BIR TYPE OLARAK DA ORTAK TYPE A SAHIP OLUNMASINI SAGLAYARAK GUC KAZANDIRYOR VE AYNI INTERFACE I IMPLEMENTE EDEN CLASS LAR ARSINDA SANKI ORTAK BIR KATEGORI OLUSTURUYOR GIBI VE BIZIM O CLASS LARI DIGER CLASS LARDAN AYIRABILMEMIZI SAGLIYOR...VE AYNI ZAMANDA EXTEND, IMPLEMENT EDILEN INTEFACE VE CLASS LAR SUBCLASS LARIN REFERANSLARINI DA TUTABILIOR BU DA COK KRITIKTIR

*/
?>