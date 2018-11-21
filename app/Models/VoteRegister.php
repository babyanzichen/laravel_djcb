<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use SoftDeletes,BaseFilterable,Notifiable;
use App\Models\VoteAward;
class VoteRegister extends Model
{
    protected $fillable = ['companyname', 'reason', 'username', 'phone', 'brandname','cheat','award_id','is_enabled','logo'];
     protected $dates = ['created_at', 'updated_at', 'deleted_at'];
     public function award(){
     	return $this->belongsTo(VoteAward::class, 'award_id', 'id');
     }

      /**
     * 一篇文章有多个评论
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments()
    {
        return $this->hasMany(VoteComment::class,'vote_register_id','id');
    }

    /**
     * 获取这篇文章的评论以parent_id来分组
     * @return static
     */
    public function getComments()
    {
        return $this->comments()->with('owner')->get()->groupBy('parent_id');
    }
}
