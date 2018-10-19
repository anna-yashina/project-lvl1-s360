<?php

namespace BrainGames\GameEven;

use function BrainGames\Process\run as run_even;

define("TITLE_EVEN", "Answer 'yes' if number even otherwise answer 'no'.");

function isEven($number)
{
    return ($number % 2) == 0;
}

function getQuestion()
{
    return rand(0, RAND_MAX);
}

function getResult($question)
{
    return (isEven($question)) ? 'yes' : 'no';
}

function validate($answer)
{
    $result = false;
    if (($answer == 'yes') || ($answer == 'no')) {
        $result = true;
    };
    return $result;
}

function run()
{
    run_even(TITLE_EVEN, __NAMESPACE__ . '\\getQuestion', __NAMESPACE__ . '\\validate', __NAMESPACE__ . '\\getResult');
}
