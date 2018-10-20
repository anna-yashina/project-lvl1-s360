<?php

namespace BrainGames\GameCalc;

use function BrainGames\Process\run as run_calc;

const DESCRIPTION = "What is the result of the expression?";
const NUMBER_OPERATIONS = 2;
const OPERATIONS = ["+", "-", "*"];
const RAND_MAX = 100;

function calculate($firstOperand, $secondOperand, $operation)
{
    $result = 0;
    switch ($operation) {
        case '+':
            $result = $firstOperand + $secondOperand;
            break;
        case '-':
            $result = $firstOperand - $secondOperand;
            break;
        case '*':
            $result = $firstOperand * $secondOperand;
            break;
    }
    return $result;
}

function run()
{
    $generate = function () {
        $firstOperand = rand(0, RAND_MAX);
        $secondOperand = rand(0, RAND_MAX);
        $operation = rand(0, NUMBER_OPERATIONS);
        return [
            $firstOperand . " " . OPERATIONS[$operation] . " " . $secondOperand,
            calculate($firstOperand, $secondOperand, OPERATIONS[$operation])
        ];
    };
    run_calc(
        DESCRIPTION,
        $generate
    );
}
