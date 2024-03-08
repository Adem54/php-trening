<?php 

namespace TranslateAPI;
interface translateInterface 
{
    //interface de sadece signature var ,body yok, sadece header var
   // public function __construct($apiKey, $targetLanguage);

   public function httpPoster($urlAddress, $data);

   public function translate($text);
}



?>