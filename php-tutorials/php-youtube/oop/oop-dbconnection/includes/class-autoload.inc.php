<?php 
//Biz yeni instance olsuturdugmuz muddetce, class isimleri parametreye otomatik olarak gelecektir 
spl_autoload_register('myAutoLoader');

function myAutoLoader($className)
{
    $path = "classes/"; // The directory where classes are stored
    $extension = ".class.php"; // Corrected spelling
    $fullPath = $path . $className . $extension;

    // Check if the file exists before including it
    if (!file_exists($fullPath)) {
        echo "The file $fullPath does not exist."; // You might want to handle this differently
        return false;
    }

    include_once $fullPath;
}