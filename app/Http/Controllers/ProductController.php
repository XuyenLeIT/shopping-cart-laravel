<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        $cart = session() -> get("cart",[]);
        $totalCount = 0;
        foreach ($cart as $item) {
            $totalCount += $item['quantity'];
        }
        $products = Product::all();
        return view("product.index",compact("products","totalCount"));
    }
    public function create(){
        return view("product.create");
    }
    public function store(Request $request){
        $request->validate([
            "name"=> "required",
            "price"=> "required",
        ]);
        Product::create($request->all());
        return redirect()->route("product.index")
        ->with("success","Product created successfully");
    }
}
