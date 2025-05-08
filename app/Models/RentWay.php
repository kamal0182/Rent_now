<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RentWay extends Model
{
    protected $fillable = [
        'title'
    ];
    protected  $table = 'rent_ways';
    public function product()
    {
        return $this->hasMany(Product::class , 'rent_way_id');
    }
}
