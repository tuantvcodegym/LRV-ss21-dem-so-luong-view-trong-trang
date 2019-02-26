<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use mysql_xdevapi\Session;
use Illuminate\Support\Facades\Session as SessionAlias;

class ProductController extends Controller
{
    public function index(){
        $products = Product::all();
        return view('index', compact('products'));
    }
    public function show($id){
        $productKey = 'product' . $id;
        if (!SessionAlias::has($productKey)) {
            Product::where('id', $id)->increment('view_count');
            SessionAlias::put($productKey, 1);
        }


        $product = Product::find($id);
        return view('show', compact('product'));
    }
}
