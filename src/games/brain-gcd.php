<?php

namespace BrainGames\GameGcd;

use function BrainGames\Process\run as run_gcd;

class Gcd
{
    const DESCRIPTION = "Find the greatest common divisor of given numbers.";
    const RAND_MAX = 100;

    public function getGcd($number1, $number2)
    {
        $result = 1;
        for ($i = 1; $i <= min($number1, $number2); $i++) {
            if ((($number1 % $i) == 0) && (($number2 % $i) == 0)) {
                $result = $i;
            }
        }
        return $result;
    }

    public function getQuestion()
    {
        $number1 = rand(1, self::RAND_MAX);
        $number2 = rand(1, self::RAND_MAX);
        return $number1 . " " . $number2;
    }

    public function getResult($question)
    {
        $parts = explode(" ", $question);
        $number1 = $parts[0];
        $number2 = $parts[1];
        return $this->getGcd($number1, $number2);
    }

    public function validate($answer)
    {
        return is_numeric($answer);
    }
}

function run()
{
    $gcd = new Gcd();
    run_gcd($gcd);
}
