<?php 
namespace App\Console\Commands;

use Illuminate\Console\Command;
use DB;
use shouquan;
use Carbon\Carbon;
class SendMeetingInvite extends Command {

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'meetinginvite:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '这是发模板消息的命令.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $shouquan=new shouquan();
        $users=DB::table('users')->where('openid','<>','0')->get();
        foreach ($users as $key => $value) {
            echo $value->id;
           $res=  $shouquan->sendMeetingInvite($value->openid,$value->nickname);//调用方法
           if($res['errcode']=='0'){
            $users=DB::table('users')->where('id',$value->id)->update(array('is_guanzhu'=>'T'));
           }elseif($res['errcode']=='43004'){
                $users=DB::table('users')->where('id',$value->id)->update(array('is_guanzhu'=>'F'));
           }
           DB::table('logs')->insert([
            'user_id'=>$value->id,
            'code'=>$res['errcode'],
            'msg'=>$res['errmsg'],
            'category'=>'meetinginvite',
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),
           ]);

        }
       
    }

}