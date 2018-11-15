<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class award_register extends Model
{
    protected $fillable = ['nickname', 'openid', 'sex', 'headerimg', 'isguanzhu'];
}
