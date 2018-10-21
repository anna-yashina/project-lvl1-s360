<?php

namespace BrainGames\GameProgression;

use function BrainGames\Process\run as run_progression;

const DESCRIPTION = "What number is missing in this progression?";
const PROGRESSION_LENGTH = 10;
const RAND_MAX = 100;

function run()
{
    $generate = function () {
        $needleIndex = rand(0, PROGRESSION_LENGTH - 1);
        $difference = rand(1, PROGRESSION_LENGTH);
        $sequence = [];
        $current = rand(1, RAND_MAX);
        for ($i = 0; $i < PROGRESSION_LENGTH; $i++) {
            $sequence[] = $current;
            $current += $difference;
        }
        $answer = $sequence[$needleIndex];
        $sequence[$needleIndex] = '..';
        return [
          implode($sequence, ' '),
          (string) $answer
        ];
    };
    run_progression(
        DESCRIPTION,
        $generate
    );
}
