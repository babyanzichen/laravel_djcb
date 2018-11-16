<?php

namespace App\Http\Controllers\Dashboard;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreVoteRegisterRequest;
use App\Http\Requests\UpdateVoteRegisterRequest;
use App\Http\Requests\UpdateVoteRuleRequest;
use App\Http\Requests\UpdateVoteAwardRequest;
use App\Http\Requests\UpdateVoteCategoryRequest;
use App\Repositories\VoteRuleRepository;
use App\Repositories\VoteRegisterRepository;
use App\Repositories\VoteAwardRepository;
use App\Repositories\VoteCategoryRepository;
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



    public function __construct(VoteRegisterRepository $VoteRegisterRepository, VoteRuleRepository $VoteRuleRepository, VoteAwardRepository $VoteAwardRepository, VoteCategoryRepository $VoteCategoryRepository)
    {
        $this->VoteRegisterRepository = $VoteRegisterRepository;
        $this->VoteRuleRepository = $VoteRuleRepository;
        $this->VoteAwardRepository = $VoteAwardRepository;
        $this->VoteCategoryRepository = $VoteCategoryRepository;
    }
    /**
    *评选列表
    */
    public function index()
    {
        return view('Dashboard.vote.index');
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
        $awardList = $this->VoteAwardRepository->getAllData(['id', 'name'], false);
        $info = $this->VoteRegisterRepository->getById($id);
        return view('dashboard.vote.edit',compact('awardList','info'));
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


    /*
    活动规则
    */
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
    
    /*
    奖项列表
    */
    public function awards()
    {
        return view('dashboard.vote.award-list');
    }

    public function ajaxGetAwards(Request $request)
    {
        $keywords = $request->keywords;
        $where = [];
        if ($request->keywords) {
            $where['k1'][] = ['companyname', 'like', "%$keywords%"];
            $where['k2'][] = ['username', 'like', "%$keywords%"];
            $where['k3'][] = ['projectname', 'like', "%$keywords%"];
            $where['k4'][] = ['brandname', 'like', "%$keywords%"];
        }

        $lists = $this->VoteAwardRepository->page($where, Config::get('dashboard.pagesize'));
        
        return view('dashboard.vote.ajax-award-list', compact('lists'));

    }
    

    public function award_edit($id)
    {
        $info=$this->VoteAwardRepository->getById($id);

        return view('dashboard.vote.award-edit', compact('info'));
    }
    public function award_update(UpdateVoteAwardRequest $request, $id)
    {
        $data = $request->all();
        
        $this->VoteAwardRepository->update($id, $data);
        return ajaxReturn(dashboardUrl('/vote/awards'));
    }
    
    /*
    奖项分类
    */
    public function categorys()
    {
        return view('dashboard.vote.category-list');
    }

    public function ajaxGetcategorys(Request $request)
    {
        $keywords = $request->keywords;
        $where = [];
        if ($request->keywords) {
            $where['k1'][] = ['companyname', 'like', "%$keywords%"];
            $where['k2'][] = ['username', 'like', "%$keywords%"];
            $where['k3'][] = ['projectname', 'like', "%$keywords%"];
            $where['k4'][] = ['brandname', 'like', "%$keywords%"];
        }

        $lists = $this->VoteCategoryRepository->page($where, Config::get('dashboard.pagesize'));
        
        return view('dashboard.vote.ajax-category-list', compact('lists'));

    }
    

    public function category_edit($id)
    {
        $info=$this->VoteCategoryRepository->getById($id);

        return view('dashboard.vote.category-edit', compact('info'));
    }
    public function category_update(UpdateVoteAwardRequest $request, $id)
    {
        $data = $request->all();
        
        $this->VoteAwardRepository->update($id, $data);
        return ajaxReturn(dashboardUrl('/vote/awards'));
    }


   



    



    
}
