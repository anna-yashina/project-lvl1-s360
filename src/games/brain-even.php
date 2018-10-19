<?php

namespace BrainGames\GameEven;

use function BrainGames\Process\run as run_even;

const DESCRIPTION = "Answer 'yes' if number even otherwise answer 'no'.";

function isEven($number)
{
    return ($number % 2) == 0;
}

function run()
{
    run_even(
        DESCRIPTION,
        function () {
            $result = [];
            $result["question"] = rand(0, RAND_MAX);
            $result["answer"] = (isEven($result["question"])) ? 'yes' : 'no';
            return $result;
        },
        function ($answer) {
            $result = false;
            if (($answer == 'yes') || ($answer == 'no')) {
                $result = true;
            };
            return $result;
        }
    );
}
