<?php

namespace App\System\Controller;

use App\Common\Controller\AbstractController;
use App\Common\Middlware\AdminMiddleware;
use App\System\Dto\Passport\ConfirmPasswordDto;
use App\System\Dto\Passport\LoginDto;
use App\System\Dto\Passport\TokenDto;
use App\System\Service\PassportService;
use App\System\Vo\TokenDataVo;
use Hyperf\ApiDocs\Annotation\Api;
use Hyperf\ApiDocs\Annotation\ApiOperation;
use Hyperf\ApiDocs\Annotation\ApiResponse;
use Hyperf\Di\Annotation\Inject;
use Hyperf\DTO\Annotation\Contracts\RequestBody;
use Hyperf\DTO\Annotation\Contracts\RequestHeader;
use Hyperf\DTO\Annotation\Contracts\Valid;
use Hyperf\HttpServer\Annotation\Controller;
use Hyperf\HttpServer\Annotation\GetMapping;
use Hyperf\HttpServer\Annotation\Middleware;
use Hyperf\HttpServer\Annotation\PostMapping;
use Psr\Http\Message\ResponseInterface;
use Psr\SimpleCache\InvalidArgumentException;
use Xmo\JWTAuth\JWT;
use Xmo\JWTAuth\Middleware\JWTAuthMiddleware;

#[Api(tags: '登录')]
#[Controller(prefix: 'system/passport')]
class PassportController extends AbstractController
{
    #[Inject]
    private PassportService $passportService;

    /**
     * @throws InvalidArgumentException
     */
    #[ApiOperation(summary: '登录',description:'统一登录入口',security: false )]
    #[PostMapping(path: 'login')]
    #[ApiResponse(TokenDataVo::class)]
    public function login(
        #[RequestBody,Valid] LoginDto $dto
    ): ResponseInterface
    {
        return $this->success(
            $this->passportService->login(
                $dto->account,
                $dto->password
            )
        );
    }

    #[ApiOperation(summary: '刷新token',description: '刷新token',security: true)]
    #[GetMapping(path: 'refresh_token')]
    #[Middleware(AdminMiddleware::class)]
    #[ApiResponse(response: TokenDataVo::class)]
    public function refreshToken(JWT $jwt): ResponseInterface
    {
        return $this->success(
                $this->passportService
                    ->refreshToken(null)
            );
    }

    /**
     * @throws InvalidArgumentException
     */
    #[ApiOperation(summary: '退出登录',security: true)]
    #[GetMapping(path: 'logout')]
    #[Middleware(AdminMiddleware::class)]
    public function logout(
    ): ResponseInterface
    {
        $this->passportService->logout(null);
        return $this->success();
    }

    #[ApiOperation(summary: '密码确认',security: true)]
    #[PostMapping(path: 'confirm-password')]
    #[Middleware(AdminMiddleware::class)]
    public function confirmPassword(
        #[RequestBody] ConfirmPasswordDto $dto
    ): ResponseInterface
    {
        return $this->passportService->confirmPassword($dto->password)?
        $this->success() :
        $this->fail();
    }
}