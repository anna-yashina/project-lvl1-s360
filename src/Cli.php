<?php

namespace BrainGames\Cli;

use function \cli\line;
use function \cli\prompt;

function getName()
{
    line("Welcome to the Brain Game!");
    line("Answer 'yes' if number even otherwise answer 'no'.");
    $name = prompt("May I have your name?");
    line("Hello, %s!", $name);
    return $name;
}

function getAnswer($number)
{
    line("Question: " . $number);
    return prompt("Your answer");
}

function isWinner($name)
{
    line("Congratulations, " . $name . "!");
}

function invalidInput($name)
{
    line("Invalid input! Answer 'yes' if number even otherwise answer 'no'.");
    line("Let's try again, " . $name . "!");
}

function isWrong($wrong, $correct, $name)
{
    line("'" . $wrong . "' is wrong answer;(. Correct answer was ' " . $correct . "'.");
    line("Let's try again, " . $name . "!");
}

function isCorrect()
{
    line("Correct!");
}
