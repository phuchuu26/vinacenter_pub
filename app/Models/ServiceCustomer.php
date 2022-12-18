<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceCustomer extends Model
{
    protected $table ='service_customer';
    protected $guarded = [];

    protected $primaryKey = 'id_service_customer';
    
    public function serviceCustomerDetail()
    {
        return $this->hasMany(ServiceCustomerDetail::class, 'id_service_customer', 'id_service_customer');
    }

    // public function user()
    // {
    //     return $this->hasOne(User::class, 'id', 'created_by');
    // }
}
