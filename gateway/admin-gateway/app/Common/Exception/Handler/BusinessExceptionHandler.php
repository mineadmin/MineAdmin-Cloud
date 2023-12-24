<?php

namespace App\Common\Exception\Handler;

use App\Common\Exception\BusinessException;
use App\Common\Utils\ResultUtils;
use Hyperf\ExceptionHandler\ExceptionHandler;
use Swow\Psr7\Message\ResponsePlusInterface;
use Throwable;
use Xmo\JWTAuth\Exception\JWTException;

class BusinessExceptionHandler extends ExceptionHandler
{
    public function handle(Throwable $throwable, ResponsePlusInterface $response)
    {
        $this->stopPropagation();
        return ResultUtils::json(message: $throwable->getMessage(),code:$throwable->getCode());
    }

    public function isValid(Throwable $throwable): bool
    {
        return ($throwable instanceof BusinessException) || ($throwable instanceof JWTException);
    }

}