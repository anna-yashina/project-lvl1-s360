<?php

namespace BrainGames\GameGcd;

use function BrainGames\Process\run as run_gcd;

const DESCRIPTION = "Find the greatest common divisor of given numbers.";

function getGcd($number1, $number2)
{
    $result = 1;
    $i = min($number1, $number2);
    while ($i > 0) {
        if ((($number1 % $i) == 0) && (($number2 % $i) == 0)) {
            $result = $i;
            break;
        }
        $i--;
    }
    return $result;
}

function run()
{
    run_gcd(
        DESCRIPTION,
        function () {
            $result = [];
            $number1 = rand(1, RAND_MAX);
            $number2 = rand(1, RAND_MAX);
            $result["question"] = $number1 . " " . $number2;
            $result["answer"] = getGcd($number1, $number2);
            return $result;
        },
        function ($answer) {
            return is_numeric($answer);
        }
    );
}
