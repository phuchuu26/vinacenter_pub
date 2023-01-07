<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use willvincent\Rateable\Rateable;

class ProductOption extends Model
{
    use Rateable;
    
    protected $table ='product_option';
    protected $guarded = [];

    public function product()
    {
        return $this->hasOne(Product::class, 'id', 'product_id');
    }

    public function voucher()
    {
        return $this->hasOne(Voucher::class, 'id_voucher', 'voucher_code');
    }

    public function colorDetail()
    {
        return $this->hasMany(ColorDetail::class, 'id_product_option', 'id');
    }
    
    
    public function accessoryDetail()
    {
        return $this->hasMany(AccessoryDetail::class, 'id_product_option', 'id');
    }

}
