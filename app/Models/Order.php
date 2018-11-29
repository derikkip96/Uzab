<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    protected $fillable = [
        'name','email','phone','location','order_id','store_customer_id',
    ];
    public function items()
    {
        return $this->belongsToMany(Product::class)->withPivot('quantity');
    }
}
