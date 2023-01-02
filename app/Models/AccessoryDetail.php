<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use willvincent\Rateable\Rateable;

class AccessoryDetail extends Model
{
    
    protected $table ='accessory_detail';
    protected $guarded = [];

    public function productOption()
    {
        return $this->hasOne(ProductOption::class, 'id', 'id_product_option');
    }

}
