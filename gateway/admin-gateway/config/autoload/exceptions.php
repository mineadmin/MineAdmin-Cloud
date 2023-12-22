<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://hyperf.wiki
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf/hyperf/blob/master/LICENSE
 */

use App\Common\Exception\Handler\AppExceptionHandler;
use App\Common\Exception\Handler\BusinessExceptionHandler;
use App\Common\Exception\Handler\ValidationExceptionHandler;

return [
    'handler' => [
        'http' => [
            Hyperf\HttpServer\Exception\Handler\HttpExceptionHandler::class,
            ValidationExceptionHandler::class,
            AppExceptionHandler::class,
            BusinessExceptionHandler::class
        ],
    ],
];
