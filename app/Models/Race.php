<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Race extends Model
{
    protected $fillable = ['nickname', 'username', 'phone', 'status', 'headpic', 'openid'];

}
