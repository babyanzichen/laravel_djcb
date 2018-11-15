<?php

namespace App\Http\Controllers;
use DB;
use App\races;
use App\zanrecords;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\libs\ipCity;
use convert;
use Overtrue\Wechat\Payment;
use Overtrue\Wechat\Payment\Order;
use Overtrue\Wechat\Payment\Business;
use Overtrue\Wechat\Payment\UnifiedOrder;
use Overtrue\Wechat\Payment\Notify;
use JSSDK;
use Validator;
use Redirect, Input, Response;
use Illuminate\Support\Facades\Session; 
use shouquan;
class RaceController extends BaseController
{
	public function index(Request $request)
    {   
    	 $this->check($request,'race');
    	 $raceinfo= DB::table('races')->where([['openid', '=', $request->session()->get('user')['openid']]])->first();
    	 if($raceinfo!=''||$raceinfo!=null){
    	 	return redirect('race/detail/'.$request->session()->get('user')['openid']);
    	 }
    	  $JSSDK=new JSSDK(config('app.appId'),config('app.appSecret'));
      	$signPackage = $JSSDK->getSignPackage();
    	 return view('race/index', 
	          [
	        	'signPackage' => $signPackage
	          ]
	        );
	}
	public function infosubmit(Request $request)
    { 	
    	$validator = Validator::make($request->all(),  [
            'phone'=> 'required|max:20',
            'username' => 'required', // 必填
            'nickname' => 'required', // 必填
            'quote' => 'required',
            'headpic'=>'required',
        ]);
       //var_dump($request->all());
        if ($validator->passes()){
        $race = new races; 
    	$race->username = $request->get('username'); // 将 POST 提交过了的 title 字段的值赋给 article 的 title 属性
    	$race->nickname = $request->get('nickname'); // 将 POST 提交过了的 title
    	$race->phone = $request->get('phone');// 字段的值赋给 article 的 title 属性
    	$race->quote = $request->get('quote'); 
    	$race->headpic = $request->get('headpic'); 
    	$race->openid =$request->session()->get('user')['openid']; // 将 POST 提交过了的 title 
    	
    		$isset= $race->where('openid',$request->session()->get('user')['openid'])  ->get();
          if($isset->first()!=''){//已经报名了
          	return Response::json(
            [
                'code' => '300',
                'msg' => '请勿重复提交报名信息',
                'status' => 'invalid order submit'
            ]);
          }else{//未报名
          	if ($race->save()){//保存成功

    			return Response::json(
            [
                'code' => '200',
                'msg' => '您已报名成功',
                'status' => 'success !'
            ]);
    		}else{//保存失败
	    		return Response::json(
		            [
		                'code' => '500',
		                'msg' => '数据库服务异常，请稍候再试',
		                'status' => 'database write Error'
		            ]);
    			}
	
    	}
    	}else{//数据不通过验证
    		return Response::json(
            [
                'code' => '500',
                'msg' => '数据验证不通过,请补充',
                'status' => 'form data invaild'
            ]);
    	}
}
public function detail(Request $request)
    {   
    	$id=$request->route('id');
    	
       $this->check($request,'race/detail/'.$id);
        $race=new races;
      $data=$race->where('openid', '=',$id)->first();
      //var_dump($data);
    	  $JSSDK=new JSSDK(config('app.appId'),config('app.appSecret'));
      	$signPackage = $JSSDK->getSignPackage();
      	 $lists= $race->where('status','1')  ->orderBy('votes', 'desc')->limit(20)->get();
    	 return view('race/detail', 
	          [
	          	'data' => $data,
	          	'lists' => $lists,
	        	'signPackage' => $signPackage
	          ]
	        );
	}
    
	public function vote(Request $request){





     $now=time();
    //echo $now;
    if($now>1529078400){
        return Response::json(
                  [
                      'status' =>'time passed',
                      'msg' => '投票已截止',
                      'code' => '400',
                      
                  ]
              );
    }else{
       $id=$request->route('id');
        $openid= $request->session()->get('user')['openid'];

        $raceinfo= DB::table('races')->where([['openid', '=',$id]])->first();
         








        $zanrecords = new zanrecords;
        $has=$zanrecords
              ->where('openid',$openid)
              ->where('date',date('Y-m-d', time()))
              ->get();
          if($has->first()==''){
               $races = new races;
               $zanrecords->openid =$openid;
               $zanrecords->cid =$id;
               $zanrecords->date =date('Y-m-d', time());
               $zanrecords->save();
              // $zanrecords->insert(
       // ['openid' => $openid, 'cid'=>$id,'date' => date('Y-m-d', time())]);
               $handle= $races->where('openid',$id)->increment('votes');
              if ($handle) {

                 $openid1=$request->session()->get('user')['openid'];
            $title1='恭喜您投票成功!';
            $keyword1=$raceinfo->nickname;
            $keyword2=date('Y-m-d H:i:s',time());
            $remark1='尊敬的用户“'.$request->session()->get('user')['nickname'].'”您已经在2018武汉国际改装车展汽车漂移副驾体验资格投票选活动中为选手“'.$raceinfo->nickname.'”成功投上一票，赶紧点击此处分享到朋友圈为TA拉到更多票数吧，感谢您对本次活动的积极参与。';
            $template_id1='N4IYJRgoJjHgQ4wdGfgsrVz1duLczJRfkTELRMIUgOw';
           
            $redirect_url='http://www.djcb123.cn/race/detail/'.$id;

             $template_id2='mOV9Thh16Qg1wBqY6hwibWBmhF_eQmfADvaGnisjFCE';
             $keyword3=$raceinfo->votes;
            $openid2=$raceinfo->openid;
            $title2='又有小伙伴为您投了一票';
             $remark2='尊敬的用户“'.$raceinfo->nickname.'”，又有小伙伴“'.$request->session()->get('user')['nickname'].'”在2018武汉国际改装车展汽车漂移副驾体验资格投票选活动中为您成功投上一票，赶紧点击此处查看活动详情吧，感谢您的对本次的活动的积极参与。';
            $this->send1($request,$openid1,$title1,$template_id1,$keyword1,$keyword2,$remark1,$redirect_url);
            $this->send2($request,$openid2,$title2,$template_id2,$keyword1,$keyword3,$keyword2,$remark2,$redirect_url);


                
                 return Response::json(
                  [
                      'status' =>'success',
                      'msg' => '投票成功',
                      'code' => '200',
                      
                  ]
              );

            
           




                 
            }else{
              return Response::json(
                  [
                      'status' => 'fail',
                      'msg' => '投票失败',
                      'code' => '404',
                     
                  ]
              );
            }
          }else{
             return Response::json(
                  [
                      'status' =>'fail',
                      'msg' => '每个账号每天只有一次投票机会，明天再来吧',
                      'code' => '100',
                      
                  ]
              );
          }
        }
    }

    public function send1(Request $request,$openid1,$title1,$template_id1,$keyword1,$keyword2,$remark1,$redirect_url){
        
        $shouquan=new shouquan();
       
       
        $shouquan->sendVoteSuccess($openid1,$title1,$template_id1,$keyword1,$keyword2,$remark1,$redirect_url);//调用方法
    }

    public function send2(Request $request,$openid2,$title2,$template_id2,$keyword1,$keyword3,$keyword2,$remark2,$redirect_url){
        
        $shouquan=new shouquan();
       
       
        $shouquan->sendGetVote($openid2,$title2,$template_id2,$keyword1,$keyword3,$keyword2,$remark2,$redirect_url);//调用方法
    }

}