<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreProductRequest;
use App\Models\Product;
use App\Http\Resources\ProductResource;

class ProductController extends Controller
{
    public function index(){
        return ProductResource::collection(Product::all());
    }

    public function show(Product $product){
        return new ProductResource($product);
    }

    public function store(StoreProductRequest $request){
        Product::create($request->validated());
        return response()->json("Product Created");
    }
    
    public function update(StoreProductRequest $request, Product $product){
        $product->update($request->validated());
        return response()->json("Product Updated");
    }

    public function destroy(Product $product){
        $product->delete();
        return response()->json("Product Deleted");
    }
}
