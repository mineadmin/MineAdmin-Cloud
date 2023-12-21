<?php

namespace App\JsonRpc\Impl;

use App\JsonRpc\LoginService;
use Hyperf\RpcServer\Annotation\RpcService;
use Hyperf\Stringable\Str;
use function Hyperf\Config\config;

#[RpcService(name: 'LoginService', server: 'admin-system-server', protocol: 'jsonrpc-http',publishTo: 'nacos')]
class LoginServiceImpl implements LoginService
{

    /**
     * @inheritDoc
     */
    public function login(string $account, string $password): array
    {
        return config('databases');
    }
}