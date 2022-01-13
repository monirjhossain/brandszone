<?php

namespace App\Models;

use App\User;
use App\VendorProduct;
use Illuminate\Database\Eloquent\Model;
use Rennokki\QueryCache\Traits\QueryCacheable;

class VendorProductVariantStock extends Model
{

    use QueryCacheable;

    public $cacheFor = 1; // cache time, in seconds

    
    protected $guarded = ['id'];

    /**
     * vendor Product
     */
    public function scopePublished($query)
    {
        return $query->where('is_published', 1);
    }

    public function scopeActive($query)
    {
        return $query->where('active', 1);
    }

    public function vendor_product()
    {
        return $this->hasMany('App\VendorProduct','product_id','product_id')->where('is_published',1);
    }

    public function vendorProduct(){
        return $this->hasOne(VendorProduct::class,'id','vendor_product_id');
    }

    public function user(){
        return $this->hasOne(User::class,'id','user_id')->with('vendor');
    }



}
