<?php

//Interfaces
interface PaymentTypeInterface 
{
    
    public function payNow();

    public function paymentProcess();

}

interface LoginFirstInterface 
{
    public function loginFirst();
}


class Paypal implements PaymentTypeInterface, LoginFirstInterface
{
    public function loginFirst(){}
    public function payNow() {
    }

    public function paymentProcess()
    {
        $this->loginFirst();
        $this->payNow();
    }
}


class Visa implements PaymentTypeInterface
{
    public function payNow() {}
    /**
     */

    public function paymentProcess()
    {
        $this->payNow();
    }
}


class Cash implements PaymentTypeInterface
{
    public function payNow() {}

    public function paymentProcess()
    {
        $this->payNow();
    }
}


class BuyProduct 
{
    //!Bestpractise...PaymentType interface i onu implement eden class larin, referanslarini tutabiliyor...Yani kendini implement eden class larin ayni zamanda type i da olarak da kullanilabildigi icin, aslinda sustainability mantiginda, birden fazla farkli class larin ayni metodu kullanacak lar ve farkli usecase lere gore, class lardan herhangi birisi kullanacagmiz zaman gidip de her birisini ayri ayri newleymeyiz, instance olustturamayiz onun yerine...tum class larimizi ortak bir noktada bulusturabilecek, hepsine ayni interfface i implement e ederiz ve de ...sonrasinda da , tum class larda kullanilan ayni methodu interface icinde imzasni kullaniriz
    public function pay(PaymentTypeInterface $paymentType)
    {
        $paymentType->paymentProcess();
    }
}

$paymentType = new Cash();
$buyProduct = new BuyProduct();
$buyProduct->pay($paymentType);

$paymentType2 = new Visa();
$buyProduct->pay($paymentType2);
//!Cok harika bir ozellik class isimlerini type yerine kullanabiliyoruz PHP  de de C# da oldugu gibi..HARIKA
// kULLNAICI VISA ODEMESI YAPMAK ISTERSE NE OLACAK, YA DA PAYPAL ODEME YAPMAK ISTERSE NE OLACAK
$paymentType3 = new Paypal();

$buyProduct->pay($paymentType3);

//PEKI BUNDASN SONRA YENI BIR PAYMENT TYPE ORTAYA CIKARSA O ZAMAN NE YAPARIZ 
//MESELA VIPPPS 
//!ASAGIDA GORDUGMZ GIBI HERHANGI BIR SORUN YASAMADAN DAHA SONRADAN LEVERANDØR LER TARAFINDAN GGELEN BIR TALEBI SISTEMIZMIZE HIC DOKUNMADAN DAHIL EDEBILDIK
class Vipps implements PaymentTypeInterface, LoginFirstInterface
{

    /**
     */
    public function payNow() {
    }
   
    public function loginFirst() {
    }

    public function paymentProcess()
    {
        $this->loginFirst();
        $this->payNow();
    }
    
   
}

$paymentType3 = new Vipps();

$buyProduct->pay($paymentType3);

/*
!Interface lerin cok onemli neden kullanildiklarina bakarsak 
!1-Oncelikli olarak, interface ler ortak metodu kullanan bircok farkli tur class lari ortak bir nokta da veya ayni type a sahip olacak sekilde , surdurulebilir olarak kullanilabilmelerini sagliyor bize 
!2-Interface ler, yazilimciya belli kurallari takip etmeye zorluyor...Herkes kafasina gore birseyler yazmasini engellemis oluyor bu sekilde
!3-Interface aslnda bir sablon-blueprint olusturabilmemiz saglayarak, bu sablona gore islemleri yapmamiza izin verir
!Bazi ozellikler bazilarinda olacak, bazilarinda olmayacak ise o zaman ozellikleri interface haline getiririz ve sonra da o interface leri ihtiayci olan kullanir, ihtiyaci olmayan kullanmaz bu kadar

!Class lari grup haline getirip tek bir referans altinda toplayabilmemizi, ve ortak bir type i kullanarak tum class lari ve daha sonra eklenmek isteneen class larin da problemis bir sekilde kullanilabilmesin saglayacak

*/


class Test 
{
    private int|float $rating;
}
?>