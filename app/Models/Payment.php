<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Rennokki\QueryCache\Traits\QueryCacheable;

class Payment extends Model
{
    use QueryCacheable;

    public $cacheFor = 1; // cache time, in seconds
    
    public function user(){
        return $this->hasOne(User::class,'id','user_id');
    }
}
