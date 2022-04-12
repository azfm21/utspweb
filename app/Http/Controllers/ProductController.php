<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function store(Request $request){

        //validasi inputan
        $validator = validator::make($request->all(),[
            'name' => 'required|max:100',
            'price' => 'required|numeric',
            'type' => 'required|in:snack,drink,makeup',
            'expired_at' => 'required|date'
        ]);

        //kondisi input salah
        if($validator->fails()) {
            return response()->json($validator->messages())->setStatusCode(422);
        }

        //inputan benar
        $validated = $validator->validated();
        
        //input ke tabel
        Product::create([
            'name' => $validated['name'],
            'price' => $validated['price'],
            'type' => $validated['type'],
            'expired_at' => $validated['expired_at']
        ]);

        return response()->json('produk berhasil disimpan')->setStatusCode(201);
    }

    public function show(){
        $products = Product::all();

        return response()->json($products)->setStatusCode(200);
    }
}
