<?php

namespace BrainGames\GameGcd;

use function BrainGames\Process\run as run_gcd;

define("TITLE_GCD", "Find the greatest common divisor of given numbers.");

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

function getQuestion()
{
    $number1 = rand(1, RAND_MAX);
    $number2 = rand(1, RAND_MAX);
    return $number1 . " " . $number2;
}

function getResult($question)
{
    $parts = explode(" ", $question);
    $number1 = $parts[0];
    $number2 = $parts[1];
    return getGcd($number1, $number2);
}

function validate($answer)
{
    return is_numeric($answer);
}

function run()
{
    run_gcd(TITLE_GCD, __NAMESPACE__ . '\\getQuestion', __NAMESPACE__ . '\\validate', __NAMESPACE__ . '\\getResult');
}
