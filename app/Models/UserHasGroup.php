<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Junges\ACL\Http\Models\Group;
use Rennokki\QueryCache\Traits\QueryCacheable;

class UserHasGroup extends Model
{

    use QueryCacheable;

    public $cacheFor = 1; // cache time, in seconds
    
    protected $table = 'user_has_groups';
    
    public $timestamps = false;

    public function groups(){
        return $this->hasMany(Group::class,'id','group_id');
    }
}
