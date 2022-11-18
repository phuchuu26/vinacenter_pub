<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $table ='rating';
    protected $guarded = [];

    /**
     * Attributes to guard against mass-assignment.
     *
     * @var array
     */

    protected $fillable = [
        'comment'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function product()
    {
        return $this->belongsTo('App\Models\Product');
    }
}
