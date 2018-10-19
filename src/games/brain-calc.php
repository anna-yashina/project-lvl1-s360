<?php

namespace BrainGames\GameCalc;

use function BrainGames\Process\run as run_calc;

const DESCRIPTION = "What is the result of the expression?";
const OPERATIONS = 2;

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

function validate($answer)
{
    return is_numeric($answer);
}

function run()
{
    run_calc(
        DESCRIPTION,
        function () {
            $result = [];
            $operations = ["+", "-", "*"];
            $number1 = rand(0, RAND_MAX);
            $number2 = rand(0, RAND_MAX);
            $operation = rand(0, OPERATIONS);
            $result["question"] = $number1 . " " . $operations[$operation] . " " . $number2;
            $result["answer"] = calculate($number1, $number2, $operations[$operation]);
            return $result;
        },
        function ($answer) {
            return is_numeric($answer);
        }
    );
}
