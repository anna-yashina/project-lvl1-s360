<?php

namespace BrainGames\GamePrime;

use function BrainGames\Process\run as run_prime;

const DESCRIPTION = "Answer 'yes' if given number is prime. Otherwise answer 'no'";

function isPrime($number)
{
    for ($i = 2; $i < $number; $i++) {
        if (($number % $i) == 0) {
            return 'no';
        }
    }
     return 'yes';
}

function run()
{
    run_prime(
        DESCRIPTION,
        function () {
            $result = [];
            $number = rand(2, 5 * RAND_MAX);
            $result["question"] = $number;
            $result["answer"] = isPrime($number);
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
