<?php

namespace App\Controllers;

use App\Attributes\Get;
use App\Services\Emailable\EmailValidationService;

class CurlController
{

    public function __construct(private EmailValidationService $emailValidationService)
    {
    }

    #[Get('/curl')]
    public function index()
    {
        $email = 'andro505@outlook.com';
        $result = $this->emailValidationService->verify($email);
        echo '<pre>';
        print_r($result);
    }

}