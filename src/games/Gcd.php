<?php

namespace BrainGames\GameGcd;

use function BrainGames\Process\run as run_gcd;

const DESCRIPTION = "Find the greatest common divisor of given numbers.";
const RAND_MAX = 100;

function getGcd($firstNumber, $secondNumber)
{
    $result = 1;
    for ($i = min($firstNumber, $secondNumber); $i > 0; $i--) {
        if ((($firstNumber % $i) == 0) && (($secondNumber % $i) == 0)) {
            $result = $i;
            break;
        }
    }
    return $result;
}

function run()
{
    $generate = function () {
        $firstNumber = rand(1, RAND_MAX);
        $secondNumber = rand(1, RAND_MAX);
        return [
          $firstNumber . " " . $secondNumber,
          (string) (getGcd($firstNumber, $secondNumber))
        ];
    };
    run_gcd(
        DESCRIPTION,
        $generate
    );
}
