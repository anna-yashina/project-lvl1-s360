<?php

namespace BrainGames\GameProgression;

use function BrainGames\Process\run as run_progression;

const DESCRIPTION = "What number is missing in this progression?";
const LENGTH_PROGRESSION = 10;
const RAND_MAX = 100;

function run()
{
    $generate = function () {
        $needleNumber = rand(1, LENGTH_PROGRESSION);
        $initialState = rand(1, RAND_MAX);
        $difference = rand(1, LENGTH_PROGRESSION);
        $question = '';
        $answer = '';

        $sequence = [];
        for ($i = 1; $i < LENGTH_PROGRESSION; $i++) {
            $item = (string) ($initialState + $difference * ($i - 1));
            if ($i === $needleNumber) {
                $answer = $item;
                $item = '..';
            }
            $question = $question . $item . ' ';
        }
        return [
          substr($question, 0, -1),
          $answer
        ];
    };
    run_progression(
        DESCRIPTION,
        $generate
    );
}
