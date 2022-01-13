<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Rennokki\QueryCache\Traits\QueryCacheable;

class Brand extends Model
{
    use SoftDeletes;

    use QueryCacheable;

    public $cacheFor = 1; // cache time, in seconds
    
    protected $fillable = [
        'name',
        'banner',
        'slug',
        'meta_title',
        'meta_desc',
        'is_published',
        'is_requested',
        'logo'
    ];

    /**
     * PUBLISHED
     */
    public function scopePublished($query)
    {
        return $query->where('is_published', 1);
    }

    /**
     * RELATION WITH PRODUCT
     */
    public function products()
    {
        return $this->hasMany(Product::class, 'brand_id', 'id');
    }


}
