<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ["name","price"];
    public function orders(){
        return $this->belongsToMany(Order::class,
            "order_product","order_id","product_id")->withPivot("quantity");
    }
    use HasFactory;
}
