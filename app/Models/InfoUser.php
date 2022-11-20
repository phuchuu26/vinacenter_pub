<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InfoUser extends Model
{
    protected $table ='info_users';
    protected $guarded = [];

    protected $primaryKey = 'id_info_user';
}
