<?php

namespace BrainGames\GameProgression;

use function BrainGames\Process\run as run_progression;

const DESCRIPTION = "What number is missing in this progression?";
const PROGRESSION_LENGTH = 10;
const RAND_MAX = 100;

function run()
{
    $generate = function () {
        $needleNumber = rand(1, PROGRESSION_LENGTH);
        $first = rand(1, RAND_MAX);
        $difference = rand(1, PROGRESSION_LENGTH);
        $answer = '';

        $question = [];
        for ($i = 0; $i < PROGRESSION_LENGTH; $i++) {
            $item = (string) ($first + $difference * ($i - 1));
            if ($i === $needleNumber) {
                $answer = $item;
                $item = '..';
            }
            $question[] = $item;
        }
        return [
          implode($question, ' '),
          $answer
        ];
    };
    run_progression(
        DESCRIPTION,
        $generate
    );
}
