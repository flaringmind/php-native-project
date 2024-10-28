<?php

namespace App\Controllers;

use App\Attributes\Route;

class GeneratorExampleController
{
    public function __construct()
    {
    }

    #[Route('/examples/generator')]
    public function index()
    {
        $numbers = $this->lazyRange(1, 10);

//        echo $numbers->current();
//        $numbers->next();
//        echo $numbers->current();
//        $numbers->next();
//        echo $numbers->current();
        foreach ($numbers as $key => $number) {
            echo $key . ':' . $number . '<br />';
        }
    }

    private function lazyRange(int $start, int $end): \Generator
    {
        for($i = $start; $i <= $end; $i++) {
            yield $i;
        }
    }

}