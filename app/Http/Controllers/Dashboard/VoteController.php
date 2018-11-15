<?php

namespace App\Http\Controllers\Dashboard;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreVoteRegisterRequest;
use App\Http\Requests\UpdateVoteRegisterRequest;
use App\Http\Requests\UpdateVoteRuleRequest;
use App\Repositories\VoteRuleRepository;
use App\Repositories\VoteRegisterRepository;
use shouquan;
use Config;
use Auth;
use DB;
use page;
use App\VoteRegister;
class VoteController extends Controller
{
    protected $userRepository;
    protected $roleRepository;
    protected $VoteRegisterRepository;



    public function __construct(VoteRegisterRepository $VoteRegisterRepository, VoteRuleRepository $VoteRuleRepository)
    {
        $this->VoteRegisterRepository = $VoteRegisterRepository;
        $this->VoteRuleRepository = $VoteRuleRepository;
    }

    public function lists()
    {
        return view('dashboard.vote.lists');
    }

    public function ajaxGets(Request $request)
    {
        $keywords = $request->keywords;
        $where = [];
        if ($request->keywords) {
            $where['k1'][] = ['companyname', 'like', "%$keywords%"];
            $where['k2'][] = ['username', 'like', "%$keywords%"];
            $where['k3'][] = ['projectname', 'like', "%$keywords%"];
            $where['k4'][] = ['brandname', 'like', "%$keywords%"];
        }

        $list = $this->VoteRegisterRepository->page($where, Config::get('dashboard.pagesize'));
        foreach($list as $key=>$val) {
            
            $list[$key]['photo']=$list[$key]['logo'].$list[$key]['head']; 
        }
        return view('dashboard.vote.ajax-list', ['lists' => $list]);

    }
    public function rules()
    {
        return view('dashboard.vote.rule-list');
    }

    public function ajaxGetRules(Request $request)
    {
        $keywords = $request->keywords;
        $where = [];
        if ($request->keywords) {
            $where['k1'][] = ['companyname', 'like', "%$keywords%"];
            $where['k2'][] = ['username', 'like', "%$keywords%"];
            $where['k3'][] = ['projectname', 'like', "%$keywords%"];
            $where['k4'][] = ['brandname', 'like', "%$keywords%"];
        }

        $lists = $this->VoteRuleRepository->page($where, Config::get('dashboard.pagesize'));
        
        return view('dashboard.vote.ajax-rule-list', compact('lists'));

    }
    public function create()
    {
        return view('dashboard.users.create');
    }

    public function store(StoreUserRequest $request)
    {
        $data = array_merge($request->all(), [
            'avatar' => '/assets/dashboard/images/head_default.gif',
            'register_source' => 'admin',
            'password' => bcrypt($request->password),
            'status' => 1
        ]);
        $this->userRepository->store($data);
        return ajaxReturn(dashboardUrl('/user'));
    }

    public function edit($id)
    {
        return view('dashboard.vote.edit', ['info' => $this->VoteRegisterRepository->getById($id)]);
    }

    public function rule_edit($id)
    {
        $info=$this->VoteRuleRepository->getById($id);

        return view('dashboard.vote.rule-edit', compact('info'));
    }
    public function rule_update(UpdateVoteRuleRequest $request, $id)
    {
        $data = $request->all();
        
        $this->VoteRuleRepository->update($id, $data);
        return ajaxReturn(dashboardUrl('/vote/rules'));
    }
    public function update(UpdateVoteRegisterRequest $request, $id)
    {
        $data = $request->all();
        
        $this->VoteRegisterRepository->update($id, $data);
       if($request->input('status')==1){

        $this->passSend($id,$request->input('openid'),$request->input('awards'));
       }



        return ajaxReturn(dashboardUrl('/vote'));
    }

    public function destroy($id)
    {
        if (Auth::user()->id == $id) {
            return ajaxReturnError('', 0, '您不能删除您自己');
        }
        $user = $this->userRepository->getById($id);
        $article = $user->articles()->count();
        $question = $user->questions()->count();
        if( $article > 0 || $question > 0) return ajaxReturnError('', 0, '用户发表过文章或问题，不允许删除');

        $this->userRepository->syncRole([], $id);
        $this->userRepository->destroy($id);

        return ajaxReturn(redirect()->back());
    }

    public function passSend($id,$openid,$awards){
           
            $shouquan=new shouquan();
            $shouquan->passMessage($id,$openid,$awards);//调用方法
          }




    public function giveUserRoles(Request $request)
    {
        $roles = $this->userRepository->getById($request->id)->cachedRoles();
        return response()->json(
            ajaxReturn('', 1, '成功',
                roleOrPermissionDataHandle(array_column($roles->toArray(), 'id'), $this->roleRepository->getAllData(['id', 'name', 'display_name'])
                )));
    }

    public function giveUserRolesStore(Request $request)
    {
        $ids = [];
        if ($request->data) {
            $ids = explode(',', $request->data);
        }
        $this->userRepository->syncRole($ids, $request->id);
        return ajaxReturn(redirect()->back());
    }



    public function index()
    {
        return view('Dashboard.vote.index');
    }



    public function getUser(Request $request)
    {   
        $limit = $request->get('limit'); //一页显示的行数  
        $curpage = empty( $request->get('page')) ? 1 :$request->get('page');
        $url="";
        $res['code']='0';
        $res['msg']="success";
       if($request->get('keywords')!=''){
            $keywords=$request->get('keywords');
            $count= Users::where('nickname',$keywords)
            ->count();
            $res['count']=$count;
            $res['data'] = Users::where('nickname',$keywords)
                ->orderBy('created_at', 'desc')
                ->offset(($curpage - 1) * $limit)
                ->limit($limit)
                ->get();
       }else{
            $count=Users::count();
            $res['count']=$count;
            $res['data'] = Users::orderBy('created_at', 'desc')
                ->offset(($curpage - 1) * $limit)
                ->limit($limit)
                ->get();
       }
       //return $res['data'];
        foreach($res['data'] as $key=>$val) {
           if ($res['data'][$key]['sex']==1) {   //
            $res['data'][$key]['female']="男"; 
            }elseif ($res['data'][$key]['sex']==2) {
                $res['data'][$key]['female']="女"; 
            } else{
                $res['data'][$key]['female']="未知"; 
            }        
        }
        return response()->json($res);
    }


    public function getUserCate(){
         $userCounts=DB::select('select sex, Count(*) as count FROM users GROUP BY sex');
        //return $userCounts;
      
        foreach($userCounts as $key=>$val) {
           if ($userCounts[$key]->sex==1) {   //
            $userCounts[$key]->female='男'; 
            $userCounts[$key]->color='#2196f3'; 
            $userCounts[$key]->hightlight='#03a9f4'; 
            }elseif ($userCounts[$key]->sex==2) {
                $userCounts[$key]->female='女';  
                $userCounts[$key]->color='#ea5f5f'; 
                $userCounts[$key]->hightlight='#ff0000'; 
            } else{
                $userCounts[$key]->female='未知';
                $userCounts[$key]->color='#a4a6a7'; 
                $userCounts[$key]->hightlight='#000000'; 
            }        
        }
       
        return response()->json($userCounts);
     }
}
