<?php

namespace BrainGames\Process;

define("ATTEMPS", 3);

function run($obj)
{
    $name = getName($obj::DESCRIPTION);
    $count = 0;
    for ($i = 0; $i < ATTEMPS; $i++) {
        $question = $obj->getQuestion();
        $answer = getAnswer($question);
        if (!$obj->validate($answer)) {
            invalidInput($name);
            break;
        }
        $result = $obj->getResult($question);
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
