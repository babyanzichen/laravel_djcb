<?php
namespace App\Http\Controllers;
use DB;
use App\Articles;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\libs\ipCity;
use convert;
use shouquan;
use JSSDK;
use Validator;
use Auth;
use Redirect, Input, Response;
use Illuminate\Support\Facades\Session; 
use App\Models\VoteRegister;
use App\Models\voteRecord;
use App\Models\voteAward; 
use App\Models\voteCategory; 
use App\Models\VoteInfo; 
use App\Models\About;
use App\Models\User;
use App\Models\VoteComment;
use App\Repositories\AboutRepository;
use App\Repositories\VoteInfoRepository;
use App\Repositories\VoteCategoryRepository;

class VoteController extends BaseController
{   

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
     public function __construct(AboutRepository $about,VoteInfoRepository $VoteInfoRepository,VoteCategoryRepository $VoteCategoryRepository)
    {

      $this->middleware(['wechat.oauth']);
      $this->about = $about;
      $this->VoteInfoRepository = $VoteInfoRepository;
      $this->VoteCateryRepository = $VoteCategoryRepository;
    }
    protected function index(Request $request)
    { 
       
        $this->autoLogin();
       $IP=$_SERVER['REMOTE_ADDR'];
     
         $userInfo = $this->getEasyWechatSession();
        $openid= $userInfo['original']['openid'];
        $nickname=$userInfo['original']['nickname'];
        
         $voteInfo=VoteInfo::where('status','ON')->first();
         
         
        $lists=VoteCategory::where('is_enabled','yes')->get();

        foreach ($lists as $key => $value) {
          $value['award']=VoteAward::where(array('category_id'=>$value['id'],'is_enabled'=>'yes'))->get();
          foreach ($value['award'] as $k => $v) {
          $v['register']=VoteRegister::where(array('award_id'=>$v['id'],'is_enabled'=>'yes'))->get();
          }
        }
       foreach ($lists as $key => $value) {
          foreach ($value['award'] as $k => $v) {
             foreach ($v['register'] as $m => $n) {
          if ($n['award_id']>=41&&$n['award_id']<=56) {   //
              $n['photo']=$n['logo'];
              $n['name']=$n['projectname']; 
            }elseif ($n['award_id']>=65&&$n['award_id']<=69){
              $n['photo']=$n['head'];
              $n['name']=$n['username']; 
            } elseif ($n['award_id']>=59&&$n['award_id']<=64){
              $n['photo']=$n['logo'];
              $n['name']=$n['companyname']; 
            }else{
              $n['photo']=$n['logo'];
              $n['name']=$n['brandname']; 
            }
            $has=VoteRecord::where('openid',$openid)
              ->where('rid',$n['id'])
              ->where('date',date('Y-m-d', time()))
              ->get();
               if($has->first()==''){
                 $n['tips']='立即投票';
                  $n['style']='';
               }else{
                  $n['tips']='已投票';
                  $n['style']="dark";
               }  
          }  
        }
      }
        DB::table('chebao_visittable')->insert(
        ['visitip' => $IP, 'page'=>'index','openid'=>$openid,'visittime' => date('Y-m-d H:i:s', time())]);
      $data['regcount']= VoteRegister::where('id','>','266')->distinct('openid')->count();
      $data['visitcount']= DB::table('chebao_visittable')->count();
      $data['visitcount']=$data['visitcount'];
      $data['votecount']=VoteRecord::where('id','>','15782')->distinct('openid')->count();
      $data['votecount']=$data['votecount'];
     
    	$JSSDK=new JSSDK(config('app.appId'),config('app.appSecret'));
      	$signPackage = $JSSDK->getSignPackage();
       session(['index'=>'1']);
    	return view('vote/index', 
          compact( 'lists','data','ip','voteInfo','signPackage')
        //  'addr'=>$addr,
        );
    }

    public function regs(Request $request)
    { 
      
        $this->autoLogin();
        $userInfo = $this->getEasyWechatSession();
        $openid= $userInfo['original']['openid'];
        $nickname=$userInfo['original']['nickname'];
        $info=VoteInfo::where('status','ON')->first();
        $awardCategory=VoteCategory::where(array('is_enabled'=>'yes'))->get();
        
         $IP=$_SERVER['REMOTE_ADDR'];
        DB::table('chebao_visittable')->insert(
        ['visitip' => $IP, 'page'=>'reg','openid'=>$openid,'visittime' => date('Y-m-d H:i:s', time())]);
      $JSSDK=new JSSDK(config('app.appId'),config('app.appSecret'));
        $signPackage = $JSSDK->getSignPackage();
        session(['index'=>'4']);
      
        return view('vote/reg',compact('nickname','awardCategory','signPackage','info')
        );
      
    
      
    }

