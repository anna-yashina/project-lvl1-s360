<?php

namespace BrainGames\Cli;

use function \cli\line;

function run()
{
      line('Welcome to the Brain Game!\n');
      $name = \cli\prompt('May I have your name?');
      line("Hello, %s!", $name);
}
