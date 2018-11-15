<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class voterecords extends Model
{
    protected $fillable = ['nickname', 'openid', 'sex', 'headerimg', 'isguanzhu'];
}
