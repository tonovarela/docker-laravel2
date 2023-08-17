<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'item_amount',
        'tax_amount',
        'total_amount'
    ];

    public function details()
    {
        return $this->hasMany('App\Models\Order_detail', 'id', 'order_id');
    }
}
