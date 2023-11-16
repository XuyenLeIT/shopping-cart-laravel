<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class OrderController extends Controller
{
    public function index(){
        $orders = Order::all();
        return view("order.index",compact("orders"));
    }
    public function store(){
        try {
            DB::beginTransaction();
            //Tao don hang
            $randomString = strtoupper(Str::random(16));
            $order = Order::create(["order_number"=>$randomString]);
            // dd($order);
            //danh sach san phan va so luong
            $cart = session() -> get("cart",[]);
            $products = [];
            foreach($cart as $key=> $item){
                $product = [
                    'id' => $key,
                    'quantity'=> $item['quantity'],
                ];
                $products[] = $product;   
            }
            //Thêm sản phẩm vào mảng products đã cho trước đó        
            //Thêm thông tin sản phẩm và order vào bảng trục
            foreach ($products as $productData) {
                $order->products()->attach(['product_id'=> $productData['id']],
                                ['quantity'=> $productData['quantity']]);
            }  
            DB::commit(); 
            session()->forget('cart');
            return redirect()->route("order.index")
                ->with('success','Cam on anh da order tui em');
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }
    public function detail($id){
        $order = Order::find($id);
        return view('order.detail',compact('order'));
    }
}
