<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table ='order_product';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */


    // protected $fillable = ['customer_id','fee','pay_type','total','note','note_by' ,'sendby','payment','payment_id','status','bonus_flag','user_id','created_at', 'updated_at'];

     
    public function customer()
    {
        return $this->hasOne(Customer::class, 'id', 'customer_id');
    }
    
    public function orderDetail()
    {
        return $this->hasMany(OrderDetail::class, 'order_id', 'id');
    }
}
