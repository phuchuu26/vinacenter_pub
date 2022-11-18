<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table ='vnc_product';
    protected $guarded = [];

    public function ratings()
    {
        return $this->hasMany('App\Models\Rating');
    }
}
