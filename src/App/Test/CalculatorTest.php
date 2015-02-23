<?php

namespace App\Test;

use App\Calculator;

class CalculatorTest extends AbstractTestCase
{
    public function testAdd()
    {
        $calculator = new Calculator();
        $parameters = [
            ['num1' => 1, 'num2' => 2, 'sum' => 3]
        ];
        
        foreach ($parameters as $parameter) {
            $num1 = $parameter['num1'];
            $num2 = $parameter['num2'];
            $sum = $parameter['sum'];
            $this->assertTrue($calculator->Add($num1, $num2) === $sum);
        }
    }
}
