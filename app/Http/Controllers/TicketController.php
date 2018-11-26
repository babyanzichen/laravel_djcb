<?php

namespace App\Http\Controllers;
use DB;
use App\Articles;
use App\Ticketorder;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\libs\ipCity;
use convert;
use Overtrue\Wechat\Payment;
use Overtrue\Wechat\Payment\Order;
use Overtrue\Wechat\Payment\Business;
use Overtrue\Wechat\Payment\UnifiedOrder;
use Overtrue\Wechat\Payment\Notify;
use JSSDK;
use Validator;
use Redirect, Input, Response;
use Illuminate\Support\Facades\Session; 
use App\voterecords;
use shouquan;
class TicketController extends BaseController
{
	public function index(Request $request)
    {   
        $code = $request->get('code');
      if($code=='001aacZC1fjvn40DFl1D1X7OYC1aacZ-'){
        $url='http://www.djcb123.cn/ticket';
        header("Location:$url");
        exit();

      }
    	 $this->check($request,'ticket');
    	 $orderinfo= DB::table('ticketorders')->where([['status', '=', '1'],['openid', '=', $request->session()->get('user')['openid']]])->first();
    	 if($orderinfo!=''||$orderinfo!=null){
    	 	return redirect('ticket/show');
    	 }
    	 $JSSDK=new JSSDK(config('app.appId'),config('app.appSecret'));
      	$signPackage = $JSSDK->getSignPackage();
		$business = new Business(
		    'wx7221456a3f12698e',
		    'fa019a106cdaf1af3831e4012a2c2c8e',
		    '1323533601',
		    '6Ec5daF10e3265A3ce50Ec9B93bA3537'
		);

	/**
	 * 第 2 步：定义订单
	 */
   
	$order = new Order();
	$order->body = '2018武汉改装车展门票';
	$order->out_trade_no ='sn'.date('YmdHis').rand(100000,999999);
	//$order->total_fee = '1'; // 单位为 “分”, 字符串类型
	$order->openid =$request->session()->get('user')['openid'];
	$order->notify_url = 'http://www.djcb123.cn/ticket/notify';
   
    $now=time();
    //echo $now;
    if($now<1528646400){
        $order->total_fee=100;
    }elseif($now>=1528646400&&$now<1529683200){
        $order->total_fee=1000;
    }else{
        $order->total_fee=2000;  
    }
	/**
	 * 第 3 步：统一下单
	 */
	$unifiedOrder = new UnifiedOrder($business, $order);
	

	/**
	 * 第 4 步：生成支付配置文件
     * 
	 */
    
    //echo $totalfee;
	$payment = new Payment($unifiedOrder);
	//var_dump($payment);
	      	return view('ticket/index', 
	          [
	        //  'addr'=>$addr,
	        'price'=>$order->total_fee/100,
	        'openid'=>$order->openid,
	        'ordersn'=>$order->out_trade_no,
	        'payment' =>$payment,
	        'signPackage' => $signPackage
	          ]
	        );
 }
 public function infosubmit(Request $request)
    { 	
    	$validator = Validator::make($request->all(),  [
            'phone'=> 'required|max:20',
            'username' => 'required', // 必填
            'city' => 'required', // 必填
            'price' => 'required',
        ]);
       // var_dump($request);
        if ($validator->passes()){
        $ticketorder = new ticketorder; 
    	$ticketorder->username = $request->get('username'); // 将 POST 提交过了的 title 字段的值赋给 article 的 title 属性
    	$ticketorder->city = $request->get('city'); // 将 POST 提交过了的 title
    	$ticketorder->price = $request->get('price');// 字段的值赋给 article 的 title 属性
    	$ticketorder->phone = $request->get('phone'); // 将 POST 提交过了的 title 字段的值赋给 article 的 title 属性
    	$ticketorder->ordersn = $request->get('ordersn'); // 将 POST 提交过了的 title 字段的值赋给 article 的 title 属性
    	$ticketorder->openid = $request->get('openid'); // 将 POST 提交过了的 title 
    	if($request->get('openid')!=$request->session()->get('user')['openid']){
    		return Response::json(
            [
                'code' => '400',
                'msg' => '系统服务异常，请稍候再试',
                'status' => 'System Error'
            ]);
    	}else{
    		$isset= DB::table('ticketorders')->where('ordersn',$request->get('ordersn'))  ->get();
          if($isset->first()!=''){
          	return Response::json(
            [
                'code' => '300',
                'msg' => '请勿重复提交订单，请刷新页面重试',
                'status' => 'invalid order submit'
            ]);
          }else{
          	if ($ticketorder->save()){

    			return Response::json(
            [
                'code' => '200',
                'msg' => '订单生成成功，等待支付',
                'status' => 'success wait pay!'
            ]);
    		}else{
	    		return Response::json(
		            [
		                'code' => '500',
		                'msg' => '数据库服务异常，请稍候再试',
		                'status' => 'database write Error'
		            ]);
    			}
    		}
          }
    		
    	}else{
    		return Response::json(
            [
                'code' => '500',
                'msg' => '数据验证不通过',
                'status' => 'form data invaild'
            ]);
    	}

    }
    public function success(Request $request)
    {
    	$this->check($request,'/ticket/success');
    	$orderinfo= DB::table('ticketorders')->where([['status', '=', '1'],['openid', '=', $request->session()->get('user')['openid']]])->first();
    	//var_dump($orderinfo);
    	 if($orderinfo==''||$orderinfo==null){
    	 	return redirect('ticket');
    	 	exit();
    	 }else{
    	 $JSSDK=new JSSDK(config('app.appId'),config('app.appSecret'));
      	$signPackage = $JSSDK->getSignPackage();
      	$orderinfo= DB::table('ticketorders')->where([['status', '=', '1'],['openid', '=', $request->session()->get('user')['openid']]])->first();
      	//var_dump($orderinfo);
      	return view('ticket/success', 
	          [
	        	//  'addr'=>$addr,
		        'orderinfo'=>$orderinfo,
		        
		        'signPackage' => $signPackage
	          ]
	        );
      	}
    }
    public function show(Request $request)
    {
    	$this->check($request,'/ticket/show');
    	$JSSDK=new JSSDK(config('app.appId'),config('app.appSecret'));
      	$signPackage = $JSSDK->getSignPackage();
      	$orderinfo= DB::table('ticketorders')->where([['status', '=', '1'],['openid', '=', $request->session()->get('user')['openid']]])->first();
    	//var_dump($orderinfo);
    	 if($orderinfo==''||$orderinfo==null){
    	 	return redirect('ticket');
    	 	exit();
    	 }else{
      	//var_dump($orderinfo);
      	return view('ticket/show', 
	          [
	        	//  'addr'=>$addr,
		        'orderinfo'=>$orderinfo,
		        
		        'signPackage' => $signPackage
	          ]
	        );
      }
    }
 	public function notify(Request $request)
    {   
    	
		//$orderinfo= DB::table('ticketorders')->where('ordersn', 'sn20180513071629997920')->first();
		//echo ($orderinfo->price)*100;
		$content ='进入api接口';
        if($this->logger($content)){
        	 // echo "写入成功。<br />";
       	 };

		$notify = new Notify(
		    'wx7221456a3f12698e',
		    'fa019a106cdaf1af3831e4012a2c2c8e',
		    '1323533601',
		    '6Ec5daF10e3265A3ce50Ec9B93bA3537'
		);

		$transaction = $notify->verify();

		if (!$transaction) {
		    $notify->reply('FAIL', 'verify transaction error');
		}
		$this->logger($transaction);
		// var_dump($transaction);
		 $res=json_decode($transaction);
		if(isset($res)&&$res->result_code=='SUCCESS'){
			$content ='回调信息提示支付成功';
        	$this->logger($content);
			$orderinfo= DB::table('ticketorders')->where('ordersn', $res->out_trade_no)->first();
			$price=($orderinfo->price)*100;
			if($orderinfo->openid==$res->openid&&$price==$res->total_fee){
				$content ='返回订单信息一致';
        	$this->logger($content);
			 	$handle=DB::table('ticketorders')->where(
    'ordersn',$res->out_trade_no)->update(['status' => 1]);
		if($handle){
			
            /**
             * 给用户推送模板消息
             */

            $ordersn=$res->ordersn;
            $openid=$res->openid;
            $template_id='AyJ_GPTYVgsido4vbsSaaTvJtiqN0xFVhh7VVNG8A-s';
            $username=$res->username;
            $activity='2018武汉改装车展';
            $phone=$res->phone;
            $price=$res->price;
            $time=$res->created_at;
            $tips1='购票成功通知';
            $tips2='您购买的“2018武汉改装车展”已经成功出票，订单号'.$ordersn.'，支付价格为'.$price.'点击查看详情。';
            $redirect_url='http://www.djcb123.cn/ticket/show';
            $this->send($request,$openid,$template_id,$username,$activity,$phone,$time,$tips1,$tips2,$redirect_url);


            /**
             * 记录接口调试log
             */
            $content =$res->openid.'买票成功';
        	$this->logger($content);
			echo $notify->reply();
		}else{
			$content =$res->openid.'账户买票支付状态更新数据库失败';
        	$this->logger($content);
			echo"";
		}
		}else{
			$content =$res->out_trade_no.'返回订单支付信息不一致';
        	$this->logger($content);
		}
			

	}else{
		$content =$res->openid.'支付失败或者取消支付';
        	$this->logger($content);
		echo"";
	}
	}
	
	private function logger($content){//开发调试写入log
        $file  = 'log.html';//要写入文件的文件名（可以是任意文件名），如果文件不存在，将会创建一个
        $content='【'.date("Y-m-d H:i:s").$content.'】</br>';
        file_put_contents($file, $content,FILE_APPEND);
    }


    public function send(Request $request,$openid,$template_id,$username,$activity,$phone,$time,$tips1,$tips2,$redirect_url){
        
        $shouquan=new shouquan();
       
       
        $shouquan->sendOrderSuccess($openid,$template_id,$username,$activity,$phone,$time,$tips1,$tips2,$redirect_url);//调用方法
    }
}