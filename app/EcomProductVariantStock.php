<?php

namespace App;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Rennokki\QueryCache\Traits\QueryCacheable;

class EcomProductVariantStock extends Model
{
    //

    use QueryCacheable;

    public $cacheFor = 1; // cache time, in seconds
    
    public function scopePublished($query)
    {
        return $query->where('is_published', 1);
    }

    public function scopeActive($query)
    {
        return $query->where('active', 1);
    }


    public function product(){
        return $this->hasOne(Product::class,'id','product_id');
    }
}
