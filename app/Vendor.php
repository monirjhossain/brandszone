<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Rennokki\QueryCache\Traits\QueryCacheable;

class Vendor extends Model
{

  use QueryCacheable;

    public $cacheFor = 1; // cache time, in seconds
    
    use SoftDeletes;

    protected $guarded = ['id'];

    // scopeApproved
    public function scopeApproved($query)
    {
        return $query->where('approve_status', 1);
    }

    
    // seller_product
    public function seller_product()
    {
      return $this->hasOne('App\VendorProduct','user_id','user_id');
    }

}
