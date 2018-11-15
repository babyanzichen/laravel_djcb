<?php

namespace App\Http\Controllers\Dashboard;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\RoleRepository;
use App\Repositories\RaceRepository;
use shouquan;
use Config;
use Auth;
use DB;
use page;
use App\race;
class RaceController extends Controller
{
    protected $userRepository;
    protected $roleRepository;
    protected $RaceRepository;



    public function __construct(RaceRepository $RaceRepository, RoleRepository $roleRepository)
    {
        $this->RaceRepository = $RaceRepository;
        $this->roleRepository = $roleRepository;
    }

    public function lists()
    {
        return view('dashboard.race.lists');
    }

    public function ajaxGets(Request $request)
    {
        $keywords = $request->keywords;
        $where = [];
        if ($request->keywords) {
            $where['k1'][] = ['username', 'like', "%$keywords%"];
            $where['k2'][] = ['nickname', 'like', "%$keywords%"];
            $where['k3'][] = ['phone', 'like', "%$keywords%"];
           
        }

        $list = $this->RaceRepository->page($where, Config::get('dashboard.pagesize'));
        
        return view('dashboard.race.ajax-list', ['lists' => $list]);

    }
}
