<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class races extends Model
{
    protected $fillable = ['username', 'openid', 'phone', 'nickname', 'quote','status'];
}
