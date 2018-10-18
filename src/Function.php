<?php

namespace BrainGames\Process;

function isEven($number)
{
    return ($number % 2) == 0;
}

function calculate($number1, $number2, $operation)
{
    $result = 0;
    switch ($operation) {
        case '+':
            $result = $number1 + $number2;
            break;
        case '-':
            $result = $number1 - $number2;
            break;
        case '*':
            $result = $number1 * $number2;
            break;
    }
    return $result;
}

function getGcd($number1, $number2)
{
    $result = 1;
    for ($i = 1; $i <= min($number1, $number2); $i++) {
        if ((($number1 % $i) == 0) && (($number2 % $i) == 0)) {
            $result = $i;
        }
    }
    return $result;
}

function getBalance($number)
{
    $result = 0;
    $numbers = str_split($number);
    $max =  max($numbers);
    $min =  min($numbers);
    while (($max - $min) > 1) {
        while (($max - $min) > 1) {
            $max--;
            $min++;
        }
        $numbers[array_search(max($numbers), $numbers)] = (string) $max;
        $numbers[array_search(min($numbers), $numbers)] = (string) $min;
        $max = max($numbers);
        $min = min($numbers);
    }
    sort($numbers);
    $result = (int) implode($numbers);
    return $result;
}
