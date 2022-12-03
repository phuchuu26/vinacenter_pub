<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use willvincent\Rateable\Rateable;

class Product extends Model
{
    use Rateable;

    protected $table ='vnc_product';
    protected $guarded = [];

    public function ratings()
    {
        return $this->hasMany('App\Models\Rating');
    }
}
