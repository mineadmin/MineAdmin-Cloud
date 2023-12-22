<?php

namespace App\Common\Exception\Handler;

use App\Common\Constants\ResultCode;
use App\Common\Utils\ResultUtils;
use Hyperf\ExceptionHandler\ExceptionHandler;
use Hyperf\HttpMessage\Stream\SwooleStream;
use Hyperf\Validation\ValidationException;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Swow\Psr7\Message\ResponsePlusInterface;
use Throwable;

class ValidationExceptionHandler extends ExceptionHandler
{
    public function handle(Throwable $throwable, ResponsePlusInterface $response): ResponseInterface
    {
        /**
         * @var ValidationException $throwable
         */
        $this->stopPropagation();
        return ResultUtils::json(
            message: $throwable->validator->errors()->first(),
            code: ResultCode::VALIDATED_FAIL
        );
    }

    public function isValid(Throwable $throwable): bool
    {
        return $throwable instanceof ValidationException;
    }

}