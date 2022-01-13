<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Rennokki\QueryCache\Traits\QueryCacheable;

class Promotion extends Model
{

    use QueryCacheable;

    public $cacheFor = 1; // cache time, in seconds
    
    protected $guarded = ['id'];

    public function scopePublished($query)
    {
        return $query->where('is_published', true);
    }

    /**
     * Relation With Category
     */
    public function category()
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }
    
}
