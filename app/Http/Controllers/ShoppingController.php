<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class ShoppingController extends Controller
{
    public function storeCart($productId){
        $product = Product::find($productId);
        $arr = [
          'id' => $product->id,
          'name' => $product->name,
          'img' => $product->image,
          'price' => $product->price,
          'total' => 1
        ];
        //dd($arr);
        Session::push('cart', $arr);
        return redirect()->route('cart.show');
    }
    public function showCart(){
        $carts = Session::get('cart');
        return view('cart', compact('carts'));
    }
}
