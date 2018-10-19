<?php

namespace BrainGames\Process;

define("ATTEMPS", 3);
define("RAND_MAX", 100);

function run($description, $fnGetQuestion, $fnValidate, $fnGetResult)
{
    $name = getName($description);
    $count = 0;
    for ($i = 0; $i < ATTEMPS; $i++) {
        $question = $fnGetQuestion();
        $answer = getAnswer($question);
        if (!$fnValidate($answer)) {
            invalidInput($name);
            break;
        }
        $result = $fnGetResult($question);
        if ($result == $answer) {
            isCorrect();
        } else {
            isWrong($answer, $result, $name);
            break;
        }
        $count++;
    }
    if ($count === ATTEMPS) {
        isWinner($name);
    }
}
