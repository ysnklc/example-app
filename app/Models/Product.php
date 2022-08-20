<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'products';
    protected $fillable = ['name','category_id', 'price', 'stock'];

    public function orders()
    {
        return $this->belongsToMany(Order::class, 'order_products');
    }
}
