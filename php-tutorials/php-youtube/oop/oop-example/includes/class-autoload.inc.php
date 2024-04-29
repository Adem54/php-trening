<?php 

//Biz yeni instance olsuturdugmuz muddetce, class isimleri parametreye otomatik olarak gelecektir 
spl_autoload_register('myAutoLoader');

function myAutoLoader($className)
{
    $url = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

    if(strpos($url, 'includes') !== false )//Eger include dosyasinini icerisinde ise... o zaman bir geri git ondan sonra classses a  gel demektir
    {
        $path = "../classes/"; 
    }else 
    {
        $path = "classes/";
    }

    $extension = ".class.php"; // Corrected spelling
    $fullPath = $path . $className . $extension;

    // Check if the file exists before including it
    if (!file_exists($fullPath)) {
        echo "The file $fullPath does not exist."; // You might want to handle this differently
        return;
    }

    require_once $fullPath;
}