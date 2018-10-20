<?php

namespace BrainGames\GameBalance;

use function BrainGames\Process\run as run_balance;

const DESCRIPTION = "Balance the given number.";
const RAND_MAX = 100;

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
    $result = implode($numbers);
    return $result;
}

function run()
{
    $generate = function () {
        $givenNumber = rand(RAND_MAX, 100 * RAND_MAX);
        return [
          $givenNumber,
          getBalance($givenNumber)
        ];
    };

    run_balance(
        DESCRIPTION,
        $generate
    );
}
