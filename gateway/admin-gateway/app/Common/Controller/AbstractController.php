<?php

namespace App\Common\Controller;

use App\Common\Constants\ResultCode;
use App\Common\Utils\ResultUtils;

abstract class AbstractController
{
    /**
     * 请求失败
     * @param mixed|null $data
     * @param string $message
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function fail(
        mixed $data = null,
        string $message = 'fail'
    ): \Psr\Http\Message\ResponseInterface
    {
        return ResultUtils::json(
            data: $data,
            message: $message,
            code: ResultCode::FAIL
        );
    }

    /**
     * 请求成功
     * @param mixed|null $data
     * @param string $message
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function success(
        mixed $data = null,
        string $message = 'success'
    ): \Psr\Http\Message\ResponseInterface
    {
        return ResultUtils::json(
            data:$data,
            message: $message,
            code: ResultCode::SUCCESS
        );
    }
}