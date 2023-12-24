<?php

namespace App\System\Service;


use App\System\Vo\TokenDataVo;
use Psr\SimpleCache\InvalidArgumentException;

interface PassportService
{

    /**
     * @throws InvalidArgumentException
     */
    public function login(string $account, string $password): TokenDataVo;

    /**
     * 刷新token
     * @param null|string $token
     * @return TokenDataVo
     */
    public function refreshToken(null|string $token): TokenDataVo;

    /**
     * 退出登录
     * @param null|string $token
     * @return bool
     * @throws InvalidArgumentException
     */
    public function logout(null|string $token): bool;
}