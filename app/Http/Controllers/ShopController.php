<?php
namespace App\Http\Controllers;
use DB;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\libs\ipCity;
use shouquan;
use JSSDK;
use Illuminate\Support\Facades\Session;
use Overtrue\Wechat\Payment;
use Overtrue\Wechat\Payment\Order;
use Overtrue\Wechat\Payment\Business;
use Overtrue\Wechat\Payment\UnifiedOrder;
use Overtrue\Wechat\Payment\Notify;

class ShopController extends BaseController
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
   
    public function index(Request $request)
    {  

       $this->check($request,"home/index");
   
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
        

      $date=date("Y-m-d");
        $counts = DB::table('chebao_dayviews')->where('date', '=',$date)->count();
    if($counts>=1){
    DB::table('chebao_dayviews')
            ->where('date', $date)
            ->increment('views', 1);
       }else{
        DB::table('chebao_dayviews')->insert(
        ['date' => date("Y-m-d"), 'views' => 1]);
       }
      $JSSDK=new JSSDK(config('app.appId'),config('app.appSecret'));
      $signPackage = $JSSDK->getSignPackage();
      
      $brands1 = DB::table('chebao_brand')->where('category1', '=', 1)->take(16)->get();
      $brands2 = DB::table('chebao_brand')->where('category1', '=', 2)->take(16)->get();
      $brands3 = DB::table('chebao_brand')->where('category1', '=', 3)->take(16)->get();
      $brands4 = DB::table('chebao_brand')->where('category1', '=', 4)->take(16)->get();
      $brands5 = DB::table('chebao_brand')->where('category1', '=', 5)->take(16)->get();
      $brands6 = DB::table('chebao_brand')->where('category1', '=', 6)->take(16)->get();
      $brands11 = DB::table('chebao_brand')->where(['category1'=>1,'category2'=>1])->take(4)->get();
      $brands12 = DB::table('chebao_brand')->where(['category1'=>1,'category2'=>2])->take(4)->get();
      $brands13 = DB::table('chebao_brand')->where(['category1'=>1,'category2'=>3])->take(4)->get();
      $brands21 = DB::table('chebao_brand')->where(['category1'=>2,'category2'=>1])->take(4)->get();
      $brands22 = DB::table('chebao_brand')->where(['category1'=>2,'category2'=>2])->take(4)->get();
      $brands23 = DB::table('chebao_brand')->where(['category1'=>2,'category2'=>3])->take(4)->get();
      $brands24 = DB::table('chebao_brand')->where(['category1'=>2,'category2'=>4])->take(4)->get();
      $brands25 = DB::table('chebao_brand')->where(['category1'=>2,'category2'=>5])->take(4)->get();
      $brands26 = DB::table('chebao_brand')->where(['category1'=>2,'category2'=>6])->take(4)->get();
      $brands31 = DB::table('chebao_brand')->where(['category1'=>3,'category2'=>1])->take(4)->get();
      $brands32 = DB::table('chebao_brand')->where(['category1'=>3,'category2'=>2])->take(4)->get();
      $brands33 = DB::table('chebao_brand')->where(['category1'=>3,'category2'=>3])->take(4)->get();
      $brands34 = DB::table('chebao_brand')->where(['category1'=>3,'category2'=>4])->take(4)->get();
      $brands41 = DB::table('chebao_brand')->where(['category1'=>4,'category2'=>1])->take(4)->get();
      $brands42 = DB::table('chebao_brand')->where(['category1'=>4,'category2'=>2])->take(4)->get();
      $brands51 = DB::table('chebao_brand')->where(['category1'=>5,'category2'=>1])->take(4)->get();
      $brands52 = DB::table('chebao_brand')->where(['category1'=>5,'category2'=>2])->take(4)->get();
      $brands53 = DB::table('chebao_brand')->where(['category1'=>5,'category2'=>3])->take(4)->get();
      $brands54 = DB::table('chebao_brand')->where(['category1'=>5,'category2'=>4])->take(4)->get();
      $brands61 = DB::table('chebao_brand')->where(['category1'=>6,'category2'=>1])->take(4)->get();
        return view('shop/home', 
          [
          'signPackage' => $signPackage,
          'brands1' => $brands1,
          'brands2' => $brands2,
          'brands3' => $brands3,
          'brands4' => $brands4,
          'brands5' => $brands5,
          'brands6' => $brands6,
          'brands11' => $brands11,
          'brands12' => $brands12,
          'brands13' => $brands13,
          'brands21' => $brands21,
          'brands22' => $brands22,
          'brands23' => $brands23,
          'brands24' => $brands24,
          'brands25' => $brands25,
          'brands26' => $brands26,
          'brands31' => $brands31,
          'brands32' => $brands32,
          'brands33' => $brands33,
          'brands34' => $brands34,
          'brands41' => $brands41,
          'brands42' => $brands42,
          'brands51' => $brands51,
          'brands52' => $brands52,
          'brands53' => $brands53,
          'brands54' => $brands54,
          'brands61' => $brands61,
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




   public function detail(Request $request,$id)
    {  
    $this->check($request,"home/shop/".$id);
     $shoplink = DB::table('chebao_brand')->where('id', '=',$id)->value('shoplink');
     return view(
      'detail', 
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




   
}