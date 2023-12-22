<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://hyperf.wiki
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf/hyperf/blob/master/LICENSE
 */

namespace App\Common\Exception;

use App\Common\Constants\ResultCode;
use Hyperf\Server\Exception\ServerException;
use Throwable;
use function Hyperf\Translation\trans;

class BusinessException extends ServerException
{
    public function __construct(int $code = 0, string $tranKey = null, Throwable $previous = null)
    {
        if (is_null($tranKey)) {
            $tranKey = ResultCode::getMessage($code);
            $message = trans('result.'.$tranKey);
        }else{
            $message = trans($tranKey);
        }

        parent::__construct($message, $code, $previous);
    }
}
