<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(){
        $product = Product::get();
        return response()->json($product);
    }

    public function store(Request $request){
        $request->validate([
            'name'=>'required',
            'merk'=>'required',
            'stock'=>'required'
        ]);
        $product = Product::create([
            'name'=>$request->name,
            'merk'=>$request->merk,
            'stock'=>$request->stock
        ]);
        return response()->json($product);
    }
}