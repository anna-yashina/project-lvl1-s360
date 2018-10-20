<?php

namespace BrainGames\GameEven;

use function BrainGames\Process\run as run_even;

const DESCRIPTION = "Answer 'yes' if number even otherwise answer 'no'.";
const RAND_MAX = 100;

function isEven($number)
{
    return ($number % 2) == 0;
}

function run()
{
    $generate = function () {
        $givenNumber = rand(0, RAND_MAX);
        return [
          $givenNumber,
          (isEven($givenNumber)) ? 'yes' : 'no'
          ];
    };
    run_even(
        DESCRIPTION,
        $generate
    );
}
