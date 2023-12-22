<?php

namespace App\System\Dto\Passport;

use Hyperf\ApiDocs\Annotation\Api;
use Hyperf\ApiDocs\Annotation\ApiModel;
use Hyperf\ApiDocs\Annotation\ApiModelProperty;
use Hyperf\DTO\Annotation\Dto;
use Hyperf\DTO\Annotation\Validation\Integer;
use Hyperf\DTO\Annotation\Validation\Required;
use Hyperf\DTO\Annotation\Validation\Str;

#[Dto]
#[ApiModel]
class LoginDto
{
    #[ApiModelProperty('账号')]
    #[Required]
    #[Str]
    public string $account;

    #[ApiModelProperty('密码')]
    #[Required]
    #[Str]
    public string $password;
}