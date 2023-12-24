<?php

namespace App\Common\Middlware;

use App\Common\Constants\ResultCode;
use App\Common\Exception\BusinessException;
use App\System\Model\SystemUser;
use Hyperf\Context\Context;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Xmo\JWTAuth\Exception\TokenValidException;
use Xmo\JWTAuth\JWT;
use Xmo\JWTAuth\Util\JWTUtil;

class AdminMiddleware implements MiddlewareInterface
{
    public function __construct(public JWT $jwt){}

    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        $isValidToken = false;
        $token = null;
        $jwt = $this->jwt;
        if (!empty($request->getHeaderLine('Authorization'))){
            $token = JWTUtil::handleToken($request->getHeaderLine('Authorization'));
        }
        if (!empty($request->getQueryParams()['token'])){
            $token = $request->getQueryParams()['token'];
        }
        if (!$token){
            $this->except();
        }
        if (strlen($token) > 0) {
            if ($token !== false && $jwt->checkToken($token)) {
                // 登录成功
                $user = $jwt->getParserData($token)['id'];
                Context::set('user',SystemUser::find($user));
                $isValidToken = true;
            }
        }

        if ($isValidToken) {
            return $handler->handle($request);
        }
        $this->except();
    }

    private function except()
    {
        throw new BusinessException(ResultCode::NOT_LOGIN);
    }


}