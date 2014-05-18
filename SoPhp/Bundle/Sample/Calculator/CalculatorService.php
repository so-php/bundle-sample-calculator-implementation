<?php


namespace SoPhp\Bundle\Sample\Calculator;


class CalculatorService implements CalculatorServiceInterface{

    /**
     * @param number $a
     * @param number $b
     * @return number
     */
    public function add($a, $b)
    {
        return $a + $b;
    }

    /**
     * @param number $a
     * @param number $b
     * @return number
     */
    public function subtract($a, $b)
    {
        return $a - $b;
    }
}