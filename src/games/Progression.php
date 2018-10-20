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
        //https://ru.wikipedia.org/wiki/Арифметическая_прогрессия
        //a1 - устойчивый термин из математики,
        //означающий первый элемент арифметической прогрессии
        $a1 = rand(1, RAND_MAX);
        //d - устойчивый термин из математики,
        //означающий разность арифмитической прогрессии
        $d = rand(1, LENGTH_PROGRESSION);
        $question = '';
        $answer = 0;
        for ($i = 1; $i < LENGTH_PROGRESSION; $i++) {
            if ($i == $needleNumber) {
                $question = $question . '..' . ' ';
                $answer = $a1 + $d * ($i - 1);
            } else {
                $question = $question . (string) ($a1 + $d * ($i - 1)) . ' ';
            }
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
