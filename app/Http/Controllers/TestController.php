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

class TestController extends BaseController
{   

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
     public function __construct(AboutRepository $about,VoteInfoRepository $VoteInfoRepository,VoteCategoryRepository $VoteCategoryRepository)
    {

      
      $this->about = $about;
      $this->VoteInfoRepository = $VoteInfoRepository;
      $this->VoteCateryRepository = $VoteCategoryRepository;
    }
    public function index(Request $request)
    {
      $lists=VoteCategory::where('is_enabled','yes')->get();

        foreach ($lists as $key => $value) {
          $value['award']=VoteAward::where(array('category_id'=>$value['id'],'is_enabled'=>'yes'))->get();
          foreach ($value['award'] as $k => $v) {
          $v['register']=VoteRegister::where(array('award_id'=>$v['id'],'is_enabled'=>'yes'))->orderBy('votes','desc')->get();
          }
        }
       foreach ($lists as $key => $value) {
          foreach ($value['award'] as $k => $v) {
             foreach ($v['register'] as $m => $n) {
          if ($n['award_id']>=41&&$n['award_id']<=58) {   //
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
      print_r($lists);
    }
  }