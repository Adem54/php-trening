<?php
//Yandex translate api yi kullanarak translate uygulamasi yapmak istiyoruz
require_once("src/class_translate.php");
require_once("src/interface_translate.php");

use TranslateAPI\translate;

$apikey="dsfadsfsf3535q235";
$targetLang = "en";
//$translate = new TranslateAPI\translate($apikey, $targetLang);
$translate = new translate($apikey, $targetLang);


/*
!NOrmal react-svelte node.js proejlerinde gelen veya npm init -y ile baslatinca gelen package.json in karsiligi php de composer.json dir iste burdan anlayabilriiz. Projmizi baska birilerinin de kullanablmesi icin once projemize namespace olsuturup sonra da o namespace uzerinden composer.json olsuturp githuba atariz
*/

?>