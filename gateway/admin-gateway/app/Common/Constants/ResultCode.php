<?php

namespace App\Common\Constants;

use Hyperf\Constants\AbstractConstants;
use Hyperf\Constants\Annotation\Constants;

#[Constants]
class ResultCode extends AbstractConstants
{
    /**
     * @Message("success")
     */
    public const SUCCESS = 200;

    /**
     * @Message("fail")
     */
    public const FAIL = 201;

    /**
     * @Message("validated_fail")
     */
    public const VALIDATED_FAIL = 202;

    /**
     * @Message("notfound")
     */
    public const NOTFOUND = 404;
}