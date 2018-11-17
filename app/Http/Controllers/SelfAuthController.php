<?php
namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class SelfAuthController extends Controller
{
    public function getEasyWechatSession()
    {
        $user = session('wechat.oauth_user.default');
        return $user;
    }

    public function autoLogin()
    {   
        
        $userInfo = $this->getEasyWechatSession();
        var_dump($userInfo);
        $openId = $userInfo['id'];
       
        //查看对应的openid是否已被注册
        $userModel = User::where('openid', $openId)->first();
        //如果未注册，跳转到注册
        if (!$userModel) {
            User::create( array(
                    'openid'=>$userInfo['original']['openid'],
                    'nickname'=>$userInfo['original']['nickname'],
                    'sex'=>$userInfo['original']['sex'],
                    'avatar'=>$userInfo['original']['headimgurl'],
                    'language'=>$userInfo['original']['language'],
                    'city'=>$userInfo['original']['city'],
                    'province'=>$userInfo['original']['province'],
                    'country'=>$userInfo['original']['country'],
                    'register_source'=>'wechat_auth',
                ));
           // return redirect()->intended('/vote/index');
           // return redirect()->route('register');
        } else {
           
            User::where('openid',$openId)->update(
                array(
                    'nickname'=>$userInfo['original']['nickname'],
                    'sex'=>$userInfo['original']['sex'],
                    'avatar'=>$userInfo['original']['headimgurl'],
                    'language'=>$userInfo['original']['language'],
                    'city'=>$userInfo['original']['city'],
                    'province'=>$userInfo['original']['province'],
                    'country'=>$userInfo['original']['country'],
                )
            );
            return redirect()->intended('/vote/index');
        //如果已被注册，通过openid进行自动认证，
        //认证通过后重定向回原来的路由，这样就实现了自动登陆。
            // if(Auth::attempt(['openid' => $openId, 'password' => '123456'])) {
            //     return redirect()->intended();
            // }else{
            //     echo'出了点小问题';
            // }
        }
    }

    public function autoRegister()
    {
        $userInfo = $this->getEasyWechatSession();
    //根据微信信息注册用户。
        $userData = [
            'password' => bcrypt('123456'),
            'openid' => $userInfo['id'],
            'nickname' => $userInfo['nickname'],
        ];
        //注意批量写入需要把相应的字段写入User中的$fillable属性数组中
        User::create($userData);
        return redirect()->route('login');
    }
}