    public function reg(Request $request)
    {  
       
         $this->autoLogin();
        $userInfo = $this->getEasyWechatSession();
        $openid= $userInfo['original']['openid'];
        $nickname=$userInfo['original']['nickname'];
        $is_guanzhu=User::where('openid',$openid)->value('is_guanzhu');
        
        $IP=$_SERVER['REMOTE_ADDR'];
        DB::table('chebao_visittable')->insert(
        ['visitip' => $IP, 'page'=>'reg','openid'=>$openid,'visittime' => date('Y-m-d H:i:s', time())]);
       $info=VoteInfo::where('status','ON')->first();
        $awardCategory=VoteCategory::where(array('is_enabled'=>'yes'))->get();
      $JSSDK=new JSSDK(config('app.appId'),config('app.appSecret'));
        $signPackage = $JSSDK->getSignPackage();
       session(['index'=>'4']);
        $nickname=$userInfo['nickname'];
      $is= VoteRegister::where('openid','=',$openid)->where('award_id','>','40')->get();
      //print_r($is);
      
       
      if($is->first()){
        return view('vote/checking',compact('is','is_guanzhu','signPackage','nickname')); 
      }
      return view('vote/reg',compact('info', 'awardCategory','is_guanzhu','is','signPackage','nickname')); 
          
    }

    public function lists(Request $request)
    { 
      
         $this->autoLogin();
         $userInfo = $this->getEasyWechatSession();
        $openid= $userInfo['original']['openid'];
        $nickname=$userInfo['original']['nickname'];
       $IP=$_SERVER['REMOTE_ADDR'];
        DB::table('chebao_visittable')->insert(
        ['visitip' => $IP, 'page'=>'lists','openid'=>$openid,'visittime' => date('Y-m-d H:i:s', time())]);
    	$JSSDK=new JSSDK(config('app.appId'),config('app.appSecret'));
      	$signPackage = $JSSDK->getSignPackage();
         session(['index'=>'2']);
         $VoteRegister = new VoteRegister;
      //$lists= $VoteRegister->where('is_enabled','=','yes')->get();
      $cateList=VoteCategory::where('is_enabled','=','yes')->get();
      $awardList=VoteAward::where('is_enabled','=','yes')->get();
      //var_dump($lists);
    	return view('vote/lists',compact('signPackage','cateList','awardList'));
    }
    public function positive(Request $request)
    {  
    	 $this->autoLogin();
      $IP=$_SERVER['REMOTE_ADDR'];
      $url = 'http://ip.taobao.com/service/getIpInfo.php?ip='.$IP; 
        $data = file_get_contents($url); //调用淘宝接口获取信息 
        $json = json_decode($data);
        $country=$json->{'data'}->{'country'};
        $area=$json->{'data'}->{'area'};
        $region=$json->{'data'}->{'region'};
        $city=$json->{'data'}->{'city'};
        $county=$json->{'data'}->{'county'};
        $isp=$json->{'data'}->{'isp'};

        $addr=$country.$area.$region.$city.$county.$isp;
        $openid= $request->session()->get('user')['openid'];
        DB::table('chebao_visittable')->insert(
        ['visitip' => $IP, 'addr' => $addr,'openid'=>$openid,'visittime' => date('Y-m-d H:i:s', time())]);
      $JSSDK=new JSSDK(config('app.appId'),config('app.appSecret'));
        $signPackage = $JSSDK->getSignPackage();
        session(['index'=>'2']);
      return view('vote/positive', 
          [
          'addr'=>$addr,
          'ip'=>$IP,
          'signPackage' => $signPackage
          ]
        );
    }
    public function scroll(Request $request)
    {  
       $this->autoLogin();
    	$JSSDK=new JSSDK(config('app.appId'),config('app.appSecret'));
      	$signPackage = $JSSDK->getSignPackage();
    	return view('vote/scroll', 
          [
          'signPackage' => $signPackage
          ]
        );
    }






