<?php

namespace BrainGames\GameCalc;

use function BrainGames\Process\run as run_calc;

class Calc
{
    const DESCRIPTION = "What is the result of the expression?";
    const RAND_MAX = 100;
    const OPERATIONS = 2;

    public function getQuestion()
    {
        $operations = ["+", "-", "*"];
        $number1 = rand(0, self::RAND_MAX);
        $number2 = rand(0, self::RAND_MAX);
        $operation = rand(0, self::OPERATIONS);
        $result = $number1 . " " . $operations[$operation] . " " . $number2;
        return $result;
    }

    public function calculate($number1, $number2, $operation)
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

    public function getResult($question)
    {
        $parts = explode(" ", $question);
        $number1 = $parts[0];
        $number2 = $parts[2];
        $operation = $parts[1];
        return $this->calculate($number1, $number2, $operation);
    }


    public function validate($answer)
    {
        return is_numeric($answer);
    }
}

function run()
{
    $calc = new Calc();
    run_calc($calc);
}
