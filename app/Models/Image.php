<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = [
        'photo'
    ];
    protected $table = "product_photos";
    public function product ()
    {
        return $this->belongsTo(Product::class, 'product_photos');
    }
}
