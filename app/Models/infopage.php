<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Rennokki\QueryCache\Traits\QueryCacheable;

class infopage extends Model
{
    use QueryCacheable;

    public $cacheFor = 1; // cache time, in seconds

    public function page(){
        return $this->hasOne(Page::class,'id','page_id')->with('content');
    }
}