    public function newslist(Request $request)
    {  
       $this->autoLogin();
      $IP=$_SERVER['REMOTE_ADDR'];
      $url = 'http://ip.taobao.com/service/getIpInfo.php?ip='.$IP; 
        $data = file_get_contents($url); //调用淘宝接口获取信息 
        $json = json_decode($data);
        $country=$json->{'data'}->{'country'};
        $area=$json->{'data'}->{'area'};
        $region=$json->{'data'}->{'region'};
        $city=$json->{'data'}->{'city'};
        $county=$json->{'data'}->{'county'};
        $isp=$json->{'data'}->{'isp'};

        $addr=$country.$area.$region.$city.$county.$isp;
        $openid= $request->session()->get('user')['openid'];
        DB::table('chebao_visittable')->insert(
        ['visitip' => $IP, 'addr' => $addr,'openid'=>$openid,'visittime' => date('Y-m-d H:i:s', time())]);
      $JSSDK=new JSSDK(config('app.appId'),config('app.appSecret'));
        $signPackage = $JSSDK->getSignPackage();
       session(['index'=>'3']);
                $article=new articles;
      $news=$article->orderBy('addtime', 'desc')->limit('10')->get();
      return view('vote/newslist', 
          [
          'news'=>$news,
          'addr'=>$addr,
          'ip'=>$IP,
          'signPackage' => $signPackage
          ]
        );
    }
    public function my(Request $request)
    {  
       $this->autoLogin();
    	$JSSDK=new JSSDK(config('app.appId'),config('app.appSecret'));
      	$signPackage = $JSSDK->getSignPackage();
         session(['index'=>'5']);
    	return view('vote/my', 
          [
          'signPackage' => $signPackage
          ]
        );
    }

    public function sub(Request $request)
    {  
       $this->autoLogin();
      $validator = Validator::make($request->all(),  [
            'phone'=> 'required|max:20',
            'companyname' => 'required', // 必填
            'award_id'=>'required|int'
        ]);
       $userInfo = $this->getEasyWechatSession();
        $openid= $userInfo['original']['openid'];
        $nickname=$userInfo['original']['nickname'];
       $VoteRegister = new VoteRegister;
        if ($validator->passes()){
          $has=$VoteRegister->where(array('openid'=>$openid,'award_id'=> $request->get('award_id')))->first();
          if($has){
             return Response::json(
            [
                'success' => false,
                'msg' => '您已经申报过该奖项啦，换个奖项再申请哦，就酱紫',
                'status' => '300'
            ]
        );
          }
         // 初始化 Article 对象
         $VoteRegister->username = $request->get('username'); // 将 POST 提交过了的 title 字段的值赋给 article 的 title 属性
         $VoteRegister->phone=$phone = $request->get('phone'); // 同上
         $VoteRegister->companyname = $request->get('companyname'); // 同上
         $VoteRegister->head = $request->get('head'); // 同上
          $VoteRegister->logo = $request->get('logo'); // 同上
        $VoteRegister->award_id=$awards= $request->get('award_id'); // 同上
         $VoteRegister->brandname= $request->get('brandname'); // 同上
        $VoteRegister->position = $request->get('position'); // 同上
        $VoteRegister->projectname= $request->get('projectname'); // 同上
        $VoteRegister->reason = $request->get('reason'); // 同上
        
        $VoteRegister->openid=$openid;
      
        
        // 将数据保存到数据库，通过判断保存结果，控制页面进行不同跳转
        if ($VoteRegister->save()) {
            $this->send($openid,$nickname,$phone,VoteAward::where('id',$VoteRegister->award_id)->value('name'));
           

           return Response::json(
            [
                'success' => true,
                'msg' => '报名信息提交成功',
                'status' => '200'
            ]
        );
        }else{
             return Response::json(
            [
                'success' => false,
                'msg' => '嗯，由于大家参与热情太高，服务器已经被挤炸了导致添加失败，技术GG正在火速处理中，请稍候再试吧',
                'status' => '300'
            ]
        );
        }
        }else {
           return Response::json(
            [
                'success' => false,
                'msg' => '呃，数据未通过验证，请检查表单是否填写正确再提交吧',
                'status' => '500'
            ]
            );
        }
    }




    public function subs(Request $request)
    {     
       $this->autoLogin();
            $openid='o4d_8shXjlNNvAPLRZy4ve5Dmn3I';
            $awards='2017-2018年度汽车服务连锁十强品牌';
            $phone='13928886425';
            $nickname='丽影豪车汇豪';
           $this->send($request,$openid,$awards,$phone,$nickname);
    }

