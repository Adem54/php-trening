<?php
//Elimizde array olmayan bircok sayi var ve biz bunlari toplamak istiyoruz, ama busayilar sonsuz tane de olabilir
class Test {
    function sum(...$params)
    {
        $total = 0;

        foreach ($params as $key => $value) {
            $total += $value;
        }

        return $total;
    }
}

$test = new Test();
$reult = $test->sum(1,3,5,7,9,23,3,4,5,6,7,8, 13,45);
var_dump($reult);
//!Eger elimizde arrayimz var ise , o zaman array i direk gonderemeyiz, ne yapariz o zaman, da array i de yine ayni sekilde ... ile gondermemiz gerekir
$arr = [3,6,8,12,3,56,7,89];
$result2 = $test->sum(...$arr);
var_dump($result2);
?>