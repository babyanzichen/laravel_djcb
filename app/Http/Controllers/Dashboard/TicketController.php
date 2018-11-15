<?php

namespace App\Http\Controllers\Dashboard;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\TicketorderRepository;
use shouquan;
use Config;
use Auth;
use DB;
use page;
use App\ticketorders;
class TicketController extends Controller
{
    protected $userRepository;
    protected $roleRepository;
    protected $TicketorderRepository;



    public function __construct(TicketorderRepository $TicketorderRepository)
    {
        $this->TicketorderRepository = $TicketorderRepository;
       
    }

    public function lists()
    {
        return view('dashboard.ticket.lists');
    }

    public function ajaxGets(Request $request)
    {
        $keywords = $request->keywords;
        $where = [];
        if ($request->keywords) {
            $where['k1'][] = ['phone', 'like', "%$keywords%"];
            $where['k2'][] = ['username', 'like', "%$keywords%"];
            $where['k3'][] = ['city', 'like', "%$keywords%"];
            $where['k4'][] = ['ordersn', 'like', "%$keywords%"];
           
        }

        $list = $this->TicketorderRepository->page($where, Config::get('dashboard.pagesize'));
        
        return view('dashboard.ticket.ajax-list', ['lists' => $list]);

    }
}