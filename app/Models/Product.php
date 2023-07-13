<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'productCode',
        'upc',
        'name',
        'image1',
        'image2',
        'image3',
        'image4',
        'summary',
        'description',
        'productPrice',
    ];
}

