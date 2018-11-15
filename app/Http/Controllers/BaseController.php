<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\libs\ipCity;
use PHPExcel;
use JSSDK;
use shouquan; 

use Illuminate\Support\Facades\Session;
use App\Users;
class BaseController extends Controller
{   

	public function check($request,$route){
		//print_r($request->session()->all()) ;
		$user= $request->session()->get('user');
	      
	       if(!isset($user["openid"])){
	          
	       
	      	$code = $request->get('code');
	      
	       if($code==""){
	          $shouquan=new shouquan();
	          $shouquan->authe($route);

	       }else{
	      // return $code;
	        $this->get_user_info($code);
	     
	     
	      }
	    }else{  
	         // var_dump(Session::get('user'));
	      } 
	}





    public function get_user_info($code){

      $appid = config('app.appId'); 
      $secret = config('app.appSecret'); 
      $get_token_url = 'https://api.weixin.qq.com/sns/oauth2/access_token?appid='.$appid.'&secret='.$secret.'&code='.$code.'&grant_type=authorization_code';  
       //var_dump( $get_token_url);
     $shouquan=new shouquan();
      $json_obj =$shouquan->httpGet($get_token_url);
       // var_dump($json_obj);
      //根据openid和access_token查询用户信息  
      $access_token = $json_obj["access_token"];  
      $openid = $json_obj["openid"];

      $get_user_info_url = 'https://api.weixin.qq.com/sns/userinfo?access_token='.$access_token.'&openid='.$openid.'&lang=zh_CN';  
        
     $userinfo =$shouquan->httpGet($get_user_info_url); 
        
      //解析json  
      
       
       $this->zhuce($userinfo);
      //print_r($user_obj);  
    }




	public function zhuce($userinfo){
			$openid= $userinfo['openid'];
			$nickname= $userinfo['nickname'];
			$avatar= $userinfo['headimgurl'];
			$sex= $userinfo['sex'];
			$city= $userinfo['city'];
			$province= $userinfo['province'];
			$country= $userinfo['country'];
			$UserModel=new Users;
			$user=$UserModel->where('openid', '=',$openid)->first();
			//var_dump($userinfo);
            if($user==null||$user==""){
            	// echo"1111";
             
			    $UserModel->nickname = $nickname;
			    $UserModel->openid = $openid;
			    $UserModel->sex = $sex;
			    $UserModel->avatar = $avatar;
			    $UserModel->city = $city;
			    $UserModel->province = $province;
			    $UserModel->country = $country;
			    $UserModel->register_source = 'wechat_auth';
                $UserModel->save();
            }else{
            	//echo"222222";
            	$UserModel = Users::find($user['id']);
				$UserModel->nickname = $nickname;
			    $UserModel->openid = $openid;
			    $UserModel->sex = $sex;
			    $UserModel->avatar = $avatar;
			    $UserModel->city = $city;
			     $UserModel->province = $province;
			    $UserModel->country = $country;
			    $UserModel->save();
            }
              session(['user'=>$userinfo]);
         }



       public  function printf_info($data)
        {
            foreach($data as $key=>$value){
                echo "<font color='#00ff55;'>$key</font> : $value <br/>";
            }
        }



        public function exportExcel($expTitle,$expCellName,$expTableData){
        $xlsTitle = iconv('utf-8', 'gb2312', $expTitle);//文件名称
        $fileName = '财富金字塔颁奖盛典名单'.date('_YmdHis');//or $xlsTitle 文件名称可根据自己情况设定
        $cellNum = count($expCellName);
        $dataNum = count($expTableData);
        $phpExcel=new PHPExcel();
        $cellName = array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','AA','AB','AC','AD','AE','AF','AG','AH','AI','AJ','AK','AL','AM','AN','AO','AP','AQ','AR','AS','AT','AU','AV','AW','AX','AY','AZ');
        
         $phpExcel->getActiveSheet(0)->mergeCells('A1:'.$cellName[$cellNum-1].'1');//合并单元格
       //  $phpExcel->setActiveSheetIndex(0)->setCellValue('A1', $expTitle.'  Export time:'.date('Y-m-d H:i:s'));  
        for($i=0;$i<$cellNum;$i++){
             $phpExcel->setActiveSheetIndex(0)->setCellValue($cellName[$i].'2', $expCellName[$i][1]); 
        } 
          // Miscellaneous glyphs, UTF-8   
        for($i=0;$i<$dataNum;$i++){
          for($j=0;$j<$cellNum;$j++){
             $phpExcel->getActiveSheet(0)->setCellValue($cellName[$j].($i+3), $expTableData[$i][$expCellName[$j][0]]);
          }             
        }  
        
        header('pragma:public');
        header('Content-type:application/vnd.ms-excel;charset=utf-8;name="'.$xlsTitle.'.xls"');
        header("Content-Disposition:attachment;filename=$fileName.xls");//attachment新窗口打印inline本窗口打印
        $objWriter = PHPExcel_IOFactory::createWriter( $phpExcel, 'Excel5');  
        $objWriter->save('php://output'); 
        exit;   
    }


}