<?php

declare(strict_types=1);

namespace App\Controllers;

use App\App;
use App\Attributes\Get;
use App\Attributes\Post;
use App\Attributes\Put;
use App\View;

class HomeController
{
    public function __construct()
    {
    }

    #[Get('/')]
    #[Get(routePath: '/home')]
    public function index(): View
    {
        return View::make('index');
    }

    #[Post('/')]
    public function store(): View
    {

    }

    #[Put('/')]
    public function update(): View
    {

    }

}