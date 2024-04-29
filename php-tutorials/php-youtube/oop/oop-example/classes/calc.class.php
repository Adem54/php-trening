<?php 

declare(strict_types=1);

class Calc 
{
    private int $num1 = 0;
    private int $num2 = 0;
    private int $result = 0;

    public string $operator="";

    const ADD = "add";
    const SUB = "sub";
    const DIV = "div";
    const MULT = "mul";

    public function __construct()
    {

    }


    public function setNum1(int $num1)
    {
        return $this->num1 = $num1;
    }

    public function getNum1()
    {
        return $this->num1;
    }


    public function setNum2(int $num2)
    {
        return $this->num2 = $num2;
    }

    public function getNum2()
    {
        return $this->num2;
    }

    public function setOperator(string $operator)
    {
        return $this->operator = $operator;
    }

    public function getOperator()
    {
        return $this->operator;
    }

    public function add()
    {
        $this->result = $this->num1 + $this->num2;
    }

    public function sub()
    {
        $this->result = $this->num1 - $this->num2;
    }
    public function mult()
    {
        $this->result = $this->num1 * $this->num2;
    }
    public function divid()
    {
        $this->result = $this->num1 / $this->num2;
    }
    public function calculate(int $num1, int $num2, string $operator)
    {
        $this->makeCalc($operator);
        return $this->result;
    }

    private function makeCalc($operator):void
    {
        switch ($operator) 
        {
            case self::ADD:
                $this->add();
                break;
            case self::SUB:
                $this->sub();
                break;
            case self::DIV:
                $this->divid();
                break;
            case self::MULT:
                $this->mult();
                break;    
            
            default:
                # code...
                echo "Error!";
                break;
        }
    }
}


class Calc1 
{
    public string $operator = "";
    public int $num1;
    public int $num2;

    public function __construct(string $operator, int $num1, int $num2)
    {
        $this->operator = $operator;
        $this->num1 = $num1;
        $this->num2 = $num2;
    }
}