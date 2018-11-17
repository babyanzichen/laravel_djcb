<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VoteRecord extends Model
{
    protected $fillable = ['nickname', 'openid', 'sex', 'headerimg', 'isguanzhu'];
}
