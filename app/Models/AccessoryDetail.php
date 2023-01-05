<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use willvincent\Rateable\Rateable;

class AccessoryDetail extends Model
{
    
    protected $table ='accessory_detail';
    protected $guarded = [];
    protected $primaryKey = 'id_accessory_detail';

    public function productOption()
    {
        return $this->hasOne(ProductOption::class, 'id', 'id_product_option');
    }

    public function accessory()
    {
        return $this->hasOne(Accessory::class, 'id_accessory', 'id_accessory');
    }
}
