<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Rennokki\QueryCache\Traits\QueryCacheable;

class VerifyUser extends Model
{
    //

    use QueryCacheable;

    public $cacheFor = 1; // cache time, in seconds

    protected $fillable = ['user_id','token'];

    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }
}
