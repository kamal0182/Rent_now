<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    Protected $fillable = [
        'name',
        'description'
    ];
    public function Product()
    {
        return $this->hasOne(Product::class);
    }
}
