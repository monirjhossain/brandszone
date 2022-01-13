<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Rennokki\QueryCache\Traits\QueryCacheable;

class PageGroup extends Model
{
    use QueryCacheable;

    public $cacheFor = 1; // cache time, in seconds

    public function pages(){
        return $this->hasMany(Page::class,'page_group_id','id')->with('content')->where('active',true);
    }
}
