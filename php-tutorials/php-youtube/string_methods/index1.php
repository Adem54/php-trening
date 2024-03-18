<?php



class Str1 
{

}

//!strlen- string length
//!str_word_count-bir stringdeki kelime sayisni sayar 
//!str_rev(reverse) tersine cevirir
//!str_pos($text, $char) string icerisinde baska bir string metni arar ve aranan ifade kacinci idnex numarasindan itibaren var ise onu verir
//!str_replace($word1, $word2, $text) string leri degistirme, text icindeki word1 yerine word2 yi koy  
//!addcslashes($text, $char)    Bir stringe \ eklemek icin kullanilir , $char dan once ekler
//!addslashes($)
//!Bin2hex() stringi ASCI karakterini 16 lik sisteme cevirir, ozellikle sifrelemlerde kullanilr
//!chop bir ttext icinden en sagdaki karakter dizisini kaldirmak icin kullaniriz
//!chr asci koduna cevirerek dondurur , 
//Bilgisayrlar in klavyesinde standart her bir karaktere karsilk gelen karakterleri ASCI TABLOSUNDA karakterlerin karsiligi vardir 
/*
ASCI TABLOSUNDA 
Dec(10lu), Hex(16li) Oct(Buda 8 bit=1byte-binary) Char(characterin ne oldugu)

ASCI TABLOSU CHARARKETELERINININ DEC,HEX,OCT KARSILKILARI ILE TABLO DA GOREBILIRIZ 
YANI 

CHAR:A (CHARACTER KARSILIGI) -KLAVYEDE A YA BASINCA - 
IKILI SISTEMDE(BINARY): 10000001
DEC:65 (10LU)
HEX:40 (HEXADECIMAL-16LIK SISTEMDE)
OCT:100 (SEKIZLI SISTEMDE)

0 VOLT- 0 
5VOLT - 1 
BILGISYARLAR SADECE 0-1 LERDEN ANLAR... 
A HARFINE BASINCA 10000001 BILGISYARIN ANLAYACAGI DIL BU...BUNA KARSILIK GELIYOR AMA BU ASCII TABLOSUNDA ONLUK BIRIMDE INSANLARIN KULLANDIGI DECIMAL DE 65 E KARSILIK GELIYOR

65 I 2 LI SISTEME CEVIRMEK ICIN 
65/2=32*2 1 kalir 
32/2=16 0 kaliir
16/2=8 0 kalir 
8/2=4 0 kalir 
4/2=2 0 kalir 
2/2=1 0 kalir 
1/2 bolunmez 1 kalir 
1000001 binary ye esittir = 65
1000001 icin ise soldan saga dogru baslanarak ondalik-decimal li sisteme cevirmek icin 
1*2^0=1
0*2^1=0
*
*
*
1*2^6=64
Toplam da 64+1=65 ondalik sisteme karsilk gelir

!String i explode ile  array e cevirebiliriz 
!Array icindeki degerleri de implode ile stringe cevireblriz
!Kelime ve harfler arasindan spesifik semboller birak mak istersek chunk_string kullanabilirz
!strip_tags - htmlspecialchars  - $this->message = htmlspecialchars(strip_tags($this->message));
!htmlspecialchars bunu kullanmak daha faydalidir



*/
 
$data = array("Hello", "World",  " today");
echo implode(",", $data);//array i string e cevirir
echo "<br>";
$str = "Adem, Zeynep, Zehra";
var_dump(explode(",", $str));//string i arraya cevirir

echo join(" ", $data);//implode nin yaptigi isin aynisini yaparak , array icinceki item lari stringe cevirir

/*

!strtoupper 
!strtolower
!trim
!parse_str("name=fehmi&age=30", $arr) - query string lerini ayirma islemi yaparak cook faydali bir kullanimdir parse_str("name=fehmi&age=30"); name ve age i degisken haline getiererek $arr icersine atarki biz ihtiyacim oldugunda $arr icinden alarak kullaniriz
!printf-sprintf

*/

echo "<br>";
$number= 2;
$txt = "Student";
printf("%u milyon %s sinava giriyor", $number, $txt);
//number-%d ya da %u kullanilr , stringleri de %s,  yuzde islem icin de %f kullaniriz

//!sprintf in farki nedir peki printf den.. sprintf i bir degiskene atayip daha sonra farkli yerlerde kullanabiliyoruz ondan dolayi biz projelerde sprintf kullaniriz cunku biz echo ile ekrana basmak degil de, return ile dondurup bir degiskene atamasini istiyoruz

//!str_split

echo "<br>";
define("GREETING", "Hello you!");

echo constant("GREETING");

?>