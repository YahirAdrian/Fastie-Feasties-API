<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    //GET methods
    public function index()
    {
        return Product::all();
    }

    public function show($id)
    {
        return Product::findOrFail($id);
    }

    public function category($category){
        return Product::where('category', $category)->get();
    }
       

    //POST methods
    public function store(Request $request)
    {
        $data = $request->all();
        $product = new Product();
        return $product->create($data);
    }

    //PUT methods
    public function update(Request $request, $id)
    {

        $product = Product::findOrFail($id);
        $data = $request->all();
        $product->name = $data['name'] ?? $product->name;
        $product->category = $data['category'] ?? $product->category;
        $product->description = $data['description'] ?? $product->description;
        $product->price = $data['price'] ?? $product->price;
        $product->image = $data['image'] ?? $product->image;
        $product->save();
        return $product;
    }

    
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return response()->json(['message' => 'Product deleted successfully']);
    }
}
