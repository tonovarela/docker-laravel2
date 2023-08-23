<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Planogram extends Model
{
    use HasFactory;
    protected $table = 'planogram';

    public function product()
    {
        return $this->hasOne('App\Models\Product', 'item_id', 'item_id');
    }
}
