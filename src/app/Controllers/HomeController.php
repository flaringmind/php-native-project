<?php

declare(strict_types=1);

namespace App\Controllers;

use App\App;
use App\Attributes\Get;
use App\Attributes\Post;
use App\Attributes\Put;
use App\Container;
use App\Services\InvoiceService;
use App\View;

class HomeController
{
    public function __construct(private InvoiceService $invoiceService)
    {
    }

    #[Get('/')]
    #[Get(routePath: '/home')]
    public function index(): View
    {
        $this->invoiceService->process([], 5000);

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