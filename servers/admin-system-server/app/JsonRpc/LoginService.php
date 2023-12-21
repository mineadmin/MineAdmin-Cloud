<?php

namespace App\JsonRpc;

interface LoginService
{
    /**
     * 登录
     * @param string $account
     * @param string $password
     * @return array
     */
    public function login(string $account,string $password): array;
}