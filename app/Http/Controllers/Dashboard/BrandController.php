<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
class BrandController extends Controller
{
    public function brand()
    {
    $brandlist = DB::table('chebao_brand')
                 ->orderBy('created_at', 'desc')
                 ->paginate(10);
    return view('admin.brand.brandlist',['brandlist'=>$brandlist]);
    }

    public function editcontent()
    {
    	$id=$_GET["id"];
    $branddetail = DB::table('chebao_brand')
                ->where('id', '=', $id)
                ->first();
    echo json_encode($branddetail);
    }

    public function editaction()
    {
        $id=$_POST['id'];
        $brandname=$_POST['brandname'];
        $category1=$_POST['category1'];
        $category2=$_POST['category2'];
        $shoplink=$_POST['shoplink'];
        $brandlogo=$_POST['brandlogo'];
        DB::table('chebao_brand')
            ->where('id', $id)
           ->update([
            'brandname' => $brandname,
            "shoplink"  => $shoplink,
            "category1" => $category1,
            "category2" => $category2,
            'brandlogo' => $brandlogo,
            'updated_at' => date("Y-m-d H:i:s", time())
            ]);
    }

    public function brandadd()
    {   
        // $jssdk = new \JSSDK();
        //$SignPackage = $jssdk -> getSignPackage();
         return view(
        'admin/brand/brandadd'
        
            );  
   }


   public function addaction()
    {   
        $brandname=$_POST['brandname'];
        $category1=$_POST['category1'];
        $category2=$_POST['category2'];
        $shoplink=$_POST['shoplink'];
        $brandlogo=$_POST['brandlogo']; 
        DB::table('chebao_brand')->insert(
    [
           'brandname' => $brandname,
            "shoplink"  => $shoplink,
            "category1" => $category1,
            "category2" => $category2,
            'brandlogo' => $brandlogo,
            'created_at' => date("Y-m-d H:i:s", time())
     ]
   );
         
   }
}
