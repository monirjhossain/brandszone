<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Rennokki\QueryCache\Traits\QueryCacheable;

class Variant extends Model
{

    use QueryCacheable;

    public $cacheFor = 1; // cache time, in seconds
    
    protected $guarded = ['id'];

    public function scopePublished($query)
    {
        return $query->where('is_published', 1);
    }

    /**
     * RELATION WITH PRODUCT VARIANT
     */

     public function product_variant()
     {
         return $this->hasOne(ProductVariant::class, 'variant_id', 'id');
     }


    //END
}
