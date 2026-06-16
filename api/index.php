<?php

declare(strict_types=1);

// Vercel serverless entrypoint — forwards all requests to Laravel's public front controller.
chdir(dirname(__DIR__));

require __DIR__.'/../public/index.php';
