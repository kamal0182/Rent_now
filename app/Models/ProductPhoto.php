<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductPhoto extends Model
{
    protected $fiallable =
    [
        'photo'
    ];
    public function  product()
    {
        return $this->belongsTo(Product::class);
    }
}
