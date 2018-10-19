<?php

namespace BrainGames\GameCalc;

use function BrainGames\Process\run as run_calc;

define("TITLE_CALC", "What is the result of the expression?");
define("OPERATIONS", 2);

function getQuestion()
{
    $operations = ["+", "-", "*"];
    $number1 = rand(0, RAND_MAX);
    $number2 = rand(0, RAND_MAX);
    $operation = rand(0, OPERATIONS);
    $result = $number1 . " " . $operations[$operation] . " " . $number2;
    return $result;
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

function getResult($question)
{
    $parts = explode(" ", $question);
    $number1 = $parts[0];
    $number2 = $parts[2];
    $operation = $parts[1];
    return calculate($number1, $number2, $operation);
}


function validate($answer)
{
    return is_numeric($answer);
}

function run()
{
    run_calc(TITLE_CALC, __NAMESPACE__ . '\\getQuestion', __NAMESPACE__ . '\\validate', __NAMESPACE__ . '\\getResult');
}
