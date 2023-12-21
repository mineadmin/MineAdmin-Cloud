<?php

namespace App\Controller;

use App\Service\LoginService;
use Hyperf\HttpServer\Annotation\Controller;
use Hyperf\HttpServer\Annotation\GetMapping;
use Hyperf\HttpServer\Contract\RequestInterface;

#[Controller(prefix: "system/user")]
class LoginController
{
    private LoginService $loginService;

    /**
     * @param LoginService $loginService
     */
    public function __construct(LoginService $loginService)
    {
        $this->loginService = $loginService;
    }


    #[GetMapping(path: "login")]
    public function Login(RequestInterface $request): array
    {
        return [
            $this->loginService->login('','')
        ];
    }
}