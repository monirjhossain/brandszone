<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Rennokki\QueryCache\Traits\QueryCacheable;

class ProductVariant extends Model
{

    use QueryCacheable;

    public $cacheFor = 1; // cache time, in seconds

    protected $guarded = ['id'];

    /**
     * RELATION WITH VARIANT
     */
    public function variant(){
        return $this->hasOne(Variant::class,'id','variant_id');
    }

    /**
     * RELATION WITH VARIANT
     */
    public function product(){
        return $this->hasOne(Product::class,'id','product_id');
    }
    
    // END
}
