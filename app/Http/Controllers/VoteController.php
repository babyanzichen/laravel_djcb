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
use Redirect, Input, Response;
use Illuminate\Support\Facades\Session; 
use App\Models\VoteRegister;
use App\voterecords; 
use App\Models\VoteInfo; 
use App\Models\About;
use App\Repositories\AboutRepository;
use App\Repositories\VoteRuleRepository;
class VoteController extends BaseController
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
     public function __construct(AboutRepository $about,VoteRuleRepository $VoteRuleRepository)
    {
        $this->about = $about;
         $this->VoteRuleRepository = $VoteRuleRepository;
    }
    public function index(Request $request)
    {
      //$this->check($request,'vote/index');
     $IP=$_SERVER['REMOTE_ADDR'];
      /*$url = 'http://ip.taobao.com/service/getIpInfo.php?ip='.$IP; 
        $data = file_get_contents($url); //调用淘宝接口获取信息 
        $json = json_decode($data);
        $country=$json->{'data'}->{'country'};
        $area=$json->{'data'}->{'area'};
        $region=$json->{'data'}->{'region'};
        $city=$json->{'data'}->{'city'};
        $county=$json->{'data'}->{'county'};
        $isp=$json->{'data'}->{'isp'};

        $addr=$country.$area.$region.$city.$county.$isp;*/
         $openid= $request->session()->get('user')['openid'];
        
         $voteInfo=VoteInfo::where('status','ON')->first();
         
         
        $lists1= VoteRegister::where('c1','=','1') ->where('status','1') ->orderBy('votes', 'desc')->limit(10)->get();
         
         foreach($lists1 as $key=>$val) {
            if ($lists1[$key]['c2']==1) {   //
              $lists1[$key]['photo']=$lists1[$key]['head'];
              $lists1[$key]['name']=$lists1[$key]['username']; 
            } else{
              $lists1[$key]['photo']=$lists1[$key]['logo'];
              $lists1[$key]['name']=$lists1[$key]['brandname']; 
            }            






                
            $voterecords = new voterecords;
            $has=$voterecords
              ->where('openid',$openid)
              ->where('cid',$lists1[$key]['id'])
              ->where('date',date('Y-m-d', time()))
              ->get();
               if($has->first()==''){
                 $lists1[$key]['tips']='立即投票';
                  $lists1[$key]['style']='';
               }else{
                  $lists1[$key]['tips']='已投票';
                  $lists1[$key]['style']="dark";
               }
                  
            }
           
          $lists2= VoteRegister::where('c1','=','2')->where('status','1')  ->orderBy('votes', 'desc')->limit(10)->get();
         
         foreach($lists2 as $key=>$val) {
                //
                $lists2[$key]['photo']=$lists2[$key]['logo'].$lists2[$key]['head']; 
                $voterecords = new voterecords;
            $has=$voterecords
              ->where('openid',$openid)
              ->where('cid',$lists2[$key]['id'])
              ->where('date',date('Y-m-d', time()))
              ->get();
               if($has->first()==''){
                 $lists2[$key]['tips']='立即投票';
                  $lists2[$key]['style']='';
               }else{
                  $lists2[$key]['tips']='已投票';
                  $lists2[$key]['style']="dark";
               }
                  
            }
            
          $lists3= VoteRegister::where('c1','=','3')->where('status','1')  ->orderBy('votes', 'desc')->limit(10)->get();
         
         foreach($lists3 as $key=>$val) {
                //
                $lists3[$key]['photo']=$lists3[$key]['logo'].$lists3[$key]['head']; 
                $voterecords = new voterecords;
            $has=$voterecords
              ->where('openid',$openid)
              ->where('cid',$lists3[$key]['id'])
              ->where('date',date('Y-m-d', time()))
              ->get();
               if($has->first()==''){
                 $lists3[$key]['tips']='立即投票';
                  $lists3[$key]['style']='';
               }else{
                  $lists3[$key]['tips']='已投票';
                  $lists3[$key]['style']="dark";
               }
                  
            }
            
          $lists4= VoteRegister::where('c1','=','4')->where('status','1')  ->orderBy('votes', 'desc')->limit(10)->get();
         
         foreach($lists4 as $key=>$val) {
               if ($lists4[$key]['c2']==33) {   //
              $lists4[$key]['photo']=$lists4[$key]['logo'];
              $lists4[$key]['name']=$lists4[$key]['projectname']; 
            }elseif ($lists4[$key]['c2']==34){
              $lists4[$key]['photo']=$lists4[$key]['head'];
              $lists4[$key]['name']=$lists4[$key]['username']; 
            }      
            else{
              $lists4[$key]['photo']=$lists4[$key]['logo'];
              $lists4[$key]['name']=$lists4[$key]['companyname']; 
            }        

           
            $has=$VoteRecord::where('openid',$openid)
              ->where('cid',$lists4[$key]['id'])
              ->where('date',date('Y-m-d', time()))
              ->first();
               if($has==''){
                 $lists4[$key]['tips']='立即投票';
                  $lists4[$key]['style']='';
               }else{
                  $lists4[$key]['tips']='已投票';
                  $lists4[$key]['style']="dark";
               }
                  
            }
       
            
        DB::table('chebao_visittable')->insert(
        ['visitip' => $IP, 'page'=>'index','openid'=>$openid,'visittime' => date('Y-m-d H:i:s', time())]);
      $data['regcount']= VoteRegister::distinct('openid')->count();
      $data['visitcount']= DB::table('chebao_visittable')->count();
      $data['visitcount']=$data['visitcount']+60000;
      $data['votecount']= DB::table('voterecords')->distinct('openid')->count();
      $data['votecount']=$data['votecount']+10000;
     
    	$JSSDK=new JSSDK(config('app.appId'),config('app.appSecret'));
      	$signPackage = $JSSDK->getSignPackage();
       session(['index'=>'1']);
    	return view('vote/index', 
          compact( 'lists1','lists2','lists3','lists4','data','ip','voteInfo','signPackage')
        //  'addr'=>$addr,
        );
    }

    public function regs(Request $request)
    { 
        $this->check($request,'vote/regs');
     
      /*$url = 'http://ip.taobao.com/service/getIpInfo.php?ip='.$IP; 
        $data = file_get_contents($url); //调用淘宝接口获取信息 
        $json = json_decode($data);
        $country=$json->{'data'}->{'country'};
        $area=$json->{'data'}->{'area'};
        $region=$json->{'data'}->{'region'};
        $city=$json->{'data'}->{'city'};
        $county=$json->{'data'}->{'county'};
        $isp=$json->{'data'}->{'isp'};

        $addr=$country.$area.$region.$city.$county.$isp;
        */
        $openid= $request->session()->get('user')['openid'];
        $nickname= $request->session()->get('user')['nickname'];
       // DB::table('chebao_visittable')->insert(
       // ['visitip' => $IP, 'addr' => $addr,'openid'=>$openid,'visittime' => date('Y-m-d H:i:s', time())]);
         $IP=$_SERVER['REMOTE_ADDR'];
        DB::table('chebao_visittable')->insert(
        ['visitip' => $IP, 'page'=>'reg','openid'=>$openid,'visittime' => date('Y-m-d H:i:s', time())]);
      $JSSDK=new JSSDK(config('app.appId'),config('app.appSecret'));
        $signPackage = $JSSDK->getSignPackage();
       session(['index'=>'4']);
     
      
        return view('vote/reg', 
          [
          
          'nickname'=>$nickname,
         
          'signPackage' => $signPackage
          ]
        );
      
    
      
    }

    public function reg(Request $request)
    {  
        $this->check($request,'vote/reg');
     
        $openid= $request->session()->get('user')['openid'];
        $nickname= $request->session()->get('user')['nickname'];
        $IP=$_SERVER['REMOTE_ADDR'];
        DB::table('chebao_visittable')->insert(
        ['visitip' => $IP, 'page'=>'reg','openid'=>$openid,'visittime' => date('Y-m-d H:i:s', time())]);
       
      $JSSDK=new JSSDK(config('app.appId'),config('app.appSecret'));
        $signPackage = $JSSDK->getSignPackage();
       session(['index'=>'4']);
      $VoteRegister = new VoteRegister;
      $is= $VoteRegister->where('openid','=',$openid)->get();
      //print_r($is);
      
          
    
          return view('vote/checking',[
          'is'=>$is,
          'nickname'=>$nickname,
          'signPackage' => $signPackage
          ]); 
    }

    public function lists(Request $request)
    { 
       $this->check($request,'vote/lists');
     
        $openid= $request->session()->get('user')['openid'];
        $nickname= $request->session()->get('user')['nickname'];
       $IP=$_SERVER['REMOTE_ADDR'];
        DB::table('chebao_visittable')->insert(
        ['visitip' => $IP, 'page'=>'lists','openid'=>$openid,'visittime' => date('Y-m-d H:i:s', time())]);
    	$JSSDK=new JSSDK(config('app.appId'),config('app.appSecret'));
      	$signPackage = $JSSDK->getSignPackage();
         session(['index'=>'2']);
         $VoteRegister = new VoteRegister;
      $lists= $VoteRegister->where('status','=','1')->get();
      //var_dump($lists);
    	return view('vote/lists', 
          [
          'signPackage' => $signPackage,
          'lists' => $lists
          ]
        );
    }
    public function positive(Request $request)
    {  
    	 $this->check($request,'vote/positive');
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
    	$this->check($request,'vote/newslist');
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
        $VoteRegister->awards=$awards= $request->get('awards'); // 同上
         $VoteRegister->brandname= $request->get('brandname'); // 同上
        $VoteRegister->position = $request->get('position'); // 同上
        $VoteRegister->projectname= $request->get('projectname'); // 同上
        $VoteRegister->reason = $request->get('reason'); // 同上
        $VoteRegister->openid=$openid= $request->session()->get('user')['openid'];
       $nickname= $request->session()->get('user')['nickname'];
        
        // 将数据保存到数据库，通过判断保存结果，控制页面进行不同跳转
        if ($VoteRegister->save()) {
            $this->send($request,$openid,$awards,$phone,$nickname);
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
            $openid='o4d_8shXjlNNvAPLRZy4ve5Dmn3I';
            $awards='2017-2018年度汽车服务连锁十强品牌';
            $phone='13928886425';
            $nickname='丽影豪车汇豪';
           $this->send($request,$openid,$awards,$phone,$nickname);
    }


    public function get(Request $request){
          $c1= $request->get('c1'); // 同上
          $c2= $request->get('c2'); // 同上
          $keyword= $request->get('keyword');
           $VoteRegister = new VoteRegister;
         
          if($keyword){
             $lists= $VoteRegister
             ->where(function ($query)use ($keyword) {
              $query->where('status', 1)->where('companyname', 'like','%'.$keyword.'%');
          })->orWhere(function ($query)use ($keyword) {
              $query->where('status', 1)->where('username', 'like','%'.$keyword.'%');
          })
          ->orWhere(function ($query)use ($keyword) {
              $query->where('status', 1)->where('brandname', 'like','%'.$keyword.'%');
          })
          ->orWhere(function ($query)use ($keyword) {
              $query->where('status', 1)->where('projectname', 'like','%'.$keyword.'%');
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
              $query->where('status', 1);
          })
          ->get();


          */
      }
     else{
         $lists= $VoteRegister->where('c2','=',$c2)->where('status','1') ->orderBy('votes', 'desc')->get();
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
           $voterecords = new voterecords;
            $has=$voterecords
              ->where('openid',$openid)
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
        $this->check($request,'vote/contact');
     
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
            $this->check($request,'vote/laws');
     
        $openid= $request->session()->get('user')['openid'];
        $nickname= $request->session()->get('user')['nickname'];
         $IP=$_SERVER['REMOTE_ADDR'];

        DB::table('chebao_visittable')->insert(
        ['visitip' => $IP, 'page'=>'laws','openid'=>$openid,'visittime' => date('Y-m-d H:i:s', time())]);
      $JSSDK=new JSSDK(config('app.appId'),config('app.appSecret'));
      $info=$this->VoteRuleRepository->getById(1);
        $signPackage = $JSSDK->getSignPackage();
       session(['index'=>'5']);
        return view('vote/laws', 
          compact('ip','signPackage','info'));
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

    public function send(){
           
            $shouquan=new shouquan();
           // $shouquan->sendMessage($openid,$nickname,$phone,$award);//调用方法
             $shouquan->sendMessage('o4d_8stUOsFxmq-Cll9HHPM8E3pI','zp','15827400208','777');//调用方法
          }

    

      public function detail(Request $request){
        
        $id=$request->route('id');

        $this->check($request,'vote/detail/'.$id);
        $IP=$_SERVER['REMOTE_ADDR'];
           $openid= $request->session()->get('user')['openid'];
        $JSSDK=new JSSDK(config('app.appId'),config('app.appSecret'));
        $signPackage = $JSSDK->getSignPackage();
        session(['index'=>'']);
         DB::table('chebao_visittable')->insert(
        ['visitip' => $IP, 'page'=>$id,'openid'=>$openid,'visittime' => date('Y-m-d H:i:s', time())]);
         
         $VoteRegister=new VoteRegister;
        $info=$VoteRegister->where('id', '=',$id)->first();
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
       $id=$request->route('id');
       $this->check($request,'vote/articledetail/'.$id);
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
       $id=$request->route('id');
        $openid= $request->session()->get('user')['openid'];
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