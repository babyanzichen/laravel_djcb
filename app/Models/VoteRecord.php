<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VoteRecords extends Model
{
    protected $fillable = ['nickname', 'openid', 'sex', 'headerimg', 'isguanzhu'];
}
