<?php 
namespace App\Console\Commands;

use Illuminate\Console\Command;
use DB;
use shouquan;

class SendTemplateMsg extends Command {

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'templatemsg:send';

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
             $shouquan->sendOrderMessage($value->openid,$value->nickname,'15827400208','777');//调用方法
        }
       
    }

}