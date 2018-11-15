<?php

namespace App\Http\Controllers;
use DB;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\libs\ipCity;
use shouquan;
use JSSDK;
use Illuminate\Support\Facades\Session;  
class RadioController extends BaseController
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index(Request $request)
    {  
    	 $this->check($request,'radio/index');
    	$JSSDK=new JSSDK(config('app.appId'),config('app.appSecret'));
      	$signPackage = $JSSDK->getSignPackage();
      	//$res = Session::get('user')[0]["nickname"];
      	
      	//var_dump($res);
    	return view('radio', 
          [
          'signPackage' => $signPackage
          ]
        );
    }



    public function lists(Request $request)
    {  
       $lists=DB::table('music')->join('poster','music.id','=','poster.songId')->get();
       return response()->json($lists); 
        
     
    }
}