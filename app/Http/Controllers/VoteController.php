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
     
         $openid= $request->session()->get('user')['openid'];
        
         $voteInfo=VoteInfo::where('status','ON')->first();
         
         
        $lists= $this->VoteCateryRepository->getAllData(['id', 'name'], false);

        foreach ($lists as $key => $value) {
          $value['award']=VoteAward::where(array('category_id'=>$value['id'],'is_enabled'=>'yes'))->get();
          foreach ($value['award'] as $k => $v) {
          $v['register']=VoteRegister::where(array('award_id'=>$v['id'],'is_enabled'=>'yes'))->get();
          }
        }
       
         
            
        DB::table('chebao_visittable')->insert(
        ['visitip' => $IP, 'page'=>'index','openid'=>$openid,'visittime' => date('Y-m-d H:i:s', time())]);
      $data['regcount']= VoteRegister::distinct('openid')->count();
      $data['visitcount']= DB::table('chebao_visittable')->count();
      $data['visitcount']=$data['visitcount'];
      $data['votecount']=VoteRecord::distinct('openid')->count();
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
        $info=VoteInfo::where('status','ON')->first();
        $award['peopleAward']=VoteAward::where(array('is_enabled'=>'yes','category_id'=>'8'))->get();
        $award['projectAward']=VoteAward::where(array('is_enabled'=>'yes','category_id'=>'6'))->get();
        $award['companyAward']=VoteAward::where('is_enabled','yes')->whereIn('category_id', [5,7])->get();
         $IP=$_SERVER['REMOTE_ADDR'];
        DB::table('chebao_visittable')->insert(
        ['visitip' => $IP, 'page'=>'reg','openid'=>$userInfo['original']['openid'],'visittime' => date('Y-m-d H:i:s', time())]);
      $JSSDK=new JSSDK(config('app.appId'),config('app.appSecret'));
        $signPackage = $JSSDK->getSignPackage();
        session(['index'=>'4']);
        $nickname=$userInfo['nickname'];
      
        return view('vote/reg',compact('nickname','award','signPackage','info')
        );
      
    
      
    }

    public function reg(Request $request)
    {  
       
         $this->autoLogin();
        $userInfo = $this->getEasyWechatSession();
        $IP=$_SERVER['REMOTE_ADDR'];
        DB::table('chebao_visittable')->insert(
        ['visitip' => $IP, 'page'=>'reg','openid'=>$userInfo['original']['openid'],'visittime' => date('Y-m-d H:i:s', time())]);
       $info=VoteInfo::where('status','ON')->first();
        $award['peopleAward']=VoteAward::where(array('is_enabled'=>'yes','category_id'=>'8'))->get();
        $award['projectAward']=VoteAward::where(array('is_enabled'=>'yes','category_id'=>'6'))->get();
        $award['companyAward']=VoteAward::where('is_enabled','yes')->whereIn('category_id', [5,7])->get();
      $JSSDK=new JSSDK(config('app.appId'),config('app.appSecret'));
        $signPackage = $JSSDK->getSignPackage();
       session(['index'=>'4']);
        $nickname=$userInfo['nickname'];
      $is= VoteRegister::where('openid','=',$userInfo['original']['openid'])->where('award_id','>','40')->get();
      //print_r($is);
      
       
      if($is->first()){
        return view('vote/checking',compact('is','signPackage','nickname')); 
      }
      return view('vote/reg',compact('info','award','is','signPackage','nickname')); 
          
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
        ]);
        if ($validator->passes()){
         $VoteRegister = new VoteRegister; // 初始化 Article 对象
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
         $userInfo = $this->getEasyWechatSession();
        $openid= $userInfo['original']['openid'];
        $nickname=$userInfo['original']['nickname'];
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
                'msg' => '添加失败',
                'status' => '300'
            ]
        );
        }
        }else {
           return Response::json(
            [
                'success' => false,
                'msg' => '数据未通过验证，请检查表单是否填写正确',
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
            
          if ($lists[$key]['c2']==33) {   //
              $lists[$key]['photo']=$lists[$key]['logo'];
              $lists[$key]['name']=$lists[$key]['projectname']; 
            }elseif ($lists[$key]['c2']==34||$lists[$key]['c2']==1){
              $lists[$key]['photo']=$lists[$key]['head'];
              $lists[$key]['name']=$lists[$key]['username']; 
            } 
            elseif ($lists[$key]['c2']==31||$lists[$key]['c2']==32||$lists[$key]['c2']==36){
              $lists[$key]['photo']=$lists[$key]['logo'];
              $lists[$key]['name']=$lists[$key]['companyname']; 
            }        
            else{
              $lists[$key]['photo']=$lists[$key]['logo'];
              $lists[$key]['name']=$lists[$key]['brandname']; 
            }        




            
             $openid= $request->session()->get('user')['openid'];
           
            $has=VoteRecord::where('openid',$openid)
              ->where('cid',$lists[$key]['id'])
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
        $openid= $request->session()->get('user')['openid'];
        $nickname= $request->session()->get('user')['nickname'];
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
     
        $openid= $request->session()->get('user')['openid'];
        $nickname= $request->session()->get('user')['nickname'];
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
           $openid= $request->session()->get('user')['openid'];
        $JSSDK=new JSSDK(config('app.appId'),config('app.appSecret'));
        $signPackage = $JSSDK->getSignPackage();
        session(['index'=>'']);
         DB::table('chebao_visittable')->insert(
        ['visitip' => $IP, 'page'=>$id,'openid'=>$openid,'visittime' => date('Y-m-d H:i:s', time())]);
         
        
        $info=VoteRegister::where('id', '=',$id)->first();
        // print_r($news);
        //echo $news->title;
          $voterecords = new voterecords;
          $list=DB::table('voterecords')->leftJoin('users', 'voterecords.openid', '=', 'users.openid')
       ->where('voterecords.cid',$id)->groupBy('users.openid')->get();
         
            if ($info['c2']==33) {   //
              $info['photo']=$info['logo'];
              $info['name']=$info['projectname']; 
            }elseif ($info['c2']==1||$info['c2']==34){
              $info['photo']=$info['head'];
              $info['name']=$info['username']; 
            } elseif ($info['c2']==31||$info['c2']==32||$info['c2']==36){
              $info['photo']=$info['head'];
              $info['name']=$info['companyname']; 
            }else{
              $info['photo']=$info['logo'];
              $info['name']=$info['brandname']; 
            }     
          
           
            $has=$voterecords
              ->where('openid',$openid)
              ->where('cid',$info['id'])
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
          'signPackage' => $signPackage
          ]);
    
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
        $voterecords = new voterecords;
        $has=$voterecords
              ->where('openid',$openid)
              ->where('cid',$id)
              ->where('date',date('Y-m-d', time()))
              ->get();
          if($has->first()==''){
               $VoteRegister = new VoteRegister;
               $voterecords->openid =$openid;
               $voterecords->cid =$id;
               $voterecords->date =date('Y-m-d', time());
               $voterecords->save();
              // $voterecords->insert(
       // ['openid' => $openid, 'cid'=>$id,'date' => date('Y-m-d', time())]);
               $handle= $VoteRegister->where('id',$id)->increment('votes');
              if ($handle) {
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



}