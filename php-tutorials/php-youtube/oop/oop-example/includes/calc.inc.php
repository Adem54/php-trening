<?php
declare(strict_types = 1);

include 'class-autoload.inc.php';

if($_POST)
{
    $num1 = $_POST["num1"] ?? 0;
    $oper = $_POST["oper"] ?? "";
    $num2 = $_POST["num2"] ?? 0;

    $calc = new Calc();
    $calc->setNum1($num1);
    $calc->setNum2($num2);
    $calc->setOperator($oper);

    var_dump($calc->getNum1());
    var_dump($calc->getNum1());
    var_dump($calc->getOperator());
    $res = $calc->calculate($calc->getNum1(), $calc->getNum2(), $calc->getOperator());

    var_dump($res);


}

?>