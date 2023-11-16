<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ["order_number"];
    public function products(){
        return $this->belongsToMany(Product::class,"order_product",
        "order_id" ,"product_id")
            ->withPivot("quantity");
    }
    use HasFactory;
}
