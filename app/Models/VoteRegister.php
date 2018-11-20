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
}
