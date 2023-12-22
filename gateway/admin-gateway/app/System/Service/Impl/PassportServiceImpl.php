<?php

namespace App\System\Service\Impl;

use App\Common\Constants\ResultCode;
use App\Common\Exception\BusinessException;
use App\System\Model\SystemUser;
use App\System\Vo\TokenDataVo;
use Hyperf\Collection\Arr;
use Hyperf\Di\Annotation\Inject;
use Psr\SimpleCache\InvalidArgumentException;
use Xmo\JWTAuth\JWT;

class PassportServiceImpl
{
    #[Inject]
    private JWT $jwt;


    /**
     * @throws InvalidArgumentException
     */
    public function login(string $account, string $password): TokenDataVo
    {
        $user = SystemUser::query()->where('username',$account)->first();
        if (empty($user)){
            throw new BusinessException(
                ResultCode::NOTFOUND
            );
        }
        if (!SystemUser::passwordVerify($password,$user->password)) {
            throw new BusinessException(
                201,'result.password_fail'
            );
        }
        $vo = new TokenDataVo();
        $token = $this->jwt->getToken(Arr::only($user->toArray(),[
            'id','username','user_type'
        ]));
        $vo->token = $token;
        $vo->expireAt = $this->jwt->getTokenDynamicCacheTime($token);
        return $vo;

    }
}