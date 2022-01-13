<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Rennokki\QueryCache\Traits\QueryCacheable;

class Customer extends Model
{

  use QueryCacheable;

    public $cacheFor = 1; // cache time, in seconds
    
    protected $fillable = [
      'user_id',
      'name',
      'email',
      'slug',
      'avatar', //nullable
      'phn_no', //nullable,
      'address',//nullable
    ];
}
