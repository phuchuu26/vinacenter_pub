<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $table ='order_detail';
    protected $guarded = [];

    public function productOption()
    {
        return $this->hasOne(ProductOption::class, 'id', 'product_id');
    }

    public function order()
    {
        return $this->hasOne(OrderProduct::class, 'id', 'order_id');
    }
}
