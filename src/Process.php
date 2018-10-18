<?php

namespace BrainGames\Process;

define("RAND_MAX", 100);
define("ATTEMPS", 3);

function getResult($gameName, $question)
{
    $result = '';
    $operations = ["+", "-", "*"];
    switch ($gameName) {
        case "brain-even":
            $result = (isEven($question)) ? 'yes' : 'no';
            break;
        case "brain-calc":
            $parts = explode(" ", $question);
            $number1 = $parts[0];
            $number2 = $parts[2];
            $operation = $parts[1];
            $result = calculate($number1, $number2, $operation);
            break;
        case "brain-gcd":
            $parts = explode(" ", $question);
            $number1 = $parts[0];
            $number2 = $parts[1];
            $result = getGcd($number1, $number2);
            break;
        case "brain-balance":
            $result = getBalance($question);
            break;
    }
        return $result;
}
function getQuestion($gameName)
{
    $result = '';
    $operations = ["+", "-", "*"];
    switch ($gameName) {
        case "brain-even":
            $result = rand(0, RAND_MAX);
            break;
        case "brain-calc":
            $number1 = rand(0, RAND_MAX);
            $number2 = rand(0, RAND_MAX);
            $operation = rand(0, 2);
            $result = $number1 . " " . $operations[$operation] . " " . $number2;
            break;
        case "brain-gcd":
            $number1 = rand(1, RAND_MAX);
            $number2 = rand(1, RAND_MAX);
            $result = $number1 . " " . $number2;
            break;
        case "brain-balance":
            $result = rand(RAND_MAX, 100 * RAND_MAX);
            break;
    }
          return $result;
}
function getDescription($gameName)
{
    $result = '';
    switch ($gameName) {
        case "brain-even":
            $result = "Answer 'yes' if number even otherwise answer 'no'.";
            break;
        case "brain-calc":
            $result = "What is the result of the expression?";
            break;
        case "brain-gcd":
            $result = "Find the greatest common divisor of given numbers.";
            break;
        case "brain-balance":
            $result = "Balance the given number.";
            break;
    }
    return $result;
}
function validate($gameName, $answer)
{
    $result = false;
    switch ($gameName) {
        case "brain-even":
            if (($answer == 'yes') || ($answer == 'no')) {
                $result = true;
            };
            break;
        case "brain-calc":
            $result = is_numeric($answer);
            break;
        case "brain-gcd":
            $result = is_numeric($answer);
            break;
        case "brain-balance":
            $result = is_numeric($answer);
            break;
    }
    return $result;
}

function run($gameName)
{
    $name = getName(getDescription($gameName));
    $count = 0;
    for ($i = 0; $i < ATTEMPS; $i++) {
        $question = getQuestion($gameName);
        $answer = getAnswer($question);
        if (!validate($gameName, $answer)) {
            invalidInput($name);
            break;
        }
        $result = getResult($gameName, $question);
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
