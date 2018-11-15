<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
class Articles extends Model
{
	// 数据库'dadtabase_center'中的users表
	protected $connection = 'mysql2';
	protected $table = "new";

}