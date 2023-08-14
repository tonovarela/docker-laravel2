<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_detail extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'item_id',
        'product_name',
        'upc',
        'quantity',
        'soldPrice',
        'tax_amount',
        'product',
        'prodType',
        'discount',
        'picture',
        'total_amount',

    ];
}
