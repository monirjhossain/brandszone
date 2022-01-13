<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Rennokki\QueryCache\Traits\QueryCacheable;

class SectionSettings extends Model
{

    use QueryCacheable;

    public $cacheFor = 1; // cache time, in seconds
    
    use SoftDeletes;

    protected $guarded = ['id'];
}
