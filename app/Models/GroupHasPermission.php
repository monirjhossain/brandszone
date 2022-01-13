<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Junges\ACL\Http\Models\Group;
use Junges\ACL\Http\Models\Permission;
use Rennokki\QueryCache\Traits\QueryCacheable;

class GroupHasPermission extends Model
{
    use QueryCacheable;

    public $cacheFor = 1; // cache time, in seconds

    
    protected $table = 'group_has_permissions';
    public $timestamps = false;

    public function group(){
        return $this->belongsTo(Group::class,'id','group_id');
    }

    public function permissions(){
        return $this->hasMany(Permission::class,'id','permission_id');
    }
}
