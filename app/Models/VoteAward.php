<?php

namespace App\Models;

use App\Models\Traits\BaseFilterable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use App\Models\VoteCategory;
class VoteAward extends Model
{
    use SoftDeletes,BaseFilterable,Notifiable;

    protected $fillable = [
        'name',
        'category_id',
        'is_enabled',
    ];

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];
    public function category(){
    	return $this->belongsTo(VoteCategory::class, 'category_id', 'id');
    }

    
}
