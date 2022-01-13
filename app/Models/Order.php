<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Rennokki\QueryCache\Traits\QueryCacheable;

class Order extends Model
{

    use QueryCacheable;

    public $cacheFor = 1; // cache time, in seconds
    
    protected $guarded = ['id'];

    /**
     * Relation with Orderproduct
     */

     public function order_product()
     {
         return $this->hasMany(OrderProduct::class,'order_id','id');
     }

    /**
     * Relation with Logistic
     */

     public function logistic()
     {
         return $this->hasOne(Logistic::class,'id','logistic_id');
     }

    /**
     * Relation with Division
     */

     public function division()
     {
         return $this->hasOne(District::class,'id','division_id');
     }

    /**
     * Relation with Area
     */

     public function area()
     {
         return $this->hasOne(Thana::class,'id','area_id');
     }
}
