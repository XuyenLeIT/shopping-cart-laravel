<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart',[]);
        $totalPrice = 0;
        foreach ($cart as $item) {
            $totalPrice += $item['price']*$item['quantity'];
        }
        return view('cart',compact('cart',"totalPrice"));
    }
    public function addToCart($id)
    {
        $product = Product::find($id);
        $cart = session()->get('cart',[]);
        if(isset($cart[$id])){
            $cart[$id]['quantity']++;
        }else{
            $cart[$id] = [
                'name'=> $product->name,
                'price'=> $product->price,
                'quantity'=> 1
            ];
        }
        session()->put('cart', $cart);
        return redirect()->back()
            ->with('success',"Da add em vao cart thanh cong");
    }
    public function deleteItemCart($id){
        $cart = session()->get('cart',[]);
        if(isset($cart[$id])){
            unset($cart[$id]);
            session()->put('cart', $cart);
        }
        return redirect()->back()->with('success','tai sao bo em');
    }
    public function increaseQuatity($id){
        $cart = session()->get('cart',[]);
        if(isset($cart[$id])){
            $cart[$id]['quantity']++;
        }
        session()->put('cart', $cart);
        return redirect()->back()
        ->with('success',"Cảm ơn a đã thêm em 1 suất");
    }
    public function decreaseQuatity($id){
        $cart = session()->get('cart',[]);
        if(isset($cart[$id])){
            if($cart[$id]['quantity'] == 1){
                return redirect()->back()
                ->with('error',"Ê Ê ít nhất phải 1 suất cho em nha");
            }else{
                $cart[$id]['quantity']--;
            }
        }
        session()->put('cart', $cart);
        return redirect()->back()
        ->with('error',"Úi Úi sao anh giảm suất của e :((");
    }
}
