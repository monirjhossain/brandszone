<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Rennokki\QueryCache\Traits\QueryCacheable;

class Addon extends Model
{
    use QueryCacheable;

    public $cacheFor = 1; // cache time, in seconds
}
