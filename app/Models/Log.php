<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;
class Log extends Model
{
    use SoftDeletes;
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    protected $fillable = ['user_id', 'errcode', 'errmsg'];
    /**
     * @param $value
     */
    public function user(){
    	return $this->belongsTo(User::class, 'user_id', 'id');
    }
    
}
