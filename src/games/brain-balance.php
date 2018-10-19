<?php

namespace BrainGames\GameBalance;

use function BrainGames\Process\run as run_balance;

const DESCRIPTION = "Balance the given number.";

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

function run()
{
    run_balance(
        DESCRIPTION,
        function () {
            $result = [];
            $result["question"] = rand(RAND_MAX, 100 * RAND_MAX);
            $result["answer"] = getBalance($result["question"]);
            return $result;
        },
        function ($answer) {
            return is_numeric($answer);
        }
    );
}