    /**
      *微信模板消息调用测试接口
      *@author anzichen
      *@data
      *@email
      *@param
      *@param
      *@param
      *@param
    */

    public function send($openid,$nickname,$phone,$award){
           
            $shouquan=new shouquan();
            $res=$shouquan->sendMessage($openid,$nickname,$phone,$award);//调用方法
            

             // $shouquan->sendMessage('o4d_8stUOsFxmq-Cll9HHPM8E3pI','zp','15827400208','777');//调用方法
          }


    public function get(Request $request){
       $this->autoLogin();
          $award_id= $request->get('award_id'); // 同上
          $keyword= $request->get('keyword');
          
         
          if($keyword){
             $lists= VoteRegister::where(function ($query)use ($keyword) {
              $query->where('is_enabled', 1)->where('companyname', 'like','%'.$keyword.'%');
          })->orWhere(function ($query)use ($keyword) {
              $query->where('is_enabled', 1)->where('username', 'like','%'.$keyword.'%');
          })
          ->orWhere(function ($query)use ($keyword) {
              $query->where('is_enabled', 1)->where('brandname', 'like','%'.$keyword.'%');
          })
          ->orWhere(function ($query)use ($keyword) {
              $query->where('is_enabled', 1)->where('projectname', 'like','%'.$keyword.'%');
          })
          ->orderBy('votes', 'desc')
          ->get();

          /*


           $lists= $VoteRegister
          ->where('companyname', 'like','%'.$keyword.'%')
          ->orWhere('username', 'like','%'.$keyword.'%')
          ->orWhere('brandname', 'like','%'.$keyword.'%')
          ->orWhere('projectname', 'like','%'.$keyword.'%')
          ->orderBy('votes', 'desc')
          ->where(function ($query) {
              $query->where('is_enabled', 1);
          })
          ->get();


          */
      }
     else{
         $lists=VoteRegister::where('award_id','=',$award_id)->where('is_enabled','yes') ->orderBy('votes', 'desc')->get();
     }


     foreach($lists as $key=>$val) {
            
          if ($lists[$key]['award_id']==33&&$lists[$key]['award_id']<=56) {   //
              $lists[$key]['photo']=$lists[$key]['logo'];
              $lists[$key]['name']=$lists[$key]['projectname']; 
            }elseif ($lists[$key]['award_id']>=65&&$lists[$key]['award_id']<=69){
              $lists[$key]['photo']=$lists[$key]['head'];
              $lists[$key]['name']=$lists[$key]['username']; 
            } 
            elseif ($lists[$key]['award_id']>=59&&$$lists[$key]['award_id']<=64)){
              $lists[$key]['photo']=$lists[$key]['logo'];
              $lists[$key]['name']=$lists[$key]['companyname']; 
            }        
            else{
              $lists[$key]['photo']=$lists[$key]['logo'];
              $lists[$key]['name']=$lists[$key]['brandname']; 
            }        




            
            $userInfo = $this->getEasyWechatSession();
            $openid= $userInfo['original']['openid'];
            $has=VoteRecord::where('openid',$openid)
              ->where('rid',$lists[$key]['id'])
              ->where('date',date('Y-m-d', time()))
              ->get();
               if($has->first()==''){
                 $lists[$key]['tips']='立即投票';
                  $lists[$key]['style']='';
               }else{
                  $lists[$key]['tips']='已投票';
                  $lists[$key]['style']="dark";
               }
              
        }
      
