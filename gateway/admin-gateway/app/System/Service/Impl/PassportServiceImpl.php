<?php

namespace App\System\Service\Impl;

use App\Common\Constants\ResultCode;
use App\Common\Exception\BusinessException;
use App\System\Model\SystemUser;
use App\System\Service\PassportService;
use App\System\Vo\TokenDataVo;
use Hyperf\Collection\Arr;
use Hyperf\Context\Context;
use Hyperf\Di\Annotation\Inject;
use Mine\Annotation\Service;
use Psr\SimpleCache\InvalidArgumentException;
use Xmo\JWTAuth\JWT;

#[Service]
class PassportServiceImpl implements PassportService
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
        $token = $this->jwt->setScene('admin')
            ->getToken(
                $user->toArray()
            );
        $vo->token = $token;
        $vo->expireAt = $this->jwt->getTokenDynamicCacheTime($token);
        return $vo;
    }

    /**
     * 刷新token
     * @param null|string $token
     * @return TokenDataVo
     */
    public function refreshToken(null|string $token): TokenDataVo
    {
        $vo = new TokenDataVo();
        $token = $this->jwt->refreshToken($token);
        $vo->token = $token;
        $vo->expireAt = $this->jwt->getTokenDynamicCacheTime($token);
        return $vo;
    }

    /**
     * 退出登录
     * @param null|string $token
     * @return bool
     * @throws InvalidArgumentException
     */
    public function logout(null|string $token): bool
    {
        return $this->jwt->logout($token);
    }


    public function confirmPassword(string $password): bool
    {
        /**
         * @var SystemUser $user
         */
        $user = Context::get('user');
        if ($user::passwordVerify(
            $password,$password
        )){
            return true;
        }
        return false;
    }
}