<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductNonOlahan extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'name',
        'price',
        'category',
        'stock',
        'weight',
        'description',
    ];
}
