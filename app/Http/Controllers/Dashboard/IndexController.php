<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Config;
use DB;

class IndexController extends Controller
{

    public function __construct()
    {
        $this->user = new User();
        $this->role = new Role();
//        $this->permission = new Permission();
    }

    public function index()
    {
//        dd(Config::get('dashboardMenu.leftMenu'));
        return view('dashboard.index.index', ['menu_list' => Config::get('dashboardMenu.leftMenu')]);
    }

    public function welcome()
    {   






        $dayviews = DB::select('SELECT * FROM chebao_dayviews WHERE id > (SELECT MAX(id) FROM chebao_dayviews) - 7');
        //$newUser= DB::select('select count(*) from users where to_days(created_at) = to_days(now())');
       // return $dayviews;
        $start = date('Y-m-d 00:00:00');
        $end = date('Y-m-d H:i:s');
        $newUser=DB::table('users')->whereBetween('created_at', [$start,$end])->count();
        $newSign=DB::table('award_registers')->whereBetween('created_at', [$start,$end])->count();
        //return $newUser;
       $userCounts=DB::select('select sex, Count(*) as count FROM users GROUP BY sex');
        //return $userCounts;
      $articles= DB::connection('mysql2')->select('select title,addtime from new order by addtime desc limit 10');

        foreach($userCounts as $key=>$val) {
           if ($userCounts[$key]->sex==1) {   //
            $userCounts[$key]->label='男'; 
            $userCounts[$key]->color='#2196f3'; 
            $userCounts[$key]->hightlight='#03a9f4'; 
            }elseif ($userCounts[$key]->sex==2) {
                $userCounts[$key]->label='女';  
                $userCounts[$key]->color='#ea5f5f'; 
                $userCounts[$key]->hightlight='#ff0000'; 
            } else{
                $userCounts[$key]->label='未知';
                $userCounts[$key]->color='#a4a6a7'; 
                $userCounts[$key]->hightlight='#000000'; 
            }        
        }
        return view('dashboard.index.welcome',
            [
            'articles'  => $articles,
            'userCounts'=>$userCounts,
            'dayviews' => $dayviews,
            'newUser' => $newUser,
            'newSign' => $newSign
            ]);
      
    }

    /*修改某个表的一个字段值公共方法*/
    public function commonStatusHandle(Request $request)
    {
        $data = $request->all();
        $id = $data['id'];
        $table = $data['table'];
        $column = $data['column'];
        $value = $data['value'];

        $rs = DB::table($table)->where(['id' => $id])->update([$column => $value]);
        if ($rs) return ajaxReturn();
        return ajaxReturnError();
    }

    public function test($model)
    {
        $res = $this->$model->saveFunction();
        dd($res);
    }
}
