<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Auth;
use convert;
class HomeController extends Controller
{   
	/**
	 * 判断是否为管理员
	 */

	public function __construct()
	{
		if($this->middleware('auth'));
		$user = User::find(Auth::id());
		$admin = $user->admin;
		if($admin != 1)
		{
			Auth::logout();
		}
	}
	
    public function index()
    {   
       $name= User::find(Auth::id())->name;
        return view('admin.home',[
        	'name' => $name
        	]);
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
      $articles= DB::connection('mysql2')->select('select title,addtime from new order by addtime desc');

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
        return view('admin.welcome',
        	[
            'articles'  => $articles,
            'userCounts'=>$userCounts,
        	'dayviews' => $dayviews,
            'newUser' => $newUser,
            'newSign' => $newSign
        	]);
    }

     public function getUserCate(){

     }
}