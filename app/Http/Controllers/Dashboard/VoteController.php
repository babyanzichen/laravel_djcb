<?php

namespace App\Http\Controllers\Dashboard;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreVoteRegisterRequest;
use App\Http\Requests\StoreVoteCategoryRequest;
use App\Http\Requests\StoreVoteAwardRequest;
use App\Http\Requests\UpdateVoteRegisterRequest;
use App\Http\Requests\UpdateVoteInfoRequest;
use App\Http\Requests\UpdateVoteAwardRequest;
use App\Http\Requests\UpdateVoteCategoryRequest;
use App\Repositories\VoteInfoRepository;
use App\Repositories\VoteRegisterRepository;
use App\Repositories\VoteAwardRepository;
use App\Repositories\VoteCategoryRepository;
use shouquan;
use Config;
use Auth;
use DB;
use page;
use App\Models\VoteRegister;
class VoteController extends Controller
{
    protected $userRepository;
    protected $roleRepository;
    protected $VoteRegisterRepository;



    public function __construct(VoteRegisterRepository $VoteRegisterRepository, VoteInfoRepository $VoteInfoRepository, VoteAwardRepository $VoteAwardRepository, VoteCategoryRepository $VoteCategoryRepository)
    {
        $this->VoteRegisterRepository = $VoteRegisterRepository;
        $this->VoteInfoRepository = $VoteInfoRepository;
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
        $awardList = $this->VoteAwardRepository->getAllData(['id', 'name'], false);
        return view('dashboard.vote.create',compact('awardList'));
    }

    public function store(StoreVoteRegisterRequest $request)
    {
        $data = $request->all();
        
        $this->VoteRegisterRepository->store($data);
        return ajaxReturn(dashboardUrl('/vote'));
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
        $VoteRegister=VoteRegister::with(['award'])->find($id);
       if($request->input('is_enabled')=='yes'){

        $this->passSend($id,$VoteRegister->openid,$VoteRegister->award->name);
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
    public function infos()
    {
        return view('dashboard.vote.info-list');
    }

    public function ajaxGetInfos(Request $request)
    {
        $keywords = $request->keywords;
        $where = [];
        if ($request->keywords) {
            $where['k1'][] = ['name', 'like', "%$keywords%"];
            $where['k2'][] = ['address', 'like', "%$keywords%"];
        }

        $lists = $this->VoteInfoRepository->page($where, Config::get('dashboard.pagesize'));
        
        return view('dashboard.vote.ajax-info-list', compact('lists'));

    }
    

    public function info_edit($id)
    {
        $info=$this->VoteInfoRepository->getById($id);

        return view('dashboard.vote.info-edit', compact('info'));
    }
    public function info_update(UpdateVoteInfoRequest $request, $id)
    {
        $data = $request->all();
        
        $this->VoteInfoRepository->update($id, $data);
        return ajaxReturn(dashboardUrl('/vote/infos'));
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
            $where['k1'][] = ['name', 'like', "%$keywords%"];
        }

        $lists = $this->VoteAwardRepository->page($where, Config::get('dashboard.pagesize'));
        
        return view('dashboard.vote.ajax-award-list', compact('lists'));

    }
    

    public function award_edit($id)
    {
        $info=$this->VoteAwardRepository->getById($id);
         $cateLists = $this->VoteCategoryRepository->getAllData(['id', 'name'], false);
        return view('dashboard.vote.award-edit', compact('info','cateLists'));
    }
    public function award_update(UpdateVoteAwardRequest $request, $id)
    {
        $data = $request->all();
        
        $this->VoteAwardRepository->update($id, $data);
        return ajaxReturn(dashboardUrl('/vote/awards'));
    }
    public function award_create()
    {   
        $cateLists = $this->VoteCategoryRepository->getAllData(['id', 'name'], false);
        return view('dashboard.vote.award-create',compact('cateLists'));
    }

    public function award_store(StoreVoteAwardRequest $request)
    {
        $data = $request->all();
        $this->VoteAwardRepository->store($data);
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
            $where['k1'][] = ['name', 'like', "%$keywords%"];
            
        }

        $lists = $this->VoteCategoryRepository->page($where, Config::get('dashboard.pagesize'));
        
        return view('dashboard.vote.ajax-category-list', compact('lists'));

    }
    

    public function category_edit($id)
    {
        $info=$this->VoteCategoryRepository->getById($id);

        return view('dashboard.vote.category-edit', compact('info'));
    }
    public function category_update(UpdateVoteCategoryRequest $request, $id)
    {
        $data = $request->all();
        
        $this->VoteCategoryRepository->update($id, $data);
        return ajaxReturn(dashboardUrl('/vote/categorys'));
    }

    public function category_create()
    {   
        
        return view('dashboard.vote.category-create');
    }

    public function category_store(StoreVoteCategoryRequest $request)
    {
        $data = $request->all();
        $this->VoteCategoryRepository->store($data);
        return ajaxReturn(dashboardUrl('/vote/categorys'));
    }
   



    



    
}
