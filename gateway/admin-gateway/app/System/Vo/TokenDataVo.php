<?php

namespace App\System\Vo;


use Hyperf\ApiDocs\Annotation\ApiModel;
use Hyperf\ApiDocs\Annotation\ApiModelProperty;

#[ApiModel]
class TokenDataVo
{
    #[ApiModelProperty(value:"token",example: 'token...')]
    public string $token;

    #[ApiModelProperty(value:"过期时间",example: '123456')]
    public string $expireAt;
}