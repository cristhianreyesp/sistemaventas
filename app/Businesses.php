<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Businesses extends Model
{
    protected $fillable = [
        'name',
        'description',
        'logo',
        'mail',
        'address',
        'ruc',
    ];
}
