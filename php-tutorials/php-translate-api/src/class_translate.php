<?php 

//require_once("interface_translate.php");


namespace TranslateAPI;

class baseTranslate 
{
    public function __construct($apiKey, $targetLanguage)
    {

    }
}




interface translateInterface 
{
    //interface de sadece signature var ,body yok, sadece header var
   // public function __construct($apiKey, $targetLanguage);

   public function httpPoster($urlAddress, $data);

   public function translate($text);
}


class translate  implements translateInterface
{

    const BASE_URL = "https://translate.yandex.net/api/v1.5/tr.json/translate";//Burasi sabit
    public $url="";
    public function __construct($apiKey,$targetLanguage)
    {

        $this->url = self::BASE_URL."?lang=".$targetLanguage."&key=".$apiKey;

       // parent::__construct($apiKey, $targetLanguage);
        //parent i kullaniyorsak, o zaman mutlaka, class in baska bir class i extends etmesi gerekir ve de o extend edilen class in da constructor inin parametre almasi gerekiyor
    }

    //Post islemi yapiyoruz, php de curl araciligi ile
    public function httpPoster($urlAddress, $data)
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $urlAddress);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER,true);
        curl_setopt($curl, CURLOPT_TIMEOUT,30);//30 saniye bekleyecek
        curl_setopt($curl, CURLOPT_POST, TRUE);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        $result = curl_exec($curl);
        return $result;
    }

    //Yani bir endpointe curl ile veya get_file_contents() ile de request gonderebiliyruz
    public function translate($text)
    {
        //translate islemi post istegi gondererek gerceklesecek
        $this->httpPoster($this->url, $text);
    }

    
}

/*
https://translate.yandex.net/api/v1.5/tr.json/translate
  ? [key=<API-key>]
  & [text=<text to translate>]
  & [lang=<translation direction>]
  & [format=<text format>]
  & [options=<translation options>]
  & [callback=<callback-function name>]



*/
?>