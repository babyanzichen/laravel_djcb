<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ticketorder extends Model
{
    protected $fillable = ['username', 'openid', 'phone', 'city', 'price','status'];
}
