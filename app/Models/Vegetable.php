<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vegetable extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'price_per_kg', 'stock', 'description', 'image'
    ];
}