        // 将数据保存到数据库，通过判断保存结果，控制页面进行不同跳转
        if ($lists->first()!='') {
           return Response::json(
            [
                'success' => true,
                'msg' => '查询到数据',
                'status' => '200',
                'lists'=>$lists
            ]
        );
      }else{
        return Response::json(
            [
                'success' => false,
                'msg' => '未查询到任何数据',
                'status' => '404',
                'lists'=>''
            ]
        );
      }
  }





  public function contact(Request $request){
     
       $this->autoLogin();
        $userInfo = $this->getEasyWechatSession();
        $openid= $userInfo['original']['openid'];
        $nickname=$userInfo['original']['nickname'];
         $IP=$_SERVER['REMOTE_ADDR'];
        $about=About::where('is_enabled','yes')->first();
        DB::table('chebao_visittable')->insert(
        ['visitip' => $IP, 'page'=>'contact','openid'=>$openid,'visittime' => date('Y-m-d H:i:s', time())]);
      $JSSDK=new JSSDK(config('app.appId'),config('app.appSecret'));
        $signPackage = $JSSDK->getSignPackage();
       session(['index'=>'3']);
        return view('vote/contact', 
          compact('ip','about','signPackage'));
    }

     public function laws(Request $request){
       $this->autoLogin();
     
        $userInfo = $this->getEasyWechatSession();
        $openid= $userInfo['original']['openid'];
        $nickname=$userInfo['original']['nickname'];
         $IP=$_SERVER['REMOTE_ADDR'];

        DB::table('chebao_visittable')->insert(
        ['visitip' => $IP, 'page'=>'laws','openid'=>$openid,'visittime' => date('Y-m-d H:i:s', time())]);
      $JSSDK=new JSSDK(config('app.appId'),config('app.appSecret'));
      $info=$this->VoteInfoRepository->getById(1);
        $signPackage = $JSSDK->getSignPackage();
       session(['index'=>'5']);
        return view('vote/laws', 
          compact('ip','signPackage','info'));
    }




    

      public function detail(Request $request){
         $this->autoLogin();
         $id=$request->id;
        $IP=$_SERVER['REMOTE_ADDR'];
          $userInfo = $this->getEasyWechatSession();
        $openid= $userInfo['original']['openid'];
        $nickname=$userInfo['original']['nickname'];
        $JSSDK=new JSSDK(config('app.appId'),config('app.appSecret'));
        $signPackage = $JSSDK->getSignPackage();
        session(['index'=>'']);
         DB::table('chebao_visittable')->insert(
        ['visitip' => $IP, 'page'=>$id,'openid'=>$openid,'visittime' => date('Y-m-d H:i:s', time())]);
         
        
        $info=VoteRegister::where('id', '=',$id)->first();
        if(!$info){
          exit('<script>alert("这个页面貌似走丢了，要不到其他地方逛逛吧吧");window.location.href="/vote";</script>');
        }
          
        $list=DB::table('vote_records')->leftJoin('users', 'vote_records.openid', '=', 'users.openid')
       ->where('vote_records.rid',$id)->groupBy('users.openid')->get();
         
            if ($info['award_id']>=41&&$info['award_id']<=56) {   //
              $info['photo']=$info['logo'];
              $info['name']=$info['projectname']; 
            }elseif ($info['award_id']>=65&&$info['award_id']<=69){
              $info['photo']=$info['head'];
              $info['name']=$info['username']; 
            } elseif ($info['award_id']>=59&&$info['award_id']<=64){
              $info['photo']=$info['logo'];
              $info['name']=$info['companyname']; 
            }else{
              $info['photo']=$info['logo'];
              $info['name']=$info['brandname']; 
            }     
          
           
            $has=VoteRecord::where('openid',$openid)
              ->where('rid',$info['id'])
              ->where('date',date('Y-m-d', time()))
              ->get();
               if($has->first()==''){
                 $info['tips']='立即投票';
                  $info['style']='';
               }else{
                  $info['tips']='已投票';
                  $info['style']="dark";
               }

          $info['visitcounts']= DB::table('chebao_visittable')->where('page',$id)->count();
        return view('vote/detail', 
          [
          'data'=>$info,
          'list'=>$list,
          'signPackage' => $signPackage,
          'nickname'=>$nickname
          ]);
    
}
  public function getComment(Request $request){
    return VoteComment::with(['user'])->where('register_id',$request->id)->paginate(5);
  }
  public function addComment(Request $request){
      $userInfo = $this->getEasyWechatSession();
      $openid= $userInfo['original']['openid'];
      $nickname=$userInfo['original']['nickname'];
      VoteComment::create(array('body' =>$request->content ,'register_id'=>$request->id,'openid'=>$openid));
  }


    public function articledetail(Request $request){
       $this->autoLogin();
      $IP=$_SERVER['REMOTE_ADDR'];
      $url = 'http://ip.taobao.com/service/getIpInfo.php?ip='.$IP; 
        $data = file_get_contents($url); //调用淘宝接口获取信息 
        $json = json_decode($data);
        $country=$json->{'data'}->{'country'};
        $area=$json->{'data'}->{'area'};
        $region=$json->{'data'}->{'region'};
        $city=$json->{'data'}->{'city'};
        $county=$json->{'data'}->{'county'};
        $isp=$json->{'data'}->{'isp'};

        $addr=$country.$area.$region.$city.$county.$isp;
         $JSSDK=new JSSDK(config('app.appId'),config('app.appSecret'));
        $signPackage = $JSSDK->getSignPackage();
          session(['index'=>'3']);
         
         // echo $id;
         $article=new articles;
      $news=$article->where('id', '=',$id)->first();
      $convert=new convert();
      $news->timer=$convert->time_to_timer($news->addtime);
     // print_r($news);
      //echo $news->title;
        return view('vote/articledetail', 
          [
          'news'=>$news,
          'addr'=>$addr,
          'ip'=>$IP,
          'signPackage' => $signPackage
          ]);
    }


    public function vote(Request $request){
       $this->autoLogin();
        $userInfo = $this->getEasyWechatSession();
        $openid= $userInfo['original']['openid'];
        $nickname=$userInfo['original']['nickname'];
        $id=$request->id;
        $register=VoteRegister::where('id',$id)->first();
        $voterecords = new VoteRecord;
        $has=$voterecords
              ->where('openid',$openid)
              ->where('rid',$id)
              ->where('date',date('Y-m-d', time()))
              ->get();
          if($has->first()==''){
               $VoteRegister = new VoteRegister;
               $voterecords->openid =$openid;
               $voterecords->rid =$id;
               $voterecords->date =date('Y-m-d', time());
               $voterecords->save();
              // $voterecords->insert(
       // ['openid' => $openid, 'rid'=>$id,'date' => date('Y-m-d', time())]);
               $handle= $VoteRegister->where('id',$id)->increment('votes');
              if ($handle) {
            $openid1=$openid;
            $title1='恭喜您投票成功!';
            $keyword1=$register->companyname.$register->username;
            $keyword2=date('Y-m-d H:i:s',time());
            $remark1='尊敬的用户“'.$nickname.'”您已经在2018-2019汽车服务行业财富金字塔颁奖盛典投票活动中为“'.$register->companyname.$register->username.'”成功投上一票，赶紧点击此处分享到朋友圈为TA拉到更多票数吧，感谢您对本次活动的积极参与。';
            $template_id1='N4IYJRgoJjHgQ4wdGfgsrVz1duLczJRfkTELRMIUgOw';
           
            $redirect_url='http://www.djcb123.cn/vote/detail/'.$id;

             $template_id2='mOV9Thh16Qg1wBqY6hwibWBmhF_eQmfADvaGnisjFCE';
             $keyword3=$register->votes;
            $openid2=$register->openid;
            $title2='又有小伙伴为您投了一票';
             $remark2='尊敬的用户，又有小伙伴“'.$nickname.'”在2018-2019汽车服务行业财富金字塔颁奖盛典投票活动中为您您申报的“'.$register->companyname.$register->username.'”成功投上一票，赶紧点击此处查看活动详情吧，感谢您的对本次的活动的积极参与。';
            $this->send1($request,$openid1,$title1,$template_id1,$keyword1,$keyword2,$remark1,$redirect_url);
            $this->send2($request,$openid2,$title2,$template_id2,$keyword1,$keyword3,$keyword2,$remark2,$redirect_url);
                 return Response::json(
                  [
                      'success' => true,
                      'msg' => '投票成功',
                      'status' => '200',
                      
                  ]
              );
            }else{
              return Response::json(
                  [
                      'success' => false,
                      'msg' => '投票失败',
                      'status' => '404',
                     
                  ]
              );
            }
          }else{
             return Response::json(
                  [
                      'success' => false,
                      'msg' => '今天已经给他投过了',
                      'status' => '100',
                      
                  ]
              );
          }
        
    }


   public function expXls(){//导出Excel
        $xlsName  = "User";
        $xlsCell  = array(
        array('id','序列'),
        array('username','用户名'),
        array('companyname','公司名'),
        array('phone','联系电话'),
        array('awards','申请奖项'),
        array('申请理由','reason'),
        array('created_at','报名时间'),  
        );
        
        $VoteRegister = new VoteRegister;
        $xlsData  = $VoteRegister->get();
        
        $this->exportExcel($xlsName,$xlsCell,$xlsData);
         
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