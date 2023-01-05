<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use willvincent\Rateable\Rateable;

class ColorDetail extends Model
{
   
    
    protected $table ='color_detail';
    protected $guarded = [];
    protected $primaryKey = 'id_color_detail';

    public function productOption()
    {
        return $this->hasOne(ProductOption::class, 'id', 'id_product_option');
    }

    public function color()
    {
        return $this->hasOne(Color::class, 'id_color', 'id_color');
    }
    
}
