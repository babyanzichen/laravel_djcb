<?php
namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
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
    public function getEasyWechatSession()
    {
        $user = session('wechat.oauth_user.default');
        return $user;
    }

    public function autoLogin()
    {   
       
        $userInfo = $this->getEasyWechatSession();
       
        $openId = $userInfo['id'];
      
        //查看对应的openid是否已被注册
        $userModel = User::where('openid', $openId)->first();
        //如果未注册，跳转到注册
        if (!$userModel) {
            User::create( array(
                    'openid'=>$userInfo['original']['openid'],
                    'nickname'=>$userInfo['original']['nickname'],
                    'sex'=>$userInfo['original']['sex'],
                    'avatar'=>$userInfo['original']['headimgurl'],
                    'language'=>$userInfo['original']['language'],
                    'city'=>$userInfo['original']['city'],
                    'province'=>$userInfo['original']['province'],
                    'country'=>$userInfo['original']['country'],
                    'register_source'=>'wechat_auth',
                ));
           // return redirect()->intended('/vote/index');
           // return redirect()->route('register');
        } else {
            
            User::where('openid',$openId)->update(
                array(
                    'nickname'=>$userInfo['original']['nickname'],
                    'sex'=>$userInfo['original']['sex'],
                    'avatar'=>$userInfo['original']['headimgurl'],
                    'language'=>$userInfo['original']['language'],
                    'city'=>$userInfo['original']['city'],
                    'province'=>$userInfo['original']['province'],
                    'country'=>$userInfo['original']['country'],
                )
            );
            return redirect()->intended('/vote/index');
        //如果已被注册，通过openid进行自动认证，
        //认证通过后重定向回原来的路由，这样就实现了自动登陆。
            // if(Auth::attempt(['openid' => $openId, 'password' => '123456'])) {
            //     return redirect()->intended();
            // }else{
            //     echo'出了点小问题';
            // }
        }
    }

    public function autoRegister()
    {
        $userInfo = $this->getEasyWechatSession();
    //根据微信信息注册用户。
        $userData = [
            'password' => bcrypt('123456'),
            'openid' => $userInfo['id'],
            'nickname' => $userInfo['nickname'],
        ];
        //注意批量写入需要把相应的字段写入User中的$fillable属性数组中
        User::create($userData);
        return redirect()->route('login');
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