<?php

namespace App\System\Dto\Passport;

use Hyperf\ApiDocs\Annotation\Api;
use Hyperf\ApiDocs\Annotation\ApiModelProperty;

class TokenDto
{
    #[ApiModelProperty("token")]
    public string $token;
}