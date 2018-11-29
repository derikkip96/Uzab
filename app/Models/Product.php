<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    protected $fillable = [
        'id', 'deleted_at', 'created_at', 'updated_at','quantity', 'category_id', 'name', 'description',
        'price', 'currency','status','quantity',
    ];
    public function category()
    {
        return $this->hasOne(ProductCategory::class, 'id', 'category_id');
    }

}
