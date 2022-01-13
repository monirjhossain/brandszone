<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Rennokki\QueryCache\Traits\QueryCacheable;

class Commission extends Model
{
    use SoftDeletes;

    use QueryCacheable;

    public $cacheFor = 1; // cache time, in seconds

    protected $guarded = ['id'];
}
