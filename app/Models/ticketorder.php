<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ticketorder extends Model
{
    protected $fillable = ['username', 'phone', 'status', 'price', 'openid'];

}
