<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'title',
        'description',
        'price',
        'status',
        'quantity'
    ];
    public function categorie(){
        return $this->belongsTo(Categorie::class);
    }
    public function renter()
    {
        return $this->belongsTo(User::class,'renter_id');
    }

    public function rentway()
    {
        return $this->belongsTo(RentWay::class , 'rent_way_id');
    }
    public function comment()
    {
        return $this->hasMany(Comment::class,'product_id');
    }
    public function rental()
    {
        return $this->hasMany(Rental::class);
    }
    public function location()
    {
        return $this->belongsTo(Location::class);
    }
    public function images()
    {
        return $this->hasMany(Image::class);
    }
}
