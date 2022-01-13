<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Rennokki\QueryCache\Traits\QueryCacheable;

class SellerEarning extends Model
{
    use QueryCacheable;

    public $cacheFor = 1; // cache time, in seconds

    public function product(){
        return $this->hasOne(Product::class,'id','product_id');
    }
}
