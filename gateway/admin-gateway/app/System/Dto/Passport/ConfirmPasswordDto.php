<?php

namespace App\System\Dto\Passport;

use Hyperf\ApiDocs\Annotation\Api;
use Hyperf\ApiDocs\Annotation\ApiModel;
use Hyperf\ApiDocs\Annotation\ApiModelProperty;
use Hyperf\DTO\Annotation\Validation\Required;
use Hyperf\DTO\Annotation\Validation\Str;

#[ApiModel]
class ConfirmPasswordDto
{
    #[Required]
    #[Str]
    #[ApiModelProperty('密码')]
    public string $password;
}