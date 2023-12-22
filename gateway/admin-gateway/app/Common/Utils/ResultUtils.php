<?php

namespace App\Common\Utils;

use App\Common\Constants\ResultCode;
use Hyperf\Context\ApplicationContext;
use Hyperf\HttpServer\Contract\ResponseInterface;

class ResultUtils
{

    /**
     * 请求失败
     * @param mixed|null $data
     * @param string $message
     * @return \Psr\Http\Message\ResponseInterface
     */
    public static function fail(
        mixed $data = null,
        string $message = 'fail'
    ): \Psr\Http\Message\ResponseInterface
    {
        return self::json(
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
    public static function success(
        mixed $data = null,
        string $message = 'success'
    ): \Psr\Http\Message\ResponseInterface
    {
        return self::json(
            data:$data,
            message: $message,
            code: ResultCode::SUCCESS
        );
    }


    public static function json(
        mixed $data = null,
        string $message = 'success',
        int $code = 200
    ): \Psr\Http\Message\ResponseInterface
    {
        return ApplicationContext::getContainer()
            ->get(ResponseInterface::class)
            ->json(compact('code','message','data'));
    }
}