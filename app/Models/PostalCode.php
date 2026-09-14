<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostalCode extends Model
{
    use HasFactory;

    protected $fillable = [
        'postal_code',
        'prefecture',
        'city',
        'town',
        'prefecture_romaji',
        'city_romaji',
        'town_romaji',
    ];
}
