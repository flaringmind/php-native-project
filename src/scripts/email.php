<?php

declare(strict_types=1);

use App\App;
use App\Container;
use App\Config;

require_once __DIR__ . '/../vendor/autoload.php';

$container = new Container();

(new App($container))->boot();

$container->get(\App\Services\EmailService::class)->sendQueuedEmails();

