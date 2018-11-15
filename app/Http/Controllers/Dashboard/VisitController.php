<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
class VisitController extends Controller
{
    public function visit()
    {
    $visitlist = DB::table('chebao_visittable')
                 ->orderBy('visittime', 'desc')
                 ->paginate(10);
    return view('admin.visit.visitlist',['visitlist'=>$visitlist]);
    }
}
