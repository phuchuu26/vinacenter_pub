<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceCustomerDetail extends Model
{
    protected $table ='service_customer_detail';
    protected $guarded = [];

    protected $primaryKey = 'id_service_customer_detail';
    
    public function serviceCustomer()
    {
        return $this->hasOne(ServiceCustomer::class, 'id_service_customer', 'id_service_customer');
    }

    // public function user()
    // {
    //     return $this->hasOne(User::class, 'id', 'created_by');
    // }
}
