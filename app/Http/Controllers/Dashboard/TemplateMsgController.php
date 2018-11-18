<?php

namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;
use App\Models\Log;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;
use App\Repositories\LogRepository;
use Config;
class TemplateMsgController extends Controller
{
    

    public function __construct(LogRepository $logRepository)
    {
        $this->logRepository = $logRepository;
        
    }

    /**
     * Get article list by category
     *
     * @param $slug
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function logs()
    {
        return view('dashboard.templateMsgs.log-list');
    }


    public function ajaxLogs(Request $request)
    {
        $keywords = $request->keywords;
        $where = [];
        if ($request->keywords) {
            $where['k'][] = ['errcode', 'like', "%$keywords%"];
        }

        $lists = $this->logRepository->page($where, Config::get('dashboard.pagesize'));

        return view('dashboard.templateMsgs.ajax-log-list', ['lists' => $lists]);

    }
    /**
     * Show article-info page
     * @param $slug
     * @param Article $articleModel
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($slug, Article $articleModel)
    {
        
    }


    

    public function create()
    {
        
    }

    public function store(ArticleRequest $request)
    {
        
    }

    public function edit($id)
    {
        
    }

    public function update(ArticleRequest $request, $id)
    {
        
    }
}
