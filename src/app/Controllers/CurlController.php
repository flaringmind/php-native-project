<?php

namespace App\Controllers;

use App\Attributes\Get;
use App\Contracts\EmailValidationInterface;
use App\Services\Emailable\EmailValidationService;

class CurlController
{

    public function __construct(private EmailValidationInterface $emailValidationService)
    {
    }

    #[Get('/curl')]
    public function index()
    {
        $email = 'andro505@outlook.com';
        $result = $this->emailValidationService->verify($email);

        var_dump($result->score, $result->isDeliverable);

        echo '<pre>';
        print_r($result);
    }

}