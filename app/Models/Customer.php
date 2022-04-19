<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'customers';

    public function product()
    {
        return $this->hasMany(Product::class, 'customer_id');
    }


    public function shop()
    {
        return $this->belongsTo(Shop::class, 'shop_id');
    }
}
