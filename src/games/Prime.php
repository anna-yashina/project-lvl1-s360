<?php

namespace BrainGames\GamePrime;

use function BrainGames\Process\run as run_prime;

const DESCRIPTION = "Answer 'yes' if given number is prime. Otherwise answer 'no'";
const RAND_MAX = 500;

function isPrime($number)
{
    if ($number < 2) {
        return false;
    }

    for ($i = 2; $i < $number / 2; $i++) {
        if (($number % $i) == 0) {
            return false;
        }
    }
     return true;
}

function run()
{
    $generate = function () {
        $givenNumber = rand(2, RAND_MAX);
        return [
          $givenNumber,
          (isPrime($givenNumber)) ? 'yes' : 'no'
        ];
    };
    run_prime(
        DESCRIPTION,
        $generate
    );
}
