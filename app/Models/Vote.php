<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class award_regsiter extends Model
{
    protected $fillable = ['user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeByWhom($query, $user_id)
    {
        return $query->where('user_id', '=', $user_id);
    }

}