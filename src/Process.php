<?php

namespace BrainGames\Process;

define("ATTEMPS", 3);
define("RAND_MAX", 100);

use function \cli\line;
use function \cli\prompt;

function run($description, $fnGenerate, $fnValidate)
{
    line("Welcome to the Brain Game!");
    line($description);
    $name = prompt("May I have your name?");
    line("Hello, %s!", $name);
    $count = 0;
    for ($i = 0; $i < ATTEMPS; $i++) {
        $generation = $fnGenerate();
        $question = $generation["question"];
        line("Question: " . $question);
        $answer = prompt("Your answer");
        if (!$fnValidate($answer)) {
            line("Invalid input!");
            line("Let's try again, " . $name . "!");
            break;
        }
        $result = $generation["answer"];
        if ($result == $answer) {
            line("Correct!");
        } else {
            line("'" . $answer . "' is wrong answer;(. Correct answer was '" . $result . "'.");
            line("Let's try again, " . $name . "!");
            break;
        }
        $count++;
    }
    if ($count === ATTEMPS) {
        line("Congratulations, " . $name . "!");
    }
}
