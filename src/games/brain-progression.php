<?php

namespace BrainGames\GameProgression;

use function BrainGames\Process\run as run_progression;

const DESCRIPTION = "What number is missing in this progression?";
const LENGTH_PROGRESSION = 10;

function run()
{
    run_progression(
        DESCRIPTION,
        function () {
            $result = [];
            $number = rand(1, LENGTH_PROGRESSION);
            $a = rand(1, RAND_MAX);
            $d = rand(1, LENGTH_PROGRESSION);
            $question = '';
            $answer = 0;
            for ($i = 1; $i < LENGTH_PROGRESSION; $i++) {
                if ($i == $number) {
                    $question = $question . '..' . ' ';
                    $answer = $a + ($d * $i) - 1;
                } else {
                    $question = $question . (string) ($a + ($d * $i) - 1) . ' ';
                }
            }
            $result["question"] = substr($question, 0, -1);
            $result["answer"] = $answer;
            return $result;
        },
        function ($answer) {
            return is_numeric($answer);
        }
    );
}
