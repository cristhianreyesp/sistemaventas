<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    protected $fillable = [
        'price',
        'price_date',
    ];
    public function products(){
        return $this->hasMany(Product::class);
    }
}
