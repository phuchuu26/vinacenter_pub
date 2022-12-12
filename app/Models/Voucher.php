<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    protected $table ='voucher';
    protected $guarded = [];

    protected $primaryKey = 'id_voucher';
    
    public function productOption()
    {
        return $this->hasOne(ProductOption::class, 'id', 'id_product_option');
    }

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'created_by');
    }
}
