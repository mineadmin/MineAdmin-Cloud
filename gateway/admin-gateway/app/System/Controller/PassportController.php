<?php

namespace App\System\Controller;

use App\Common\Controller\AbstractController;
use App\System\Dto\Passport\LoginDto;
use App\System\Service\Impl\PassportServiceImpl;
use App\System\Service\PassportService;
use App\System\Vo\TokenDataVo;
use Hyperf\ApiDocs\Annotation\ApiOperation;
use Hyperf\ApiDocs\Annotation\ApiResponse;
use Hyperf\Di\Annotation\Inject;
use Hyperf\DTO\Annotation\Contracts\RequestBody;
use Hyperf\DTO\Annotation\Contracts\Valid;
use Hyperf\HttpServer\Annotation\Controller;
use Hyperf\HttpServer\Annotation\PostMapping;

#[Controller(prefix: 'system/passport')]
class PassportController extends AbstractController
{
    #[Inject]
    private PassportServiceImpl $passportService;

    #[ApiOperation(summary: '登录',description:'统一登录入口',security: false )]
    #[PostMapping(path: 'login')]
    #[ApiResponse(TokenDataVo::class)]
    public function login(
        #[RequestBody,Valid] LoginDto $dto
    )
    {
        return $this->success(
            $this->passportService->login(
                $dto->account,
                $dto->password
            )
        );
    }
}