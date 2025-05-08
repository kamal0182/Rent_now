<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rental extends Model
{
    protected $fillable = [
        'start_date',
        'end_date',
        'quantity'
    ];
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    public function renter()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
