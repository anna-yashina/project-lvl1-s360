<?php

namespace BrainGames\Process;

const ATTEMPS = 3;
const RAND_MAX = 100;

use function \cli\line;
use function \cli\prompt;

function run($description, $fnGenerate)
{
    line("Welcome to the Brain Game!");
    line($description);
    $name = prompt("May I have your name?");
    line("Hello, %s!", $name);
    for ($i = 0; $i < ATTEMPS; $i++) {
        [$question, $result] = $fnGenerate();
        line("Question: " . $question);
        $answer = prompt("Your answer");
        if ($result == $answer) {
            line("Correct!");
        } else {
            line("'" . $answer . "' is wrong answer;(. Correct answer was '" . $result . "'.");
            line("Let's try again, " . $name . "!");
            return;
        }
    }
        line("Congratulations, " . $name . "!");
}
