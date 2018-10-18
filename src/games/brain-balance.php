<?php

namespace BrainGames\GameBalance;

use function BrainGames\Process\run as run_balance;

class Balance
{
    const DESCRIPTION = "Balance the given number.";
    const RAND_MAX = 100;

    public function getBalance($number)
    {
        $result = 0;
        $numbers = str_split($number);
        $max =  max($numbers);
        $min =  min($numbers);
        while (($max - $min) > 1) {
            while (($max - $min) > 1) {
                $max--;
                $min++;
            }
            $numbers[array_search(max($numbers), $numbers)] = (string) $max;
            $numbers[array_search(min($numbers), $numbers)] = (string) $min;
            $max = max($numbers);
            $min = min($numbers);
        }
        sort($numbers);
        $result = (int) implode($numbers);
        return $result;
    }

    public function getQuestion()
    {
        return rand(self::RAND_MAX, 100 * self::RAND_MAX);
    }

    public function getResult($question)
    {
        return $this->getBalance($question);
    }

    public function validate($answer)
    {
        return is_numeric($answer);
    }
}

function run()
{
    $balance = new Balance();
    run_balance($balance);
}
