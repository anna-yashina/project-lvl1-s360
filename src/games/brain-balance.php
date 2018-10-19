<?php

namespace BrainGames\GameBalance;

use function BrainGames\Process\run as run_bal;

define("TITLE_BALANCE", "Balance the given number.");

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

function getQuestion()
{
    return rand(RAND_MAX, 100 * RAND_MAX);
}

function getResult($question)
{
    return getBalance($question);
}

function validate($answer)
{
    return is_numeric($answer);
}

function run()
{
    $namespace = __NAMESPACE__;
    run_bal(TITLE_BALANCE, $namespace . '\\getQuestion', $namespace . '\\validate', $namespace . '\\getResult');
}
