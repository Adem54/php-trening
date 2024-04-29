<?php 

$testPath = __DIR__ . '/classes/Person.class.php';
var_dump($testPath);
if (file_exists($testPath)) 
{
    echo "File exists";
} else {
    echo "File does not exist at $testPath";
}

echo "******************<br>";

//!Load classes automatically 

//spl_autoload_register('myAutoLoader');

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
        return;
    }

    include_once $fullPath;
}

$person1 = new Person\Person("Daniel", 28);
echo $person1->getPerson();

echo "<br>*********************<br>";
$address1 = new House("Bjørntvedtvegen", 28);
echo $address1->getAddress();

//!namespaces 
//!class lari daha iyi organize etmek icin kategorize etmek diyebiliriz...
//!Ve de bu sayede biz ayni class isimlerini farkli namespace ler altinda kullanabiliriz
//!Projemiz cok daha fazla buyudugunde devreye sokmamiz gerekir

