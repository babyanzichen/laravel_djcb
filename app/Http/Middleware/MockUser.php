<?php
namespace App\Http\Middleware;

use Closure;
use Overtrue\Socialite\User as SocialiteUser;

class MockUser
{
    public function handle($request, Closure $next)
    {

        $user = new SocialiteUser([
           'id' => array_get($user, 'openid'),
            'name' => array_get($user, 'nickname'),
            'nickname' => array_get($user, 'nickname'),
            'avatar' => array_get($user, 'headimgurl'),
            'email' => null,
            'original' => [],
            'provider' => 'WeChat',
        ]);
        session(['wechat.oauth_user.default' => $user]);
        return $next($request);
    }
}
