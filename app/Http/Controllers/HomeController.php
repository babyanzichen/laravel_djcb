<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\libs\ipCity;
use shouquan;
use JSSDK;
use Illuminate\Support\Facades\Session;
use Overtrue\Wechat\Payment;
use Overtrue\Wechat\Payment\Order;
use Overtrue\Wechat\Payment\Business;
use Overtrue\Wechat\Payment\UnifiedOrder;
use Overtrue\Wechat\Payment\Notify;
class HomeController extends BaseController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        return view('home');
    }




    public function index(Request $request)
    {  

       $this->check($request,"home/home");
   
      $IP=$_SERVER["REMOTE_ADDR"];
      $url = "http://ip.taobao.com/service/getIpInfo.php?ip=".$IP; 
        $data = file_get_contents($url); //调用淘宝接口获取信息 
        $json = json_decode($data);
        $country=$json->{'data'}->{'country'};
        $area=$json->{'data'}->{'area'};
        $region=$json->{'data'}->{'region'};
        $city=$json->{'data'}->{'city'};
        $county=$json->{'data'}->{'county'};
        $isp=$json->{'data'}->{'isp'};
        $addr=$country.$area.$region.$city.$county.$isp;
        DB::table('chebao_visittable')->insert(
        ['visitip' => $IP, 'addr' => $addr,'visittime' => date("Y-m-d H:i:s", time())]);
        

      
      $JSSDK=new JSSDK(config('app.appId'),config('app.appSecret'));
      $signPackage = $JSSDK->getSignPackage();
      
        return view('home', 
          [
          'signPackage' => $signPackage,
          ]
          );
         
    }


    public function count()
    {   
      $id=$_POST['id'];
      $IP=$_SERVER["REMOTE_ADDR"];
      $url = "http://ip.taobao.com/service/getIpInfo.php?ip=".$IP; 
        $data = file_get_contents($url); //调用淘宝接口获取信息 
        $json = json_decode($data);
        $country=$json->{'data'}->{'country'};
        $area=$json->{'data'}->{'area'};
        $region=$json->{'data'}->{'region'};
        $city=$json->{'data'}->{'city'};
        $county=$json->{'data'}->{'county'};
        $isp=$json->{'data'}->{'isp'};
        $addr=$country.$area.$region.$city.$county.$isp;
        DB::table('chebao_clicklist')->insert(
        ['brandid'=>$id,'visitip' => $IP, 'addr' => $addr,'created_at' => date("Y-m-d H:i:s", time())]);
        DB::table('chebao_brand')
            ->where('id', $id)
            ->increment('counts', 1);
   }
   
    
    public function getmore()
    {   
        $category1=$_GET['category1'];
        $category2=$_GET['category2'];
        $counts = DB::table('chebao_brand')
                ->where(['category1'=>$category1,'category2'=>$category2])
                ->count();

        $data= DB::select("SELECT * FROM chebao_brand where category1=$category1 and category2 =$category2 LIMIT 4,$counts ");
      
        foreach ($data as $item) {
          echo "<li><a href=\"/home/shop/{$item->id}\" onclick=\"count({$item->id})\"><em>".$item->brandname."</em></a></li>";     
          }
       
    }




   public function shop(Request $request,$id)
    {  
    $this->check($request,"home/shop/".$id);
     $shoplink = DB::table('chebao_brand')->where('id', '=',$id)->value('shoplink');
     return view(
      'shop', 
      ['shoplink' => $shoplink,]
          );  
   }

  public function brandregist()
    {   
        // $jssdk = new \JSSDK();
        //$SignPackage = $jssdk -> getSignPackage();
       return view(
      'brandregist'
      
          );  
   }
   


     public function brandadd()
    {   
        $shoplink=$_POST['shoplink'];
        $brandname=$_POST['brandname'];
        $category1=$_POST['category1'];
        $category2=$_POST['category2'];
        $categorys=$_POST['categorys'];
        DB::table('brandtable')->insert(
        [
        'shoplink' => $shoplink,
        'brandname'=>$brandname,
        'category1'=> $category1,
        'category2'=>$category2,
        'categorys'=> $categorys,
        'addtime' =>date("Y-m-d H:i:s",time()),
        ]
        );
   }




   public function pay(Request $request)
    {   
        $this->check($request,"home/pay");
        $user= $request->session()->get('user');
        $openid=$user['openid'];

        $business = new Business(config('app.appId'),config('app.appSecret'),config('app.MCHID'),config('app.KEY'));

        /**
         * 第 2 步：定义订单
         */
        $order = new Order();
        $order->body = 'test body';
        $order->out_trade_no = md5(uniqid().microtime());
        $order->total_fee = '1'; // 单位为 “分”, 字符串类型
        $order->openid =$openid;
        $order->notify_url = 'http://www.djcb123.cn/home/notify';

        /**
         * 第 3 步：统一下单
         */
        $unifiedOrder = new UnifiedOrder($business, $order);

        /**
         * 第 4 步：生成支付配置文件
         */
        $payment = new Payment($unifiedOrder);
           return view(
                      'pay',['payment' => $payment]
                    ); 
                }

    public function notify(){
          $notify = new Notify(config('app.appId'),config('app.appSecret'),config('app.MCHID'),config('app.KEY'));

          $transaction = $notify->verify();

          if (!$transaction) {
              $notify->reply('FAIL', 'verify transaction error');
          }

          // var_dump($transaction);

          echo $notify->reply();
        }




}
