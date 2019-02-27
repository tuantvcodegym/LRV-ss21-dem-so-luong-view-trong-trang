<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use mysql_xdevapi\Session;
use Illuminate\Support\Facades\Session as SessionAlias;

class ProductController extends Controller
{
    public function index(){
        $products = Product::paginate(3);
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
    public function create(){
        return view('create');
    }
    public function insert(Request $request){
        $product = new Product();
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->view_count = 0;
        if($request->hasFile('image')){
            $image = $request->file('image');
            $path = $image->store('images', 'public');
            $product->image = $path;
        }else{
            $product->image = 'Null';
        }
        $product->save();
        return redirect()->route('index',compact('product'));
    }
    public function delete($id){
        $product = Product::find($id);
        $product->delete();
        return redirect()->route('index', compact('product'));
    }
}
