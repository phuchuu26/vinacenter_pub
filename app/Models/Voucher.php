<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    protected $table ='voucher';
    protected $guarded = [];

    protected $primaryKey = 'id_voucher';
}
