<?php

namespace App\Models;

use App\Models\Traits\BaseFilterable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class VoteCategory extends Model
{
    use SoftDeletes,BaseFilterable,Notifiable;

    protected $fillable = [
        'name',
        'is_enabled',
    ];

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];


    
}