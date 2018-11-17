<?php

namespace App\Models;

use App\Models\Traits\BaseFilterable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class VoteInfo extends Model
{
    use SoftDeletes,BaseFilterable,Notifiable;

    protected $fillable = [
        'name',
        'title',
        'hold_time',
        'status',
        'address',
        'is_enabled',
        'rules',
        'tips'
    ];

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];


    
}
