<?php

namespace App;

use App\Models\OrderProduct;
use Illuminate\Database\Eloquent\Model;
use Rennokki\QueryCache\Traits\QueryCacheable;

class DeliverAssign extends Model
{
    use QueryCacheable;

    public $cacheFor = 1; // cache time, in seconds

    public function deliverUser()
    {
        return $this->hasOne(User::class, 'id', 'deliver_user_id');
    }


    public function assignUser()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function orderDetails()
    {
        return $this->hasOne(OrderProduct::class, 'id', 'order_id')->with('product')->with('order');
    }

    public function deliverSummery(){
        return $this->hasMany(DeliveymenTrack::class,'deliver_assign_id','id')->orderByDesc('id');
    }

}
