<?php

namespace App\Http\Controllers;
use DB;
use App\Http\Requests;
use Illuminate\Support\Facades\Request;
use App\libs\ipCity;
use shouquan;
use JSSDK;
use Redirect, Input, Response;
use Illuminate\Support\Facades\Session;  
class UploadController extends BaseController
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index(Request $request)
    {  


    }

	/*
	*---上传图片统一接口---*
	*@author zhoupeng
	*@time   20170913
	*/

    public function upimg(Request $request){
       $file = Request::file('file');
       
        $allowed_extensions = ['png', 'jpg', 'gif','jpeg'];
        if ($file->getClientOriginalExtension() && !in_array($file->getClientOriginalExtension(), $allowed_extensions)) {
            $res['msg']='您仅被允许上传 png, jpg , gif,jpeg格式的图片文件.';
            $res['code']=300;
           
        }else{
            $destinationPath = 'storage/uploads/'; //public 文件夹下面建 storage/uploads 文件夹
          $extension = $file->getClientOriginalExtension();
          $fileName = str_random(10).'.'.$extension;
          $file->move($destinationPath, $fileName);
          $filePath = asset($destinationPath.$fileName);
        if($file){
          $res['code']=0;
          $res['msg']="上传成功";
          $res['data']['src']=$filePath;
          $res['data']['title']=$fileName;
        }else{
          $res['code']=500;
          $res['msg']="服务器上报了一个错误，请稍后再试";
          
        }
      }
        
        
      	return Response::json($res);
          

    }
}