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
