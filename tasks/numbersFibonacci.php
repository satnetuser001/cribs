<?php
//Числа Фибоначи

class Fibonacci
{
    protected $arr = [];

    function __construct()
    {
        echo "Числа Фибоначи. \nВведите первые два числа\n";
        $this->arr[] = readline("#1: ");
        $this->arr[] = readline("#2: ");
        $this->_fibon();
    }

    protected function _fibon()
    {
        while (true)
        {
            $arrC = count($this->arr);
            $sumLastTwo = $this->_sumLastTwo($arrC);
            echo $this->arr[$arrC-2] . " + " . $this->arr[$arrC-1] . " = " . $sumLastTwo . "\n";
            $this->arr[] = $sumLastTwo;
            usleep(200000);
        }
    }

    protected function _sumLastTwo ($arrC)
    {
        return $this->arr[$arrC-2] + $this->arr[$arrC-1];
    }
}

$obj = new Fibonacci();
?>